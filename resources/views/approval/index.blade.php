@extends('layouts.master')

@section('title') {{ $heading }}s @endsection

@section('content')
@yield('top_content')
@include('layouts.top_heading',['heading' => $heading."s"])

<!-- Modal -->
<div class="modal fade" id="reasonModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Justification</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <label> Reason for change</label>
        <textarea name="reason" id="reason" class="form-control"></textarea>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-primary update_status" id="reject_all">Save</button>
    </div>
</div>
</div>
</div>
<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="custom_table_div">
                        <button class="update_status btn btn-primary" id="approve_all">Approve Checked</button>
                        <button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reasonModal">Reject Checked</button>
                        <button class="update_status btn btn-primary" id="delete_all">Delete Checked</button>
                        <table id="datatable-logs"
                        class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline">
                        <thead class="table-light custom_table_head">
                            <tr>
                                <th class="select_all_checkbox" style="width: 10px"><input
                                    onclick="toggleSelectAll()"
                                    type="checkbox" name=""
                                    id="select_all"></th>
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
                                    <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->id }}" id="select_check_{{ $item->id }}" class= "select_row" data-id="{{$item->id}}"></td>
                                    <td>{{ explode('\\',$item->model)[2] }}</td>
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
    makeDatatable('datatable-logs');
    function toggleSelectAll() {
        $('.select_row').prop('checked', $('#select_all').is(":checked"));
    }

    $('.update_status').on('click', function(e) {
       var allVals = [];
       $(".select_row:checked").each(function() {
        allVals.push($(this).attr('data-id'));
    });
       if(allVals.length <=0)
       {
        alert("Please select row.");
    }else{
        var join_selected_values = allVals.join(",");
        var button_id = this.id;
        var reason = $("#reason").val();
        $.ajax({
            url: '{{ route('approve.status') }}',
            type: 'GET',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                ids: join_selected_values,
                button_id: button_id,
                reason: reason,
            },
            success: function (data) {
              location.reload();
          },
          error: function (data) {

          }
      });
    }
});
</script>
@endsection
