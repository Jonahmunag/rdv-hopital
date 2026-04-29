<!DOCTYPE html>
<html>
<head>
<title>Rendez-vous</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<h2 class="text-center text-primary">Gestion des rendez-vous</h2>

<?php if(isset($_GET['msg'])): ?>
<div class="alert alert-success">
    <?= $_GET['msg'] ?>
</div>

<form method="GET" action="index" class="mb-3 d-flex">
    <input type="text" name="search" class="form-control me-2"
           placeholder="Rechercher par nom du patient">

    <button class="btn btn-primary">Rechercher</button>

    <a href="index" class="btn btn-secondary ms-2">Reset</a>
</form>

<?php endif; ?>

<a href="create" class="btn btn-success mb-3">➕ Ajouter un RDV</a>

<table class="table table-bordered table-striped text-center">
<tr class="table-dark">
<th>ID</th>
<th>Patient</th>
<th>Médecin</th>
<th>Date</th>
<th>Heure</th>
<th>Actions</th>
</tr>

<?php foreach($rdvs as $r): ?>
<tr>
<td><?= $r['id'] ?></td>
<td><?= $r['nom_patient'] ?></td>
<td><?= $r['medecin'] ?></td>
<td><?= $r['date_rdv'] ?></td>
<td><?= $r['heure_rdv'] ?></td>
<td>
<a href="edit/<?= $r['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>

<a href="delete/<?= $r['id'] ?>" 
   class="btn btn-danger btn-sm"
   onclick="return confirm('Supprimer ?')">Supprimer</a>
</td>
</tr>
<?php endforeach; ?>

</table>

</div>
</body>
</html>