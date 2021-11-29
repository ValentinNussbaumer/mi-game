<html>
<?php
include("connect.php");

$sql = "SELECT * FROM pls ORDER BY po DESC";
$result = mysqli_query($connect, $sql);
 

 
 ?>
    <head>
        <title>Ranking</title>
        <style>
            body{
                font-family: arial;
                margin:0px;
                text-align: center;
                background-color: black;
                color:white;
            }
            table{
                width:100vw;
            }
            th{
                background-color: rgb(54, 54, 54);
                color:rgb(223, 223, 223);
                padding:10px;
                width:33.333vw;
            }
            td{
                background-color: rgb(131, 131, 131);
                color:rgb(255, 255, 255);
                text-align: center;
                padding:5px;
            }
        
            

        </style>
    </head>

    <body>
        <br>
        <h1>RANGLISTE</h1>
<table>
    <tr>
        <th>Platz</th>
        <th>Punkte</th>
        <th>Username</th>
    </tr>
    <?php
    $rank = 1;
    while($dsatz = mysqli_fetch_assoc($result)){
        echo '<tr>
        <td>'.$rank.'</td>
        <td>'.$dsatz['po'].'</td>
        <td>'.$dsatz['us'].'</td>
        </tr>'; 
        $rank = $rank + 1; }
    ?>
</table>
    </body>
</html>