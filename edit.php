<?php
require "dbcon.php"
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css">
    <title>Apex</title>
</head>

<body>
    
    <?php include 'nav.php' ?>

    <?php
    if (isset($_GET['id'])) {
        $student_id = mysqli_real_escape_string($con, $_GET['id']);
        $query = "SELECT * from students WHERE id = '$student_id' ";
        $query_run = mysqli_query($con, $query);
        if (mysqli_num_rows($query_run) > 0) {
            $student = mysqli_fetch_array($query_run);
    ?>
            <form action="process.php" method="POST">
                <input type="hidded" name="student_id" value="<?= $student["id"]; ?>">
                <div class="mb-3">
                    <label>Student Name</label>
                    <input type="text" name="name" value="<?= $student["name"]; ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Student Email</label>
                    <input type="email" name="email" value="<?= $student["email"]; ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Student Phone</label>
                    <input type="text" name="phone" value="<?= $student["phone"]; ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Course</label>
                    <input type="text" name="course" value="<?= $student["course"]; ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="submit" name="update_student" class="btn btn-primary">Update</button>
                </div>
            </form>
    <?php
        } else {
            echo "<h4>No record found</h4>";
        }
    }

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>