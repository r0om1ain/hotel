
    
    <h2 class="text-center">Détail de la Chambre</h2>

    <p>
        <img class="card-img-top w-25" src="utils/img/<?= $chambre['image'] ?>" alt="Card image cap">
    </p>

    Prix <?= $chambre['prix'] ?>€ par nuit.

    <p>
        <div><Strong>Nombres de lit : </Strong><?= $chambre['nbLits'] ?> Lit(s)</div>
        <div><Strong>Description : </Strong><?= $chambre['description'] ?></div>
    </p>

    <div>
        <h2 class="text-center">Créer une Réservation</h2>

        <form action="reservation.php?action=ajouter" method="post">
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" name="prenom" required>
            </div>
            
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" required>
            </div>

            <div class="form-group">
                <label for="tel">Téléphone</label>
                <input type="text" class="form-control" name="tel" required>
            </div>

            <div class="form-group">
                <label for="dateArrivee">Date d'Arrivée</label>
                <input type="date" class="form-control" name="dateArrivee" required>
            </div>

            <div class="form-group">
                <label for="dateDepart">Date de Départ</label>
                <input type="date" class="form-control" name="dateDepart" required>
            </div>

            <input type="hidden" name="numChambre" value="<?= $_GET['id'] ?>">

            <button type="submit" class="btn btn-primary mt-2">Réserver</button>
        </form>
    </div>