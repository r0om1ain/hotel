<head>
    <link rel="stylesheet" type="text/css" href="utils/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">
</head>

<h2 class="text-center">Liste des Chambres</h2>

<?php if (isset($_GET['message'])): ?>
    <div class="alert alert-success" role="alert">
        <?= htmlspecialchars($_GET['message']) ?>
    </div>
<?php endif; ?>

<div class="row justify-content-center">
    <?php foreach ($chambres as $chambre): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img class="card-img-top img-fluid mx-auto d-block" style="width: 300px; height: 300px; object-fit: cover;" src="utils/img/<?= htmlspecialchars($chambre['image']) ?>" alt="Image de la chambre">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h5 class="card-title text-center"><?= htmlspecialchars($chambre['prix']) ?>€</h5>
                    <p class="card-text text-center"><?= htmlspecialchars($chambre['nbLits']) ?> lit</p>
                    <p class="card-text text-center"><?= htmlspecialchars($chambre['nbPers']) ?> personne(s)</p>
                    <div class="mt-auto btn-container">
                        <a href="chambre.php?action=detail&id=<?= htmlspecialchars($chambre['numChambre']) ?>" class="btn btn-primary">Détail</a>

                        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == "administrateur"): ?>
                            <form method="post" action="chambre.php?action=supprimer&id=<?= htmlspecialchars($chambre['numChambre']) ?>" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette chambre ?');">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>