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
                <?php /*
                    $conn= mysqli_connect('localhost', 'root', '', 'flightdb');
                    $sql="CREATE TABLE IF NOT EXISTS `booking` 
                            (`bookID` NOT NULL PRIMARY KEY,
                             `flightID` varchar(30) NOT NULL,
                             `passengerID` varchar(30) NOT NULL,
                             `status` varchar(30) NOT NULL);";
                    mysqli_query($conn, $sql); */
                ?>
                <h3>Select Trip Type: </h3>
                <input type="radio" id="one-w" name="trip" value="One-w" onclick="DISP_ONE()">
                <label for="one-w">One way</label>
                <input type="radio" id="round" name="trip" value="Round" onclick="DISP_ROUND()">
                <label for="round">Round Trip</label>
                <div class="book" id="book-one">
                    <form id="one-form">
                        <label for="origin">Origin</label><input type="text" id="origin" name="origin"><br>
                        <label for="dest">Destination</label><input type="text" id="dest" name="dest"><br>
                        <label for="dep">Departure Date</label><input type="date" id="dep" name="dep"><br>
                        <label for="arr">Arrival Date</label><input type="date" id="arr" name="arr">
                    </form>
                </div>
                <div class="book" id="book-round">
                    <form id="round-form">
                        <label for="origin">Origin</label><input type="text" id="origin" name="origin"><br>
                        <label for="dest">Destination</label><input type="text" id="dest" name="dest"><br>
                        <label for="dep">Departure Date</label><input type="date" id="dep" name="dep"><br>
                        <label for="arr">Arrival Date</label><input type="date" id="arr" name="arr"><br>
                        <label for="s-dep">Second Departure Date</label><input type="date" id="s-dep" name="s-dep"><br>
                        <label for="s-arr">Second Arrival Date</label><input type="date" id="s-arr" name="s-arr">
                </div>
                <br><img width="30" height="30" src="images/passenger.png" onclick="DISP_PASS()">
                <div class="book" id="book-pass">
                    <p>
                    <form id="pass-form">
                        <input type="checkbox" name="age" id="adult">Adults</input><input type="number" name="adult" id="adult"><br>
                        <input type="checkbox" name="age" id="child">Children</input><input type="number" name="child" id="child"><br>
                        <input type="checkbox" name="age" id="baby">Infants</input><input type="number" name="infant" id="infant"><br>
                    </form>
                    </p>
                </div>
                <br><button  onclick="BOOKING()">Submit</button>
                <p id="book-js"></p> 
                <h3>Search for a Flight:</h3>
                <form id="search" action="search.php" method="post">
                    <label for="origin">Origin</label><input type="text" id="origin" name="origin"><br>
                    <label for="destination">Destination</label><input type="text" id="destination" name="destination"><br>
                    <label for="departDate">Departure Date</label><input type="text" id="departDate" name="departDate"><br>
                    <label for="arrivalDate">Arrival Date</label><input type="text" id="arrivalDate" name="arrivalDate"><br>
                    <!--<label for="s-dep">Second Departure Date</label><input type="date" id="s-dep" name="s-dep"><br>
                    <label for="s-arr">Second Arrival Date</label><input type="date" id="s-arr" name="s-arr"> -->
                    <input type="submit">
                </form>
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