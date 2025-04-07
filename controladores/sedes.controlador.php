<?php

class ControladorSedes
{

    static public function ctrCrearSedes()
    {

        if (isset($_POST["nombre_sede"]) && isset($_POST["direccion"]) && isset($_POST["descripcion"])) {
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre_sede"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["direccion"])
            ) {
                $tabla = "sedes";
                $datos = array(
                    "nombre_sede" => $_POST["nombre_sede"],
                    "direccion" => $_POST["direccion"],
                    "descripcion" => $_POST["descripcion"]
                );
                $respuesta = ModeloSedes::mdlCrearSedes($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                            Swal.fire({
                                icon: "success",
                                title: "¡La sede ha sido creada correctamente!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                            }).then((result) => {
                                if (result.value) {
                                    window.location = "sedes";
                                }
                            });
                        </script>';
                } else {
                    echo '<script>
                            Swal.fire({
                                icon: "error",
                                title: "¡Error al crear la sede!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                            }).then((result) => {
                                if (result.value) {
                                    window.location = "sedes";
                                }
                            });
                        </script>';
                }
            } else {
                echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then((result) => {
                            if (result.value) {
                                window.location = "sedes";
                            }
                        });
                    </script>';
            }
        }
    }

    /*=============================================
    CREAR SEDES
    =============================================*/
    static public function ctrMostrarSedes($item, $valor)
    {

        $tabla = "sedes";

        $respuesta = ModeloSedes::mdlMostrarSedes($tabla, $item, $valor);

        return $respuesta;
    }
}