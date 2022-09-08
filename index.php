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

    <div class="contrainer">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered table-striped m-4">
                    <thead>
                        <tr>
                            <th scope="col">S/N</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Course</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>

                    <?php
                    $query = "SELECT * from students";
                    $query_run = mysqli_query($con, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $student) {
                    ?>
                            <tr>
                                <td><?= $student['id']; ?></td>
                                <td><?= $student['name']; ?></td>
                                <td><?= $student['email']; ?></td>
                                <td><?= $student['phone']; ?></td>
                                <td><?= $student['course']; ?></td>
                                <td>
                                    <a href="view.php?id=<?= $student['id']; ?>" class="btn btn-info btn-sm">View</a>
                                    <a href="edit.php?id=<?= $student['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                    <a href="delete.php?id=<?= $student['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo '<h5>No record found.</h5>';
                    }
                    ?>
                </table>
            </div>
            <div class="col-md-6">
                <form action="process.php" method="POST">
                    <div class="mb-3">
                        <input type="text" name="name" placeholder="Name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" placeholder="Email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="phone" placeholder="Phone" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="text" placeholder="Course" name="course" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="save_student" class="btn btn-primary">Save Student</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>