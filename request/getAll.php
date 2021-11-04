<?php
/**
 * http://www.localhost/api/request/getAll.php
 */

//Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Acces-Control-Max-Age: 3600");
header("Acces-Control-Allow-Headers: Content-Type, Acces-Control-Allow-Headers, Authorization, X-Requested-With");

//Vérifie si la méthode utilisée est correcte
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include_once '../dao/ContactDAO.php';

    $contactDAO = new ContactDAO();
    $donnees = $contactDAO->findAll();

    http_response_code(200);
    echo json_encode($donnees);
} else {
    //Gestion erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}