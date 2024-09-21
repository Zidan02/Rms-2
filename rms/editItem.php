<?php
include 'components\dbconnect.php';
$id = $_GET['id'];

$showAlret = false;
$showError = false;

$query = "SELECT * FROM `item` WHERE `item_id` = '$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['editItem'])) {
    $itemCode = $_POST['itemCode'];
    $itemName = $_POST['itemName'];
    $unit = $_POST['unit'];
    $sellingPrice = $_POST['sellingPrice'];

    // Add WHERE clause to ensure you update the correct item
    $sql = "UPDATE `item` SET `item_name`='$itemName', `unit`='$unit', `price`='$sellingPrice' WHERE `item_id`='$itemCode'";

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
    <title>Edit Item</title>
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
            <strong>Updated Successfully </strong>
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
            <a class="navbar-brand" href="userHome.php"><img src="image/logo.png" alt="Logo" style="height: 30px;"></a>

            <!-- Centered Title with Icon -->
            <span class="mx-auto fs-5 fw-bold text-white d-flex align-items-center gap-4">
                <button onclick="goBack()" class="btn btn-transparent border-0" style="margin-left: -5rem;"><i
                        class="lni lni-shift-left" style="font-size: 20px; color: #fff;"></i> </button><!-- Icon -->
                <span>Edit Item</span> <!-- Text -->
            </span>

            <!-- Toggler for menu -->
            <a href="cart.html" class="btn btn-transparent border-0" style="box-shadow: none;">
                <img src="image/cart.png" alt="Menu" style="width: 20px; height: 20px;">
            </a>
        </div>
    </nav>
    <div class="container container-custom mt-3">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . '?id=' . $id); ?>" method="POST">
            <div class="form-outline form-white mb-3 fs-4">
                <label class="form-label" for="itemCode">Item Code</label>
                <input type="text" class="form-control border-2 rounded-3" name="itemCode" placeholder="update item code"
                    style="border-color: #EC6509; height: 60px;" value="<?php echo $row['item_id'] ?>" required>
            </div>
            <div class="form-outline form-white mb-3 fs-4">
                <label class="form-label" for="itemName">Item Name</label>
                <input type="text" class="form-control border-2 rounded-3" name="itemName" placeholder="update item name"
                    style="border-color: #EC6509; height: 60px;" value="<?php echo $row['item_name'] ?>" required>
            </div>
            <div class="form-outline form-white mb-3 fs-4">
                <label class="form-label" for="unit">Unit</label>
                <input type="text" class="form-control border-2 rounded-3" name="unit" placeholder="update unit (gm)"
                    style="border-color: #EC6509; height: 60px;" value="<?php echo $row['unit'] ?>" required>
            </div>
            <div class="form-outline form-white mb-3 fs-4">
                <label class="form-label" for="sellingPrice">Selling price</label>
                <input type="text" class="form-control border-2 rounded-3" name="sellingPrice"
                    placeholder="update selling price" style="border-color: #EC6509; height: 60px;" value="<?php echo $row['price'] ?>" required>
            </div>
            <div class="text-center mt-5">
                <button name="editItem" type="submit" class="btn btn-warning fw-semibold border-dark fs-5"
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