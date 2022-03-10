<script>
    $(function () {
        $("input[type='checkbox'].location_check").change(function () {

            let classList = $(this).attr("class").split(/\s+/);

            let lastEl = classList.at(-1);
            let ref = this;
            let rand = $(this).attr('data-rand');
            $(".form-check-input").each(function () {
                if ($(this).hasClass(lastEl)) {
                    elm = $(this);
                    elm.prop('checked', ref.checked);
                    if (ref.checked)
                        elm.attr('readonly', 'readonly');
                    else
                        elm.attr('readonly', false);
                    $(ref).attr('readonly', false);
                    $('.' + rand).attr('readonly', false);
                }
            });
        });
    });
    $(function () {
        $("input[type='checkbox'].permission_check").change(function () {

            let classList = $(this).attr("class").split(/\s+/);

            let lastEl = classList.at(-1);
            let ref = this;
            let rand = $(this).attr('data-rand');
            let type = $(this).attr('data-type');
            console.log(lastEl);
            $(".permission_check").each(function () {
                if ($(this).hasClass(lastEl) && $(this).hasClass(type)) {
                    console.log("As");
                    elm = $(this);
                    elm.prop('checked', ref.checked);
                    if (ref.checked)
                        elm.attr('readonly', 'readonly');
                    else
                        elm.attr('readonly', false);
                    $(ref).attr('readonly', false);
                    // $('.'+rand).attr('readonly', false);
                }
            });
        });
    });

    $('.submit_form').click(function (e) {
        $('input[readonly]').remove();
        e.preventDefault();
        $('.item_form').submit();
    });

    (function () {
        // Raj: https://stackoverflow.com/a/14753503/260665
        $(document).on('click', 'input[type="checkbox"][readonly]', function (e) {
            e.preventDefault();
        });
    })();
</script>
