<?php
/**
 * Created by PhpStorm.
 * User: JDIAZ
 * Date: 8/11/2018
 * Time: 3:51 PM
 */

$id = $_GET['id'];



include_once 'conexion.php';

$upd = 'DELETE FROM persona WHERE id=?';


$reps = $pdo->prepare($upd);



$reps->execute(array($id));

//cerrar conexion;
$reps = null;
$pdo = null;


header('location:index.php');