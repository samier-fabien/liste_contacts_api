<?php
/**
 * http://www.localhost/api/request/getById.php
 * 
 * {
 *  "id": "2"
 * }
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

    $corps = json_decode(file_get_contents("php://input"));

    $contactDAO = new ContactDAO();

    if (!empty($corps->id)) {
        $donnees = $contactDAO->findById(new Contact($corps->id));
        if (count($donnees["contacts"]) > 0) {
            http_response_code(200);
            echo json_encode($donnees);
        } else {
            http_response_code(204);
            echo json_encode(array("message" => "Le produit n'existe pas."));
        }
    } else {
        http_response_code(400);
        echo json_encode(["message" => "L'id n'a pas été reçu"]);         
    }
} else {
    //Gestion erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}