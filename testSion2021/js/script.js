"use restric";
try {
    document.getElementById('tEMail').addEventListener('input', function () {
        var campo = event.target;
        var valido = document.getElementById('tEMail');
        emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        //Se muestra un texto a modo de ejemplo, luego va a ser un icono
        if (emailRegex.test(campo.value)) {
            valido.style.color = "#4CAF50";
            correoValido = true;
            noValido = false;
        } else {
            valido.style.color = "red";
            noValido = true;
            correoValido = false;
        }
        verificar();
    });
} catch (error) {
    console.log(error);
}

function ordenar(elem) {
    try {
        var padAux = './loaders/tablas.php';
        var appendAux = 'tBodyIndex';
        var data;
        var auxAttr = document.getElementById(elem).getAttribute("order");
        if (auxAttr == "ASC") {
            data = 'elem=' + elem + "&DESC";
            document.getElementById(elem).setAttribute("order", "DESC");
        } else if (auxAttr == "DESC") {
            data = 'elem=' + elem + "&ASC";
            document.getElementById(elem).setAttribute("order", "ASC");
        }
        $.ajax({
            type: 'POST',
            url: padAux,
            data: data,
            success: function (html) {
                $("#tBodyIndex").replaceWith(html);
            }
        });
    } catch (e) {
        console.log(e)
    }
}

function switchHabilitar(id) {
    try {
        var padAux = './loaders/habilitarCliente.php';
        var data = 'id=' + id;
       
        $.ajax({
            type: 'POST',
            url: padAux,
            data: data,
            success: function (html) {
                $("#elemento-"+id).replaceWith(html);
            }
        });
    } catch (e) {
        console.log(e)
    }
}