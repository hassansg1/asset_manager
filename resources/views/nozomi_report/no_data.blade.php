@extends('layouts.master')

@section('title') Nozomi Report @endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    @include('nozomi_report.fetch_data')
                    <h4 class="card-title mb-4">Nozomi Report</h4>
                        No Data Found.
                </div>
            </div>
        </div>
    </div>
@endsection
