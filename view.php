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
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label><?= $student["name"]; ?></label>
                        </div>
                        <div class="mb-3">
                            <label><?= $student["email"]; ?></label>
                        </div>
                        <div class="mb-3">
                            <label><?= $student["phone"]; ?></label>
                        </div>
                        <div class="mb-3">
                            <label><?= $student["course"]; ?></label>
                        </div>
                    </div>
                </div>
            </div>

    <?php
        } else {
            echo "<h4>No record found</h4>";
        }
    }

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>