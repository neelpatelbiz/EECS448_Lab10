<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "neelpatel", "eis3Hou4", 
    "neelpatel");
    /* check connection */
    if ($mysqli->connect_errno) {
        echo "<style>
        body, html{
            background-color: rgb(51, 50, 50);
            font-family:sans-serif;
            text-align:center;
            margin-top: 25%;
        }
        p {
            color: red;
        }</style><body><p>Connect failed:  $mysqli->connect_error</p></body>";
        exit();
    }
    $query = 'SELECT * FROM Users';
    if ($result = $mysqli->query($query)) {
        if($result->num_rows > 0){
            echo "<style>
            body, html{
                background-color: rgb(51, 50, 50);
                font-family:sans-serif;
                text-align:center;
                margin-top: 10%;
            }
            p {
                color: green;
            }</style><body>";
            while ($row = $result->fetch_assoc()) {
                echo "<p> {$row['user_id']}</p>";
            }
            echo "</body>";
        }
        else{
            echo "<style>
            body, html{
                background-color: rgb(51, 50, 50);
                font-family:sans-serif;
                text-align:center;
                margin-top: 10%;
            }
            p {
                color: orange;
            }</style><body><p>No users yet.</p></body>";
        }
        $result->free();
    }
    $mysqli->close();
?>