@section('script')
    <script>
        $(function() {
            $("input[type='checkbox'].location_check").change(function () {

                let hierString = $(this).attr('data-hierarchy');
                alert("Ass");
                console.log(hierString);

                // let elm = $(this).closest("li")
                //     .find("input[type='checkbox']");
                // elm.prop('checked', this.checked);
                // if(this.checked)
                //     elm.attr('readonly','readonly');
                // else
                //     elm.attr('readonly',false);
                // $(this).attr('readonly',false);
                // $('.permission_check').attr('readonly',false);
            });
        });

        (function(){
            // Raj: https://stackoverflow.com/a/14753503/260665
            $(document).on('click', 'input[type="checkbox"][readonly]', function(e){
                e.preventDefault();
            });
        })();
    </script>
@endsection
