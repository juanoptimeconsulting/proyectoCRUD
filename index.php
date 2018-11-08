<?php
/**
 * Created by PhpStorm.
 * User: JDIAZ
 * Date: 8/11/2018
 * Time: 10:48 AM
 */
include_once 'conexion.php';


$query = 'SELECT * FROM persona'; // sentencia

$gst = $pdo->prepare($query);

$gst->execute();

$res = $gst->fetchAll();// array con fetch all


//operacion de agregar


if($_POST){

    echo 'fail';

    $Nome =  $_POST['Nombre'];
    $ape =  $_POST['Apellido'];
    $eda =  $_POST['Edad'];


$slq = 'INSERT INTO persona(Nombre,Apelido, Edad)VALUES(?,?,?)';
$sentA = $pdo->prepare($slq);
    $sentA->execute(array($Nome,$ape,$eda));


   header('location:index.php');



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
            </div>

            <?php
            endforeach;//termina el for
            ?>

        </div><!--cierra columna-->

        <div class="col-md-6">

            <h1>AGREGAR</h1>

            <form method="POST">
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


        </div>



    </div>

</div>







<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
