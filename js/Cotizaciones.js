function consultar(sId = null) {
    $.ajax({ 
        method: "POST",
        url:'../Controllers/Cotizaciones.php',
        data: {id: sId},
        complete: function (response) {
            let cotizaciones = JSON.parse(response.responseText);
            if (sId == null) {
                cargarDatos(cotizaciones);
            } else {
                $('#modalDetails').modal('show');
                cargarDetalles(cotizaciones);
            }
        },
        error: function () { 
            console.log("Error en la peticion."); 
        } 
    });
}

function cargarDatos(cotizaciones) {
    const tableBody = document.getElementById('tableData');
    let dataHTML = '';

    for(let cotizacion of cotizaciones) {
        dataHTML += '<tr>';
        for(let i=0; i<cotizacion.length; i++) {
            dataHTML += '<td>' + cotizacion[i] + '</td>';
        }
        dataHTML += '<td><button type="button" class="btn btn-outline-primary" onclick="consultar(' + cotizacion[0] + ');">Ver Detalles</button>';
        dataHTML += '</tr>';
    }
    tableBody.innerHTML = dataHTML;
}

function cargarDetalles(cotizaciones) {
    for(let j=0; j<cotizaciones.length; j++) {
        let tableName = '';
        switch(j) {
            case 0:
                tableName = 'tableQuoteDetails';
                break;
            case 1:
                tableName = 'tableClientDetails';
                break;
            case 2:
                tableName = 'tableProductDetails';
                break;
            case 3:
                tableName = 'tableUserDetails';
                break;
            default:
                break;
        }
        const tableBody = document.getElementById(tableName);
        let dataHTML = '';
        for(let cotizacion of cotizaciones[j]) {
            dataHTML += '<tr>';
            for(let i=0; i<cotizacion.length; i++) {
                dataHTML += '<td>' + cotizacion[i] + '</td>';
            }
            dataHTML += '</tr>';
        }
        tableBody.innerHTML = dataHTML;
    }
}

function regresar(){
	window.open('../index.html', "_self");
}

function cerrarModal(){
    $('#modalDetails').modal('hide');
}