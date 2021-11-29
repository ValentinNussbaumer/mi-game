<html>
    <?php

require_once("connect.php");

$username = $_POST['usni'];
$points = $_POST['poi'];

echo '<form id="form" method="post" action="game.php">
<input type="hidden" name="usn" value="'.$_POST['usni'].'">
</form>';

    $add = "INSERT INTO pls (us, po)
    VALUES ('$username', '$points');";
    
    $check = mysqli_query($connect, $add);
if($check){
echo '<script> document.getElementById("form").submit(); </script>';
}
else{
 echo "<script> alert('Daten konnten nicht geladen werden.'); </script>";;
}
?>
</html>