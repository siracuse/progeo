<?php
require 'bdd.php';

$city = $_GET['city'];
$req = $bdd->prepare('SELECT * from cities where name like :city LIMIT 10');
$req->execute(array('city' => $city . '%'));
$cities_infos = $req -> fetchAll(PDO::FETCH_ASSOC);
echo(json_encode($cities_infos));