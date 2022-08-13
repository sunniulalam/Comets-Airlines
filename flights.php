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
            <p id="dateTime"></p>
            <script>
                var today= new Date();
                var date= (today.getMonth()+1)+'-'+today.getDate()+'-'+today.getFullYear();
                var time= today.getHours()+":"+(today.getMinutes()<10?'0':'')+today.getMinutes();
                document.getElementById("dateTime").innerHTML=date +"\n"+time;
            </script>
            <input type="button" id="cart" value="My Cart">
            <p id="my-cart"></p>
            <script>
                $(function(){
                    $('#cart').click(function(){
                        $("#my-cart").append('<p>No Flights in cart :(</p>')
                    });
                });
            </script>
        </div>
    </section> 
    <section class= "navigation_bar">
        <nav>
            <div class="nav-links" id="navLinks">
                <ul>
                    <li><a href="./flights.php">FLIGHTS</a></li>
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
            <div class="column left">
            </div>
            <div class="column middle">
                <h1>Flights</h1>
                <input type="button" id="parse" value="Parse XML">
                <?php 
                    $conn= mysqli_connect('localhost', 'root', '', 'flightdb');
                    $sql="CREATE TABLE IF NOT EXISTS `flights` 
                            (`flightId` varchar(30) NOT NULL,
                             `destination` varchar(30) NOT NULL,
                             `departDate` varchar(30) NOT NULL,
                             `departTime` varchar(30) NOT NULL,
                             `arrivalDate` varchar(30) NOT NULL,
                             `arrivalTime` varchar(30) NOT NULL,
                             `price` varchar(30) NOT NULL);";
                    mysqli_query($conn, $sql);
                    $xml=simplexml_load_file("flightlog.xml");
                    foreach ($xml->children() as $row){
                        $flightId=$row->flightId;
                        $origin=$row->origin;
                        $destination=$row->destination;
                        $departDate=$row->departDate;
                        $departTime=$row->departTime;
                        $arrivalDate=$row->arrivalDate;
                        $arrivalTime=$row->arrivalTime;
                        $price=$row->price;
                        $sql="INSERT INTO flights VALUES
                            ('$flightID', '$origin', '$destination', '$departDate', 
                            '$departTime', '$arrivalDate', '$arrivalTime', '$price');";
                        mysqli_query($conn, $sql);
                    }
                ?>
                <table border="1">
                    <thead id="fhead"></thead>
                    <tbody id="ftab">
                    </tbody>
                </table>
                <script>
                    $(function(){$('#parse').click(function(){
                        $('#fhead').append('<tr><td>Origin</td><td>Destination</td> <td>Departure Date</td><td>Departure Time</td><td>Arrival Date</td><td>Arrival Time</td><td>Choose Flight</td></tr>');
                        $('#ftab').empty();
                        $.ajax({
                            type:'GET', url:'flightlog.xml', dataType:'xml', success: function(xml) {
                                $(xml).find('flight').each(function() {
                                    $('#ftab').append(
                                            '<tr><td>'+$(this).find('origin').text()+'</td><td>'
                                                      +$(this).find('destination').text()+'</td><td>'
                                                      +$(this).find('departDate').text()+'</td><td>'
                                                      +$(this).find('departTime').text()+'</td><td>'
                                                      +$(this).find('arrivalDate').text()+'</td><td>'
                                                      + $(this).find('arrivalTime').text()+
                                            '</td><td><input type="radio" id="hi" name="hi"><img width="30" height="30" src="images/cart.png"></td></tr>');
                                });
                            }
                        });
                        /*
                        $('#flightTable tr:last').after('<tr><td>LAX</td><td>DFW</td><td>7-25-2022</td><td>07:05</td><td>7-25-2022</td><td>07:05</td><td><img width="30" height="30" src="images/passenger.png"></td></tr>')
                        $('#flightTable tr:last').after('<tr><td>DFW</td><td>LAX</td><td>7-25-2022</td><td>07:05</td><td>7-25-2022</td><td>07:05</td><td><img width="30" height="30" src="images/passenger.png"></td></tr>')
                        $('#flightTable tr:last').after('<tr><td>LAX</td><td>DFW</td><td>7-25-2022</td><td>07:05</td><td>7-25-2022</td><td>07:05</td><td><img width="30" height="30" src="images/passenger.png"></td></tr>')
                        $('#flightTable tr:last').after('<tr><td>LAX</td><td>DFW</td><td>7-25-2022</td><td>07:05</td><td>7-25-2022</td><td>07:05</td><td><img width="30" height="30" src="images/passenger.png"></td></tr>')
                        $('#flightTable tr:last').after('<tr><td>LAX</td><td>DFW</td><td>7-25-2022</td><td>07:05</td><td>7-25-2022</td><td>07:05</td><td><img width="30" height="30" src="images/passenger.png"></td></tr>')
                        $('#flightTable tr:last').after('<tr><td>LAX</td><td>DFW</td><td>7-25-2022</td><td>07:05</td><td>7-25-2022</td><td>07:05</td><td><img width="30" height="30" src="images/passenger.png"></td></tr>')
                        $('#flightTable tr:last').after('<tr><td>LAX</td><td>DFW</td><td>7-25-2022</td><td>07:05</td><td>7-25-2022</td><td>07:05</td><td><img width="30" height="30" src="images/passenger.png"></td></tr>')
                        $('#flightTable tr:last').after('<tr><td>LAX</td><td>DFW</td><td>7-25-2022</td><td>07:05</td><td>7-25-2022</td><td>07:05</td><td><img width="30" height="30" src="images/passenger.png"></td></tr>')
                        $('#flightTable tr:last').after('<tr><td>LAX</td><td>DFW</td><td>7-25-2022</td><td>07:05</td><td>7-25-2022</td><td>07:05</td><td><img width="30" height="30" src="images/passenger.png"></td></tr>')
                        $('#flightTable tr:last').after('<tr><td>LAX</td><td>DFW</td><td>7-25-2022</td><td>07:05</td><td>7-25-2022</td><td>07:05</td><td><img width="30" height="30" src="images/passenger.png"></td></tr>')*/
                    });
                    });
                </script>
            </div>
            <div class="column right">
            </div>
        </div>
    </section>
    <section class= "footer">
        <h2>Sunniul Alam SXA180118</h2>
        <h3>For any questions or concerns, please visit the Contact page</h3>
        <a href="contact.php" class="hero-btn">Contact</a> 
    </section>
</body>
</html>