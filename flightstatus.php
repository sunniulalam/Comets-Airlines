<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <script type="text/javascript" src="java.js"></script>
    <script type="text/javascript" src="jquery-3.6.0.min.js"></script>
    <title>Comet Airlines</title>
    <link rel="shortcut icon" href="images/icon.png">
    <link rel="stylesheet" href="mystyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <section class="header">
        <div class="head">
            <a href="register.php" style="color:white;background:#d37e0e;"><b>REGISTER</b></a>
            <h1>
                COMET AIRLINES
            </h1>
            <p>
                Fly with the comets!
            </p>
            <p id="date-time"></p>
            <script>
                var today= new Date();
                var date= (today.getMonth()+1)+'-'+today.getDate()+'-'+today.getFullYear();
                var time= today.getHours()+":"+(today.getMinutes()<10?'0':'')+today.getMinutes();
                document.getElementById("date-time").innerHTML=date +"\n"+time;
            </script>
        </div>
    </section> 
    <section class= "navigation_bar">
        <nav>
            <div class="nav-links" id="navLinks">
                <ul>
                    <li><a href="flights.php">FLIGHTS</a></li>
                    <li><a href="book.php">BOOK</a></li>
                    <li><a href="flightstatus.php">FLIGHT STATUS</a></li>
                    <li><a href="specialoffers.php">SPECIAL OFFERS</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                </ul>
            </div>
        </nav>
    </section>
    <section class="content">
        <div class="row">
            <div class="column left"></div>
            <div class="column middle">
                <h1>My Trips</h1>
                <?php 
                    $serv="localhost";
                    $user="root";
                    $pass="";
                    $db="flightdb";
                    $conn= new mysqli($serv, $user, $pass, $db);
                    $sql= "SELECT * FROM booking (WHERE user.passengerID = passengerID);";
                    $result= mysqli_query($conn, $sql);
                    echo $result;
                ?>
            </div>
            <div class="column right"></div>
        </div>
    </section>
    <section class= "footer">
        <h2>Sunniul Alam SXA180118</h2>
        <h3>For any questions or concerns, please visit the Contact page</h3>
        <a href="contact.php" class="hero-btn">Contact</a> 
    </section>
</body>
</html>