<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

<div class="container mt-4">
    <form action="/journals/edit" method="post">
        <input type="hidden" name="id" value="<?= $journals->id ?>">  <!-- ← see puudub! -->
        <label for="name">name:</label>
        <input type="text" id="name" name="name" value="<?= $journals->name ?>"><br><br>
        <label for="date">date:</label>
        <input type="date" id="date" name="date" value="<?= $journals->date ?>"><br><br>
        <input type="submit" class="btn btn-success" value="Submit">
    </form>
    <a href="/journals" class="btn btn-secondary">Tagasi</a>
</div>  