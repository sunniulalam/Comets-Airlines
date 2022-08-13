<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <script type="text/javascript" src="java.js"></script>
    <script src="jquery-3.6.0.min.js"></script>
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
    <section class="contact-content">
        <div class="row">
            <div class="column left"></div>
            <div class="column middle">
                <h1>Submit A Request</h1>
                <form id="cont-form">
                    <label for="fname">First Name:</label><input type="text" id="fname" name="fname"><br>
                    <label for="lname">Last Name:</label><input type="text" id="lname" name="lname"><br>
                    <label for="num">Phone Number:</label><input type="text" id="num" name="num"><br>
                    <label for="email">Email Address:</label><input type="text" id="email" name="email"><br>
                    <p>Gender:
                    <input type="radio" id="male" name="gender" value="Male">
                    <label for="male">Male</label>
                    <input type="radio" id="fem" name="gender" value="Female">
                    <label for="fem">Female</label>
                    <input type="radio" id="other" name="gender" value="Other">
                    <label for="other">Other</label></p>
                    <!--<label for="com">Comment:<br></label><input style="height:200px; width:100%; font-size:11pt;" type="textarea" id="com" name="Comment"><br>-->
                    <label for="com">Comments:<br><textarea id="com" name="Comment" style="resize:none; height:200px; width:30%;"></textarea><br></label>
                    <input type="submit" value="Submit" onclick="CONT_SUBM()">
                    <input type="button" value="Create JSON Object" id="jsonBtn">
                </form> 
                <p id="cont-form-js"></p>
            </div>
            <script>
                var text= "";
                let fname= document.querySelector("#fname");
                let lname= document.querySelector("#lname");
                let num= document.querySelector("#num");
                let email= document.querySelector("#email");
                let male= document.querySelector("#mail");
                let fem= document.querySelector("#fem");
                let other= document.querySelector("#other");
                let com= document.querySelector("#com");
                document.querySelector("#jsonBtn").addEventListener("click", (e)=> {
                    e.preventDefault();
                    if(!(/^[a-zA-Z]+$/).test(fname.value)){
                        text="First Name must be Alphabetic";
                    }else if(!(fname.value.charAt(0) === fname.value.charAt(0).toUpperCase())){
                        text="First letter of First Name must be Capitalized";
                    }else if(!(/^[a-zA-Z]+$/).test(lname.value)){
                        text="Last Name must be Alphabetic";
                    }else if(!(lname.value.charAt(0) === lname.value.charAt(0).toUpperCase())){
                        text="First letter of Last Name must be Capitalized";
                    }else if((fname.value === lname.value)){
                        text="First Name cannot be the same as Last Name";
                    }else if(!(/^(\()?\d{3}(\))?(-|\s)?\d{3}(-|\s)\d{4}$/).test(num.value)){
                        text="Phone Number must follow the (XXX)XXX-XXXX format";  
                    }else if(!(email.value.includes('@') && email.value.includes('.'))){
                        text="Email must contain both @ and .";  
                    }else if(com.value.length < 10){
                        text="Comment must be more than 10 characters"; 
                    }else{
                        let JavascriptObject={
                            First: fname.value, Last: lname.value, Phone: num.value, Email: email.value, 
                            Gender: document.querySelector('input[name="gender"]:checked').value, Comment: com.value 
                        };
                        
                        let JO= JSON.stringify(JavascriptObject);
                        text="JSON Object has been created";
                    }
                    alert(text);
                });
            </script>
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