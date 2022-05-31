<div class="col-12">
	<form method="POST" action="index.php?page=match_create&action=create">
        <input type="text" name="date_heure" class="form-control mt-4" placeholder="Date et heure du match" value="<?php echo $matchs['date_heure_match'];?>">
		<input type="text" name="lieu" class="form-control mt-4" placeholder="Lieu du match" value="<?php echo $matchs['lieu'];?>">
        <input type="text" name="equipe1" class="form-control mt-4" placeholder="Nom de l'équipe 1" value="<?php echo $matchs['equipe1'];?>">
        <input type="text" name="equipe2" class="form-control mt-4" placeholder="Nom de l'équipe 2" value="<?php echo $matchs['equipe2'];?>">
        <input type="number" name="score1" class="form-control mt-4" placeholder="Score de l'équipe 1" value="<?php echo $matchs['score1'];?>">
        <input type="number" name="score2" class="form-control mt-4" placeholder="Score de l'équipe 2" value="<?php echo $matchs['score2'];?>">
		<div class="d-flex mt-4">
		<button type="submit" class="btn btn-success me-4">
			<i class="fas fa-save"></i> Enregistrer			
		</button>
		<a href="index.php?page=matchs" class="btn btn-secondary">
			<i class="fa-solid fa-rotate-left"></i> Retour
		</a>
	</form>
</div>