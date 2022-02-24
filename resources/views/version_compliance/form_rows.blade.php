@foreach($items as $item)
    <tr data-id="{{ $item->id }}" id="{{ $item->id }}">
        <td data-id="{{ $item->id }}" class="details-control">
            <span style="cursor: pointer;color: #337ab7" class="fas fa-plus-circle icon_{{ $item->id }}"></span>
            {{ $item->clause->number ?? '' }}
        </td>
        <td>{{ $item->clause->title ?? '' }}</td>
        <td>
            {!!descriptionWrapText($item->clause->description)!!}
        </td>

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

@endforeach

@section('script')

    <script>
        let table;

        $(document).ready(function () {
            table = $('#dtb').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            $('#compliant').on('change', function () {
                console.log('working');

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
                url: '{{url('/getLocationsOfCompliance')}}',
                type: 'GET',
                data: {trId: trId, version: '{{ $version }}'},
                success: function (data) {
                    row.child(data.html).show();
                    tr.addClass('shown');
                }
            });
        }


        function updateCompliant($location_id, e) {
            // var row = $(this).closest('tr.parent_row');
            // alert($(row).find('.location_id').val());
            var compliant_id = $(e).val();
            var compliance_data_id = $('#item').val();
            var location_id = $location_id;
            var compliance_version_id = {{ $version_id }};
            $.ajax({
                url: '{{ url('/updateComplianceVersionItems') }}',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                type: 'POST',
                data: {
                    compliant_id: compliant_id,
                    compliance_data_id: compliance_data_id,
                    location_id: location_id,
                    compliance_version_id: compliance_version_id
                },
                success: function (data) {

                }
            });

        }

        function updateComment($location_id, e) {
            var tr = $(this).closest('tr');
            var comment = $(e).val();
            var location_id = $location_id;
            $.ajax({
                url: '{{ url('/updateComplianceVersionItems') }}',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                type: 'POST',
                data: {comment: comment, location_id: location_id},
                success: function (data) {

                }
            });

        }

        function updateLink($location_id, e) {
            var tr = $(this).closest('tr');
            var link = $(e).val();
            var location_id = $location_id;
            $.ajax({
                url: '{{ url('/updateComplianceVersionItems') }}',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                type: 'POST',
                data: {link: link, location_id: location_id},
                success: function (data) {

                }
            });

        }

        function updateAttachment($location_id, e) {
            var tr = $(this).closest('tr');
            var attachment_id = $(e).val();
            var location_id = $location_id;
            $.ajax({
                url: '{{ url('/updateComplianceVersionItems') }}',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                type: 'POST',
                data: {attachment_id: attachment_id, location_id: location_id},
                success: function (data) {

                }
            });

        }
    </script>
@endsection
