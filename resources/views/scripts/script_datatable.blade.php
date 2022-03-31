<script>
    function doEdit(id,clone = 0)
    {
        editEntry(clone,[id]);
    }
    function selectedCheckBoxes() {
        let yourArray = [];
        $("input:checkbox[name=select_row]:checked").each(function () {
            yourArray.push($(this).val());
        });
        return yourArray;
    }
</script>
