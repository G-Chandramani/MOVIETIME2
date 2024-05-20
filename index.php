
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
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
            /* filter: blur(40px); */
            filter: opacity(40%);
            
        }
        <style>
/* Footer */
/* footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
} */

        /* Adjustments for responsiveness */
 

        .info {
            margin-bottom: 20px; /* Add margin for separation */
        }

        .description {
            margin-top: 50px; /* Add margin for separation */
        }

        #booknowbutton {
            margin-top: 50px; /* Add margin for separation */
            text-align: center; /* Center the button */
        }

        /* Adjust button size for smaller screens */
        .cta {
            font-size: 24px;
            padding: 15px 35px;
        }

        /* Responsive adjustments for smaller screens */
        @media (max-width: 576px) {
            .description .left,
            .description .right {
                width: 100%; /* Make description sections full width on smaller screens */
                margin-bottom: 30px; /* Add margin for separation */
            }
        }
        h1,h3,p{
            color: black;
        }
       #extr_carousel{
        padding-top: 10px;
       }
       .txt{
        text-align: left;
        align-items: center; 
        justify-content: center;
       }
       .info {
            margin-bottom: 20px;
        }

        .description {
            margin-top: 50px;
        }

        #booknowbutton {
            margin-top: 50px;
            text-align: center;
        }

        .cta {
            font-size: 24px;
            padding: 15px 35px;
        }

        @media (max-width: 576px) {
            .description .left,
            .description .right {
                width: 100%;
                margin-bottom: 30px;
                text-align: center; /* Center text on smaller screens */
            }

            .description.txt {
                flex-direction: column; /* Stack elements vertically on smaller screens */
            }

            .description.txt .left,
            .description.txt .right {
                margin: 0 auto 20px; /* Center images and text vertically with spacing */
            }
        }
    </style>
</head>
<body>
   
    

    <!-- Background video -->
    <video autoplay muted loop id="bg-video">
        <source src="videofiles/Rounded_Animation.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

     <!-- Loading Header Section -->
     <?php
     include 'assets/header.php'; 
    ?>
       
        
        <!-- <h1 style="text-align: center; padding: 20px"><b style="color:#ff6b6b;">WELCOME TO MOVIE TIME</b></h1> -->

    
        <?php
     include 'assets/carousel.php'; 
    ?>
        <!-- Show Description Section -->
        <div class="show-description">
            <!-- Content goes here -->
            <div class="container">
                <div class="description txt">
                    <div class="left">
                        <img src="images/1stpage1.jpg" alt="Image 1">
                    </div>
                    <div class="right ">
                        <h3>Take Home a Piece of the Kingdom</h3>
                        <p>See Kingdom of the Planet of the Apes in theatres and add to your artifact collection with this collectible vessel and hidden keychain. Comes with a large popcorn!</p>
                    </div>
                    
                </div>
                <div class="description txt">
                    <div class="right">
                        <h3>A Fire Extinguisher May Be Required</h3>
                        <p>Try THE SPICY STUNTMAN and embrace the inferno at MacGuffins Bar®! Enjoy Patrón Silver mixed with hot jalapeño syrup and finished with sweet citrus when you see THE FALL GUY, now showing.</p>
                    </div>
                    <div class="left">
                        <img src="images/2ndfist.avif" alt="Image 2">
                    </div>
                    
                </div>
                <div class="description txt">
                    <div class="right">
                        <img src="images/3rdfist.avif" alt="Image 3">
                    </div>
                    <div class="left">
                        <h3>Say Hello to a Friendly Favorite</h3>
                        <p>Slurp up a delicious frozen drink when you buy a Big Blue Raspberry or Red Cherry Blossom ICEE® and see IF, in theatres 5/17.</p>
                    </div>
                   
                </div>
                <div class="description txt">
                    <div class="right">
                        <h3>Movies Are Better with Rewards</h3>
                        <p>Enjoy Discount Tuesdays ticket savings, $5 rewards, free large popcorn refills, and many other valuable benefits. Become an AMC Stubs Insider™ now and make your next movie visit more rewarding.<p>
                    </div>
                    <div class="left">
                        <img src="images/rewardsfist.jpg" alt="Image 2">
                    </div>
                    
                </div>
            </div>
        </div>

        <div id="booknowbutton">
            <!-- <button class="button-49" role="button" onclick="window.location.href='movies.html'">BOOK NOW</button> -->

            <div class="wrapper">
                <a class="cta" href="movies.php">
                    <span>BOOK NOW</span>
                    <span>
                        <svg width="66px" height="43px" viewBox="0 0 66 43" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="arrow" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <path class="one" d="M40.1543933,3.89485454 L43.9763149,0.139296592 C44.1708311,-0.0518420739 44.4826329,-0.0518571125 44.6771675,0.139262789 L65.6916134,20.7848311 C66.0855801,21.1718824 66.0911863,21.8050225 65.704135,22.1989893 C65.7000188,22.2031791 65.6958657,22.2073326 65.6916762,22.2114492 L44.677098,42.8607841 C44.4825957,43.0519059 44.1708242,43.0519358 43.9762853,42.8608513 L40.1545186,39.1069479 C39.9575152,38.9134427 39.9546793,38.5968729 40.1481845,38.3998695 C40.1502893,38.3977268 40.1524132,38.395603 40.1545562,38.3934985 L56.9937789,21.8567812 C57.1908028,21.6632968 57.193672,21.3467273 57.0001876,21.1497035 C56.9980647,21.1475418 56.9959223,21.1453995 56.9937605,21.1432767 L40.1545208,4.60825197 C39.9574869,4.41477773 39.9546013,4.09820839 40.1480756,3.90117456 C40.1501626,3.89904911 40.1522686,3.89694235 40.1543933,3.89485454 Z" fill="#FFFFFF"></path>
                                <path class="two" d="M20.1543933,3.89485454 L23.9763149,0.139296592 C24.1708311,-0.0518420739 24.4826329,-0.0518571125 24.6771675,0.139262789 L45.6916134,20.7848311 C46.0855801,21.1718824 46.0911863,21.8050225 45.704135,22.1989893 C45.7000188,22.2031791 45.6958657,22.2073326 45.6916762,22.2114492 L24.677098,42.8607841 C24.4825957,43.0519059 24.1708242,43.0519358 23.9762853,42.8608513 L20.1545186,39.1069479 C19.9575152,38.9134427 19.9546793,38.5968729 20.1481845,38.3998695 C20.1502893,38.3977268 20.1524132,38.395603 20.1545562,38.3934985 L36.9937789,21.8567812 C37.1908028,21.6632968 37.193672,21.3467273 37.0001876,21.1497035 C36.9980647,21.1475418 36.9959223,21.1453995 36.9937605,21.1432767 L20.1545208,4.60825197 C19.9574869,4.41477773 19.9546013,4.09820839 20.1480756,3.90117456 C20.1501626,3.89904911 20.1522686,3.89694235 20.1543933,3.89485454 Z" fill="#FFFFFF"></path>
                                 <path class="three" d="M0.154393339,3.89485454 L3.97631488,0.139296592 C4.17083111,-0.0518420739 4.48263286,-0.0518571125 4.67716753,0.139262789 L25.6916134,20.7848311 C26.0855801,21.1718824 26.0911863,21.8050225 25.704135,22.1989893 C25.7000188,22.2031791 25.6958657,22.2073326 25.6916762,22.2114492 L4.67709797,42.8607841 C4.48259567,43.0519059 4.17082418,43.0519358 3.97628526,42.8608513 L0.154518591,39.1069479 C-0.0424848215,38.9134427 -0.0453206733,38.5968729 0.148184538,38.3998695 C0.150289256,38.3977268 0.152413239,38.395603 0.154556228,38.3934985 L16.9937789,21.8567812 C17.1908028,21.6632968 17.193672,21.3467273 17.0001876,21.1497035 C16.9980647,21.1475418 16.9959223,21.1453995 16.9937605,21.1432767 L0.15452076,4.60825197 C-0.0425130651,4.41477773 -0.0453986756,4.09820839 0.148075568,3.90117456 C0.150162624,3.89904911 0.152268631,3.89694235 0.154393339,3.89485454 Z" fill="#FFFFFF"></path>
                            </g>
                        </svg>
                    </span> 
                </a>
            </div>
        </div>
    </main>

    <?php
     include 'assets/footer.php'; 
    ?>

    <!-- JavaScript files -->
    <script src="js/header_carousel_footer.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
