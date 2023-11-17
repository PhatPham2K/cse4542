<!doctype html>
<?php
require 'db.php'; // import "create_connect" function
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Index - PHP Demo</title>
</head>

<body>
    <h2>List of Users</h2>
    <div class="container">
        <a class="btn btn-outline-primary mt-20" href="http://localhost/cse4542/add.php"> Add User</a>
        <a class="btn btn-outline-primary mt-20" href="http://localhost/cse4541/index.php">List of Products</a>
        <table class="table mt-20">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full name</th>
                    <th scope="col">Phone number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Date of register</th>
                    <th scope="col">Type</th>
                    <th scope="col">Status</th>
                    <th scope="col">Function</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = create_connect();
                if (!$conn) {
                    die("Fail!");
                }
                $sql = "SELECT * FROM `cse4542`";
                $results = mysqli_query($conn, $sql);
                if (mysqli_num_rows($results) > 0) {
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($results)) {
                ?>
                        <tr>
                            <th scope="row"><?php echo $i++ ?></th>
                            <td><?php echo $row['fullName'] ?></td>
                            <td><?php echo $row['phoneNumber'] ?></td>
                            <td><?php echo $row['address'] ?></td>
                            <td><?php echo $row['dateOfRegister'] ?></td>
                            <td><?php echo $row['type'] ?></td>
                            <td><?php echo $row['status'] ?></td>
                            <td>
                                <a href="http://localhost/cse4542/edit.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-warning">Edit</a>
                                <button type="button" class="btn btn-outline-danger" onclick="deleteProduct(<?php echo $row['id'] ?>)">Delete</button>
                            </td>
                        </tr>
                <?php
                    } // End of while loop
                } else {
                    echo "No data";
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script type="text/javascript">
        function deleteProduct(id) {
            if (confirm("Are you sure?") == true) {
                window.location.href = "http://localhost/cse4542/delete.php?id=" + id;
            }
        }
    </script>
</body>

</html>