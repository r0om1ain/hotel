<h2 class="text-center">Liste des Chambres</h2>

<?php if (isset($_GET['message'])): ?>
    <div class="alert alert-success" role="alert">
        <?= htmlspecialchars($_GET['message']) ?>
    </div>
<?php endif; ?>

<?php foreach ($chambres as $chambre): ?>
    <div class="card my-1" style="width: 18rem;">
        <img class="card-img-top" src="utils/img/<?= htmlspecialchars($chambre['image']) ?>" alt="Image de la chambre">
        <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($chambre['prix']) ?>€</h5>
            <p class="card-text"><?= htmlspecialchars($chambre['nbLits']) ?> lit</p>
            <p class="card-text"><?= htmlspecialchars($chambre['nbPers']) ?> personne(s)</p>
            <a href="chambre.php?action=detail&id=<?= htmlspecialchars($chambre['numChambre']) ?>" class="btn btn-primary">Détail</a>

            <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == "administrateur"): // Vérifie si l'utilisateur est un admin ?>
                <form method="post" action="chambre.php?action=supprimer&id=<?= htmlspecialchars($chambre['numChambre']) ?>" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette chambre ?');">
                    <button type="submit" class="btn btn-danger mt-2">Supprimer</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>
