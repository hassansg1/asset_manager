@extends('layouts.master')
@section('content')
    <div class="card">
        @include('components.breadcrumb',['items' => getAncestorsForLocation(Session::get('asset_location_id')),'heading' => 'Legacy System'])
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 table-responsive">
                    <button class="btn btn-primary mr-10 mb-3">
                        <a style="color: white"
                           href="{{ route('hardware_legacy.index') }}">
                            Hardware Legacy</a>
                    </button>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Hardware Make</th>
                            <th>Hardware Model</th>
                            <th>Part Number</th>
                            <th>Legacy Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hardware_legacy as $value)
                            <tr>
                                <td>{{$value->hardware_make}}</td>
                                <td>{{$value->hardware_model}}</td>
                                <td>{{$value->part_number}}</td>
                                <td>
                                    @if($value->status == 1)
                                        Active
                                    @elseif($value->status == 2)
                                        End of sale
                                    @else
                                        End of service / support
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{--            {!! $computer_assets->links('vendor.pagination.bootstrap-4') !!}--}}
                </div>
                <div class="col-md-6 table-responsive">
                    <button class="btn btn-primary mr-10 mb-3">
                        <a style="color: white"
                           href="{{ route('software_legacy.index') }}">
                            Software Legacy</a>
                    </button>
                    <table class="table table-bordered table-responsive">
                        <thead>
                        <tr>
                            <th>Software Name</th>
                            <th>Software Version</th>
                            <th>Software Type</th>
                            <th>Legacy Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($software_legacy as $value)
                            <tr>
                                <td>{{$value->software_name}}</td>
                                <td>{{$value->software_version}}</td>
                                <td>
                                    @if($value->software_type == 1)
                                        Application
                                    @else
                                        Operating System
                                    @endif
                                </td>
                                <td>
                                    @if($value->status == 1)
                                        Active
                                    @elseif($item->status == 2)
                                        End of sale
                                    @else
                                        End of service / support
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{--            {!! $network_assets->links('vendor.pagination.bootstrap-4') !!}--}}
                </div>
            </div>

        </div>
    </div>
@endsection

