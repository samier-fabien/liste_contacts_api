<?php
/**
 * http://www.localhost/api/request/post.php
 * 
 * {
 *  "nom": "truc",
 *  "prenom": "bidule",
 *  "statut": "machin",
 *  "telephone": "0699999999",
 *  "courriel": "truc@bidule.com"
 * }
 */

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Acces-Control-Max-Age: 3600");
header("Acces-Control-Allow-Headers: Content-Type, Acces-Control-Allow-Headers, Authorization, X-Requested-With");

//Vérifie si la méthode utilisée est correcte
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Inclusion de la réponse
    include_once '../dao/ContactDAO.php';

    $corps = json_decode(file_get_contents("php://input"));

    $contactDAO = new ContactDAO();

    if (!empty($corps->nom) && !empty($corps->prenom) && !empty($corps->statut) && !empty($corps->telephone) && !empty($corps->courriel)) {
        $donnees = $contactDAO->insert(new Contact(0, $corps->nom, $corps->prenom, $corps->statut, $corps->telephone, $corps->courriel));
        if ($donnees) {
            http_response_code(201);
        echo json_encode(["message" => "L'ajout a été effectué"]);
        } else {
            http_response_code(503);
            echo json_encode(["message" => "L'ajout n'a pas été effectué"]);         
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