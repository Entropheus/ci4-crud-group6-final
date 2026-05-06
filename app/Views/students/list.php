<!DOCTYPE html>
<html>
<head>
    <title>Students</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

<h2 class="mb-3">Students</h2>

<!-- ADD BUTTON -->
<a href="/students/create" class="btn btn-primary mb-3">Add Student</a>

<!-- SEARCH FORM -->
<form method="get" action="/students" class="mb-3 d-flex">
    <input type="text" name="keyword" class="form-control me-2" placeholder="Search name...">
    <button type="submit" class="btn btn-success">Search</button>
</form>

<!-- TABLE -->
<table class="table table-bordered table-striped">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>

    <?php if (!empty($students)): ?>
        <?php foreach ($students as $student): ?>
        <tr>
            <td><?= $student['id'] ?></td>
            <td><?= $student['name'] ?></td>
            <td><?= $student['email'] ?></td>
            <td>
                <a href="/students/edit/<?= $student['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="/students/delete/<?= $student['id'] ?>" class="btn btn-danger btn-sm"
                   onclick="return confirm('Delete this student?')">
                   Delete
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="4" class="text-center">No students found</td>
        </tr>
    <?php endif; ?>

</table>

<!-- PAGINATION -->
<div class="mt-3">
    <?= $pager->links() ?>
</div>

</body>
</html>