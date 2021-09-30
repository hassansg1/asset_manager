<script>

    {{--function filterDataTable()--}}
    {{--{--}}
    {{--    let perPage = $('#per_page').val();--}}
    {{--    $.ajax({--}}
    {{--        type: "POST",--}}
    {{--        url: '{{ route($route.'.filter') }}',--}}
    {{--        data: {'perPage': perPage, '_token' : '{{ csrf_token() }}' },--}}
    {{--        success: function (result) {--}}
    {{--            if(result.status)--}}
    {{--            {--}}
    {{--                $('#table_content_div_body').html(result.html);--}}
    {{--                $('#paginate_text').html(result.data['paginateText']);--}}
    {{--            }--}}
    {{--            else--}}
    {{--            {--}}
    {{--                // doSomethingWentWrongToast();--}}
    {{--            }--}}
    {{--        },--}}
    {{--    });--}}
    {{--}--}}

    function doEdit(id,clone = 0)
    {
        editEntry(clone,[id]);
    }

    function editEntry(clone = 0, selected = []) {
        if(selected.length == 0)
        {
            selected = selectedCheckBoxes();
        }
        $.ajax({
            type: "GET",
            url: '{{ route($route.'.edit', 0) }}',
            data: {'items': selected, ajax: true, clone : clone},
            success: function (result) {
                if(result.status)
                {
                   showModal(defaultModal,result.html);
                }
                else
                {
                    doSomethingWentWrongToast();
                }
            },
        });
    }

    function selectedCheckBoxes() {
        let yourArray = [];
        $("input:checkbox[name=select_row]:checked").each(function () {
            yourArray.push($(this).val());
        });
        return yourArray;
    }
</script>
