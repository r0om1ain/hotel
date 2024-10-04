<h2 class="text-center">Liste des Réservations</h2>

<?php if (isset($_GET['message'])): ?>
    <div class="alert alert-success" role="alert">
        <?= htmlspecialchars($_GET['message']) ?>
    </div>
<?php endif; ?>

<?php if (!empty($reservations)): ?>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date d'arrivée</th>
                <th>Date de départ</th>
                <th>Numéro de chambre</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $reservation): ?>
                <tr>
                    <td><?= htmlspecialchars($reservation['nom']) ?></td>
                    <td><?= htmlspecialchars($reservation['prenom']) ?></td>
                    <td><?= htmlspecialchars($reservation['dateArrivee']) ?></td>
                    <td><?= htmlspecialchars($reservation['dateDepart']) ?></td>
                    <td><?= htmlspecialchars($reservation['numChambre']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucune réservation trouvée.</p>
<?php endif; ?>
