@php 

$departments = getDepartments();
$designations = getDesignations();
$status = getStatus();

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
            <div class="mb-3">
              <label for="{{ isset($item) ? $item->id:'' }}rec_id"
               class="form-label required">rec_id</label>
               <input type="text"
               value="{{ isset($item) ? $item->rec_id:old('rec_id') ?? ''  }}"
               class="form-control"
               id="{{ isset($item) ? $item->id:'' }}rec_id"
               name="rec_id" required>
             </div>
           </div>
           <div class="col-lg-4">
            <div class="mb-3">
              <label for="{{ isset($item) ? $item->id:'' }}first_name"
               class="form-label required">First
             Name</label>
             <input type="text"
             value="{{ isset($item) ? $item->first_name:old('first_name') ?? ''  }}"
             class="form-control"
             id="{{ isset($item) ? $item->id:'' }}first_name"
             name="first_name" required>
           </div>
         </div>

         <div class="col-lg-4">
          <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}last_name"
             class="form-label required">Last
           Name</label>
           <input type="text"
           value="{{ isset($item) ? $item->last_name:old('last_name') ?? ''  }}"
           class="form-control"
           id="{{ isset($item) ? $item->id:'' }}last_name"
           name="last_name" required>
         </div>
       </div>
     </div>
     <div class="row">
      <div class="col-lg-6">
        <div class="mb-3">
          <label for="{{ isset($item) ? $item->id:'' }}email"
           class="form-label required">Email</label>
           <input type="email"
           value="{{ isset($item) ? $item->email:old('email') ?? ''  }}"
           class="form-control"
           id="{{ isset($item) ? $item->id:'' }}email" name="email"
           required>
         </div>
       </div>
       <div class="col-lg-6">
        <div class="mb-3">
          <label for="{{ isset($item) ? $item->id:'' }}username"
           class="form-label required">Username</label>
           <input type="text"
           value="{{ isset($item) ? $item->username:old('username') ?? ''  }}"
           class="form-control"
           id="{{ isset($item) ? $item->id:'' }}username" name="username"
           required>
         </div>
       </div>
     </div>
     <div class="row">
     <div class="col-lg-4">
        <label for="" class="form-label">Department</label>
         <select class="form-control" name="department_id" id="department_id">
           <option>-Select Department-</option>
           @foreach($departments as $value)
           <option value="{{$value->id}}" {{ isset($item) && $item->department_id == $value->id  ? 'selected' : ''}}>{{$value->title}}</option>
           @endforeach
         </select>
     </div>
       <div class="col-lg-4">
        <label for="" class="form-label">Designations</label>
         <select class="form-control" name="designation_id" id="designation_id">
           <option>-Select Designation-</option>
           @foreach($designations as $value)
           <option value="{{$value->id}}" {{ isset($item) && $item->designation_id == $value->id  ? 'selected' : ''}}>{{$value->title}}</option>
           @endforeach
         </select>
     </div>
     <div class="col-lg-4">
        <label for="" class="form-label">Status</label>
         <select class="form-control" name="status" id="status">
           @foreach($status as $key => $value)
           <option value="{{$key}}" {{ isset($item) && $item->status == $key  ? 'selected' : ''}}>{{$value}}</option>
           @endforeach
         </select>
     </div>
     </div>

   </div>
 </div>
</div>
</div>
@include('user.navs.script')
