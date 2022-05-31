<div class="col-12">
	<form method="POST" action="index.php?page=personne_create&action=create">
		<input type="text" name="nom" class="form-control mt-4" placeholder="Nom">
		<input type="text" name="prenom" class="form-control mt-4" placeholder="Prénom" value="<?php echo $personne['prenom'];?>">
        <input type="text" name="adresse" class="form-control mt-4" placeholder="Adresse postale" value="<?php echo $personne['adresse_postale'];?>">
		<input type="text" name="email" class="form-control mt-4" placeholder="Email" value="<?php echo $personne['adresse_mail'];?>">
        <input type="number" name="tel" class="form-control mt-4" placeholder="Téléphone" value="<?php echo $personne['tel'];?>">

		<div class="d-flex mt-4">
		<button type="submit" class="btn btn-success me-4">
			<i class="fas fa-save"></i> Enregistrer			
		</button>
		<a href="index.php?page=personnes" class="btn btn-secondary">
			<i class="fa-solid fa-rotate-left"></i> Retour
		</a>
	</form>
</div>