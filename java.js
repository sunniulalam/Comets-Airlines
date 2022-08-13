function CONT_SUBM(){
    var x= document.getElementById("cont-form");
    var text="";
    if(!(/^[a-zA-Z]+$/).test(x.elements[0].value)){
        document.getElementById("cont-form-js").style.color="red";
        text=text+"First Name must be Alphabetic<br>\n";
    }
    if(!(x.elements[0].value.charAt(0) === x.elements[0].value.charAt(0).toUpperCase())){
        document.getElementById("cont-form-js").style.color="red";
        text=text+"First letter of First Name must be Capitalized<br>";
    }

    if(!(/^[a-zA-Z]+$/).test(x.elements[1].value)){
        document.getElementById("cont-form-js").style.color="red";
        text=text+"Last Name must be Alphabetic<br>\n";
    }
    if(!(x.elements[1].value.charAt(0) === x.elements[1].value.charAt(0).toUpperCase())){
        document.getElementById("cont-form-js").style.color="red";
        text=text+"First letter of Last Name must be Capitalized<br>";
    }
    if((x.elements[0].value === x.elements[1].value)){
        document.getElementById("cont-form-js").style.color="red";
        text=text+"First Name cannot be the same as Last Name<br>";
    }
    if(!(/^(\()?\d{3}(\))?(-|\s)?\d{3}(-|\s)\d{4}$/).test(x.elements[2].value)){
        document.getElementById("cont-form-js").style.color="red";
        text=text+"Phone Number must follow the (XXX)XXX-XXXX format<br>";  
    }
    if(!(x.elements[3].value.includes('@') && x.elements[3].value.includes('.'))){
        document.getElementById("cont-form-js").style.color="red";
        text=text+"Email must contain both @ and .<br>";  
    }
    if(!(document.getElementById("male").checked ||document.getElementById("fem").checked ||document.getElementById("other").checked)){
        document.getElementById("cont-form-js").style.color="red";
        text=text+"Gender must be selected<br>";  
    }
    if(document.getElementById("com").value.length < 10){
        document.getElementById("cont-form-js").style.color="red";
        text=text+"Comment must be more than 10 characters<br>"; 
    }

   document.getElementById("cont-form-js").innerHTML=text;
}
function DISP_ONE(){
    document.getElementById("book-one").style.display="block";
    document.getElementById("book-round").style.display="none";
}
function DISP_ROUND(){
    document.getElementById("book-one").style.display="none";
    document.getElementById("book-round").style.display="block";
}
function DISP_PASS(){
    document.getElementById("book-pass").style.display="block";
}
/*function BOOKING(){
    var x=document.getElementById("book-form");
    var text= "";
    if(document.getElementById("one-w").checked){
        if(!(x.elements[2].value.length==0 || x.elements[3].value.length==0 
            || x.elements[4].value.length==0 || x.elements[5].value.length==0)){
        text="You chose a one way trip from "+x.elements[2].value+ " to "+x.elements[3].value+ " on "
            +x.elements[4].value+" to the "+x.elements[5].value+".";
        }else{
            document.getElementById("book-js").style.color="red";
            text="Please complete all fields.";
        }
    }else if(document.getElementById("round").checked){
        if(!(x.elements[2].value.length==0 || x.elements[3].value.length==0 
            || x.elements[4].value.length==0 || x.elements[5].value.length==0)){
        text="You chose a round trip from "+x.elements[2].value+ " to "+x.elements[3].value+ " on "
            +x.elements[4].value+" to the "+x.elements[5].value+".";
        }else{
            document.getElementById("book-js").style.color="red";
            text="Please complete all fields.";
        }
    }
    document.getElementById("book-js").innerHTML=text;
}*/
function FLIGHT_S(){
    var x=document.getElementById("flight_s-form");
    var text="";
    if((x.elements[0].value.length==0 && x.elements[1].value.length==0 
        && x.elements[2].value.length==0 && x.elements[3].value.length==0)){
        text="Please fill in at least one field."
        document.getElementById("flight_s-js").style.color="red";
        document.getElementById("flight_s-js").innerHTML=text;
    }else{
        text= "On time";
        document.getElementById("flight_s-js").style.color="green";
        document.getElementById("flight_s-js").innerHTML=text;
    }
}