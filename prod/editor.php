<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-12">
			<h2>Modifier la recherche :</h2>
			<form action="index.php" method="post">
				<div class="form-group">
					<label for="prix-achat">Prix d'achat du bien :</label>
					<input type="number" class="form-control" id="prix-achat" name="prix-achat" placeholder="Indiquer le prix d'achat" required value="<?= $data['prix-achat'] ?>">
				</div>
				<div class="form-group">
					<label for="taux">Taux :</label>
					<input type="text" class="form-control" id="taux" name="taux" placeholder="Indiquer le taux" value="1.37" value="<?= $data['taux'] ?>">
				</div>
				<div class="form-group">
					<label for="loyer">Loyer :</label>
					<input type="number" class="form-control" id="loyer" name="loyer" placeholder="Indiquer le loyer annuel" value="<?= $data['loyer'] ?>">
				</div>
				<div class="form-group">
					<label for="charges">Charges :</label>
					<input type="number" class="form-control" id="charges" name="charges" placeholder="Indiquer les charges annuelles" value="<?= $data['charges'] ?>">
				</div>
				<div class="form-group">
					<label for="foncier">Foncier :</label>
					<input type="number" class="form-control" id="foncier" name="foncier" placeholder="Indiquer la taxe foncière annuelle" value="<?= $data['foncier'] ?>">
				</div>
				<div class="form-group">
					<label for="travaux">Travaux :</label>
					<input type="number" class="form-control" id="travaux" name="travaux" placeholder="Indiquer si il y a des travaux" value="<?= $data['travaux'] ?>">
				</div>
				<div class="form-group">
					<label for="duree">Durée du prêt</label>
					<select name="duree" class="form-control" id="duree" value="<?= $data['duree'] ?>">
						<option value="20">20 ans</option>
						<option value="25">25 ans</option>
					</select>
				</div>
				<button type="submit" class="btn btn-primary mb-2"><i class="fas fa-calculator"></i> Calculer</button>
			</form>
		</div>
	</div>
</div>