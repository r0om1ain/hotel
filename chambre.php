<?php

include "fonction.php";
include "vue/header.php";

if( isset($_GET['action']) ){
    $action = $_GET['action'];

    switch($action){
        case "ajouter": 

            if( isset($_POST['prix']) ){

                // On extrait les données du formulaire
                extract($_POST);

                // Gestion de l'upload d'image
                if(isset($_FILES['image']['name'])){
                    $infoImage = pathinfo($_FILES['image']['name']);
                    $fileName = $_FILES['image']['name'];
                    $extensions = ["jpeg", "jpg", "png"];

                    // Vérification de l'extension du fichier
                    if( in_array($infoImage['extension'], $extensions) ){
                        // Déplacer le fichier uploadé
                        move_uploaded_file($_FILES['image']['tmp_name'], "utils/img/". $fileName);
                    }
                }

                // Insertion de la chambre dans la base de données
                $query = "INSERT INTO chambre VALUES(NULL, :prix, :lit, :cap, :img, :desc)";
                $stmt = $pdo->prepare($query);
                $stmt->execute([
                    "prix"  => $prix,
                    "lit"   => $nbLits,
                    "cap"   => $nbPers,
                    "img"   => $fileName,
                    "desc"  => $description
                ]);

                header("location: .");
                exit;
            }

            // Inclusion du formulaire d'ajout de chambre
            include "vue/addChbre.php";
            break;

        case "detail":
            $chambre = getOne("chambre", "numChambre", $_GET['id']);
            include "vue/detail.php";
            break;

        case "supprimer":
            if (isset($_GET['id'])) {
                $idChambre = $_GET['id'];

                // Récupérer le nom de l'image avant de supprimer la chambre
                $query = "SELECT image FROM chambre WHERE numChambre = :id";
                $stmt = $pdo->prepare($query);
                $stmt->execute(['id' => $idChambre]);
                $chambre = $stmt->fetch(PDO::FETCH_ASSOC);

                // Vérifier si l'image existe et la supprimer
                if ($chambre && !empty($chambre['image'])) {
                    $imagePath = "utils/img/" . $chambre['image'];
                    if (file_exists($imagePath)) {
                        unlink($imagePath); // Supprimer le fichier image
                    }
                }

                // Effectuer la requête de suppression
                $query = "DELETE FROM chambre WHERE numChambre = :id";
                $stmt = $pdo->prepare($query);
                $stmt->execute(['id' => $idChambre]);

                // Redirection après suppression avec message de confirmation
                header("location: .?message=Chambre supprimée avec succès");
                exit;
            }
            break;
}
}

include "vue/footer.php";
