<?php
include 'components\dbconnect.php';
$id = $_GET['id'];

$showAlret = false;
$showError = false;

$query = "SELECT * FROM `users` WHERE `user_id` = '$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['editUser'])) {
    $userid= $row['user_id'];
    $userName = $_POST['username'];
    $password = $_POST['password'];


    // Add WHERE clause to ensure you update the correct item
    $sql = "UPDATE `users` SET `username`='$userName', `password`='$password' WHERE `user_id`='$userid'";

    $result1 = mysqli_query($conn, $sql);

    if ($result1) {
        $showAlret = true;
    } else {
        $showError = 'Something went wrong';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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

    <div class="header">
        <?php
        if ($showAlret) {
            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Successfully Created Your Account </strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> ';
        }
        if ($showError) {
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> ' . $showError . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        ?>
    </div>

    <nav class="navbar" style="background: #EC6509;">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <!-- Logo -->
            <a class="navbar-brand" href="adminHome.php"><img src="image/logo.png" alt="Logo" style="height: 30px;"></a>

            <!-- Centered Title with Icon -->
            <span class="mx-auto fs-5 fw-bold text-white d-flex align-items-center gap-4">
                <button onclick="goBack()" class="btn btn-transparent border-0" style="margin-left: -5rem;"><i
                        class="lni lni-shift-left" style="font-size: 20px; color: #fff;"></i> </button><!-- Icon -->
                <span>Edit User</span> <!-- Text -->
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . '?id=' . $id); ?>" method="post">
            <div class="form-outline form-white mb-3 fs-4">
                <label class="form-label" for="branchName">Branch Name</label>
                <input type="text" class="form-control border-2 rounded-3" name="username" placeholder="Add branch name"
                    style="border-color: #EC6509; height: 60px;" value="<?php echo $row['username'] ?>">
            </div>

            <div class="form-outline form-white mb-3 fs-4">
                <label class="form-label" for="sellingPrice">Password</label>
                <input type="text" class="form-control border-2 rounded-3" name="password" placeholder="Add password"
                    style="border-color: #EC6509; height: 60px;" value="<?php echo $row['password'] ?>"> 
            </div>

            <div class="text-center mt-5">
                <button name="editUser" type="submit" class="btn btn-warning fw-semibold border-dark fs-5"
                    style="background-color: #EC6509; width: 40%;">Submit</button>
            </div>
        </form>
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