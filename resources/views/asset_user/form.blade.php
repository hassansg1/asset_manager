@php 
$computer_asset = getComputerAssets();
@endphp
@include('components.form_errors')
{{ csrf_field() }}
<input type="hidden" name="id" value="{{ isset($clone) && $clone ? '' : (isset($item) ? $item->id : '') }}">

<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4">{{ $heading }} Information</h4>

        @include('components.form_errors')
        {{ csrf_field() }}
        <input type="hidden" name="id"
        value="{{ isset($clone) && $clone ? '' : (isset($item) ? $item->id : '') }}">
        <div class="row">
         <div class="col-lg-4">
          <select class="select2" name="states[]" multiple="multiple">
            <option value="AL">Alabama</option>
            <option value="WY">Wyoming</option>
          </select>
        </div>
        <div class="col-lg-4">
          <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}asset_user_id"
             class="form-label required">Asset User Id</label>
             <input type="text"
             value="{{ isset($item) ? $item->asset_user_id:old('asset_user_id') ?? ''  }}"
             class="form-control"
             id="{{ isset($item) ? $item->id:'' }}asset_user_id"
             name="asset_user_id" required>
           </div>
         </div>

         <div class="col-lg-4">
          <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}rights"
             class="form-label required">Rights</label>
             <input type="text"
             value="{{ isset($item) ? $item->rights:old('rights') ?? ''  }}"
             class="form-control"
             id="{{ isset($item) ? $item->id:'' }}rights"
             name="rights" required>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('.select2').select2();
  });
</script>
@include('user.navs.script')
