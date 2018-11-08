<?php
/**
 * Created by PhpStorm.
 * User: JDIAZ
 * Date: 8/11/2018
 * Time: 2:49 PM
 */

//enviar datos atravez de la URL

$id = $_GET['id'];

$Nombre = $_GET['Nombre'];
$Apellido = $_GET['Apellido'];
$Edad = $_GET['Edad'];


include_once 'conexion.php';

$upd = 'UPDATE persona set Nombre=?,Apellido=?,Edad=? WHERE id=?';


$reps = $pdo->prepare($upd);
echo $Nombre;
echo $Apellido;
echo $Edad;


$reps->execute(array($Nombre,$Apellido,$Edad,$id));

header('location:index.php');