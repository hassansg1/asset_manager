<script>
    $(function () {
        $("input[type='checkbox'].location_check").change(function () {

            let classList = $(this).attr("class").split(/\s+/);

            let lastEl = classList.at(-1);
            let ref = this;
            $(".form-check-input").each(function () {
                if ($(this).hasClass(lastEl)) {
                    elm = $(this);
                    elm.prop('checked', ref.checked);
                    if (ref.checked)
                        elm.attr('readonly', 'readonly');
                    else
                        elm.attr('readonly', false);
                    $(ref).attr('readonly', false);
                    $('.permission_check').attr('readonly', false);
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
