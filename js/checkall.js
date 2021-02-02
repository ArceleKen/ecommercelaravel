$(function () {
    $("#checkAll").click(function (e) {
        if(!$(this).is(":checked")){
            $("#roles-table").find("input[type='checkbox']").each(function () {
                $(this).removeAttr("checked");
            })
        }else{
            $("#roles-table").find("input[type='checkbox']").each(function () {
                $(this).attr("checked","on");
            })
        }
    })
})