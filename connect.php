<?php
    $fullName = $_POST['fulName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $educationLevel = $_POST['educationLevel'];
    $country = $_POST['country'];
    $bio = $_POST['bio'];
    $major = $_POST['major'];
    

    /// database connection

    $conn = new mysqli('localhost', 'root','','hisuccess');
    if ($conn->connect_error){
        echo "$conn->connect_error";
        die('connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration(fullName, email, phone, educationLevel, country, major, bio') values(?,?,?,?,?,?,?");
        $stmt->bind_param("ssissss", $fullName, $email, $phone, $educationLevel, $country, $major, $bio )
        $execval = $stmt->execute();
        echo $execval;
        echo "registration successfull...";
        $stmt->close();
        $conn->close();
    }
?>