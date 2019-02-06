<?php
require 'bdd.php';

$req = $bdd->prepare("select * 
from stores as s inner join categories 
as c on s.category_id = c.id 
where (latitude > ? AND longitude > ?) 
AND (latitude < ? AND longitude < ? )");

$req->execute(array($_GET['latMin'], $_GET['longMin'], $_GET['latMax'], $_GET['longMax']));
$stores = $req -> fetchAll(PDO::FETCH_ASSOC);
echo(json_encode($stores));