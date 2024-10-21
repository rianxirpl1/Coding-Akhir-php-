<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['valid'])) {
    // If the session is not valid, redirect to the login page
    header("Location: login.php");
    exit(); // Stop further script execution
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Document</title>
</head>
<body>
    
    <header class="navbar">
        <div class="logo">
            <img src="photo/Furniture 1.png" alt="Logo">
        </div> 
        <div class="menu-icon" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul class="ul_text">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li class="dropdown">
                <a href="#">Services</a>
                <ul class="dropdown-content">
                <li>
                       <a href="edit.php">Change Profile</a>
                </li>
                    <li><a href="php/logout.php">Logout</a></li>  
                </ul>
            </li>
        </ul> 
    </header>

    <!-- Rest of your HTML structure remains the same -->
    <script>
function toggleMenu() {
    document.querySelector('.ul_text').classList.toggle('active');
}
</script>
    <div class="container">
        <div class="bg_img"></div>
            <div class="box_pink">
                <div class="text_box">
                    <p>New Arrival</p>
                    <h2>Discover Our New Collection</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates molestiae a facilis,</p>
                    <div class="search">
                    <input type="text" class="search-input" placeholder="Search...">
                    <button class="search-button">Search</button>
                </div>
                </div>
                <div class="img-2">
                    <img src="photo/It's back! The Range chair that caused a shopping frenzy last year is now available in navy 1.png" alt="">
                </div>
            </div>
    <section class="part-2">
        <div class="text_2">
            <h2>Inspiration Collection</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.  </p>
        </div>
        <div class="img_flex">
            <a href=""><img src="photo/Mask Group (1).png" alt=""></a>
            <a href=""><img src="photo/Mask.png" alt=""></a>
            <a href=""><img src="photo/Contemporary Plastic Arm Chair Slat Back Kitchen Dining Room Chair Green-2 Piece Set 1.png" alt=""></a>
        </div>
    </section> 
     <section class="part-3">
            <div class="text-three">
                <h2>lorem</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus sint autem odit placeat deserunt eveniet minus minima quisquam, quasi consequatur eaque optio. Quisquam dolorum maxime perferendis obcaecati voluptates aliquid eligendi?</p>     
            </div>
            <div class="img-three">
                                <img src="photo/Mask Group.png" alt="woman hold flower">
                            </div>
        </section>
    </div>
    <section class="part-6">
        <div class="text_2">
            <h2>Inspiration Collection</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.  </p>
        </div>
        <div class="img_flex">
           
            <a href=""><img src="photo/Mask Group (1).png" alt="">
            <p class="text-img"><b>Dining</b></p></a>
            <a href=""><img src="photo/Mask.png" alt=""><p class="text-img"><b>Living</b></p></a>
            <a href=""><img src="photo/Contemporary Plastic Arm Chair Slat Back Kitchen Dining Room Chair Green-2 Piece Set 1.png" alt=""><p class="text-img"><b>Working</b></p></a>
        
      
        </div>
    </section> 
    <section class="part-4">
        <div class="text-four">
            <h2>lorem</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus sint autem odit placeat deserunt eveniet minus minima quisquam,<br>s quasi consequatur eaque optio. Quisquam dolorum maxime perferendis obcaecati voluptates aliquid eligendi?</p>     
        </div>
        <footer>
    <section class="part-5">
        <div class="text-five">
            <div class="bar">
                <h3><b>Beauty Care</b></h3>
            <ul>
                <li>Loren</li>
                <li>Loren</li>
                <li>Loren</li>
                <li><b>Loren</b></li>
            </ul>
        </div>
        <div class="right">
        <h3>
            Instagram Shop
        </h3>
        <div class="img-flex-1">
            <img src="photo/IG-1.jpg" alt="">
            <img src="photo/IG-2.jpg" alt="">
            <img src="photo/IG-3.jpg" alt="">
            <img src="photo/IG-4.jpg" alt="">
        </div>
    </div>
        </div>

    </section>
    </footer>
</body>
</html>