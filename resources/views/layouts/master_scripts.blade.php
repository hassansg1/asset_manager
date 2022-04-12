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

    function doErrorToast(flashMessage = "Error...!!!") {
        doToast(flashMessage, 'error');
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

    function deletePortRow(rand, rowId) {
        $.ajax({
            type: "POST",
            url: '{{ url('deletePortsRow') }}',
            data: {rowId: rowId, '_token': '{{ csrf_token() }}', },
            success: function (result) {
                $('.' + rand).html(result.html);
            }
        });
        if (confirm('Are you sure?')) {
            $('#' + rand).remove();
        }
    }

    function loadPorts(sel, rand) {
        $.ajax({
            type: "GET",
            url: '{{ url('getPortsOfNetwork') }}',
            data: {network_id: $(sel).val()},
            success: function (result) {
                $('.' + rand).html(result.html);
            }
        });
    }
    function loadIpAddress(sel, rand) {
        $.ajax({
            type: "GET",
            url: '<?php echo e(url('getIPAddressOfNetwork')); ?>',
            data: {network_id: sel.value},
            success: function (result) {
                $('.' + rand).html(result.html);
            }
        });
    }

    function getNewRow(network) {
        $.ajax({
            type: "GET",
            url: '{{ url('getNewAjaxRow') }}',
            data: {type: network},
            success: function (result) {
                $('#ports_table_row').append(result.html);
            }
        });
    }

    function getBulckRows(network) {
        var modal = 'exampleModalFullscreen';
        $.ajax({
            type: "GET",
            url: '{{ url('getNewAjaxForm') }}',
            data: {type: network, modal: modal},
            success: function (result) {
                showModal(modal, result.html)
                // $('#ports_table_row').append(result.html);
            }
        });
    }

    let defaultModal = 'default_modal';
    let centerModal = 'center_modal';
    let rejectionModal = 'rejection_modal';
    let justificationModal = 'justification_modal';

    function showModal(name, content) {
        $('#' + name + '_content').html(content);
        $('#' + name).modal('show');
    }

    let reason = false;

    function saveReason() {
        let reason = $('textarea#change_justification').val();
        if (reason == "") {
            alert("Reason cannot be empty");
        } else {
            $('.item_form').append('<input type="hidden" id="change_justification_reason" name="change_justification_reason" value="' + reason + '" />');
            $.ajax({
                type: "POST",
                url: '{{ url('saveJustificationReason') }}',
                data: {'_token': '{{ csrf_token() }}', 'reason': reason},
                success: function (result) {
                    reason = true;
                    $('.item_form').submit();
                },
            });
        }
    }

    function openRejectionModal(url) {
        $('#rejection_url').val(url);
        showModal(rejectionModal, $('#rejection_modal_content').html());
    }

    function saveRejectionReason() {
        let reason = $('textarea#change_rejection').val();
        if (reason == "") {
            alert("Reason cannot be empty");
        } else {
            $.ajax({
                type: "POST",
                url: '{{ url('saveRejectionReason') }}',
                data: {'_token': '{{ csrf_token() }}', 'reason': reason},
                success: function (result) {
                    alert($('#rejection_url').val());
                    location.href = $('#rejection_url').val();
                },
            });
        }
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

@include('scripts.script_common')
