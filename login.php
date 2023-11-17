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

    <title>Login Page</title>
    <style type="text/css">
        .mt-20 {
            margin-top: 50px;
            margin-left: auto;
            margin-right: auto;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
    </style>
</head>

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?> " method="POST">
        <div class="col-md-6 col-md-offset-3">
            <div class="alert alert-secondary">
                <strong>Login Page</strong>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="email">User Name or Email:</label>
                        <input type="text" class="form-control" name="userNameLogin" placeholder="Enter you user name or email...">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" name="passwordLogin" placeholder="Enter Password..." required>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $conn = create_connect();
        if (!$conn) {
            die("Fail!");
        }

        mysqli_set_charset($conn, "utf8");

        $email = $_POST['userNameLogin'];
        $password = $_POST['passwordLogin'];

        $sql = "SELECT * FROM `cse4542` WHERE (email = '$email' OR fullName = '$email') AND password = '$password'";
        if (mysqli_query($conn, $sql)) {


            $sql2 = "SELECT `type` FROM `cse4542` WHERE (email = '$email' OR fullName = '$email')";
            $res = mysqli_query($conn, $sql2);

            $row = mysqli_fetch_assoc($res);

            if ($row['type'] == 'admin') {
                echo "Login Successfully";
                header("refresh:3; url=http://localhost/cse4542/index.php");
            } else {
                header("refresh:3; url=http://localhost/cse4541/index.php");
            }
        } else {
            echo "Login Unsuccessfully";
        }
        mysqli_close($conn);
    }
    ?>
</body>

</html>