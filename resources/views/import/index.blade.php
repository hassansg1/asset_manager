@extends('layouts.master')

@section('title') Import @endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <h2>CSV Import</h2>
                <br>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST"
                          action="{{ isset($action) ? route($action) : route('import.store') }}"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('csv_file') ? ' has-error' : '' }}">

                            <h4>Select CSV file to import</h4>
                            <div class="col-md-6">
                                <input
                                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                    id="csv_file" type="file" class="form-control" name="csv_file" required>

                                @if ($errors->has('csv_file'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('csv_file') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Parse CSV
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    @if(isset($status))
        <div class="alert alert-{{ $status ? 'success' :'danger' }}" role="alert">
            {{ $status ? 'Import successful' :'Something went wrong. For details see the logs below.' }}
        </div>
    @endif
    @if(isset($logs))
        <div class="row mt-5">
            <div class="cl-12">
                <div class="card p-2">
                    <div class="card-title">
                        <h3>Logs</h3>
                    </div>
                    <div class="card-body">
                        @foreach($logs as $log)
                            <h5>{!! $log !!}</h5>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
