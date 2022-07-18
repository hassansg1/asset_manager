@extends('layouts.master')
@section('content')
    <div class="card">
        @include('components.breadcrumb',['items' => getAncestorsForLocation(Session::get('asset_location_id')),'heading' => 'Asset Navigation'])
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 table-responsive">
                    <button class="btn btn-primary mr-10 mb-3">
                        <a style="color: white"
                           href="{{ url('assets/computer') }}">
                            Computer
                            Assets</a>
                    </button>
                    <table class="table table-bordered">
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
                    {{--            {!! $computer_assets->links('vendor.pagination.bootstrap-4') !!}--}}
                </div>
                <div class="col-md-4 table-responsive">
                    <button class="btn btn-primary mr-10 mb-3">
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
                    {{--            {!! $network_assets->links('vendor.pagination.bootstrap-4') !!}--}}
                </div>
                <div class="col-md-4 table-responsive">
                    <button class="btn btn-primary mr-10 mb-3">
                        <a style="color: white"
                           href="{{ url('assets/l_one') }}">
                            Level01
                            Assets</a>
                    </button>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lone_assets as $value)
                            <tr style="padding: 0px">
                                <td>{{$value->rec_id}}</td>
                                <td>{{$value->name}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{--                {!! $lone_assets->links('vendor.pagination.bootstrap-4') !!}--}}
                </div>
            </div>

        </div>
    </div>
@endsection

