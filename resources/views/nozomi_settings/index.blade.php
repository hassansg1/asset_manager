@extends('layouts.master_secondry')

@section('title') Nozomi Credentials @endsection

@section('content')
    @include('components.form_errors')
    <form class="item_form" method="post" enctype="multipart/form-data"
          action="" id="nozomi_settings_form">
        {{ csrf_field() }}
        <input type="hidden" name="id" id="id" value="{{ $nozomi->id ?? null }}">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Nozomi Credentials</h4>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="path"
                                           class="form-label required">Path</label>
                                    <input type="text" value="{{ $nozomi->path ?? '' }}"
                                           class="form-control" id="path"
                                           name="path" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="username"
                                           class="form-label required">Username</label>
                                    <input type="text" value="{{ $nozomi->username ?? '' }}"
                                           class="form-control" id="username"
                                           name="username" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="password"
                                           class="form-label required">Password</label>
                                    <input type="password" value="{{ $nozomi->password ?? '' }}"
                                           class="form-control"
                                           id="password"
                                           name="password" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary w-md submit_form mb-2">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script>
        $('#nozomi_settings_form').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '{{ url('nozomi_settings/save') }}',
                data: $('#nozomi_settings_form').serialize(),
                success: function (result) {
                    if (result.status) {
                        doSuccessToast();
                        $('#id').val(result.id);
                    } else
                        doErrorToast();
                },
            });
        });
    </script>
@endsection
