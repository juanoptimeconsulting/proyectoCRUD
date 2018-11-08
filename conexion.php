<?php
/**
 * Created by PhpStorm.
 * User: JDIAZ
 * Date: 8/11/2018
 * Time: 8:55 AM
 */

$link = 'mysql:host=localhost;dbname=bdprueba';
$user = 'root';
$pass = '';


try {
    $pdo = new PDO($link, $user, $pass);
   /* foreach($mbd->query('SELECT * from persona') as $fila) {
        print_r($fila);
    }*/

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}