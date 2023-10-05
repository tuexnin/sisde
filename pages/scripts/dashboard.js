
function init() {
    
    datos("t_registros", "#turnoM");
    datos("t_derivaciones", "#turnoT");
    datos("t_atenciones", "#turnoN");
    datos("t_listos", "#cantReg");
    datos("t_listos", "#cantP");
    datos("t_derivaciones", "#cantPro");
    datos("t_usuarios", "#cantAr");
}

function datos(options, obj) {
    $.post(
        "controllers/dash.controller.php?op="+options,
        function (data) {
            console.log(data);
            data = JSON.parse(data);
            $(obj).text(data[0]["cantidad"]);
        }
    );
}


init();
