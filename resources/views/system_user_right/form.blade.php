@include('components.form_errors')
{{ csrf_field() }}
@php $assets = getComputerAssets(); @endphp
<input type="hidden" name="id" value="{{ isset($clone) && $clone ? '' : (isset($item) ? $item->id : '') }}">

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ $heading }} Information</h4>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}system_type"class="form-label">System Type</label>
                            <select class="form-control select2" id="system_type" name="system_type">
                                @foreach($systems as $value)
                                <option value="{{$value->id}}">{{$value->system_type}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}system_name"class="form-label">System Name</label>
                            <select class="form-control select2" id="system_name" name="system_name">
                                @foreach($systems as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                     <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}account_id"class="form-label">System Name</label>
                            <select class="form-control select2" id="account_id" name="account_id">
                               
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
<script type="text/javascript">
  $(document).ready(function() {
    $('#system_name').on('change', function(){
        var system_id = $(this).val();
        if(system_id){
            $.ajax({
             type:"get",
             url:"{{url('system/user_accounts')}}/"+system_id,
             success:function(res)
             {       
                if(res)
                {
                    $.each(res,function(key,value){
                        $("#account_id").append('<option value="'+key+'">'+value+'</option>');
                    });
                }
            }

        });
        }
    });
});
</script>
@endsection
