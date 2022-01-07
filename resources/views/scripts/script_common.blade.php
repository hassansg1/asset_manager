<script>
    let pageNumber = 1;
    $(document).on("click", ".page-link", function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        let query = url.split('?');
        pageNumber = query[1].split('=')[1];
        let type = query[0].split('/');
        type = type[type.length - 1];
        loadTableData(type);
    });

    function loadTableData(type) {
        let queryString = '?';
        queryString += "page=" + pageNumber;
        $.ajax({
            type: "GET",
            url: window.location.origin + '/' + type + queryString,
            success: function (result) {
                $('#' + type).html($(result).find('#' + type).html());
            },
        });
    }
</script>
