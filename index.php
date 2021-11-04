<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include_once 'dao/ContactDAO.php';
include_once 'model/Entite.php';
include_once 'model/Contact.php';

$contactDAO = new ContactDAO();

/*
echo 'findall :<br><br>';
$donnees = $contactDAO->findAll();
echo '<pre>';
var_dump($donnees);
echo '</pre>';

echo 'find :<br><br>';
$donnees = $contactDAO->findById(new Contact(1));
echo '<pre>';
var_dump($donnees);
echo '</pre>';

echo 'insert :<br><br>';
$donnees = $contactDAO->insert(new Contact('0', 'samier', 'fabien', 'moi', '0699999999', 'courriel@moi.truc'));
echo '<pre>';
var_dump($donnees);
echo '</pre>';

echo 'update :<br><br>';
$donnees = $contactDAO->update(new Contact('23', 'samier', 'thibault', 'frere', '0699999999', 'courriel@lui.truc'));
echo '<pre>';
var_dump($donnees);
echo '</pre>';

echo 'delete :<br><br>';
$donnees = $contactDAO->delete(new Contact(24));
echo '<pre>';
var_dump($donnees);
echo '</pre>';
*/

?>
    </body>
</html>