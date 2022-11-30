<!--NOTE TO SELF: GOTTA ADD PHP ELEMENTS (AT AROUND 16MIN MARK OF VIDEO)-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../CSS/assignment2.css">
    <title>Create User</title>
</head>
<body>
    <div>
        <h1>Creating a New User</h1>
        <form action="" method="POST">
            <div>
                <label for="userName">Username</label>
                <input type="text" name="userName">
            </div>
            <div>
                <label for="firstName">First Name</label>
                <input type="text" name="firstName">
            </div>
            <div>
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="text" name="email">
            </div>
            <div>
                <label for="phone">Phone Number</label>
                <input type="text" name="phone">
            </div>
            <div>
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password">
            </div>
            <div>
                <h4>Admin?</h4>
                <label for="roleButton">Yes</label>
                <input type="radio" name="roleButton">
                <label for="roleButton">No</label>
                <input type="radio" name="roleButton">
            </div>
            <div>
                <button type="submit">Submit</button>
                <button type="reset">Clear</button>
                <a class="cancel" href="./../userManage.php" role="button">Cancel</a>
            </div>
        </form>
    </div>
    
</body>
</html>