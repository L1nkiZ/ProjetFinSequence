<div class="col-12">
	<a class="btn btn-primary" href="index.php?page=personne_create">
		<i class="fa-solid fa-circle-plus"></i> Créer une Personne
	</a>
</div>

<div class="col-12 mt-4">
	<table class="table">
		<thead>
			<tr>
				<th>Numéro de Licence</th>
				<th>Nom</th>
				<th>Prénom</th>
                <th>Adresse postale</th>
                <th>Adresse email</th>
                <th>Téléphone</th>
                <th>Sexe</th>
                <th>Taille</th>
                <th>Mineur</th>
                <th>Montant du paiement</th>
				<th class="text-center">Modifier</th>
				<th class="text-center">Supprimer</th>
			</tr>
		</thead>

		<tbody>
			<?php
                $user="SELECT * FROM personne, sexe, taille, responsabilite_legale WHERE personne.id_sexe = sexe.id_sexe AND personne.id_taille = taille.id_taille AND personne.id_personne = paiement.id_personne";
                $select=$bdd->query($user);
				// foreach($personnes as $personne){
			?>
				<tr>
					<td><?php echo $personne['id_personne'];?></td>
                    <td><?php echo $personne['?'];?></td>
					<td><?php echo $personne['nom'];?></td>
					<td><?php echo $personne['prenom'];?></td>
					<td><?php echo $personne['adresse_postale'];?></td>
                    <td><?php echo $personne['adresse_mail'];?></td>
                    <td><?php echo $personne['tel'];?></td>
                    <td><?php echo $sexe['designation_sexe'];?></td>
                    <td><?php echo $taille['designation_taille'];?></td>
                    <td><?php echo $paiement['montant'];?></td>
                    <td><?php echo $taille['designation_taille'];?></td>
					<td class="text-center">
						<a class="btn btn-primary" href="index.php?page=personne_update&id=<?php echo $personne['id_personne'];?>">
							<i class="fas fa-edit"></i>
						</a>
					</td>
					<td class="text-center">
						<a href="index.php?page=personnes&action=delete&id=<?php echo $personne['id_personne'];?>" class="btn btn-danger">
							<i class="fas fa-trash-alt"></i>
						</a>
					</td>
				</tr>
			<?php
				// }
			?>
		</tbody>
	</table>
</div>