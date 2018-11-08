<?php
/**
 * Created by PhpStorm.
 * User: JDIAZ
 * Date: 8/11/2018
 * Time: 4:55 PM
 */

include_once 'conexion.php';
$query = 'SELECT * FROM persona'; // sentencia

$gst = $pdo->prepare($query);

$gst->execute();

$res = $gst->fetchAll();//array con fetch all

