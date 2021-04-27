<?php
    if(isset($_POST['username'])){
        $mysqli = new mysqli("mysql.eecs.ku.edu", "neelpatel", "eis3Hou4", 
        "neelpatel");
        /* check connection */
        if ($mysqli->connect_errno) {
            echo "<style>
            body, html{
                background-color: rgb(51, 50, 50);
                font-family:sans-serif;
                text-align:center;
                margin-top: 10%;
            }</style><body><p>Connect failed:  $mysqli->connect_error</p></body>";
            exit();
        }
        $user = $_POST['username'];
        $query = "INSERT INTO Users (user_id) VALUES ('$user')";
        if ($mysqli->query($query)) {
            /* fetch associative array */
            echo "<style>
            body, html{
                background-color: rgb(51, 50, 50);
                font-family:sans-serif;
                text-align:center;
                margin-top: 10%;
            }
            p {
                color: green;
            }
                </style><body><p>User Added: $user </p></body>";
        }
        else{
            echo "<style>
            body, html{
                background-color: rgb(51, 50, 50);
                font-family:sans-serif;
                text-align:center;
                margin-top: 10%;
            }</style><body><p>User Addition Unsuccessful! </p></body>";
        }
        $mysqli->close();

        
    }
    
?>
