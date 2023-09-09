<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="registration.php" method="post">
        <?php
        if (isset($_POST["register"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confirm_password = $_POST["confirm_password"];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $errors = array();

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Email is not a valid email address");
            }
            if (strlen($password) < 8) {
                array_push($errors, "Password must be at least 6 characters");
            }
            if ($password !== $confirm_password) {
                array_push($errors, "Passwords do not match");
            }

            if (count($errors)>0) {
                foreach ($errors as $error) {
                    echo $error . "<br>";
                }
            } else {
                require_once ('database.php');
                $sql = "INSERT INTO users (email, password) VALUES ( ?, ?)";
                $stmt = mysqli_stmt_init()
            }
        }
        ?>
        <div class="form-group">
            <input type="email" name="email" class="email" placeholder="Email Address" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="password" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="confirm_password" class="confirm_password" placeholder="Confirm Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="register" class="register">Register</button>
        </div>
    </form>
</body>
</html>