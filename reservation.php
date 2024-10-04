<?php

include "fonction.php";
include 'vue/header.php';

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case "lister":
            // Requête pour récupérer les réservations avec les détails du client
            $query = "SELECT r.*, c.nom, c.prenom FROM reservation r INNER JOIN client c ON r.numClient = c.numClient"; 
            $stmt = $pdo->query($query);
            $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

            include 'vue/listeReserv.php'; // Inclure le fichier d'affichage des réservations
            break;

        case "creer":
            if (isset($_POST['prenom'])) {
                extract($_POST);

                // Vérifier que la date de départ est postérieure à la date d'arrivée
                if (strtotime($dateDepart) <= strtotime($dateArrivee)) {
                    echo "La date de départ doit être postérieure à la date d'arrivée.";
                } else {
                    // Insertion du client
                    $query = "INSERT INTO client (nom, prenom, tel) VALUES (:nom, :prenom, :tel)";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute(['nom' => $nom, 'prenom' => $prenom, 'tel' => $tel]);

                    // Récupérer l'ID du client inséré
                    $numClient = $pdo->lastInsertId();

                    // Insertion de la réservation
                    $query = "INSERT INTO reservation (numClient, numChambre, dateArrivee, dateDepart) VALUES (:numClient, :numChambre, :dateArrivee, :dateDepart)";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute([
                        'numClient' => $numClient,
                        'numChambre' => $numChambre,
                        'dateArrivee' => $dateArrivee,
                        'dateDepart' => $dateDepart
                    ]);

                    echo "Réservation OK";
                }
            }
            break;
    }
}

include 'vue/footer.php';
