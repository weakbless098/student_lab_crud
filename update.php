<?php include "db_connect.php";

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM students WHERE id=$id");
$student = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "UPDATE students SET name='$name', email='$email', course='$course' WHERE id=$id";
    if ($conn->query($sql)) {
        header("Location: select.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Student</title>
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
            <h3 class="mb-4 text-center text-primary">Edit Student</h3>
            <form method="POST">
              <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" value="<?= $student['name'] ?>" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= $student['email'] ?>" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Course</label>
                <input type="text" name="course" class="form-control" value="<?= $student['course'] ?>" required>
              </div>
              <button type="submit" class="btn btn-primary w-100">Update</button>
              <a href="select.php" class="btn btn-secondary w-100 mt-2">Back</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
