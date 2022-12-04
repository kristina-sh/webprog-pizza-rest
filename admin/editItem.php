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
$image = "";
$name = "";
$category = "";
$description = "";
$size = "";
$price = "";

$errorMessage = "";
$successMessage = "";

//retrieving id value
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
   
    if ( !isset($_GET["id"])) {
        header("location: ./itemManage.php");
        exit;
    }
    $id = $_GET["id"];
    $result = $connection->query("SELECT * FROM webassign2.items WHERE id = $id;");
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: ./itemManage.php");
        exit;
    }
    $image = $row["image"];
    $name = $row["name"];
    $category = $row["category"];
    $description = $row["description"];
    $size = $row["size"];
    $price = $row["price"];

} else {

    $id = $_POST["id"];
    $image = $_POST["image"];
    $name = $_POST["name"];
    $category = $_POST["category"];
    $description = $_POST["description"];
    $size = $_POST["size"];
    $price = $_POST["price"];


    do {
        if (empty($name) || empty($category) || empty($size) || empty($price)) {
            $errorMessage = "Name, Category, Size, and Price required";
            break;
        }

        $result = $connection->query("UPDATE webassign2.items SET name = '$name', image = '$image', category = '$category', description = '$description', size= '$size', price = '$price' WHERE id = '$id';");

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $successMessage = "Item updated successfully";

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
    <title>Edit Item</title>
</head>
<body>
    <div>
        <h1>Edit a Menu Item</h1>

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
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div>
                <label for="name">Item Name</label>
                <input type="text" name="name" value="<?php echo $name; ?>">
            </div>
            <div>
                <label for="image">Image Link</label>
                <input type="text" name="image" value="<?php echo $image; ?>">
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