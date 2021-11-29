<script>

        function copyToClipboard(el){
            var copyText = $(el).closest('tr').attr('data-url');
            navigator.clipboard.writeText(copyText);
            doSuccessToast("Link is copied to clipboard.");
        }
</script>
