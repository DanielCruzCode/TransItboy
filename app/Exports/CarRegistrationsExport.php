<?php

namespace App\Exports;

use App\CarRegistration;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class CarRegistrationsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
    	return view('excel.carRegistration', [
    		'carRegistration' => CarRegistration::all()
    	]);
    }
}
