<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "neelpatel", "eis3Hou4", "neelpatel");
    /* check connection */
    if(isset($_POST['users'])){
        $user = $_POST['users'];
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
        $query = "SELECT post_id, content FROM Posts WHERE author_id='$user'";
        if($result = $mysqli->query($query)){
            if($result->num_rows == 0){
                echo "<style>
                body, html{
                    background-color: rgb(51, 50, 50);
                    font-family:sans-serif;
                    text-align:center;
                    margin-top: 25%;
                }
                p {
                    color: orange;
                }</style><body><p>No Posts Yet.</p></body>";
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
                    color: green;
                }
                table{
                    border: 1px solid black;
                    horizontal-align: center;
                    margin-left:auto;
                    margin-right:auto;
                }
                th, td {
                    padding: 10px;
                    border: 1px solid black;
                }</style><body><table>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr> <td>{$row['post_id']}</td> <td>{$row['content']}</td></tr>";
                }
                echo "</table></body>";
            }
            $result->free();
        }
        $mysqli->close();
    }   

?>