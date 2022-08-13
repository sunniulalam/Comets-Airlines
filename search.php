<?php
    $origin= $_POST['origin'];
    $destination= $_POST['destination'];
    $depart= $_POST['departDate'];
    $arrive= $_POST['arrivalDate'];
    if(empty($origin) && empty($destination) && empty($depart) && empty($arrive)){
        //Everything is empty
        echo "<p>Please make sure at least one field is filled in.</p>";
    }else if(!empty($origin) && empty($destination) && empty($depart) && empty($arrive)){
        //Only Origin 
        $sql= "SELECT * FROM Flights WHERE Origin IS LIKE '%"+$origin+"%'";
    }else if(empty($origin) && !empty($destination) && empty($depart) && empty($arrive)){
        //Only Destination
        $sql= "SELECT * FROM Flights WHERE Destination IS LIKE '%"+$destination+"%'";
    }else if(empty($origin) && empty($destination) && !empty($depart) && empty($arrive)){
        //Only Depart Date
        $sql= "SELECT * FROM Flights WHERE Depart IS LIKE '%"+$depart+"%'";
    }else if(empty($origin) && empty($destination) && empty($depart) && !empty($arrive)){
        //Only Arrival Date
        $sql= "SELECT * FROM Flights WHERE Arrival IS LIKE '%"+$arrive+"%'";
    }else{
        $sql= "SELECT * FROM Flights (WHERE Origin IS LIKE '%"+$origin
                +"%') AND (WHERE Arrival IS LIKE '%"+$arrive
                +"%') AND (WHERE Depart IS LIKE '%"+$depart
                +"%') AND (WHERE Destination IS LIKE '%"+$destination+"%');";
    }
    $conn=mysqli_connect('localhost','root','','flightdb');
    $result= mysqli_query($conn, $sql); 
    if($result== NULL){
        $sql= "SELECT * FROM Flights (WHERE Origin IS LIKE '%"+$origin+"%') OR (WHERE Destination IS LIKE '%"+$destination+"%');";
        $result= mysqli_query($conn, $sql);
        echo $reslut;

    }else{
        echo $result;
    }
?>