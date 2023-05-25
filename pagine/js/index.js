
function getPage() {
    $.ajax({
        url: "/data.php",
        type: "get",
        dataType: "json",
        success: function (res) {
            console.log(res);
            alert(res);
        }
    })
}

function getLanguage() {
    $.ajax({
        url: "/get_language.php",
        type: "get",
        dataType: "json",
        success: function (res) {
            var lang = res['lang'];
            var breakdown = document.getElementById("dropdown");
            console.log(breakdown);
            if (lang == "italian") {
                breakdown.selectedIndex = 1;
            } else {
                breakdown.selectedIndex = 0;
            }
        }
    })
}


function selectLanguage() {

    var breakdown = document.getElementById("dropdown"); 
    var lang = breakdown.value;
    $.ajax({
        url: "/set_language.php",
        type: "post",
        dataType: "json",
        data: {"lang": lang },
        success: function(res) {
            console.log("nice");
        }
    })
}

function getPageText() {

}