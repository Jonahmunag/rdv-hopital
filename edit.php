<!DOCTYPE html>
<html>
<head>
<title>Modifier RDV</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
<h2 class="text-center text-warning">Modifier rendez-vous</h2>

<form method="POST" class="card p-4 shadow">

<div class="mb-3">
<label>Nom du patient</label>
<input type="text" name="nom" value="<?= $rdv['nom_patient'] ?>" class="form-control">
</div>

<div class="mb-3">
<label>Médecin</label>
<input type="text" name="medecin" value="<?= $rdv['medecin'] ?>" class="form-control">
</div>

<div class="mb-3">
<label>Date</label>
<input type="date" name="date" value="<?= $rdv['date_rdv'] ?>" class="form-control">
</div>

<div class="mb-3">
<label>Heure</label>
<input type="time" name="heure" value="<?= $rdv['heure_rdv'] ?>" class="form-control">
</div>

<button class="btn btn-warning w-100">Modifier</button>

</form>
</div>

</body>
</html>