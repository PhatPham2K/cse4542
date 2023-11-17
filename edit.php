<?php
require 'db.php';
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Edit User</title>
    <style type="text/css">
        .mt-20 {
            margin-top: 20px;
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <h1>Edit User</h1>
    <?php
    if (isset($_GET['id'])) {
        $conn = create_connect();
        if (!$conn) {
            die("Fail!");
        }
        $id = $_GET['id'];
        mysqli_set_charset($conn, "utf8");
        $sql = "SELECT * FROM `cse4542` WHERE id = " . $id;
        $results = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($results);

    ?>
        <div class="container mt-20">
            <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                <div class="form-group">
                    <label for="email">Type your email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?php if (isset($row['email'])) echo $row['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="password">Enter your password</label>
                    <input type="Password" class="form-control" id="password" name="password" value="<?php if (isset($row['password'])) echo $row['password'] ?>">
                </div>
                <div class="form-group">
                    <label for="fullName">Enter your name</label>
                    <input type="text" class="form-control" id="fullName" name="fullName" value="<?php if (isset($row['fullName'])) echo $row['fullName'] ?>">
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Enter your phone number</label>
                    <input type="text" class="form-control" name="phoneNumber" value="<?php if (isset($row['phoneNumber'])) echo $row['phoneNumber'] ?>">
                </div>
                <div class="form-group">
                    <label for="address">address</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php if (isset($row['address'])) echo $row['address'] ?>">
                </div>
                <div class="form-group">
                    <label for="register">Date of Register</label>
                    <input type="datetime-local" class="form-control" id="register" name="register" value="<?php if (isset($row['dateOfRegister'])) echo $row['dateOfRegister'] ?>">
                </div>
                <select class="form-select" name="type">
                    <option value="admin" <?php if (isset($row['type']) && $row['type'] == 'admin') echo 'selected="selected"'; ?>>admin</option>
                    <option value="author" <?php if (isset($row['type']) && $row['type'] == 'author') echo 'selected="selected"'; ?>>author</option>
                    <option value="guest" <?php if (isset($row['type']) && $row['type'] == 'guest') echo 'selected="selected"'; ?>>guest</option>
                </select>
                <select id="status" name="status">
                    <option value="activated" <?php if (isset($row['status']) && $row['status'] == 'activated') echo 'selected="selected"'; ?>>Activated</option>
                    <option value="disabled" <?php if (isset($row['status']) && $row['status'] == 'disabled') echo 'selected="selected"'; ?>>Disabled</option>
                </select>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        <?php
        mysqli_close($conn);
    }
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $conn = create_connect();
        if (!$conn) {
            die("Fail!");
        }

        mysqli_set_charset($conn, "utf8");

        $id = $_POST['id'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $fullName = $_POST['fullName'];
        $phoneNumber = $_POST['phoneNumber'];
        $address = $_POST['address'];
        $dateOfRegister = $_POST['register']; //get from name of input
        $type = $_POST['type'];
        $status = $_POST['status'];

        $sql =
            "UPDATE 
                  `cse4542`
                  SET 
                    `email`='{$email}',
                    `password`='{$password}',
                    `fullName`='{$fullName}',
                    `phoneNumber`='{$phoneNumber}',
                    `address`='{$address}',
                    `dateOfRegister`='{$dateOfRegister}',
                    `type`='{$type}',
                    `status`='{$status}'
                  WHERE id = {$id}";

        if (mysqli_query($conn, $sql)) {
            echo "Update Successfully";
            header("refresh:3; url =http://localhost/cse4542/index.php");
        } else {
            echo "Update Unsuccessfully";
        }
        mysqli_close($conn);
    }

        ?>

        </div>
</body>

</html>