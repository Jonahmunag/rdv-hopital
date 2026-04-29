<!DOCTYPE html>
<html>
<head>
<title>Ajouter RDV</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
<h2 class="text-center text-success">Ajouter un rendez-vous</h2>

<form method="POST" class="card p-4 shadow">

<div class="mb-3">
<label>Nom du patient</label>
<input type="text" name="nom" class="form-control" required>
</div>

<div class="mb-3">
<label>Médecin</label>
<input type="text" name="medecin" class="form-control" required>
</div>

<div class="mb-3">
<label>Date</label>
<input type="date" name="date" class="form-control" required>
</div>

<div class="mb-3">
<label>Heure</label>
<input type="time" name="heure" class="form-control" required>
</div>

<button class="btn btn-success w-100">Enregistrer</button>

</form>
</div>

</body>
</html>