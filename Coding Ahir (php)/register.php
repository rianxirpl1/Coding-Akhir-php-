<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">

            <?php
            include("php/config.php");

            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $password = $_POST['password'];

                // Verifying the unique email
                $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");
                
                if (mysqli_num_rows($verify_query) != 0) {
                    echo "<div class='message'>
                        <p>This email is already used, try another one, please!</p>
                    </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>"; // Fixed missing closing </a> tag
                } else {
                    // Insert user data without password hashing
                    $stmt = mysqli_prepare($con, "INSERT INTO users (Username, Email, Age, Password) VALUES (?, ?, ?, ?)");
                    mysqli_stmt_bind_param($stmt, "ssis", $username, $email, $age, $password);

                    if (mysqli_stmt_execute($stmt)) {
                        echo "<div class='message'>
                            <p>Registration successful!</p>
                        </div> <br>";
                        echo "<a href='login.php'><button class='btn'>Login Now</button></a>";
                    } else {
                        echo "<div class='message'>
                            <p>Error occurred during registration. Please try again.</p>
                        </div> <br>";
                        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
                    }

                    // Close the statement
                    mysqli_stmt_close($stmt);
                }
            } else {
            ?>

            <header>
                Sign Up
            </header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    <p>Already have an account? <a href="index.php">Sign In</a></p>
                </div>
            </form>

        </div>
        <?php } ?>
    </div>
</body>
</html>
