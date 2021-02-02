@section("scripts")
    <script>
        $(function () {
            $("#checkAll").click(function (e) {
                if(!$(this).is(":checked")){
                    $("#roletable").find("input[type='checkbox']").each(function () {
                        $(this).removeAttr("checked");
                    })
                }else{
                    $("#roletable").find("input[type='checkbox']").each(function () {
                        $(this).attr("checked","on");
                    })
                }
            })
        })
    </script>
@endsection