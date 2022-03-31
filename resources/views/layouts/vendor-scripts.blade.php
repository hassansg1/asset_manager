<!-- JAVASCRIPT -->
<script src="{{ URL::asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/metismenu/metismenu.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/node-waves/node-waves.min.js')}}"></script>
<script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/spectrum-colorpicker/spectrum-colorpicker.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/datepicker/datepicker.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/lightbox.init.js') }}"></script>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script src="{{ URL::asset('/assets/libs/table-edits/table-edits.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/table-editable.int.js') }}"></script>
<script src="{{ URL::asset('/assets/js/bootstrap-treeview.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/tinymce/tinymce.min.js') }}"></script>

<script>

    let complianceTable;

    var myTree = [
        {
            text: "Item 1",
            nodes: [
                {
                    text: "Item 1-1",
                    nodes: [
                        {
                            text: "Item 1-1-1"
                        },
                        {
                            text: "Item 1-1-2"
                        }
                    ]
                },
                {
                    text: "Item 1-2"
                }
            ]
        },
        {
            text: "Item 2"
        },
        {
            text: "Item 3"
        },
    ];

    function makeDatatableByClass(className) {
        renderDataTable('.'+className);
    }
    function makeDatatable(id) {
        let table = renderDataTable('#'+id);
        $("#dtb").find("thead tr").prepend("<th></th>");
        $("#dtb").find("tbody tr").prepend("<td></td>");
        complianceTable = $('#dtb').DataTable({
            "bInfo" : false,
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            "searching": false,
            "ordering": false,
            "bPaginate": false,
            "bSortable": false,
        });
        table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        $(".dataTables_length select").addClass('form-select form-select-sm');
    }

    function renderDataTable(selector)
    {
        $(selector).find("thead tr").prepend("<th></th>");
        $(selector).find("tbody tr").prepend("<td></td>");

        var table = $(selector).DataTable({
            responsive: {
                details: {
                    type: 'column',
                }
            },
            columnDefs: [ {
                className: 'dtr-control',
                orderable: false,
                targets:   0
            } ],
            lengthChange: false,
            dom: 'Bfrtip',
            "bInfo" : false,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "searching": false,
            "ordering": false,
            "bSortable": false,
            "bPaginate": false,
        });

        return table;
    }

    $(document).ready(function () {
        makeDatatable('datatable-buttons'+'{{ $route ?? '' }}');
        let editor1 = CKEDITOR.replace('help_text', {
            width: '100%',
            height: 900,
        });

        var search = function (e) {
            var pattern = $('#tree-input-search').val();
            var options = {
                ignoreCase: true,
                exactMatch: false,
                revealResults: true
            };
            var results = $searchableTree.treeview('search', [pattern, options]);

            var output = '<p>' + results.length + ' matches found</p>';
            $.each(results, function (index, result) {
                output += '<p>- ' + result.text + '</p>';
            });
            $('#search-output').html(output);
        }
        $('#btn-clear-search').on('click', function (e) {
            $searchableTree.treeview('clearSearch');
            $('#input-search').val('');
            $('#search-output').html('');
        });

        $('#tree-input-search').on('keyup', search);

        editor1.on('change', function () {
            $.ajax({
                type: "POST",
                url: '{{ url('saveHelp') }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'text': CKEDITOR.instances.help_text.getData(),
                    'route': '{{ \Illuminate\Support\Facades\Route::currentRouteAction() }}',
                },
                success: function (result) {
                    if (result.status) {
                        doSuccessToast();
                    }
                },
            });
        });
    });
    var $searchableTree;
    sidebar_tree();

    function initEditor(element)
    {
        while (tinymce.editors.length > 0) {
            tinymce.remove(tinymce.editors[0]);
        }
        tinymce.init({
            selector: "textarea"+element,
            height: 300,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
            ]
        });
    }

    function sidebar_tree() {

        $.ajax({
            type: "POST",
            url: '{{ url('sidebar_tree') }}',
            data: {
                '_token': '{{ csrf_token() }}',
            },
            success: function (result) {
                if (result.status) {
                    $searchableTree = $('#default-tree').treeview({

                        // expanded to 2 levels
                        data: result.tree,
                        levels: 1,

                        // custom icons
                        expandIcon: 'fas fa-plus',
                        collapseIcon: 'fas fa-minus',
                        emptyIcon: 'fas',
                        nodeIcon: '',
                        selectedIcon: '',
                        checkedIcon: 'fas fa-flag-checkered',
                        uncheckedIcon: 'fas fa-microscope',

                        // colors
                        color: '#fff', // '#000000',
                        backColor: '#FFFFFF', // '#FFFFFF',
                        borderColor: undefined, // '#dddddd',
                        onhoverColor: '#33394e',
                        searchResultColor: '#D9534F',
                        searchResultBackColor: undefined, //'#FFFFFF',

                        // enables links
                        enableLinks: true,

                        // highlights selected items
                        highlightSelected: true,

                        // highlights search results
                        highlightSearchResults: true,

                        // shows borders
                        showBorder: true,

                        // shows icons
                        showIcon: true,

                        // shows checkboxes
                        showCheckbox: false,

                        // shows tags
                        showTags: false,

                        // enables multi select
                        multiSelect: false,
                        onNodeChecked: true,

                    });
                }
                nodeSelected({{ Session::get('node_id')}});
                $('#default-tree').on('click', 'li a', function (event, data) {
                    event.preventDefault();
                    var li = $(this).parent();
                    var nodeId = li.attr('data-nodeid');
                    const url = $(this).attr('href');
                    const newUrl = url.slice(0, url.lastIndexOf('/'));
                    const newurlLatest = newUrl + '/' + nodeId;
                    location.href = newurlLatest;
                });
            },
        });
    }

    function nodeSelected(id) {
        $('#default-tree').treeview('revealNode', [id, {silent: true, ignoreChildren: false}]);
        $('#default-tree').treeview('selectNode', [id, {silent: true, ignoreChildren: false}]);
    }

    $('#change-password').on('submit', function (event) {
        event.preventDefault();
        var Id = $('#data_id').val();
        var current_password = $('#current-password').val();
        var password = $('#password').val();
        var password_confirm = $('#password-confirm').val();
        $('#current_passwordError').text('');
        $('#passwordError').text('');
        $('#password_confirmError').text('');
        $.ajax({
            url: "{{ url('update-password') }}" + "/" + Id,
            type: "POST",
            data: {
                "current_password": current_password,
                "password": password,
                "password_confirmation": password_confirm,
                "_token": "{{ csrf_token() }}",
            },
            success: function (response) {
                $('#current_passwordError').text('');
                $('#passwordError').text('');
                $('#password_confirmError').text('');
                if (response.isSuccess == false) {
                    $('#current_passwordError').text(response.Message);
                } else if (response.isSuccess == true) {
                    setTimeout(function () {
                        window.location.href = "{{ route('root') }}";
                    }, 1000);
                }
            },
            error: function (response) {
                $('#current_passwordError').text(response.responseJSON.errors.current_password);
                $('#passwordError').text(response.responseJSON.errors.password);
                $('#password_confirmError').text(response.responseJSON.errors.password_confirmation);
            }
        });
    });
    $(document).ready(function () {

        $(document).bind("ajaxSend", function (event, jqxhr, settings) {
            toggleLoader('block');
        }).bind("ajaxComplete", function (event, jqxhr, settings) {
            toggleLoader('none');
        });

    });

    function toggleLoader(status) {
        $('.ajax-loader').css('display', status);
    }
</script>


{{--This script is for assign and delete user from user id--}}
<script type="text/javascript">
    $('.delete_user_id').on('click', function () {
        var user_id = this.id;
        var account_id = $('#current_obj_id').val();
        if (user_id) {
            $.ajax({
                type: "get",
                url: "{{url('delete_asseigned_id')}}/" + user_id,
                data: {account_id: account_id},
                success: function (res) {
                    if (res) {
                        location.reload();
                    }
                }

            });
        }
    });
    $('#assign_user').on('click', function () {
        var user_id = $('#user_id').val();
        var account_id = $('#current_obj_id').val();
        if (user_id) {
            $('#exampleModal').hide();
            $.ajax({
                type: "get",
                url: "{{url('asseigned_id')}}/" + user_id,
                data: {account_id: account_id},
                success: function (res) {
                    if (res) {
                        alert(res);
                        location.reload();
                    }
                }

            });
        }
    });
    $('#unit_id').on('change', function () {
        var unit_id = this.value;
        if (unit_id) {
            $.ajax({
                type: "get",
                url: "{{url('unit/type')}}/" + unit_id,
                success: function (res) {
                    if (res) {
                        $("#user_id").empty();
                        $.each(res, function (key, value) {
                            $("#user_id").append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                }

            });
        }
    });
</script>
{{--this script is for edit form of user to assign ID--}}
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
    $('#asset_id').on('change', function () {
        var asset_id = this.value;
        if (asset_id) {
            $.ajax({
                type: "get",
                url: "{{url('asset/type')}}/" + asset_id,
                success: function (res) {
                    if (res) {
                        $.each(res, function (key, value) {
                            $("#account_id").append('<option value="' + key + '">' + value + ' (Asset)</option>');
                        });
                    }
                }

            });
        }
    });
    $('#system').on('change', function () {
        var system_id = this.value;
        if (system_id) {
            $.ajax({
                type: "get",
                url: "{{url('system/type')}}/" + system_id,
                success: function (res) {
                    if (res) {
                        $.each(res, function (key, value) {
                            $("#account_id").append('<option value="' + key + '">' + value + ' (System)</option>');
                        });
                    }
                }

            });
        }
    });
    $('#assign_id').on('click', function () {
        var account_id = $('#account_id').val();
        var user_id = $('#current_obj_id').val();
        if (account_id) {
            $('#exampleModal').hide();
            $.ajax({
                type: "get",
                url: "{{url('asseigned_id_to_user')}}/" + user_id,
                data: {account_id: account_id},
                success: function (res) {
                    if (res) {
                        alert(res);
                        location.reload();
                    }
                }

            });
        }
    });
    $('.delete_id').on('click', function () {
        var account_id = this.id;
        var user_id = $('#current_obj_id').val();
        if (account_id) {
            $.ajax({
                type: "get",
                url: "{{url('delete_assigned_id')}}/" + account_id,
                data: {user_id: user_id},
                success: function (res) {
                    if (res) {
                        location.reload();
                    }
                }

            });
        }
    });
</script>
<script type="text/javascript">
    $(".utl").focusout(function () {
        $('.unmitigated_risk').val($(this).val() * $('.impact').val());
    });

    $(".mtl").focusout(function () {
        $('.mitigated_risk').val($(this).val() * $('.impact').val());
    });

    $(".atl").focusout(function () {
        $('.residual_risk').val($(this).val() * $('.impact').val());
    });
</script>

@yield('script')

<!-- App js -->
<script src="{{ URL::asset('assets/js/app.min.js')}}"></script>
@include('layouts.master_scripts')
@yield('script-bottom')
