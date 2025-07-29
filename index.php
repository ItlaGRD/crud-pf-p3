<?php
    
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - CRUD</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/styles.css" >
</head>
    <body>
        <form class="login">
            <h3 class="labellogin">CRUD</h3>
        <!-- Entrada de usuario -->
        <div data-mdb-input-init class="form-outline mb-4">
            <input type="text" id="usuario" class="form-control" placeholder="Usuario" required/>
            <label class="form-label" for="usuario">Usuario</label>
        </div>

        <!-- Entrada Contrasena -->
        <div data-mdb-input-init class="form-outline mb-4">
            <input type="password" id="contraseña" class="form-control" placeholder="Contraseña" required />
            <label class="form-label" for="contraseña">Contraseña</label>
        </div>

        <!-- Mostrar contrasena -->
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
            <!-- Checkbox -->
            <div class="form-check">
                <input onclick="mostrar()" class="form-check-input" type="checkbox" value="mostrar" id="form2Example31" unchecked />
                <label class="form-check-label" for="form2Example31"> Mostrar Contraseña </label>
            </div>
            </div>
        </div>

        <!-- Boton Acceder -->
        <button onclick="acceder()" type="button" id="log" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Acceder</button>

        <!-- Buton GitHub -->
        <div class="text-center">
            <pre>Usuario: admin
Contraseña: admin</pre>
            <p>Proyecto GitHub</p>
            <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
            <a href="#!"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
              <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/>
            </svg></a>
            </button>
        </div>
        </form>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.min.js"></script>-->
        <script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.es.min.js"></script>
        <script src="js/script.js"> </script>
    </body>
</html>