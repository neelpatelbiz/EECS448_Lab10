<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "neelpatel", "eis3Hou4", "neelpatel");
    if ($mysqli->connect_errno) {
        echo "<style>
        body, html{
            background-color: rgb(51, 50, 50);
            font-family:sans-serif;
            text-align:center;
        }
        p {
            color: red;
        }
        </style><body><p>Connect failed:  $mysqli->connect_error</p></body>";
        exit();
    }
    echo "<style>
                body, html{
                    background-color: rgb(51, 50, 50);
                    font-family:sans-serif;
                    text-align:center;
                }
                p {
                    color: red;
                }
                li {
                    color: white;
                    font-family: Helvetica, Arial;
                    font-size: 25px;
                }</style><body><p>Removed:<p><ul>";
    if(!empty($_POST['postArr'])){
        foreach($_POST['postArr'] as $remove){
            $query = "DELETE FROM Posts WHERE post_id=$remove";
            if($mysqli->query($query)){
                echo "<li>Removed Post: $remove</li>";
            }
            else{
                echo "<li style=\"color:red\">Failed to remove: $remove</li>";
            }
            
        }
        echo "</ul><body>";
    }
    $mysqli->close();
?>