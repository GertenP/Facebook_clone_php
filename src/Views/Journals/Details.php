<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

<div class="container mt-4">
    <h1><?= $journals->name ?></h1>
    <p><strong>Kuupäev:</strong> <?= $journals->date ?></p>
    <a href="/journals" class="btn btn-secondary">Tagasi</a>
</div>