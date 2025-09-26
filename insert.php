<?php include "db_connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Student</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <nav class="navbar navbar-dark bg-primary mb-4">
    <div class="container">
      <a class="navbar-brand" href="select.php">🎓 Student CRUD</a>
    </div>
  </nav>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-lg border-0">
          <div class="card-body">
            <h3 class="mb-4 text-center text-primary">Add Student</h3>
            <form method="POST" action="">
              <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Course</label>
                <input type="text" name="course" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-primary w-100">Add Student</button>
              <a href="select.php" class="btn btn-secondary w-100 mt-2">Back to List</a>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $course = $_POST['course'];
                $sql = "INSERT INTO students (name,email,course) VALUES ('$name','$email','$course')";
                if ($conn->query($sql)) {
                    echo "<div class='alert alert-success mt-3'>✅ Student added successfully!</div>";
                } else {
                    echo "<div class='alert alert-danger mt-3'>❌ Error: " . $conn->error . "</div>";
                }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
