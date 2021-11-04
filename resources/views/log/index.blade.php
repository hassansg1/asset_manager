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
                                    <th>Action</th>
                                    <th>Changes</th>
                                    <th>Approved by</th>
                                    <th>Approved At</th>
                                </tr>
                                </thead>
                                <tbody id="">
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{ explode('\\',$item->model)[2] }}</td>
                                        <td>{{ $item->recId() ?? '' }}</td>
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
