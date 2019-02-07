<?php
require 'bdd.php';

$req = $bdd -> prepare('select DISTINCT su.id, su.name
from stores as s 
inner join categories 
as c on s.category_id = c.id 
inner join subcategories as su 
on c.id = su.category_id
where ((s.latitude > ? AND s.longitude > ?) 
AND (s.latitude < ? AND s.longitude < ? )) AND c.name = ?');
$req->execute(array($_GET['latMin'], $_GET['longMin'], $_GET['latMax'], $_GET['longMax'], $_GET['category']));
$subcategories = $req -> fetchAll(PDO::FETCH_ASSOC);
echo(json_encode($subcategories));