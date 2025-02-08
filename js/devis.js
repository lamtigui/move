
$(document).ready(function () { $("#Part").hide(); $("#Prof").hide(); $("#atre").hide(); });

let sltplc = document.querySelector('#TypeLocal');
sltplc.addEventListener('change', function () {

    if (this.value == '2') {
        $("#Prof").show();
        $("#atre").hide();
        $('#atr').val('');
        $("#Part").hide();
        $("#pr")[0].selectedIndex = 0;

        let slpf = document.querySelector("#pf");
        slpf.addEventListener('change', function () {
            if (this.value == 10) {
                $("#atre").show();
            }
            else {
                $("#atre").hide();
                $('#atr').val('');
            }
        });
    }
    else
        if (this.value == '1') {
            $("#Part").show();
            $("#atre").hide();
            $('#atr').val('');
            $("#Prof").hide();
            $("#pf")[0].selectedIndex = 0;

            let slpr = document.querySelector("#pr");
            slpr.addEventListener('change', function () {
                if (this.value == 5) {
                    $("#atre").show();
                }
                else {
                    $("#atre").hide();
                    $('#atr').val('');
                }
            });
        }
});