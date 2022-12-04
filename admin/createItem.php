<?php

$servername = "localhost";
$username = "root";
$databasePasswd = "";
$database = "webassign2";

//Create connection
$connection = new mysqli($servername, $username, $databasePasswd, $database);

$image = "";
$name = "";
$category = "";
$description = "";
$size = "";
$price = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $image = $_POST["image"];
    $name = $_POST["name"];;
    $category = $_POST["category"];;
    $description = $_POST["description"];;
    $size = $_POST["size"];;
    $price = $_POST["price"];;


    do {
        if (empty($name) || empty($category) || empty($description) || empty($size) || empty($price)) {
            $errorMessage = "Name, Category, Description, Size, and Price required";
            break;
        }

        // add new client to database

        $result = $connection -> query("INSERT INTO items (image, name, category, description, size, price) VALUES ('$image', '$name', '$category', '$description', '$size', '$price');");

        if (!$result) {
            $errorMessage = "Invalid Query: " . $connection->error;
            break;
        }

        $image = "";
        $name = "";
        $category = "";
        $description = "";
        $size = "";
        $price = "";

        $successMessage = "Item added successfully";
        
        header("location: ./itemManage.php");
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
    <title>Create Item</title>
</head>
<body>
    <div>
        <h1>Creating a New Menu Item</h1>

        <?php
        if ( !empty($errorMessage)) {
            echo "
            <div class='errorMessage' role='alert'>
                <button type='button' class='buttonError' data-bs-dismiss='alert'>$errorMessage</button>
            </div>
            ";
        }
        ?>
        <form action="" method="POST">
            <div>
                <label for="image">Image</label>
                <input type="text" name="image" value="<?php echo $image; ?>">
            </div>
            <div>
                <label for="name">Item Name</label>
                <input type="text" name="name" value="<?php echo $name; ?>">
            </div>
            <div>
                <label for="category">Category</label>
                <input type="text" name="category" value="<?php echo $category; ?>">
            </div>
            <div>
                <label for="description">Description</label>
                <input type="text" name="description" value="<?php echo $description; ?>">
            </div>
            <div>
                <label for="size">Size</label>
                <input type="text" name="size" value="<?php echo $size; ?>">
            </div>
            <div>
                <label for="price">Price</label>
                <input type="text" name="price" value="<?php echo $price; ?>">
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
                <a class="cancel" href="./itemManage.php" role="button">Cancel</a>
            </div>
        </form>
    </div>
    
</body>
</html>