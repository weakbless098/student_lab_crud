<?php include "db_connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <nav class="navbar navbar-dark bg-primary mb-4">
    <div class="container">
      <a class="navbar-brand" href="select.php">🎓 Student CRUD</a>
    </div>
  </nav>

  <div class="container">
    <div class="card shadow-lg border-0">
      <div class="card-body">
        <h3 class="mb-3 text-center text-primary">Student List</h3>
        <div class="d-flex justify-content-end mb-3">
          <a href="insert.php" class="btn btn-success">+ Add New Student</a>
        </div>
        <table class="table table-bordered table-hover text-center">
          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Course</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $result = $conn->query("SELECT * FROM students");
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()):
            ?>
            <tr>
              <td><?= $row['id'] ?></td>
              <td><?= $row['name'] ?></td>
              <td><?= $row['email'] ?></td>
              <td><?= $row['course'] ?></td>
              <td>
                <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">✏ Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
                   onclick="return confirm('Are you sure you want to delete this student?');">🗑 Delete</a>
              </td>
            </tr>
            <?php endwhile; } else { ?>
            <tr><td colspan="5">No students found.</td></tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
