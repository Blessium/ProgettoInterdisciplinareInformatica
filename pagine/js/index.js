
function getPage() {
    $.ajax({
        url: "/data.php",
        type: "get",
        dataType: "json",
        success: function(res) {
            console.log(res);
            alert(res);
        }
    })
}