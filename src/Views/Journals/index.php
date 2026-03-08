<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<h1>Simple PHP MVC!</h1>

<?php include 'Create.php' ?>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($journals as $journal) : ?>
    <tr>
      <th scope="row"><?= $journal->id ?></th>
      <td><?= $journal->name ?></td>
      <td><?= $journal->date ?></td>
      <td><a href="/journals/details?id=<?= $journal->id ?>" class="btn btn-primary btn-sm">Detail</a></td>
      <td><a href="/journals/edit?id=<?= $journal->id ?>" class="btn btn-primary btn-sm">Edit</a></td>
      <td><a href="/journals/delete?id=<?= $journal->id ?>" class="btn btn-primary btn-sm">Delete</a></td>
    </tr>
     <?php endforeach; ?>

  </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>