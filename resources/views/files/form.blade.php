@include('components.form_errors')
{{ csrf_field() }}
<div class="card">
    <div class="card-body3058">
        <div>
            <form action="{{ url('files/images') }}" method="post" class="dropzone" id="file_upload_form" enctype="multipart/form-data">
               <div class="fallback">
                    <input name="file" type="file" multiple="multiple" style="visibility: hidden;">
                    <div class="dz-message needsclick">
                        <div class="mb-3">
                            <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                        </div>

                        <h4>Drop files here or click to upload.</h4>
                    </div>
                </div>
            </form>
        </div>

{{--        <div class="text-center mt-4">--}}
{{--            <button type="button" class="btn btn-primary waves-effect waves-light">Send Files</button>--}}
{{--        </div>--}}
    </div>
</div>
