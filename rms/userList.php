<?php

include 'components/dbconnect.php'; // Include your database connection

$sql = "SELECT * FROM users ORDER BY user_id ASC";
$result = mysqli_query($conn, $sql);

if (isset($_POST['delete'])) {
    include('components/dbConnect.php');
    $del_id = $_POST['idToDelete'];
    $sql2 = "DELETE FROM `users` WHERE user_id = $del_id";
    if (mysqli_query($conn, $sql2)) {
        header('Location: userList.php');
    } else {
        echo "Error!" . mysqli_error($conn);
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineicons.css">

    <style>
        body {
            height: max-content;
            font-family: Inria serif;
        }


        .container-custom {
            padding: 20px;
        }

        input:focus,
        .form-control:focus {


            outline: none;
            box-shadow: none;


        }
    </style>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</head>

<body>

    

    <nav class="navbar" style="background: #EC6509;">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <!-- Logo -->
            <a class="navbar-brand" href="adminHome.php"><img src="image/logo.png" alt="Logo" style="height: 30px;"></a>

            <!-- Centered Title with Icon -->
            <span class="mx-auto fs-5 fw-bold text-white d-flex align-items-center gap-4">
                <button onclick="goBack()" class="btn btn-transparent border-0" style="margin-left: -5rem;"><i
                        class="lni lni-shift-left" style="font-size: 20px; color: #fff;"></i> </button><!-- Icon -->
                <span>Add User</span> <!-- Text -->
            </span>

            <!-- Toggler for menu -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#logout"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation"
                style="box-shadow: none;">
                <img src="image/nav.png" alt="Menu" style="width: 20px; height: 20px;">
            </button>

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="logout">
                <ul class="navbar-nav" style="float: inline-end;">
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-semibold" href="signout.php">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container container-custom mt-3 ">
    <?php
        while ($row = mysqli_fetch_assoc($result)) {
            // echo "<li><a href='view.php?id={$row['m_id']}'>{$row['m_name']}</a></li>";
        
        ?>
        <div class="card text mb-3 rounded-3" style="width: 100%; background-color: #FF964F;">

            <div class="card-body ">

                <div class="row">
                    <div class="col-12 col-sm-6">
                        <p class="card-title fw-semibold"><?php echo $row['username'] ?></p>
                        <p class="card-text fw-semibold">Branch Id: <span><?php echo $row['user_id'] ?></span></p>
                    </div>

                    <div class="col-12 col-sm-6 d-flex justify-content-end align-items-center">
                        <a href="editUser.php?id=<?php echo $row['user_id'] ?>" name="edit" class="btn btn-success me-2" style="background-color:#5C9E31;">
                            Edit
                        </a>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <input type="hidden" name="idToDelete" value="<?php echo $row['user_id'] ?>">
                            <button type="submit" name="delete" class="btn btn-warning text-white" style="background: #EC6509;">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>


            </div>

        </div>
        <?php } ?>
    </div>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>


        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa"
            crossorigin="anonymous"></script>
</body>

</html>