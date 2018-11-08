<?php
/**
 * Created by PhpStorm.
 * User: JDIAZ
 * Date: 8/11/2018
 * Time: 4:51 PM
 */

include_once 'conexion.php';
//operacion de agregar


if($_POST){

    echo 'fail';

    $Nome =  $_POST['Nombre'];
    $ape =  $_POST['Apellido'];
    $eda =  $_POST['Edad'];


    $slq = 'INSERT INTO persona (id, Nombre, Apellido, Edad) VALUES (NULL,?,?,?)';
    $sentA = $pdo->prepare($slq);
    $sentA->execute(array($Nome,$ape,$eda));


    //cerrar conexion;
    $sentA = null;
    $pdo = null;
    header('location:index.php');



}