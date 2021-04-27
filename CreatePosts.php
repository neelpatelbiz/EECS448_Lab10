<?php
    if(isset($_POST['post']) && isset($_POST['uid'])){
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
            }
            p {
                color: red;
            }</style><body><p>Connect failed:  $mysqli->connect_error</p></body>";
            exit();
        }
        $uname = $_POST['uid'];
        $content = $_POST['post'];
        $query = "INSERT INTO Posts (content, author_id) VALUES ('$content', '$uname')";
        if ($mysqli->query($query)) {
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
                </style><body><p>Post Successful</p></body>";
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
                color: red;
            }</style><body><p>No account for $uname </p></body>";
        }
        $mysqli->close();

        
    }
    
?>