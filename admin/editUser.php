<!-- WATCH VIDEO TO MAKE THIS PAGE -->
<?php

$id = $_GET["id"];




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Melanie Methe">
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