<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        /* Style for the background video */
        #bg-video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensure the video covers the entire viewport */
            z-index: -1; /* Place the video behind other content */
            filter: opacity(40%);
        }

        /* Additional styles for typography and color scheme */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        main {
            padding: 20px;
        }

        h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <video autoplay muted loop id="bg-video">
        <source src="videofiles/Rounded_Animation.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    
    <?php
    include 'assets/header.php'; 
    ?>

    <main>
        <div id="about" class="container">
            <h2>About Us</h2>
            <div class="row">
                <div class="col-md-6">
                    <img src="images/logo.png" class="img-fluid rounded" alt="About Us Image">
                </div>
                <div class="col-md-6">
                    <p>
                        At MovieTime Cinema, we believe in the power of storytelling to inspire, entertain, and bring people together. As avid cinephiles, we've always been captivated by the magic of the silver screen and the transformative experience it offers.</p>

                    <p>
                        Founded in 2024, MovieTime Cinema has been a beacon for movie lovers in Pune. Our passion for cinema fuels everything we do, from curating the latest blockbusters to showcasing hidden gems from around the world.</p>
                    <p>
                        But MovieTime Cinema is more than just a movie theater. It's a destination where families, friends, and individuals can escape into the world of imagination and emotion. From the moment you step through our doors, you're greeted with warm hospitality and a dedication to providing the ultimate cinematic experience.</p>
                    <p>
                        Our state-of-the-art facilities boast comfortable seating, crystal-clear sound, and stunning visuals, ensuring that every movie is an immersive journey. Whether you're here for a thrilling action flick, a heartwarming romance, or a laugh-out-loud comedy, we're committed to delivering unforgettable moments that stay with you long after the credits roll.</p>
                    <p> 
                        But our commitment to cinema goes beyond the screen. We're proud to support local filmmakers, host special events, and collaborate with community organizations to enrich the cultural landscape of our city. At MovieTime Cinema, we're not just a theater – we're a hub for creativity, diversity, and the shared love of storytelling.</p>  
                        
                    <p>Join us as we continue to celebrate the magic of cinema, one frame at a time. Welcome to MovieTime Cinema, where every visit is an adventure, and every movie is a masterpiece.</p>
                </div>
            </div>
        </div>
    </main>

    <?php include 'assets/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
