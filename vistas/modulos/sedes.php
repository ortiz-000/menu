<body>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sedes</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <!-- Button to trigger modal for adding a new "Sede" -->
                        <button class="btn btn-info" data-toggle="modal" data-target="#archivoModal">Agregar</button>
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
                    <!-- Table displaying the list of "Sedes" -->
                    <table id="tblSedes" class="table table-bordered table-striped">
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
                            <?php
                            // Fetch and display "Sedes" from the controller
                            $item = null;
                            $valor = null;
                            $sedes = ControladorSedes::ctrMostrarSedes($item, $valor);

                            foreach ($sedes as $key => $value) {
                                echo '<tr>
                                        <td>' . ($key + 1) . '</td>
                                        <td>' . $value["nombre_sede"] . '</td>
                                        <td>' . $value["direccion"] . '</td>
                                        <td>' . $value["descripcion"] . '</td>
                                        <td>';

                                // Display button based on "estado"
                                if ($value["estado"] == "Activo") {
                                    echo '<button class="btn btn-success btn-xs btnActivarSede" idSede="' . $value["id_sede"] . '" estadoSede="inactiva">Activo</button>';
                                } else {
                                    echo '<button class="btn btn-danger btn-xs btnActivarSede" idSede="' . $value["id_sede"] . '" estadoSede="activa">Inactivo</button>';
                                }

                                echo '</td>
                                      <td>
                                        <div class="btn-group">
                                            <!-- Button to trigger modal for editing a "Sede" -->
                                            <button class="btn btn-default btn-xs btnEditarSede" idSede="' . $value["id_sede"] . '" data-toggle="modal" data-target="#modalEditSede">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                      </td>
                                    </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal for adding a new "Sede" -->
    <div class="modal fade" id="archivoModal" tabindex="-1" role="dialog" aria-labelledby="archivoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="archivoModalLabel">Crear Sede</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form for creating a new "Sede" -->
                    <form accept="multipart/form-data" method="post" id="formCrearSedes">
                        <div class="form-group">
                            <label for="nombre_sede">Nombre</label>
                            <input type="text" class="form-control" id="nombre_sede" placeholder="Ingrese el nombre de la sede" name="nombre_sede">
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="direccion" placeholder="Ingrese la dirección de la sede" name="direccion">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" rows="3" placeholder="Ingrese una descripción" name="descripcion"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>

                    <?php
                    // Call the controller method to create a new "Sede"
                    $crearSede = new ControladorSedes();
                    $crearSede->ctrCrearSedes();
                    ?>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for editing a "Sede" -->
    <div class="modal fade" id="modalEditSede" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Sede</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form for editing a "Sede" -->
                    <form accept="multipart/form-data" method="post" id="formEditSedes">
                        <div class="form-group">
                            <label for="editNombreSede">Nombre</label>
                            <input type="text" class="form-control" id="editNombreSede" name="editNombreSede" placeholder="Ingrese el nombre de la sede">
                        </div>
                        <div class="form-group">
                            <label for="editDireccionSede">Dirección</label>
                            <input type="text" class="form-control" id="editDireccionSede" name="editDireccionSede" placeholder="Ingrese la dirección de la sede">
                        </div>
                        <div class="form-group">
                            <label for="editDescripcionSede">Descripción</label>
                            <textarea class="form-control" id="editDescripcionSede" name="editDescripcionSede" rows="3" placeholder="Ingrese una descripción"></textarea>
                        </div>
                        <input type="hidden" id="editIdSede" name="editIdSede">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="saveEditSede">Guardar Cambios</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Include Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>