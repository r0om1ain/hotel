<link rel="stylesheet" href="utils/css/style.css">

<h2 class="text-center">Ajouter Chambres</h2>

<div class="d-flex justify-content-center">
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

        <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </form>
</div>

<script src="utils/js/addChbre.js"></script>
