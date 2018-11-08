<?php
/**
 * Created by PhpStorm.
 * User: JDIAZ
 * Date: 8/11/2018
 * Time: 10:48 AM
 */
include_once 'conexion.php';
include_once 'list.php';



if($_GET){

$id = $_GET['id'];
    $qu = 'SELECT * FROM persona where id=?'; // traer el id

    $gst_on = $pdo->prepare($qu);

    $gst_on->execute(array($id));

    $rer = $gst_on->fetch();// array con fetch all

   // var_dump($rer);




}



?>
<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script>
        function myFunction() {
            var txt;

            if (confirm("Desea eliminar?")) {
                txt = "Confirmar";



            } else {
                txt = "Cancelar";



            }


            document.getElementById("demo").innerHTML = txt;
        }
    </script>
    <title>Hello, world!</title>
</head>
<body>


<div class="container">



    <div class="row  ">

        <!-abre columnas-->
        <div class="col-md-6">

            <?php   foreach ($res as $muestra): ?>

                <br>


            <div class="alert alert-<?php
            echo $muestra['Nombre']; ?> text-uppercase"  role="alert">
                <?php echo $eda='EDAD: '.  $muestra['Edad']; ?>

                <br>
                <br>

                <?php


                if($muestra['Apellido']){

                    echo   $mss= 'APELLIDO: '. $muestra['Apellido'];
                }

                ?>

                <a href="index.php?id=<?php
                echo $muestra['id']; ?>" class="float-right">
                    <i class="fas fa-edit ml-4"></i>


                </a>



                    <a href="eliminar.php?id=<?php echo $muestra['id']; ?>" class="float-right" onclick="if(!confirm('¿Deseas realmente borrar al señor  <?php echo strtolower($muestra['Nombre']); ?>?'))return false">

                        <i class="fas fa-user-minus"></i>
                    </a>


            </div>

            <?php
            endforeach;//termina el for
            ?>

        </div><!--cierra columna-->

        <div class="col-md-6">


            <?php
            if(!$_GET): ?>
                <h1>AGREGAR CAMPOS</h1>
            <form method="POST" action="insert.php" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input  type="text" class="form-control mt-3"    name="Nombre" placeholder="Nombre" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Apellido</label>
                    <input type="text" class="form-control"  placeholder="Apellido" name="Apellido" required >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Edad</label>
                    <input type="number" class="form-control"  placeholder="Edad" name="Edad" required >
                </div>

                <button  class="btn btn-primary  btn-lg btn-block">enviar</button>
            </form>
            <?php

            endif;

            ?>


            <?php

            if($_GET): ?>

                <h1>Editar Campos</h1>
                <form method="GET" action="editar.php">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input  type="text" class="form-control mt-3"  value="<?php  echo $rer['Nombre']?>"   name="Nombre" placeholder="Nombre" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Apellido</label>
                        <input type="text" class="form-control"  placeholder="Apellido" value="<?php echo $rer['Apellido']?>" name="Apellido" required >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Edad</label>
                        <input type="number" class="form-control"  placeholder="Edad"  value="<?php echo $rer['Edad'] ?>" name="Edad" required >
                    </div>
                    <input type="hidden"  name="id" value="<?php echo $rer['id'] ?>">
                    <button  class="btn btn-primary  btn-lg btn-block">enviar</button>
                </form>
            <?php

            endif;

            ?>

        </div>



    </div>

</div>
<?php

//cerrar conexion;
$sentA = null;
$pdo = null;



?>






<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
