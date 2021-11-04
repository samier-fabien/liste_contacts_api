<?php
include_once 'ConnexionManager.php';
include_once '../model/Entite.php';
include_once '../model/Contact.php';
include_once 'DAOInterface.php';

class ContactDAO implements DAOInterface
{
    private $connexion;

    public function __construct()
    {
        $this->connexion = ConnexionManager::getInstance(); 
    }

    public function findAll(): array {
        $tab = [];
        $tab["contacts"] = [];

        $requete = "SELECT * FROM contact";

        $statement = $this->connexion->prepare($requete);
        $statement->execute();

        if ($statement->rowCount() > 0) {
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
    
                $contact = [
                    "id" => $id,
                    "nom" => $con_nom,
                    "prenom" => $con_prenom,
                    "statut" => $con_statut,
                    "téléphone" => $con_tel,
                    "courriel" => $con_mail
                ];
    
                 $tab['contacts'][] = $contact;
            }
        }
        $statement->closeCursor();

        return $tab;
    }

    public function findById(Entite $entite): array {
        $idEntite = $entite->getId();

        $tab = [];
        $tab["contacts"] = [];

        $requete = "SELECT id, con_nom, con_prenom, con_statut, con_tel, con_mail FROM contact WHERE id = ? LIMIT 0,1";

        try {
            $statement = $this->connexion->prepare($requete);
            $statement->bindParam(1, $idEntite);

            $statement->execute();

            if ($statement->rowCount() > 0) {
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                extract($row);
        
                $contact = [
                    "id" => $id,
                    "nom" => $con_nom,
                    "prenom" => $con_prenom,
                    "statut" => $con_statut,
                    "téléphone" => $con_tel,
                    "courriel" => $con_mail
                ];

                $tab['contacts'][] = $contact;
            }
            $statement->closeCursor();

        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $tab;
    }

    public function insert(Entite $entite): bool
    {
        $nom = $entite->getNom();
        $prenom = $entite->getPrenom();
        $statut = $entite->getStatut();
        $tel = $entite->getTel();
        $courriel = $entite->getCourriel();

        $requete = "INSERT INTO contact (con_nom, con_prenom, con_statut, con_tel, con_mail) VALUES (?, ?, ?, ?, ?)";

        try {
            $statement = $this->connexion->prepare($requete);
            $statement->bindParam(1, $nom);
            $statement->bindParam(2, $prenom);
            $statement->bindParam(3, $statut);
            $statement->bindParam(4, $tel);
            $statement->bindParam(5, $courriel);

            $statement->execute();

            $statement->closeCursor();
            return true;

        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return false;
    }

    public function update(Entite $entite): bool
    {
        $id = $entite->getId();
        $nom = $entite->getNom();
        $prenom = $entite->getPrenom();
        $statut = $entite->getStatut();
        $tel = $entite->getTel();
        $courriel = $entite->getCourriel();

        $requete = "UPDATE contact SET con_nom = ?, con_prenom = ?, con_statut = ?, con_tel = ?, con_mail = ? WHERE id=?";

        try {
            $statement = $this->connexion->prepare($requete);
            $statement->bindParam(1, $nom);
            $statement->bindParam(2, $prenom);
            $statement->bindParam(3, $statut);
            $statement->bindParam(4, $tel);
            $statement->bindParam(5, $courriel);
            $statement->bindParam(6, $id);

            $statement->execute();

            $statement->closeCursor();
            return true;

        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return false;
    }

    public function delete(Entite $entite): bool
    {
        $id = $entite->getId();

        $requete = "DELETE FROM contact WHERE id=?";

        try {
            $statement = $this->connexion->prepare($requete);
            $statement->bindParam(1, $id);

            $statement->execute();

            $statement->closeCursor();
            return true;

        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return false;
    }
}
