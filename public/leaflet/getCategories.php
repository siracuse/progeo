<?php
require 'bdd.php';

if(isset($_GET['city'])){
    $city = $_GET['city'];
    $req = $bdd->prepare('
    SELECT DISTINCT ca.name FROM cities as c inner join stores s 
    on c.id = s.city_id inner join categories as ca on s.category_id = ca.id where c.name = ?');
    $req->execute(array($city));
    $categories = $req->fetchAll(PDO::FETCH_ASSOC);
    echo(json_encode($categories));
}else if(isset($_GET['latMin'])){
    $req = $bdd -> prepare('SELECT c.name from stores as s inner join categories as c 
    on s.category_id = c.id where (latitude > ? AND longitude > ?) AND (latitude < ? AND longitude < ?)');
    $req->execute(array($_GET['latMin'], $_GET['longMin'], $_GET['latMax'], $_GET['longMax']));
    $categories = $req -> fetchAll(PDO::FETCH_ASSOC);
    echo(json_encode($categories));
}





