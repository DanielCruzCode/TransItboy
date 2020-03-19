@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home view</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You´re in home!
                </div>
            </div>
        </div>
    </div>
    {{-- VUEJS + AJAX --}}
    {{-- <div class="row">
            <div id="main" class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <h1>VUEjs - AJAX axios</h1>
                        <ul class="list-group">
                            <li v-for="item in lists" class="list-group-item">
                                @{{ item.name }}
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-8">
                        <h1>JSON</h1>
                        <pre>
                            @{{ $data }}
                        </pre>
                    </div>
                </div>
            </div>
    </div> --}}
</div>
@endsection
