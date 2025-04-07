<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ficha</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <button class="btn btn-info" data-toggle="modal" data-target="#archivoModal">añadir sede</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Listado de Sedes</h3>
            </div>

            <div class="card-body">
                <table id="botas2" class="table table-bordered table-striped">
                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Dirección</th>
                                        <th>Descripción</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Juan Pérez</td>
                                        <td>Calle Falsa 123</td>
                                        <td>Cliente VIP</td>
                                        <td><button onclick="cambiarEstado(this)">Activo</button></td>
                
                                        <td><button class="btn btn-light"><i class="fas fa-edit"></i></button></td>
                                      
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>María López</td>
                                        <td>Avenida Siempre Viva 742</td>
                                        <td>Cliente frecuente</td>
                                        <td><button onclick="cambiarEstado(this)">Inactivo</button></td>
                                        <td><button class="btn btn-light"><i class="fas fa-edit"></i></button></td>
                                  
                                    </tr>
                                </tbody>
                            </table>
                            <script>
                                function cambiarEstado(boton) {
                                    if (boton.innerText === "Activo") {
                                        boton.innerText = "Inactivo";
                                        boton.style.backgroundColor = "red";
                                    } else {
                                        boton.innerText = "Activo";
                                        boton.style.backgroundColor = "green";
                                    }
                                }
                            </script>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
</div>

<!-- Modal para añadir nueva sede -->
<div class="modal fade" id="archivoModal" tabindex="-1" role="dialog" aria-labelledby="archivoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="archivoModalLabel">AÑADIR UNA NUEVA SEDE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Campo para el Nombre -->
                <div class="form-group">
                    <label for="nombreSede">Nombre de la Sede</label>
                    <input type="text" class="form-control" id="nombreSede" placeholder="Ingrese el nombre">
                </div>
                <!-- Campo para la Dirección -->
                <div class="form-group">
                    <label for="direccionSede">Dirección</label>
                    <input type="text" class="form-control" id="direccionSede" placeholder="Ingrese la dirección">
                </div>
                <!-- Campo para la Descripción -->
                <div class="form-group">
                    <label for="descripcionSede">Descripción</label>
                    <textarea class="form-control" id="descripcionSede" rows="3" placeholder="Ingrese una descripción"></textarea>
                </div>
            </div>
            <div class="modal-footer">
             
                <button type="button" class="btn btn-primary" id="guardarSede">GUARDAR</button>
            </div>
        </div>
    </div>
</div>
