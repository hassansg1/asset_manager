<script src="{{ URL::asset('/assets/libs/toastr/toastr.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/toastr.init.js') }}"></script>
<script>
    $(document).ready(function () {
        let flashMessage = '{{ \Illuminate\Support\Facades\Session::get('message') }}';
        if (flashMessage != "") {
            doToast(flashMessage, '{{ \Illuminate\Support\Facades\Session::get('alert-class') }}');
        }
        $('.form-select-input').select2({
            placeholder: "Select an option",
            allowClear: true,
            tags: true,
        });

        $('.form-select-input-no-add').select2({
            placeholder: "Select an option",
            allowClear: true,
        });
    });

    function doSuccessToast(flashMessage = "Success...!!!") {
        doToast(flashMessage, 'success');
    }

    function doToast(flashMessage, type) {
        toast(flashMessage, type);
        $.ajax({
            type: "POST",
            url: '{{ url('clearSession') }}',
            data: {'_token': '{{ csrf_token() }}'},
            success: function (result) {
            },
        });
    }

    function deletePortRow(rand) {
        if(confirm('Are you sure?'))
        {
            $('#'+rand).remove();
        }
    }

    function getNewRow(network) {
        $.ajax({
            type: "GET",
            url: '{{ url('getNewAjaxRow') }}',
            data: {network: network},
            success: function (result) {
                $('#ports_table_row').append(result.html);
                // $('.table-edits tr').editable({
                //
                //     edit: function edit(values) {
                //         $(".edit i", this).removeClass('fa-pencil-alt').addClass('fa-save').attr('title', 'Save');
                //     },
                //     save: function save(values) {
                //         $(".edit i", this).removeClass('fa-save').addClass('fa-pencil-alt').attr('title', 'Edit');
                //
                //         if (this in pickers) {
                //             pickers[this].destroy();
                //             delete pickers[this];
                //         }
                //     },
                //     cancel: function cancel(values) {
                //         $(".edit i", this).removeClass('fa-save').addClass('fa-pencil-alt').attr('title', 'Edit');
                //
                //         if (this in pickers) {
                //             pickers[this].destroy();
                //             delete pickers[this];
                //         }
                //     }
                // });
            }
        });
    }

    let defaultModal = 'default_modal';
    let centerModal = 'center_modal';

    function showModal(name, content) {
        $('#' + name + '_content').html(content);
        $('#' + name).modal('show');
    }


    $(document).ready(function () {
        var selectLocation = '{{  str_replace('??','_',$filter ?? '')}}';
        if (selectLocation != '') {
            var el = $('#' + selectLocation);
            var li = $('#li_' + selectLocation);
            li.addClass('mm-active');
            var text = el.attr('data-classstring');
            var result = text.split('-');
            for (var count = 0; count < result.length; count++) {
                $('.link_' + result[count]).click();
                $('.' + result[count]).css('display', 'block');
                console.log(result[count]);
            }

        }
    });

    function toggleLiArrows(id) {
        $('.fa-angle-up_kkk').removeClass('fas fa-angle-right');
        $('.fa-angle-up_kkk').removeClass('fas fa-angle-down');
        $('.fa-angle-up_kkk').addClass('fas fa-angle-right');
        // $('.li_' + id).addClass('mm-active');
        $('li.mm-active').each(function (i) {
            // $('#' + id).removeClass('fas fa-angle-right');
            // $('#' + id).addClass('fas fa-angle-down');
            exectoggle(this);
        });
        if (!$('.li_' + id).hasClass('mm-active'))
            exectoggle($('.li_' + id));
        else {
            el = $($('.li_' + id)).find('a');
            el = el.children('span').eq(1);
            el.children('.fa-angle-up_kkk').removeClass('fas fa-angle-down');
            el.children('.fa-angle-up_kkk').addClass('fas fa-angle-right');
        }
    }

    function exectoggle(el) {
        el = $(el).find('a');
        el = el.children('span').eq(1);
        el.children('.fa-angle-up_kkk').removeClass('fas fa-angle-right');
        el.children('.fa-angle-up_kkk').addClass('fas fa-angle-down');
    }

</script>

