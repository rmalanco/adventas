var chart1, options;
$("#btnBD").click(function () {
    $(".modal-header"), css("background-color", "#17a2b8");
    $(".modal-header"), css("color", "white");
    $(".modal-title"), text("Grafico desde BD");
    $("#modal-1").modal("show");

    $.ajax({
        url: "datos/graficos.php",
        type: "post",
        dataType: "json",
        success: function (data) {
            options.series[0].data = data;
            chart1 = new Highcharts.Chart(options);
            console.log(data);
        }
    })
    datos();
});

function datos() {
    var v_modal =$("#modal-1").modal({show: false});
    options =...
    v_modal.on("show",function(){});
    v_modal.modal("show");
}
