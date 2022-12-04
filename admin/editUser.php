<!-- EditUser page now fully functional! -->
<?php

$servername = "localhost";
$username = "root";
$databasePasswd = "";
$database = "webassign2";

//Create connection
$connection = new mysqli($servername, $username, $databasePasswd, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

//initating variables
$id = "";
$firstName = "";
$lastName = "";
$email = "";
$phone = "";
$userName = "";
$role = "";
$password = "";

$errorMessage = "";
$successMessage = "";

//retrieving id value
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
   
    if ( !isset($_GET["id"])) {
        header("location: ./userManage.php");
        exit;
    }
    $id = $_GET["id"];
    $result = $connection->query("SELECT * FROM webassign2.users WHERE id = $id;");
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: ./userManage.php");
        exit;
    }

    $userName = $row["username"];
    $firstName = $row["firstName"];
    $lastName = $row["lastName"];
    $email = $row["email"];
    $phone = $row["phone"];
    $password = $row["password"];
    $role = $row["role"];

} else {

    $id = $_POST["id"];
    $userName = $_POST["username"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    do {
        if (empty($userName) || empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
            $errorMessage = "Username, first and last name, email, and password required";
            break;
        }

        $result = $connection->query("UPDATE webassign2.users SET username = '$userName', firstName = '$firstName', lastName = '$lastName', email = '$email', phone = '$phone', password = '$password', role = '$role' WHERE id = '$id';");

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $successMessage = "User updated successfully";

        header("location: ./userManage.php");
        exit;

    } while (false);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Melanie Methe">
    <link rel="stylesheet" href="./../CSS/assignment2.css">
    <title>Edit User</title>
</head>
<body>
    <div>
        <h1>Edit a User</h1>

        <?php
        if ( !empty($errorMessage)) {
            echo "
            <div class='errorMessage' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='buttonError' data-bs-dismiss='alert'></button>
            </div>
            ";
        }
        ?>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" value="<?php echo $userName; ?>">
            </div>
            <div>
                <label for="firstName">First Name</label>
                <input type="text" name="firstName" value="<?php echo $firstName; ?>">
            </div>
            <div>
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" value="<?php echo $lastName; ?>">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" value="<?php echo $email; ?>">
            </div>
            <div>
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" value="<?php echo $phone; ?>">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" value="<?php echo $password; ?>">
            </div>
            <div>
                <label for="role">Role</label>
                <input type="text" name="role" value="<?php echo $role; ?>">
            </div>
            <?php
                if ( !empty($successMessage)) {
                    echo "
                    <div class='errorMessage' role='alert'>
                        <button type='button' class='buttonError' data-bs-dismiss='alert'>$successMessage</button>
                    </div>
                    ";
                }
            ?>
            <div>
                <button type="submit">Submit</button>
                <button type="reset">Clear</button>
                <a class="cancel" href="./userManage.php" role="button">Cancel</a>
            </div>
        </form>
    </div>
    
</body>
</html>