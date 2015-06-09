<?php 
require_once("header.php");

$napaka = array();

if (isset($_POST['lokacija'])){
    if ($_POST['lokacija'] == ""){
        array_push($napaka, "prosim napiši lokacijo");}
    else{
        $lokacija = $_POST['lokacija'];
    }
    
    if ($_POST['cas'] == ""){
        array_push($napaka, "prosim vnesite čas");}
    else{
        $cas = $_POST['cas'];
    }
    
     if ($_POST['izgled'] == ""){
        array_push($napaka, "prosim vnesite opis izgleda");}
    else{
        $izgled = $_POST['izgled'];
    }
    
     if ($_POST['dogajanje'] == ""){
        array_push($napaka, "prosim vnesite opis dogajanja");}
    else{
        $dogajanje = $_POST['dogajanje'];

    }
    




    
    
    
    
    
    $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". ( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $id_slika = ($_FILES["fileToUpload"]["name"]);
        if(!$napaka){
$db->query("INSERT INTO videnja (lokacija, kdaj, izgled, dogajanje, id_slika) VALUES ('$lokacija', '$cas', '$izgled', '$dogajanje', '$id_slika')");
}
        
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
    
    
    
    
}

?>

<?php 
if($napaka){
    foreach($napaka as $opozorilo){
        echo "<div style=' color: red'>" . $opozorilo . "</div>";
    }
} ?>


<form action="upload.php" method="post" enctype="multipart/form-data">
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
    Select image to upload: <br>
    <input type="file" name="fileToUpload" id="fileToUpload">

        <br>
    
    <input type="submit" value="Dodaj videnje" name="submit">
    
</form>


<?php require_once("footer.php"); ?>