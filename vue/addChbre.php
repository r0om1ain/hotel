<h2 class="text-center">Ajouter Chambres</h2>

<form method="post" action="" enctype="multipart/form-data" name="addChambreForm" id="addChambreForm" onsubmit="return validateForm();">
    <div class="form-group">
        <label for="">Prix</label>
        <input type="text" class="form-control" name="prix" required>
    </div>

    <div class="form-group">
        <label for="">Nombre lits</label>
        <input type="text" class="form-control" name="nbLits" required>
    </div>

    <div class="form-group">
        <label for="">Capacité</label>
        <input type="text" class="form-control" name="nbPers" required>
    </div>

    <div class="form-group">
        <label for="">Photo</label>
        <input type="file" accept="image/*" class="form-control" name="image">
    </div>

    <div class="form-group">
        <label for="">Description</label>
        <textarea name="description" id="" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
</form>

<!-- Inclusion du fichier JavaScript de validation -->
<script src="utils/js/addChbre.js"></script>
