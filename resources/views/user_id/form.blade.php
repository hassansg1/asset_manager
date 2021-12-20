@include('components.form_errors')
{{ csrf_field() }}
@php 
$assets = getComputerAssets();
$system = getSystems();
$rights = getRights();

@endphp
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
            <div class="mb-3">
              <label for="{{ isset($item) ? $item->id:'' }}user_id"
               class="form-label required">User ID</label>
               <input type="text"
               value="{{ isset($item) ? $item->user_id:old('user_id') ?? ''  }}"
               class="form-control"
               id="{{ isset($item) ? $item->id:'' }}user_id"
               name="user_id" required>
             </div>
           </div>
           <div class="col-lg-4">
            <div class="mb-3">
              <label for="{{ isset($item) ? $item->id:'' }}right"
                class="form-label">Rights</label>
                <select class="form-control select2" id="right_id" name="right_id[]" multiple="multiple">
                  @foreach($rights as $value)
                  <option value="{{$value->id}}">{{$value->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="mb-3">
                <label for="{{ isset($item) ? $item->id:'' }}user_type"
                 class="form-label required">Type</label>
                 <select class="form-control" name="user_type" id="user_type">
                   <option value="">-Select Type-</option>
                   <option value="asset">Asset</option>
                   <option value="system">System</option>
                 </select>
               </div>
             </div>
           </div>
           <div class="row asset" style="display: none">
            <div class="col-lg-4">
              <div class="mb-3">
                <label for="{{ isset($item) ? $item->id:'' }}asset_id"
                 class="form-label required">Asset</label>
                 <select class="form-control select2" id="asset_id" name="asset_id">
                  @foreach($assets as $value)
                  <option value="{{$value->id}}">{{$value->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            </div>
            <div class="row system" style="display: none">
              <div class="col-lg-4">
                <div class="mb-3">
                  <label for="{{ isset($item) ? $item->id:'' }}system_id"
                   class="form-label">System</label>
                   <select class="form-control select2" id="system_id" name="system_id">
                    @foreach($system as $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="mb-3">
                    <label for="{{ isset($item) ? $item->id:'' }}description"
                      class="form-label">Description</label>
                      <textarea class="form-control" id="{{ isset($item) ? $item->id:'' }}description"
                      name="description"></textarea>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      @section('script')
      <script type="text/javascript">
        $('#user_type').on('change', function(){
          var type= this.value;
          if(type == "asset"){
            $('.asset').show();
            $('.system').hide();
          }else if(type == "system"){
            $('.asset').hide();
            $('.system').show();
          }
        });
      </script>
      @endsection
