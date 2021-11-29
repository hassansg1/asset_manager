<script>

        function copyToClipboard(el){
            var copyText = $(el).parents('tr').find('#attachment_view').attr('view_url')
            navigator.clipboard.writeText(copyText);
        }
</script>
