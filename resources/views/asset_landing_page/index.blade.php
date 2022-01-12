@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <button class="btn btn-primary mr-10">
                <a style="color: white"
                   href="{{ url('assets/l_one') }}">
                    L01
                    Assets</a>
            </button>
            <table class="table table-bordered table-responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lone_assets as $value)
                    <tr>
                        <td>{{$value->rec_id}}</td>
                        <td>{{$value->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary mr-10">
                <a style="color: white"
                   href="{{ url('assets/computer') }}">
                    Computer
                    Assets</a>
            </button>
            <table class="table table-bordered table-responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($computer_assets as $value)
                    <tr>
                        <td>{{$value->rec_id}}</td>
                        <td>{{$value->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary mr-10">
                <a style="color: white"
                   href="{{ url('assets/network') }}">
                    Network
                    Assets</a>
            </button>
            <table class="table table-bordered table-responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($network_assets as $value)
                    <tr>
                        <td>{{$value->rec_id}}</td>
                        <td>{{$value->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

