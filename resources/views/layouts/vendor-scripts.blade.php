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

<script>



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
    $(document).ready(function () {
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
            console.log(CKEDITOR.instances.help_text.getData());
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
    // sidebar_tree();
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
                    // var nodes = [0, 1, 2,];
                    // $('#default-tree').treeview('expandNode', [ nodes, { silent:true, ignoreChildren:false } ]);
                   // enables a given node
               }
           },
       });
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
</script>

@yield('script')

<!-- App js -->
<script src="{{ URL::asset('assets/js/app.min.js')}}"></script>
@include('layouts.master_scripts')
@yield('script-bottom')
