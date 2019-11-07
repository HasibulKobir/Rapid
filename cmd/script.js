$("input[type='radio']").change(function () {
if ($(this).val() == "rename") {
$("#renamme0").show():
$("#enter").hide();
}
else{
$("#rename0").hide();
});
