<div class="col-12">
	<a class="btn btn-primary" href="index.php?page=match_create">
		<i class="fa-solid fa-circle-plus"></i> Créer un Match
	</a>
</div>

<div class="col-12 mt-4">
	<table class="table">
		<thead>
			<tr>
				<th>Date et heure du match</th>
				<th>Lieu</th>
				<th>Equipe 1</th>
                <th>Equipe 2</th>
                <th>Score de l'équipe 1</th>
                <th>Score de l'équipe 2</th>
				<th class="text-center">Modifier</th>
				<th class="text-center">Supprimer</th>
			</tr>
		</thead>

		<tbody>
			<?php
				foreach($matchs as $match){
			?>
				<tr>
					<td><?php echo $matchs['date_heure_match'];?></td>
                    <td><?php echo $matchs['lieu'];?></td>
					<td><?php echo $matchs['equipe1'];?></td>
					<td><?php echo $matchs['equipe2'];?></td>
					<td><?php echo $matchs['score1'];?></td>
                    <td><?php echo $matchs['score2'];?></td>
					<td class="text-center">
						<a class="btn btn-primary" href="index.php?page=match_update&id=<?php echo $matchs['id_match'];?>">
							<i class="fas fa-edit"></i>
						</a>
					</td>
					<td class="text-center">
						<a href="index.php?page=match&action=delete&id=<?php echo $matchs['id_match'];?>" class="btn btn-danger">
							<i class="fas fa-trash-alt"></i>
						</a>
					</td>
				</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</div>