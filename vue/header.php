<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Creepster&display=swap"> <!-- Importation de la police -->
    <link rel="stylesheet" href="utils/css/style.css">
    <title>Document</title>
</head>
<body>

    <header class="p-4 bg-secondary mb-3">
        <h1 class="text-center"><a href="." class="text-warning text-decoration-none">Gestion Hôtellerie</a></h1>

        <?php if (isset($_SESSION['user'])): ?>
            <?php if ($_SESSION['user']['role'] == "administrateur"): ?>
                <a href="chambre.php?action=ajouter" class="btn btn-success">Ajouter</a>
            <?php endif; ?>
            <a href="reservation.php?action=lister" class="btn btn-success">Liste Réservations</a>
            <a href="fonction.php?action=logout" class="btn btn-success">Déconnexion</a>
        <?php else: ?>
            <a href="vue/connexion.php" class="btn btn-success">Connexion</a>
        <?php endif; ?>
    </header>

</body>
</html>
