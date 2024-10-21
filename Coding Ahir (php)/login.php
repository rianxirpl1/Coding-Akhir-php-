<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php
              include("php/config.php");

              // Check if cookie exists to autofill the email and password
              if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
                  $saved_email = $_COOKIE['email'];
                  $saved_password = $_COOKIE['password']; // You should store and check hashed passwords
              } else {
                  $saved_email = '';
                  $saved_password = '';
              }

              if(isset($_POST['submit'])){
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $password = mysqli_real_escape_string($con, $_POST['password']);

                // Password hashing example (for future improvement)
                // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $result = mysqli_query($con, "SELECT * FROM users WHERE Email='$email'") or die("Select error");
                $row = mysqli_fetch_assoc($result);

                // Check if row is not empty and password matches (use password_verify for hashed passwords)
                if(is_array($row) && !empty($row) && $row['Password'] == $password) {
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['age'] = $row['Age'];
                    $_SESSION['id'] = $row['Id'];

                    // Check if "Remember Me" is checked
                    if (isset($_POST['remember'])) {
                        // Set cookies to remember email and password (consider hashing the password)
                        setcookie('email', $email, time() + (86400 * 30), "/"); // 30 days
                        setcookie('password', $password, time() + (86400 * 30), "/"); // 30 days
                    } else {
                        // Clear cookies if "Remember Me" is not checked
                        if (isset($_COOKIE['email'])) {
                            setcookie('email', '', time() - 3600, "/");
                        }
                        if (isset($_COOKIE['password'])) {
                            setcookie('password', '', time() - 3600, "/");
                        }
                    }

                    header("Location: landing page.php");
                    exit();
                } else {
                    echo "<div class='message'>
                        <p>Wrong Username or Password</p>
                        </div> <br>";
                    echo "<a href='login.php'><button class='btn'>Go Back</button></a>";
                }
              } else {
            ?>
            <header>
                Login
            </header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $saved_email; ?>" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value="<?php echo $saved_password; ?>" required>
                </div>
                <div class="cookie">
                    <input type="checkbox" name="remember" id="remember" <?php if ($saved_email) echo 'checked'; ?>> Remember Me
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>  
                <div class="links">
                    <p>Don't have an account? <a href="register.php">Sign up</a></p>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>
