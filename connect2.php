<?php
    if(isset($_POST['submit'])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];
        if(!empty($name) && !empty($email) && !empty($message)){

            $link = mysqli_connect("localhost","root", " ","hos");

            if($link === false){
                die("Error: couldn't connect" . mysqli_error());
            }

            $sql = "INSERT INTO contact ('name', 'email', 'message') VALUES ('$name', '$email', '$message')";

            if(mysqli_query($link, $sql)){
                echo "Connection successful";
            }else{
                echo "Error!!";
            }
            mysqli_close($link);
        } else {
            echo "<h1><center>Rewrite!!</center></h1>";
        }
    }
?>
