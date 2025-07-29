<?php

require_once 'includes/db.php';

session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Dashboard CRUD - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/stylesDash.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-5" href="dashboard.php">CRUD</a>
        <button class="btn btn-link btn-lg order-1 order-lg-0 me-4 me-lg-0 ps-0" id="sidebarToggle"><i class="fas fa-bars"></i></button>
        <form action="logout.php" method="POST" class="ms-auto pe-5">
            <button type="submit" class="btn btn-dark" id="btnS">Cerrar Sesión</button>
        </form>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Principal</div>
                        <a class="nav-link" href="dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" id="tab">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    admin
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Panel de Control</li>
                    </ol>

                    <!-- Formulario Insertar -->
                    <div class="card mb-4">
                        <div class="card-header bg-success text-white">
                            <i class="fas fa-user-plus me-1"></i> Insertar Nuevo Usuario
                        </div>
                        <div class="card-body">
                            <form action="includes/insertar.php" method="POST">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" required />
                                </div>
                                <div class="mb-3">
                                    <label for="oficio" class="form-label">Oficio</label>
                                    <input type="text" name="oficio" class="form-control" required />
                                </div>
                                <div class="mb-3">
                                    <label for="direccion" class="form-label">Dirección</label>
                                    <input type="text" name="direccion" class="form-control" required />
                                </div>
                                <div class="mb-3">
                                    <label for="edad" class="form-label">Edad</label>
                                    <input type="number" name="edad" class="form-control" required />
                                </div>
                                <div class="mb-3">
                                    <label for="correo" class="form-label">Correo</label>
                                    <input type="text" name="correo" class="form-control" required />
                                </div>
                                <button type="submit" class="btn btn-success">Insertar</button>
                            </form>
                        </div>
                    </div>

                    <!-- Tabla de Usuarios -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i> DataTable Ejemplo
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Oficio</th>
                                        <th>Dirección</th>
                                        <th>Edad</th>
                                        <th>Correo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $db = new DB_Conexion();
                                $usuarios = $db->obtenerUsuarios();

                                foreach ($usuarios as $usuario) {
                                    echo "<tr>
                                        <td>{$usuario['id']}</td>
                                        <td>{$usuario['nombre']}</td>
                                        <td>{$usuario['oficio']}</td>
                                        <td>{$usuario['direccion']}</td>
                                        <td>{$usuario['edad']}</td>
                                        <td>{$usuario['correo']}</td>
                                        <td>
                                            <a href='includes/editar.php?id={$usuario['id']}' class='btn btn-sm btn-primary'>
                                                <i class='fas fa-edit'></i> Editar
                                            </a>
                                            <a href='includes/borrar.php?id={$usuario['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"¿Estás seguro de que deseas borrar este usuario?\");'>
                                                <i class='fas fa-trash-alt'></i> Borrar
                                            </a>
                                        </td>
                                    </tr>";
                                }
                                ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Dashboard CRUD ITLA</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
</html>
