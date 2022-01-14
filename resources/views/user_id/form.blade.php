@include('components.form_errors')
{{ csrf_field() }}
@php
    $assets = getComputerAssets();
    $system = getSystems();
    $rights = getRights();
    $otcm_users = getOTCMUser();

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
                <div class="row ">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}user_type"
                                   class="form-label required">User ID Type</label>
                            <select class="form-control select2" name="user_type" id="user_type" required>
                                <option value="">-Select User ID Type-</option>
                                <option value="asset" {{ isset($item) && $item->parent == "asset"  ? 'selected' : ''}}>
                                    Asset User ID
                                </option>
                                <option
                                    value="system" {{ isset($item) && $item->parent == "system"  ? 'selected' : ''}}>
                                    System User ID
                                </option>
                            </select>
                        </div>
                    </div>
                    @if(isset($item) && $item->parent == "system"  && $item->parent_id)
                        <div class="col-lg-6 system" }}>
                            @else
                                <div class="col-lg-6 system" style="display: none" }}>
                                    @endif
                                    <div class="mb-3">
                                        <label for="{{ isset($item) ? $item->id:'' }}system_id"
                                               class="form-label required">System Name</label>
                                        <select class="form-control select2" id="system_id" name="system_id">
                                            <option value="">-Select System-</option>
                                            @foreach($system as $value)
                                                <option
                                                    value="{{$value->id}}" {{ isset($item) && $item->parent_id == $value->id  ? 'selected' : ''}}>{{$value->name}} ({{$value->system_type->name}})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @if(isset($item) && $item->parent == "asset"  && $item->parent_id)
                                    <div class="col-lg-6 asset" }}>
                                        @else
                                            <div class="col-lg-6 asset" style="display: none" }}>
                                                @endif
                                                <div class="mb-3">
                                                    <label for="{{ isset($item) ? $item->id:'' }}asset_id"
                                                           class="form-label required">Asset ID</label>
                                                    <select class="form-control select2" id="asset_id" name="asset_id">
                                                        <option value="">-Select Asset ID-</option>
                                                        @foreach($assets as $value)
                                                            <option
                                                                value="{{$value->id}}" {{ isset($item) && $item->parent_id == $value->id  ? 'selected' : ''}}>{{$value->rec_id}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                    </div>
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
                                                       class="form- required">User ID Rights</label>
                                                <select class="form-control select2" id="right_id" name="right_id"
                                                        required>
                                                    <option value="">-Select Right-</option>
                                                    @foreach($rights as $value)
                                                        <option
                                                            value="{{$value->id}}" {{ isset($item) && $item->user_rights_id->right_id == $value->id  ? 'selected' : ''}}>{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="{{ isset($item) ? $item->id:'' }}right">User</label>
                                                <select class="form-control select2" id="otcm_user_id"
                                                        name="otcm_user_id">
                                                    <option value="">-Select User-</option>
                                                    @foreach($otcm_users as $value)
                                                        <option
                                                            value="{{$value->id}}" {{ isset($item) && $item->otcm_user_id == $value->id  ? 'selected' : ''}}>{{$value->name}}</option>
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
                                                <textarea class="form-control"
                                                          id="{{ isset($item) ? $item->id:'' }}description"
                                                          name="description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                @if(isset($item) && $users)
                                    <hr class="solid">
                                    <h3>Associated Users</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Unit</th>
                                                    <th>Site</th>
                                                    <th>Sub site</th>
                                                    <th>User</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($users as $value)
                                                    <tr id="{{ $value->id }}">
                                                        {{--        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $value->id }}"--}}
                                                        {{--                               id="select_check_{{ $value->id }}" class="select_row"></td>--}}
                                                        <td>{{ $value->user_unit->rec_id }}</td>
                                                        <td>{{ $value->user_site->rec_id }}</td>
                                                        <td>{{ $value->user__sub_site->rec_id }}</td>
                                                        <td>{{ $value->name }}</td>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif
                        </div>
                </div>
            </div>
        </div>
        @section('script')
            <script type="text/javascript">
                $('#user_type').on('change', function () {
                    var type = this.value;
                    if (type == "asset") {
                        $('.asset').show();
                        $('.system').hide();
                    } else if (type == "system") {
                        $('.asset').hide();
                        $('.system').show();
                    }
                });
            </script>
@endsection
