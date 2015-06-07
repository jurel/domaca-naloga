<?php 
require_once("header.php");

$napaka = array();

if (isset($_POST['lokacija'])){
    if ($_POST['lokacija'] == ""){
        array_push($napaka, "prosim napiši lokacijo");}
    else{
        $lokacija = $_POST['lokacija'];
        //$db->query("INSERT INTO videnja (lokacija) VALUES ('$lokacija')");
    }
    
    if ($_POST['cas'] == ""){
        array_push($napaka, "prosim vnesite čas");}
    else{
        $cas = $_POST['cas'];
        //$db->query("INSERT INTO videnja (kdaj) VALUES ('$cas')");
    }
    
     if ($_POST['izgled'] == ""){
        array_push($napaka, "prosim vnesite opis izgleda");}
    else{
        $izgled = $_POST['izgled'];
        //$db->query("INSERT INTO videnja (izgled) VALUES ('$$izgled')");
    }
    
     if ($_POST['dogajanje'] == ""){
        array_push($napaka, "prosim vnesite opis dogajanja");}
    else{
        $dogajanje = $_POST['dogajanje'];
        //$db->query("INSERT INTO videnja (dogajanje) VALUES ('$dogajanje')");
    }
    
    //$db->query("INSERT INTO videnja (lokacija, kdaj, izgled, dogajanje) VALUES ('$lokacija', '$cas', '$izgled', '$dogajanje')");


if(!$napaka){
$db->query("INSERT INTO videnja (lokacija, kdaj, izgled, dogajanje) VALUES ('$lokacija', '$cas', '$izgled', '$dogajanje')");
}
}

?>

<?php 
if($napaka){
    foreach($napaka as $opozorilo){
        echo "<div style=' color: red'>" . $opozorilo . "</div>";
    }
} ?>


<form action="add.php" method="POST">
    Kje se je zgodilo?<br>
    <input type="text" name="lokacija"><br>
    Kdaj se je zgodilo?<br>
    <input type="text" name="cas"><br>
    Kako so izgledali?<br>
    <textarea name="izgled" id="" cols="30" rows="10"></textarea><br>
    Kaj se je dogajalo?<br>
    <textarea name="dogajanje" id="" cols="30" rows="10"></textarea><br>
    Kontakt (po želji): <br>
    <input type="text" name="kontakt"><br>
    
    Dodaj sliko: <br>
    <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

    
    <input type="submit" value="Dodaj videnje">
    
</form>


<?php require_once("footer.php"); ?>