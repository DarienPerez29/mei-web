$(document).ready(function() {
    tablaProductos = $("#tablaProductos").DataTable({
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"
        }],

        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        }
    });

    $("#btnNuevo").click(function() {
        $("#formProductos").trigger("reset");
        $(".modal-header").css("background-color", "#1cc88a");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Nuevo producto");
        $("#modalCRUD").modal("show");
        id = null;
        opcion = 1; //alta
    });

    var fila; //capturar la fila para editar o borrar el registro

    //botón EDITAR    
    $(document).on("click", ".btnEditar", function() {
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        nombre = fila.find('td:eq(1)').text();
        marca = fila.find('td:eq(2)').text();
        cantidad = parseInt(fila.find('td:eq(3)').text());
        precio = parseInt(fila.find('td:eq(4)').text());
        codigo = fila.find('td:eq(5)').text();

        $("#nombre").val(nombre);
        $("#marca").val(marca);
        $("#cantidad").val(cantidad);
        $("#precio").val(precio);
        $("#codigo").val(codigo);
        opcion = 2; //editar

        $(".modal-header").css("background-color", "#4e73df");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Producto");
        $("#modalCRUD").modal("show");

    });

    //botón BORRAR
    $(document).on("click", ".btnBorrar", function() {
        fila = $(this);
        id = parseInt($(this).closest("tr").find('td:eq(0)').text());
        opcion = 3 //borrar
        var respuesta = confirm("¿Está seguro de eliminar el registro: " + id + "?");
        if (respuesta) {
            $.ajax({
                url: "bd/crud.php",
                type: "POST",
                dataType: "json",
                data: { opcion: opcion, id: id },
                success: function() {
                    tablaProductos.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });

    $("#formProductos").submit(function(e) {
        e.preventDefault();
        nombre = $.trim($("#nombre").val());
        marca = $.trim($("#marca").val());
        cantidad = $.trim($("#cantidad").val());
        precio = $.trim($("#precio").val());
        codigo = $.trim($("#codigo").val());
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: { nombre: nombre, marca: marca, cantidad: cantidad, precio: precio, codigo: codigo, id: id, opcion: opcion },
            success: function(data) {
                console.log(data);
                id = data[0].id;
                nombre = data[0].nombre;
                marca = data[0].marca;
                cantidad = data[0].cantidad;
                precio = data[0].precio;
                codigo = data[0].codigo;
                if (opcion == 1) { tablaProductos.row.add([id, nombre, marca, cantidad, precio, codigo]).draw(); } else { tablaProductos.row(fila).data([id, nombre, marca, cantidad, precio, codigo]).draw(); }
            }
        });
        $("#modalCRUD").modal("hide");

    });

});