<?php

namespace App\Http\Controllers;
use App\CarRegistration;
use Illuminate\Http\Request;

use Illuminate\Support\Arr;

use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CarRegistrationsExport;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CarRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // FUNCTIONAL INDEX
    public function index()
    {
        $registrations = carRegistration::get();
        return view('carRegistration.index')->with('registrations', $registrations);
    }

    // TEST INDEX
    // public function index()
    // {
    //      $locationsArray = CarRegistration::get();
    //      $township = Arr::pluck($locationsArray, 'location.0');
    //      $city = Arr::pluck($locationsArray, 'location.1');
    //      $address = Arr::pluck($locationsArray, 'location.2');
    //      $query = CarRegistration::select(
    //         'carClass',
    //         'carBrand',
    //         'line',
    //         'model',
    //         'bodywork',
    //         'passengers',
    //         'updated_at',
    //         'created_at'
    //     )->get();
    //      // $array = array_collapse($township, $query);
    //      $array = collect([$township]);
    //      $collapsed = $array->concat($query);
    //      return $collapsed->all();

    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       $locations = CarRegistration::all();

        return view('carRegistration.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'townshipsUI' => 'required',
            'citiesUI' => 'required',
            'addressUI' => 'required',
            'carClassUI' => 'required',
            'carBrandUI' => 'required',
            'lineUI' => 'required',
            'modelUI' => 'required',
            'bodyworkUI' => 'required',
            'passengersUI' => 'required',
        ]);


        $town = request('townshipsUI');
        $city = request('citiesUI');
        $address = request('addressUI');

        $carRegistration = new CarRegistration();

        $carRegistration->push('location', [
            $town,
            $city,
            $address
        ]);
        $carRegistration->carClass = request('carClassUI');
        $carRegistration->carBrand = request('carBrandUI');
        $carRegistration->line = request('lineUI');
        $carRegistration->model = request('modelUI');
        $carRegistration->bodywork = request('bodyworkUI');
        $carRegistration->passengers = request('passengersUI');
        $carRegistration->save();

        return back()->with('message', 'Added succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CarRegistration  $carRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(CarRegistration $carRegistration)
    {
        return view('CarRegistration.show', compact('carRegistration'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CarRegistration  $carRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(CarRegistration $carRegistration)
    {
        return view('carRegistration.edit',compact('carRegistration'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CarRegistration  $carRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarRegistration $carRegistration)
    {

        request()->validate([
            'townships'   => 'required|max:15',
            'cities'   => 'required|max:15',
            'address'   => 'required|max:30',
            'carClass'   => 'required|max:15',
            'carBrand'   => 'required|max:15',
            'model'   => 'required|max:15',
            'bodywork'   => 'required|max:15',
            'passengers'   => 'required|max:10|integer',

        ]);
           $carRegistration->push('location', [
                       request('township'),
                       request('cities'),
                       request('address')
                    ]);
            $carRegistration->carClass = request('carClass');
            $carRegistration->carBrand = request('carBrand');
            $carRegistration->line = request('line');
            $carRegistration->model = request('model');
            $carRegistration->bodywork = request('bodywork');
            $carRegistration->passengers = request('passengers');
            $carRegistration->save();

        return redirect()->route('car-registration.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CarRegistration  $carRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarRegistration $carRegistration)
    {
        $carRegistration->delete();
        return redirect()->route('car-registration.index');
    }

    public function exportPdf()
    {
        $CarRegistration = CarRegistration::get();
        $pdf = PDF::loadView('pdf.carregistration',compact('CarRegistration'));

        return $pdf->download('CarRegistration-list.pdf');
    }

    public function importExcel(Request $request)
    {
        $file = $request->file('excelFileUI');
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
        $sheet = $spreadsheet->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();


        // return $sheet->getCell("E1")->getValue();

        for ($i=1; $i < $highestRow; $i++) {
                $carRegistration = new CarRegistration();

                $carRegistration->push('location', [
                    $sheet->getCell("A".$i)->getValue(),
                    $sheet->getCell("B".$i)->getValue(),
                    $sheet->getCell("C".$i)->getValue()
                ]);
                $carRegistration->carClass   = $sheet->getCell("D".$i)->getValue();
                $carRegistration->carBrand   = $sheet->getCell("E".$i)->getValue();
                $carRegistration->line       = $sheet->getCell("F".$i)->getValue();
                $carRegistration->model      = $sheet->getCell("G".$i)->getValue();
                $carRegistration->bodywork   = $sheet->getCell("H".$i)->getValue();
                $carRegistration->passengers = $sheet->getCell("I".$i)->getValue();
                $carRegistration->save();

        }

        return back()->with('message', 'Added succesfully');
    }
    public function importJson(Request $request)
    {
        //Después de modificar una ruta para que nos lleve a este método vamos a hacer lo siguiente

        $file = $request->file('jsonFileUI');//Vamos a pedir los datos que trae la petición

        $archivo = file_get_contents($file);

        $jsonData = json_decode($archivo, true);
        foreach($jsonData as $row){
                $carRegistration = new CarRegistration();
                $carRegistration->location   =    $row['location'];
                $carRegistration->carClass   =    $row['carClass'];
                $carRegistration->carBrand   =    $row['carBrand'];
                $carRegistration->line       =    $row['line'];
                $carRegistration->model      =    $row['model'];
                $carRegistration->bodywork   =    $row['bodywork'];
                $carRegistration->passengers =    $row['passengers'];
                $carRegistration->save();
        }

        return back()->with('message', 'Added succesfully!');
        //Retornamos a la vista anterior con un mensage de sesión
    }

    public function exportExcel()
    {
        return Excel::download(new CarRegistrationsExport, 'CarRegistration-list.xlsx');
    }
}
