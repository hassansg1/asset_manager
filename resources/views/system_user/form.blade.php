@php 
$system = getSystems();
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
          <label for="" class="form-label">System</label>
          <select class="form-control" name="system_id" id="system_id">
           <option>-Select System-</option>
           @foreach($system as $value)
           <option value="{{$value->id}}" {{ isset($item) && $item->system_id == $value->id  ? 'selected' : ''}}>{{$value->name}}</option>
           @endforeach
         </select>
       </div>
       <div class="col-lg-4">
        <div class="mb-3">
          <label for="{{ isset($item) ? $item->id:'' }}system_user_id"
           class="form-label required">System User Id</label>
         <input type="text"
         value="{{ isset($item) ? $item->system_user_id:old('system_user_id') ?? ''  }}"
         class="form-control"
         id="{{ isset($item) ? $item->id:'' }}system_user_id"
         name="system_user_id" required>
       </div>
     </div>
 </div>
</div>
</div>
</div>
</div>
@include('user.navs.script')
