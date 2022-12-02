<!--FUNCTIONAL IN TERMS OF CREATING NEW USERS. HOWEVER TO DO LIST:
1. Need to fix "clear" button. Doesn't work anymore.
2. Need to fix error messages. Don't look good as buttons.
3. Need to fix role as well. Doesn't currently make admin on click of Yes radio button. Always sends "on" instead.-->

<?php

$servername = "localhost";
$username = "root";
$databasePasswd = "";
$database = "webassign2";

//Create connection
$connection = new mysqli($servername, $username, $databasePasswd, $database);

$firstName = "";
$lastName = "";
$email = "";
$phone = "";
$userName = "";
$role = "";
$password = "";
$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $userName = $_POST["userName"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $role = $_POST["roleButton"];

    do {
        if (empty($userName) || empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
            $errorMessage = "Username, first and last name, email, and password required";
            break;
        }

        // add new client to database

        $result = $connection -> query("INSERT INTO users (username, firstName, lastName, email, phone, role, password) VALUES ('$userName', '$firstName', '$lastName', '$email', '$phone', '$role', '$password');");

        if (!$result) {
            $errorMessage = "Invalid Query: " . $connection->error;
            break;
        }

        $firstName = "";
        $lastName = "";
        $email = "";
        $phone = "";
        $userName = "";
        $role = "";
        $password = "";

        $successMessage = "User added successfully";
        
        header("location: ./../userManage.php");
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
    <title>Create User</title>
</head>
<body>
    <div>
        <h1>Creating a New User</h1>

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
            <div>
                <label for="userName">Username</label>
                <input type="text" name="userName" value="<?php echo $userName; ?>">
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
                <h4>Admin?</h4>
                <label for="roleButton">Yes</label>
                <input type="radio" name="roleButton">
                <label for="roleButton">No</label>
                <input type="radio" name="roleButton" checked>
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
                <a class="cancel" href="./../userManage.php" role="button">Cancel</a>
            </div>
        </form>
    </div>
    
</body>
</html>