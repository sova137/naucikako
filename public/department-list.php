<?php
/**
 * Created by Milan on 9/16/2016.
 */

$username = "root";
$password = "";
$hostname = "localhost";

$dbhandle = mysqli_connect($hostname, $username, $password) or die("Unable to connect to MySQL");
$selected = mysqli_select_db( $dbhandle,"sedam") or die("Could not select examples");

$choice = mysqli_real_escape_string($dbhandle,$_GET['choice']);

$sifFakulteta = "SELECT sifFakulteta FROM Fakultet WHERE Naziv = '$choice'";


$sifFakultetaResult = mysqli_query($dbhandle,$sifFakulteta);
$sifFacResult="";



while ($row = mysqli_fetch_array($sifFakultetaResult)) {
    $sifFacResult = $row{'sifFakulteta'};

}


$query = "SELECT Naziv FROM Smer WHERE sifFakulteta = '$sifFacResult'"; //"'1'";

$result = mysqli_query($dbhandle,$query);

while ($row = mysqli_fetch_array($result)) {
    echo "<li><a href='#'>" . $row{'Naziv'} . "</a></li>";
}
?>