@extends('layouts.master')

@section('title') {{ $heading }}s @endsection

@section('content')
    @yield('top_content')
    @include('layouts.top_heading',['heading' => $heading."s"])
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="custom_table_div">
                            <table id="datatable-logs"
                                   class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline">
                                <thead class="table-light custom_table_head">
                                <tr>
                                    <th>Sr#</th>
                                    <th>Name</th>
                                    <th>Assigned To</th>
                                    <th>Status</th>
                                    <th>View Details</th>
                                </tr>
                                </thead>
                                <tbody id="">
                                @foreach($items as $key => $item)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{ strtolower($item->name) }}</td>
                                        <td>{{ $item->user->first_name ?? ''}} {{ $item->user->last_name ?? ''}}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            @if($item->getTaskType('approval_request_close') != $item->status)
                                            <a href="{{url('task/detail')}}/{{$item->log_id}}">Resolve Issue</a>
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
        $('#datatable-logs').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            "searching": false,
            "ordering": false,
            "bPaginate": false,
            "bSortable": false,
        });
    </script>
@endsection
