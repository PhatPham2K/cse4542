
<?php
require 'db.php';

if (isset($_GET['id'])) {
    $conn = create_connect();
    if (!$conn) {
        die("Fail!");
    }
    $id = $_GET['id'];
    $sql = "DELETE FROM `cse4542` WHERE id = " . $id;
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: http://localhost/cse4542/index.php");
}
?>
