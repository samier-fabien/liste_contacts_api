<?php
// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//Vérifie si la méthode utilisée est correcte
if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    //Inclusion de la réponse
    include_once '../dao/ContactDAO.php';

    $corps = json_decode(file_get_contents("php://input"));

    $contactDAO = new ContactDAO();

    if (!empty($corps->id)) {
        $donnees = $contactDAO->delete(new Contact($corps->id));
        if ($donnees) {
            http_response_code(200);
        echo json_encode(["message" => "La suppression a été effectué"]);
        } else {
            http_response_code(503);
            echo json_encode(["message" => "La suppression n'a pas été effectué"]);         
        }
    } else {
        http_response_code(400);
        echo json_encode(["message" => "La suppression n'a pas été effectué : les champs n'ont pas tous été renseignés"]);         
    }
} else {
    //Gestion erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}