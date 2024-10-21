<?php 
   session_start();
   include("php/config.php");

   // Check if the user is logged in
   if (!isset($_SESSION['valid'])) {
       header("Location: landing page.php");
       exit(); // Ensure no further code runs
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Change Profile</title>n
    <div class="container">
        <div class="box form-box">
            <?php
              if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $id = $_SESSION['id'];

                // Use prepared statement to prevent SQL injection
                $stmt = $con->prepare("UPDATE users SET Username=?, Email=?, Age=? WHERE Id=?");
                $stmt->bind_param("ssii", $username, $email, $age, $id);
                $edit_query = $stmt->execute();

                if ($edit_query) {
                    echo "<div class='message'><p>Profile Updated!</p></div><br>";
                    echo "<a href='landing page.php'><button class='btn'>Go Home</button></a>";
                } else {
                    echo "<div class='message'><p>Error occurred during update.</p></div>";
                }
                $stmt->close(); // Close the prepared statement
              } else {
                $id = $_SESSION['id'];
                $query = mysqli_query($con, "SELECT * FROM users WHERE Id=$id");

                while ($result = mysqli_fetch_assoc($query)) {
                    $res_Uname = $result['Username'];
                    $res_Email = $result['Email'];
                    $res_Age = $result['Age'];
                }
            ?>
            <header>
                Change Profile
            </header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $res_Uname; ?>" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="<?php echo $res_Email; ?>" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" value="<?php echo $res_Age; ?>" autocomplete="off" required>
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Update" required>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>
