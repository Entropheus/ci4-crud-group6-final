<h2>Students</h2>

<a href="/students/create">Add Student</a>

<form method="get" action="/students">
    <input type="text" name="keyword" placeholder="Search name...">
    <button type="submit">Search</button>
</form>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($students as $student): ?>
    <tr>
        <td><?= $student['id'] ?></td>
        <td><?= $student['name'] ?></td>
        <td><?= $student['email'] ?></td>
        <td>
            <a href="/students/edit/<?= $student['id'] ?>">Edit</a>
            <a href="/students/delete/<?= $student['id'] ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?= $pager->links() ?>