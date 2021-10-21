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
                            <table id="datatable-buttons"
                                   class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline">
                                <thead class="table-light custom_table_head">
                                <tr>
                                    <th>Type</th>
                                    <th>Id</th>
                                    <th>Action</th>
                                    <th>Changes</th>
                                    <th>Changed by</th>
                                    <th>Changed At</th>
                                </tr>
                                </thead>
                                <tbody id="table_content_div_body">
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{ $item->type }}</td>
                                        <td>{{ $item->new()->rec_id }}</td>
                                        <td>{{ $item->action }}</td>
                                        <td>
                                            @if($item->changes())
                                                @foreach($item->changes() as $key => $value)
                                                    @if($key != 'updated_at')
                                                        {{ $key }} changed from
                                                        <strong>{{ $item->old()->{$key} }}</strong> to
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