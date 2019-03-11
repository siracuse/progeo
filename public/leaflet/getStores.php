<?php
require 'bdd.php';


$req = $bdd->prepare("select s.name, s.address, s.phone, s.email, s.siret,
s.photoInside, s.photoOutside, s.latitude, s.longitude, s.city_id, s.category_id, c.name as category_name, s.subcategory_id
from stores as s inner join categories 
as c on s.category_id = c.id 
where (latitude > ? AND longitude > ?) 
AND (latitude < ? AND longitude < ? )");

/*$req = $bdd->prepare("select *
from stores as s inner join categories 
as c on s.category_id = c.id 
where (latitude > ? AND longitude > ?) 
AND (latitude < ? AND longitude < ? )");*/

$req->execute(array($_GET['latMin'], $_GET['longMin'], $_GET['latMax'], $_GET['longMax']));
$stores = $req -> fetchAll(PDO::FETCH_ASSOC);
echo(json_encode($stores));