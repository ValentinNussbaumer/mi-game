 <?php 
$host_name = ''; //enter host
$user_name = ''; //enter username
$password = ''; //enter password
$database = ''; //enter database

$connect = mysqli_connect($host_name, $user_name, $password, $database);
mysqli_query($connect, "SET NAMES 'utf8'");

if (!$connect) {
    echo "<script> alert('Es konnte keine Verbindung zum Server hergestellt werden.'); </script>";
}

?>