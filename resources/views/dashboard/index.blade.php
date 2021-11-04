@extends('layouts.master')

@section('title') {{ $heading }}s @endsection

@section('content')
    @yield('top_content')
{{--    @include('layouts.top_heading',['heading' => $heading."s"])--}}
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="custom_table_div">
                            <table id="datatable-logs"
                                   class="table table-borderless dt-responsive nowrap w-100 dataTable no-footer dtr-inline">
                                <thead class="table-light custom_table_head">
                                <tr>
                                    <th>Sr#</th>
                                    <th>Name</th>
                                    <th>Applicable</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                    <th>View Details</th>
                                </tr>
                                </thead>
                                <tbody id="">
                                @foreach($items as $key => $item)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{ isset($item->compliance)?$item->compliance->clause .' '. $item->compliance->section  :'' }}</td>
                                        <td>@if($item->applicable == 1) Yes @else No @endif</td>
                                        <td>{{$item->reason }}</td>
                                        <td>@if($item->applicable == 1)
                                            @if($item->compliant == 1)
                                                    <i class="fas fa-check-circle" style="color: green"></i>
                                                @elseif($item->compliant == 2)
                                                No
                                                @else
                                                    <i class="fas fa-spinner"  style="color: deepskyblue"></i>
                                                @endif
                                        @endif
                                        </td>


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')
    <script>
        $('#datatable-logs').DataTable({'order': []});
    </script>
@endsection
