<?php
require 'db.php'; // import "create_connect" function
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Register</title>
    <style type="text/css">
        .mt-20 {
            margin-top: 20px;
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <div class="col-md-6 col-md-offset-3">
        <div class="alert alert-info">
            <strong>Add User</strong>
        </div>
        <div class="container mt-20">
            <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                <div class="form-group">
                    <label for="email">Type your email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Enter your password</label>
                    <input type="text" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="fullName">Enter your name</label>
                    <input type="text" class="form-control" id="fullName" name="fullName">
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Enter your phone number</label>
                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber">
                </div>
                <div class="form-group">
                    <label for="address">address</label>
                    <input type="text" class="form-control" id="address" name="address">
                </div>
                <div class="form-group">
                    <label for="register">Date of Register</label>
                    <input type="datetime-local" class="form-control" id="register" name="dateOfRegister">
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
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <?php
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $conn = create_connect();
                if (!$conn) {
                    die("Fail!");
                }
                mysqli_set_charset($conn, 'utf8');
                $sql = "INSERT INTO `cse4542`(`email`, `password`, `fullName`, `phoneNumber`, `address`, `dateOfRegister`,`type`,
                    `status`) VALUES ('{$_POST['email']}','{$_POST['password']}','{$_POST['fullName']}','{$_POST['phoneNumber']}','{$_POST['address']}','{$_POST['dateOfRegister']}', '{$_POST['type']}','{$_POST['status']}')";

                if (mysqli_query($conn, $sql)) {
                    echo "Inserted successfully";
                    header("refresh:1; url=http://localhost/cse4542/index.php");
                } else {
                    echo "error";
                }
                mysqli_close($conn);
            }
            ?>
        </div>
    </div>
</body>

</html>