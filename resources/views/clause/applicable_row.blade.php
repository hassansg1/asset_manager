@foreach($items as $item)
    <tr data-id="{{ $item->id }}" id="{{ $item->id }}">
        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->compliance_id }}"
                               id="select_check_{{ $item->compliance_id }}" class="select_row"></td>
        <td  data-id="{{ $item->id }}" class="details-control">
            <span style="cursor: pointer;color: #337ab7" class="fas fa-plus-circle icon_{{ $item->id }}"></span>
            {{ $item->compliance->clause ?? '' }}
        </td>
        <td>{{ $item->compliance->section ?? '' }}</td>
        <td>
            <label for="html">Yes</label><br>
        </td>
        <td></td>
    </tr>

    <div class="modal fade image-upload-modal-{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body3058">
                            <div>
                                <form action="{{url('store/file/compliance')}}/{{$item->id}}" method="post"
                                      class="dropzone" id="file_upload_form" enctype="multipart/form-data">
                                    <input type="hidden" name="compliance_data_id" value="{{ $item->id }}">
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

                            <div class="text-center mt-4">
                                <button type="button" class="btn btn-primary waves-effect waves-light">Send Files
                                </button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div><!-- /.modal -->
@endforeach

@section('script')

    <script>
        let table;

        $(document).ready(function () {
            table = $('#dtb').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });
        });
        $('#dtb tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var trId = $(this).attr('data-id');
            let iconClass = $('.icon_' + trId);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
                iconClass.removeClass('fa-minus-circle');
                iconClass.addClass('fa-plus-circle');

            } else {
                iconClass.removeClass('fa-plus-circle');
                iconClass.addClass('fa-minus-circle');
                showSubLocations(tr, row, trId);
            }
        });

        function showSubLocations(tr, row, trId) {
            $.ajax({
                url: '/getLocationsOfCompliance/',
                type: 'GET',
                data: {trId: trId},
                success: function (data) {
                    row.child(data.html).show();
                    tr.addClass('shown');
                }
            });
        }
    </script>
@endsection
