<?php
/**
 * http://www.localhost/api/request/put.php
 * 
 * {
*     "id" : "27",
*      "nom" : "truc modifié",
*      "prenom" : "bidule",
*      "statut" : "machin",
*      "telephone" : "0699999999",
*      "courriel" : "truc@bidule.com"
 * } 
 */
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//Vérifie si la méthode utilisée est correcte
if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    //Inclusion de la réponse
    include_once '../dao/ContactDAO.php';

    $corps = json_decode(file_get_contents("php://input"));

    $contactDAO = new ContactDAO();

    if (!empty($corps->id) && !empty($corps->nom) && !empty($corps->prenom) && !empty($corps->statut) && !empty($corps->telephone) && !empty($corps->courriel)) {
        $donnees = $contactDAO->update(new Contact($corps->id, $corps->nom, $corps->prenom, $corps->statut, $corps->telephone, $corps->courriel));
        if ($donnees) {
            http_response_code(200);
        echo json_encode(["message" => "La modification a été effectué"]);
        } else {
            http_response_code(503);
            echo json_encode(["message" => "La modification n'a pas été effectué"]);         
        }
    } else {
        http_response_code(400);
        echo json_encode(["message" => "L'ajout n'a pas été effectué : les champs n'ont pas tous été renseignés"]);         
    }
} else {
    //Gestion erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}