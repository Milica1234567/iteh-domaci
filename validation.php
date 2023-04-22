<?php

session_start();


$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'medicamea');
$name = $_POST['doktor'];
$pass = $_POST['password'];
$s = "select * from doctors where username = '$name' && password = '$pass'";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);
$dr = $result->fetch_array(MYSQLI_ASSOC);
if ($num == 1) {
    $_SESSION['ime_doktora'] = $dr['ime_doktora'].' '.$dr['prezime_doktora'];
    $_SESSION['id_dr']=$dr['id'];
    //echo $dr['ime_doktora'].''.$dr['prezime_doktora'];
    header('location:ena.php');

}
else{
    header('location:login.php');
}
    

?>