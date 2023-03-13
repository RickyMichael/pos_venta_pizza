let tblUsuarios, tblClientes, tblCajas, tblMedidas, tblCategorias, tblProductos;
$(document).ready( function(){
    tblUsuarios = $('#tblUsuarios').DataTable( {
        ajax: {
            url: base_url + "Usuarios/listar",
            dataSrc: ''
        },
        columns: [{
                'data' : 'id'
            },
            {
                'data' : 'usuario'
            },
            {
                'data' : 'nombre'
            },
            {
                'data' : 'caja'
            },
            {
                'data' : 'estado'
            },
            {
                'data' : 'acciones'
            }
        ]
    } );
    //Fin de tblUsuarios

    tblClientes = $('#tblClientes').DataTable( {
        ajax: {
            url: base_url + "Clientes/listar",
            dataSrc: ''
        },
        columns: [{
                'data' : 'id'
            },
            {
                'data' : 'dni'
            },
            {
                'data' : 'nombre'
            },
            {
                'data' : 'telefono'
            },
            {
                'data' : 'direccion'
            },
            {
                'data' : 'estado'
            },
            {
                'data' : 'acciones'
            }
        ]
    } );
    //Fin de tblClientes

    tblCajas = $('#tblCajas').DataTable( {
        ajax: {
            url: base_url + "Cajas/listar",
            dataSrc: ''
        },
        columns: [{
                'data' : 'id'
            },
            {
                'data' : 'caja'
            },
            {
                'data' : 'estado'
            },
            {
                'data' : 'acciones'
            }
        ]
    } );
    //Fin de tblCajas

    tblMedidas = $('#tblMedidas').DataTable( {
        ajax: {
            url: base_url + "Medidas/listar",
            dataSrc: ''
        },
        columns: [{
                'data' : 'id'
            },
            {
                'data' : 'nombre'
            },
            {
                'data' : 'nombre_corto'
            },
            {
                'data' : 'estado'
            },
            {
                'data' : 'acciones'
            }
        ]
    } );
    //Fin de tblMedidas

    tblCategorias = $('#tblCategorias').DataTable( {
        ajax: {
            url: base_url + "Categorias/listar",
            dataSrc: ''
        },
        columns: [{
                'data' : 'id'
            },
            {
                'data' : 'nombre'
            },
            {
                'data' : 'estado'
            },
            {
                'data' : 'acciones'
            }
        ]
    } );
    //Fin de tblCategorias

    tblProductos = $('#tblProductos').DataTable( {
        ajax: {
            url: base_url + "Productos/listar",
            dataSrc: ''
        },
        columns: [{
                'data' : 'id'
            },
            {
                'data' : 'foto'
            },
            {
                'data' : 'codigo'
            },
            {
                'data' : 'descripcion'
            },
            {
                'data' : 'precio_venta'
            },
            {
                'data' : 'cantidad'
            },
            {
                'data' : 'estado'
            },
            {
                'data' : 'acciones'
            }
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-6'i><'col-sm-6'p>>",
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
    //Fin de tblProductos

     $('#t_historial_c').DataTable( {
        ajax: {
            url: base_url + "Gastos/listar_historial",
            dataSrc: ''
        },
        columns: [{
                'data' : 'id'
            },
            {
                'data' : 'total'
            },
            {
                'data' : 'fecha'
            },
            {
                'data' : 'acciones'
            }
        ]
    } );
    //Fin de tblMedidas
});


function frmUsuario(){
    document.getElementById('frmUsuario').reset();
    document.getElementById('title').innerHTML = "Nuevo usuario";
    document.getElementById('btnAccion').innerHTML = "Registrar";
    document.getElementById("claves").classList.remove("d-none");
    $("#nuevo_usuario").modal("show");
    document.getElementById("id").value = "";
}

function registrarUser(e){
    e.preventDefault();
    const usuario = document.getElementById("usuario");
    const nombre = document.getElementById("nombre");
    const clave = document.getElementById("contraseña");
    const confirmar = document.getElementById("confirmar");
    const caja = document.getElementById("caja");

    if(usuario.value == "" || nombre.value == "" || caja.value == ""){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Todos los campos son necesarios!',
            showConfirmButton: false,
            timer: 2500
          });
    }else{
        const url = base_url + "Usuarios/registrar";
        const frm = document.getElementById("frmUsuario");
        const http = new XMLHttpRequest();
        http.open('POST', url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                if(res == "si"){
                    Swal.fire({
                        icon: 'success',
                        title: 'OK',
                        text: '¡Usuario registrado con exito!',
                        showConfirmButton: false,
                        timer: 2500
                      })
                      frm.reset();
                      $("#nuevo_usuario").modal("hide");
                      tblUsuarios.ajax.reload();
                }else if(res == "modificado"){
                    Swal.fire({
                        icon: 'success',
                        title: 'OK',
                        text: '¡Usuario modificado con exito!',
                        showConfirmButton: false,
                        timer: 2500
                      })
                      $("#nuevo_usuario").modal("hide");
                      tblUsuarios.ajax.reload();
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: res,
                        showConfirmButton: false,
                        timer: 2500
                      })
                }
            }
        }
    }
}

function btnEditarUser(id){
    document.getElementById('title').innerHTML = "Actualizar usuario";
    document.getElementById('btnAccion').innerHTML = "Modificar";

        const url = base_url + "Usuarios/editar/"+id;
        const http = new XMLHttpRequest();
        http.open('GET', url, true);
        http.send();
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                document.getElementById("id").value = res.id;
                document.getElementById("usuario").value = res.usuario;
                document.getElementById("nombre").value = res.nombre;
                document.getElementById("caja").value = res.id_caja;
                document.getElementById("claves").classList.add("d-none");
                $("#nuevo_usuario").modal("show");
            }
        }
}

function btnEliminarUser(id){
    Swal.fire({
        title: '¿Estas seguro?',
        text: "El usuario solo sera inhabilitado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Usuarios/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open('GET', url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Ok!',
                            'El usuario ha sido inhabilitado.',
                            'success'
                        )
                        tblUsuarios.ajax.reload();
                    }else{
                        Swal.fire(
                            'Oops!',
                            res,
                            'error'
                        )
                    }
                }
            }

            
        }
      })
}

function btnReingresarUser(id){
    Swal.fire({
        title: '¿Estas seguro?',
        text: "El usuario sera habilitado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, habilitar!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Usuarios/reingresar/"+id;
            const http = new XMLHttpRequest();
            http.open('GET', url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Ok!',
                            'El usuario ha sido habilitado.',
                            'success'
                        )
                        tblUsuarios.ajax.reload();
                    }else{
                        Swal.fire(
                            'Oops!',
                            res,
                            'error'
                        )
                    }
                }
            }

            
        }
      })
}

/* FIN USUARIOS*/

function frmCliente(){
    
    document.getElementById('title').innerHTML = "Nuevo Cliente";
    document.getElementById('btnAccion').innerHTML = "Registrar";
    document.getElementById('frmCliente').reset();
    $("#nuevo_cliente").modal("show");
    document.getElementById("id").value = "";
}

function registrarCli(e){
    e.preventDefault();
    const dni = document.getElementById("dni");
    const nombre = document.getElementById("nombre");
    const telefono = document.getElementById("telefono");
    const direccion = document.getElementById("direccion");

    if(dni.value == "" || nombre.value == "" || telefono.value == "" || direccion.value == ""){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Todos los campos son necesarios!',
            showConfirmButton: false,
            timer: 2500
          });
    }else{
        const url = base_url + "Clientes/registrar";
        const frm = document.getElementById("frmCliente");
        const http = new XMLHttpRequest();
        http.open('POST', url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                if(res == "si"){
                    Swal.fire({
                        icon: 'success',
                        title: 'OK',
                        text: '¡Cliente registrado con exito!',
                        showConfirmButton: false,
                        timer: 2500
                      })
                      frm.reset();
                      $("#nuevo_cliente").modal("hide");
                      tblClientes.ajax.reload();
                }else if(res == "modificado"){
                    Swal.fire({
                        icon: 'success',
                        title: 'OK',
                        text: '¡Cliente modificado con exito!',
                        showConfirmButton: false,
                        timer: 2500
                      })
                      $("#nuevo_cliente").modal("hide");
                      tblClientes.ajax.reload();
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: res,
                        showConfirmButton: false,
                        timer: 2500
                      })
                }
            }
        }
    }
}

function btnEditarCli(id){
    document.getElementById('title').innerHTML = "Actualizar cliente";
    document.getElementById('btnAccion').innerHTML = "Modificar";

        const url = base_url + "Clientes/editar/"+id;
        const http = new XMLHttpRequest();
        http.open('GET', url, true);
        http.send();
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                document.getElementById("id").value = res.id;
                document.getElementById("dni").value = res.dni;
                document.getElementById("nombre").value = res.nombre;
                document.getElementById("telefono").value = res.telefono;
                document.getElementById("direccion").value = res.direccion;
                $("#nuevo_cliente").modal("show");
            }
        }
}

function btnEliminarCli(id){
    Swal.fire({
        title: '¿Estas seguro?',
        text: "El Cliente solo sera inhabilitado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Clientes/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open('GET', url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Ok!',
                            'El Cliente ha sido inhabilitado.',
                            'success'
                        )
                        tblClientes.ajax.reload();
                    }else{
                        Swal.fire(
                            'Oops!',
                            res,
                            'error'
                        )
                    }
                }
            }

            
        }
      })
}

function btnReingresarCli(id){
    Swal.fire({
        title: '¿Estas seguro?',
        text: "El cliente sera habilitado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, habilitar!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Clientes/reingresar/"+id;
            const http = new XMLHttpRequest();
            http.open('GET', url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Ok!',
                            'El cliente ha sido habilitado.',
                            'success'
                        )
                        tblClientes.ajax.reload();
                    }else{
                        Swal.fire(
                            'Oops!',
                            res,
                            'error'
                        )
                    }
                }
            }

        }
      })
}

/* FIN CLIENTES */

function frmCaja(){
    
    document.getElementById('title').innerHTML = "Nueva Caja";
    document.getElementById('btnAccion').innerHTML = "Registrar";
    document.getElementById('frmCaja').reset();
    $("#nueva_caja").modal("show");
    document.getElementById("id").value = "";
}

function registrarCaja(e){
    e.preventDefault();
    const caja = document.getElementById("caja");

    if( caja.value == "" ){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El nombre de caja es necesario!',
            showConfirmButton: false,
            timer: 2500
          });
    }else{
        const url = base_url + "Cajas/registrar";
        const frm = document.getElementById("frmCaja");
        const http = new XMLHttpRequest();
        http.open('POST', url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                if(res == "si"){
                    Swal.fire({
                        icon: 'success',
                        title: 'OK',
                        text: '¡Caja registrada con exito!',
                        showConfirmButton: false,
                        timer: 2500
                      })
                      frm.reset();
                      $("#nueva_caja").modal("hide");
                      tblCajas.ajax.reload();
                }else if(res == "modificado"){
                    Swal.fire({
                        icon: 'success',
                        title: 'OK',
                        text: '¡Caja modificada con exito!',
                        showConfirmButton: false,
                        timer: 2500
                      })
                      $("#nueva_caja").modal("hide");
                      tblCajas.ajax.reload();
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: res,
                        showConfirmButton: false,
                        timer: 2500
                      })
                }
            }
        }
    }
}

function btnEditarCaja(id){
    document.getElementById('title').innerHTML = "Actualizar caja";
    document.getElementById('btnAccion').innerHTML = "Modificar";

        const url = base_url + "Cajas/editar/"+id;
        const http = new XMLHttpRequest();
        http.open('GET', url, true);
        http.send();
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                document.getElementById("id").value = res.id;
                document.getElementById("caja").value = res.caja;
                $("#nueva_caja").modal("show");
            }
        }
}

function btnEliminarCaja(id){
    Swal.fire({
        title: '¿Estas seguro?',
        text: "La caja solo sera inhabilitado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Cajas/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open('GET', url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Ok!',
                            'La caja ha sido inhabilitado.',
                            'success'
                        )
                        tblCajas.ajax.reload();
                    }else{
                        Swal.fire(
                            'Oops!',
                            res,
                            'error'
                        )
                    }
                }
            }

            
        }
      })
}

function btnReingresarCaja(id){
    Swal.fire({
        title: '¿Estas seguro?',
        text: "La caja sera habilitada!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, habilitar!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Cajas/reingresar/"+id;
            const http = new XMLHttpRequest();
            http.open('GET', url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Ok!',
                            'La caja ha sido habilitada.',
                            'success'
                        )
                        tblCajas.ajax.reload();
                    }else{
                        Swal.fire(
                            'Oops!',
                            res,
                            'error'
                        )
                    }
                }
            }

        }
      })
}

/* FIN CAJAS */

function frmMedida(){
    
    document.getElementById('title').innerHTML = "Nueva Medida";
    document.getElementById('btnAccion').innerHTML = "Registrar";
    document.getElementById('frmMedida').reset();
    $("#nueva_medida").modal("show");
    document.getElementById("id").value = "";
}

function registrarMed(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    const nombre_corto = document.getElementById("nombre_corto");

    if(nombre.value == "" || nombre_corto.value == "" ){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Todos los campos son necesarios!',
            showConfirmButton: false,
            timer: 2500
          });
    }else{
        const url = base_url + "Medidas/registrar";
        const frm = document.getElementById("frmMedida");
        const http = new XMLHttpRequest();
        http.open('POST', url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                if(res == "si"){
                    Swal.fire({
                        icon: 'success',
                        title: 'OK',
                        text: '¡Medida registrada con exito!',
                        showConfirmButton: false,
                        timer: 2500
                      })
                      frm.reset();
                      $("#nueva_medida").modal("hide");
                      tblMedidas.ajax.reload();
                }else if(res == "modificado"){
                    Swal.fire({
                        icon: 'success',
                        title: 'OK',
                        text: '¡Medida modificada con exito!',
                        showConfirmButton: false,
                        timer: 2500
                      })
                      $("#nueva_medida").modal("hide");
                      tblMedidas.ajax.reload();
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: res,
                        showConfirmButton: false,
                        timer: 2500
                      })
                }
            }
        }
    }
}

function btnEditarMed(id){
    document.getElementById('title').innerHTML = "Actualizar Medida";
    document.getElementById('btnAccion').innerHTML = "Modificar";

        const url = base_url + "Medidas/editar/"+id;
        const http = new XMLHttpRequest();
        http.open('GET', url, true);
        http.send();
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                document.getElementById("id").value = res.id;
                document.getElementById("nombre").value = res.nombre;
                document.getElementById("nombre_corto").value = res.nombre_corto;
                $("#nueva_medida").modal("show");
            }
        }
}

function btnEliminarMed(id){
    Swal.fire({
        title: '¿Estas seguro?',
        text: "La medida solo sera inhabilitado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Medidas/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open('GET', url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Ok!',
                            'La medida ha sido inhabilitada.',
                            'success'
                        )
                        tblMedidas.ajax.reload();
                    }else{
                        Swal.fire(
                            'Oops!',
                            res,
                            'error'
                        )
                    }
                }
            }

            
        }
      })
}

function btnReingresarMed(id){
    Swal.fire({
        title: '¿Estas seguro?',
        text: "La medida sera habilitada!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, habilitar!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Medidas/reingresar/"+id;
            const http = new XMLHttpRequest();
            http.open('GET', url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Ok!',
                            'La medida ha sido habilitada.',
                            'success'
                        )
                        tblMedidas.ajax.reload();
                    }else{
                        Swal.fire(
                            'Oops!',
                            res,
                            'error'
                        )
                    }
                }
            }

        }
      })
}

/* FIN MEDIDAS */

function frmCategoria(){
    
    document.getElementById('title').innerHTML = "Nueva Categoria";
    document.getElementById('btnAccion').innerHTML = "Registrar";
    document.getElementById('frmCategoria').reset();
    $("#nueva_categoria").modal("show");
    document.getElementById("id").value = "";
}

function registrarCat(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");

    if(nombre.value == ""){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El nombre es necesario!',
            showConfirmButton: false,
            timer: 2500
          });
    }else{
        const url = base_url + "Categorias/registrar";
        const frm = document.getElementById("frmCategoria");
        const http = new XMLHttpRequest();
        http.open('POST', url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                if(res == "si"){
                    Swal.fire({
                        icon: 'success',
                        title: 'OK',
                        text: '¡Categoria registrada con exito!',
                        showConfirmButton: false,
                        timer: 2500
                      })
                      frm.reset();
                      $("#nueva_categoria").modal("hide");
                      tblCategorias.ajax.reload();
                }else if(res == "modificado"){
                    Swal.fire({
                        icon: 'success',
                        title: 'OK',
                        text: '¡Categoria modificada con exito!',
                        showConfirmButton: false,
                        timer: 2500
                      })
                      $("#nueva_categoria").modal("hide");
                      tblCategorias.ajax.reload();
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: res,
                        showConfirmButton: false,
                        timer: 2500
                      })
                }
            }
        }
    }
}

function btnEditarCat(id){
    document.getElementById('title').innerHTML = "Actualizar Categoria";
    document.getElementById('btnAccion').innerHTML = "Modificar";

        const url = base_url + "Categorias/editar/"+id;
        const http = new XMLHttpRequest();
        http.open('GET', url, true);
        http.send();
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                document.getElementById("id").value = res.id;
                document.getElementById("nombre").value = res.nombre;
                $("#nueva_categoria").modal("show");
            }
        }
}

function btnEliminarCat(id){
    Swal.fire({
        title: '¿Estas seguro?',
        text: "La categoria solo sera inhabilitada!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Categorias/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open('GET', url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Ok!',
                            'La categoria ha sido inhabilitada.',
                            'success'
                        )
                        tblCategorias.ajax.reload();
                    }else{
                        Swal.fire(
                            'Oops!',
                            res,
                            'error'
                        )
                    }
                }
            }

            
        }
      })
}

function btnReingresarCat(id){
    Swal.fire({
        title: '¿Estas seguro?',
        text: "La categoria sera habilitada!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, habilitar!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Categorias/reingresar/"+id;
            const http = new XMLHttpRequest();
            http.open('GET', url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Ok!',
                            'La categoria ha sido habilitada.',
                            'success'
                        )
                        tblCategorias.ajax.reload();
                    }else{
                        Swal.fire(
                            'Oops!',
                            res,
                            'error'
                        )
                    }
                }
            }

        }
      })
}

/*FIN CATEGORIAS */

function frmProducto(){
    document.getElementById('frmProducto').reset();
    document.getElementById('title').innerHTML = "Nuevo producto";
    document.getElementById('btnAccion').innerHTML = "Registrar";
    $("#nuevo_producto").modal("show");
    document.getElementById("id").value = "";
    deleteImg()
}

function registrarPro(e){
    e.preventDefault();
    const codigo_barra = document.getElementById("codigo_barra");
    const nombre = document.getElementById("nombre");
    const precio_compra = document.getElementById("precio_compra");
    const precio_venta = document.getElementById("precio_venta");
    const id_medida = document.getElementById("medida");
    const id_cat = document.getElementById("categoria");

    if(codigo_barra.value == "" || nombre.value == "" || precio_compra.value == "" || precio_venta.value == ""){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Todos los campos son necesarios!',
            showConfirmButton: false,
            timer: 2500
          });
    }else{
        const url = base_url + "Productos/registrar";
        const frm = document.getElementById("frmProducto");
        const http = new XMLHttpRequest();
        http.open('POST', url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                //console.log(this.responseText); para poder visualizar en la consola lo que tiene el areglo $_FILES
                const res = JSON.parse(this.responseText);
                if(res == "si"){
                    Swal.fire({
                        icon: 'success',
                        title: 'OK',
                        text: 'Producto registrado con exito!',
                        showConfirmButton: false,
                        timer: 2500
                      })
                      frm.reset();
                      $("#nuevo_producto").modal("hide");
                      tblProductos.ajax.reload();
                }else if(res == "modificado"){
                    Swal.fire({
                        icon: 'success',
                        title: 'OK',
                        text: '¡Producto modificado con exito!',
                        showConfirmButton: false,
                        timer: 2500
                      })
                      $("#nuevo_producto").modal("hide");
                      tblProductos.ajax.reload();
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: res,
                        showConfirmButton: false,
                        timer: 2500
                      })
                }
            }
        }
    }
}

function btnEditarPro(id){
    document.getElementById('title').innerHTML = "Actualizar producto";
    document.getElementById('btnAccion').innerHTML = "Modificar";

        const url = base_url + "Productos/editar/"+id;
        const http = new XMLHttpRequest();
        http.open('GET', url, true);
        http.send();
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                document.getElementById("id").value = res.id;
                document.getElementById("codigo_barra").value = res.codigo;
                document.getElementById("nombre").value = res.descripcion;
                document.getElementById("precio_compra").value = res.precio_compra;
                document.getElementById("precio_venta").value = res.precio_venta;
                document.getElementById("medida").value = res.id_medida;
                document.getElementById("categoria").value = res.id_categoria;
                document.getElementById("img-preview").src = base_url + 'Assets/img/' + res.foto;
                document.getElementById("icon-cerrar").innerHTML = `<button class="btn btn-danger" onclick="deleteImg()"><i class="fas fa-times"></i></button>`;
                document.getElementById("icon-image").classList.add("d-none");
                document.getElementById("foto-actual").value = res.foto;
                $("#nuevo_producto").modal("show");
            }
        }
}

function btnEliminarPro(id){
    Swal.fire({
        title: '¿Estas seguro?',
        text: "El producto solo sera inhabilitado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Productos/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open('GET', url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Ok!',
                            'El producto ha sido inhabilitado.',
                            'success'
                        )
                        tblProductos.ajax.reload();
                    }else{
                        Swal.fire(
                            'Oops!',
                            res,
                            'error'
                        )
                    }
                }
            }

            
        }
      })
}

function btnReingresarPro(id){
    Swal.fire({
        title: '¿Estas seguro?',
        text: "El producto sera habilitado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, habilitar!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Productos/reingresar/"+id;
            const http = new XMLHttpRequest();
            http.open('GET', url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Ok!',
                            'El producto ha sido habilitado.',
                            'success'
                        )
                        tblProductos.ajax.reload();
                    }else{
                        Swal.fire(
                            'Oops!',
                            res,
                            'error'
                        )
                    }
                }
            }

            
        }
      })
}

function preview(e){
    const url = e.target.files[0];
    const urlTmp = URL.createObjectURL(url);
    document.getElementById("img-preview").src = urlTmp;
    document.getElementById("icon-image").classList.add("d-none");
    document.getElementById("icon-cerrar").innerHTML = `<button class="btn btn-danger" onclick="deleteImg()"><i class="fas fa-times"></i></button>
    ${url['name']}`;
}

function deleteImg(){
    document.getElementById("icon-cerrar").innerHTML = "";
    document.getElementById("icon-image").classList.remove("d-none");
    document.getElementById("img-preview").src = '';
    document.getElementById('foto').value = '';
    document.getElementById('foto-actual').value = '';
}

/**
 * FIN PRODUCTOS
 */

function buscarCodigo(e){
    e.preventDefault();
    if(e.which == 13){
        const cod = document.getElementById("codigo").value;
        const url = base_url + "Gastos/buscarCodigo/" + cod;
        const http = new XMLHttpRequest();
        http.open("GET", url, true)
        http.send();
        http.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                if(res){
                    document.getElementById("nombre").value = res.descripcion;
                    document.getElementById("precio").value = res.precio_compra;
                    document.getElementById("id").value = res.id;
                    document.getElementById("cantidad").focus();
                }else{
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops',
                        text: 'Producto no existe!',
                        showConfirmButton: false,
                        timer: 1500
                      })
                    document.getElementById("cantidad").value = "";
                    document.getElementById("codigo").focus();
                }
            }
        }
    }
}

function calcularPrecio(e){
    e.preventDefault();
    const cant = document.getElementById("cantidad").value;
    const precio = document.getElementById("precio").value;
    document.getElementById("sub_total").value = precio * cant;
    if(e.which == 13){
        const url = base_url + "Gastos/ingresar/";
        const frm = document.getElementById("frmCompra");
        const http = new XMLHttpRequest();
        http.open("POST", url, true)
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200){
                //console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                if(res == 'ok'){
                    frm.reset();
                    cargarDetalle();
                }else if(res == 'modificado'){
                    frm.reset();
                    cargarDetalle();
                }
            }
        }
    }
}

if(document.getElementById('tblDetalle')){
    cargarDetalle();
}

function cargarDetalle(){
    const url = base_url + "Gastos/listar/detalles";
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            let html = '';
            res['detalle'].forEach(row => {
                html += `<tr>
                    <td>${row['id']}</td>
                    <td>${row['descripcion']}</td>
                    <td>${row['cantidad']}</td>
                    <td>${row['precio']}</td>
                    <td>${row['sub_total']}</td>
                    <td>
                        <button class="btn btn-danger" type="button" onclick="deleteDetalle(${row['id']})"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>`
            });
            document.getElementById("tblDetalle").innerHTML = html;
            document.getElementById("total").value = res['total_pagar'].total;
        }
    }
}

function deleteDetalle(id){
    const url = base_url + "Gastos/delete/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            if(res == "ok"){
                Swal.fire({
                    icon: 'success',
                    title: 'Ok',
                    text: 'Compra eliminada!',
                    showConfirmButton: false,
                    timer: 1500
                  })
                  cargarDetalle();
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops',
                    text: 'Error al eliminar!',
                    showConfirmButton: false,
                    timer: 1500
                  })
            }
        }
    }
}

function generarCompra(){
    Swal.fire({
        title: '¿Estas seguro de realizar la compra?',
        text: "La compra sera registrada!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, registrar!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Gastos/registrarCompra";
            const http = new XMLHttpRequest();
            http.open('GET', url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if(res.msg == "ok"){
                        Swal.fire(
                            'Ok!',
                            'La compra fue registrada.',
                            'success'
                        )
                        const ruta = base_url + 'Gastos/generarPdf/' + res.id_compra;
                        window.open(ruta);
                        setTimeout(() => {
                            window.location.reload();
                        }, 2000);
                    }else{
                        Swal.fire(
                            'Oops!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}

function modificarEmpresa(){
    const frm = document.getElementById('frmEmpresa');
    const url = base_url + "Administracion/modificar";
            const http = new XMLHttpRequest();
            http.open('POST', url, true);
            http.send(new FormData(frm));
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire({
                            icon: 'success',
                            title: 'Ok',
                            text: 'Datos modificados!',
                            showConfirmButton: false,
                            timer: 1500
                          })
                    }
                }
            }
}
/**
 * FIN COMPRAS
 */

