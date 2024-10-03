function validateForm() {
  // Récupérer les valeurs des champs du formulaire
  const prix = document.querySelector('input[name="prix"]').value;
  const nbLits = document.querySelector('input[name="nbLits"]').value;
  const nbPers = document.querySelector('input[name="nbPers"]').value;

  // Vérification du prix (entre 50 et 250)
  if (prix < 50 || prix > 250) {
    alert("Le prix doit être compris entre 50 et 250.");
    return false; // Empêche la soumission
  }

  // Vérification du nombre de personnes (entre 1 et 4)
  if (nbPers < 1 || nbPers > 4) {
    alert("Le nombre de personnes doit être compris entre 1 et 4.");
    return false; // Empêche la soumission
  }

  // Vérification du nombre de lits (doit être 2)
  if (nbLits != 2) {
    alert("Le nombre de lits doit être fixé à 2.");
    return false; // Empêche la soumission
  }

  // Si toutes les validations passent
  return true; // Permet la soumission
}
