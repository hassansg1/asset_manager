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
                    $('.'+rand).attr('readonly', false);
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
            $(".permission_check").each(function () {
                if ($(this).hasClass(lastEl) && !$(this).hasClass(rand) && $(this).hasClass(type)) {
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

    (function () {
        // Raj: https://stackoverflow.com/a/14753503/260665
        $(document).on('click', 'input[type="checkbox"][readonly]', function (e) {
            e.preventDefault();
        });
    })();
</script>
