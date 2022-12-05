<!--  Course name: Web Programming (CST_8285_312)
      Assignment 2
      Students: Kristina Shalaginova, Melanie Methe, Banumajan Mohammad
 -->
<!-- Note about editUser.php bug found: admin can make duplicate user names -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Melanie Methe">
    <link rel="stylesheet" href="CSS/admin.css">
    <title>My Pizza Shop Admin Page</title>
</head>
<body>
    <h1>Welcome to My Pizza Shop Admin Page</h1>
    <h2>What would you like to do?</h2>
    <div>
        <a class="adminButtons manageButtons" href="./admin/userManage.php">User Management</a>
    </div>
    <div>
        <a class="adminButtons manageButtons" href="./admin/itemManage.php"> Menu Item Management</a>
    </div>
    <div>
        <a class="adminButtons returnHome" href="./menu.php">Return to My Pizza Shop</a>
    </div>
</body>
</html>