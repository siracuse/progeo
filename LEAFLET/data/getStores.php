<?php
require './config/bdd.php';


$req = $bdd->prepare('select * from stores where (latitude > ? AND longitude > ?) AND (latitude < ? AND longitude < ?)');
$req->execute(array($_GET['latMin'], $_GET['longMin'], $_GET['latMax'], $_GET['longMax'], ));
$stores = $req -> fetchAll(PDO::FETCH_ASSOC);
echo(json_encode($stores));