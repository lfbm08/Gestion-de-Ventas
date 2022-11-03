function consultar() {
    $.ajax({ 
        method: "POST",
        url:'../Controllers/Usuarios.php',
        complete: function (response) {
            let usuarios = JSON.parse(response.responseText);
            cargarDatos(usuarios);
        },
        error: function () { 
            console.log("Error en la peticion."); 
        } 
    });
}

function cargarDatos(usuarios) {
    const tableBody = document.getElementById('tableData');
    let dataHTML = '';

    for(let usuario of usuarios) {
        dataHTML += '<tr>';
        for(let i=0; i<usuario.length; i++) {
            dataHTML += '<td>' + usuario[i] + '</td>';
        }
        dataHTML += '</tr>';
    }
    tableBody.innerHTML = dataHTML;
}

function regresar(){
	window.open('../index.html', "_self");
}