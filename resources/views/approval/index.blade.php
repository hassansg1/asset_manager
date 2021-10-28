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
                                    <th>Type</th>
                                    <th>Id</th>
                                    <th>Activity</th>
                                    <th>Reason</th>
                                    <th>Changes</th>
                                    <th>Status/Action</th>
                                    <th>Changed by</th>
                                    <th>Changed At</th>
                                </tr>
                                </thead>
                                <tbody id="">
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{ $item->model }}</td>
                                        <td>{{ $item->recId() ?? '' }}</td>
                                        <td>{{ $item->action }}</td>
                                        <td>{{ $item->reason }}</td>
                                        <td>
                                            @if($item->descriptionItems())
                                                @foreach($item->descriptionItems() as $key => $value)
                                                    @if($key != 'updated_at')
                                                        {{ $key }} :
                                                        @if(isset($item->old()->{$key}))
                                                            <strong>{{ $item->old()->{$key} }}</strong>  =>
                                                        @endif
                                                        <strong>{{ $value }}</strong>
                                                    @endif
                                                    <br>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>

                                            @if($item->approved == 1)
                                                <span class="alert-success">Approved</span>
                                            @elseif($item->approved == 2)
                                                <span class="alert-danger">Rejected</span>
                                            @else

                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                                        <a class="dropdown-item" href="{{ url('log/approve',$item->id) }}">Approve</a>
                                                        <a class="dropdown-item" onclick="openRejectionModal('{{ url('log/reject',$item->id) }}')" href="javascript:void(0)">Reject</a>
                                                        <a class="dropdown-item" href="{{ url('log/remove',$item->id) }}">Delete</a>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>
                                            {{ universalDateFormatter($item->updated_at) }}
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
