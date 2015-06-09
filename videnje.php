<?php 
require_once("header.php");

$id = $_GET["id"];
$videnje = $db->get_row("SELECT * FROM videnja WHERE id = $id");
?>


    <div class="content">
        <h1><?php echo $videnje->lokacija; ?></h1>
        <ul>
            <li><b>Kdaj se je zgodilo?</b><br>
            <p><?php echo $videnje->kdaj; ?></p></li>
            <li><b>Kako so izgledali?</b><br>
            <p><?php echo $videnje->izgled; ?></p></li>
            <li><b>Kaj se je dogajalo?</b><br>
            <p><?php echo $videnje->dogajanje; ?></p></li>
            <li><b>Kontakt:</b><br>
            <p><?php echo $videnje->kontakt; ?></p></li><br>
            <img src="uploads/<?php echo $videnje->id_slika; ?>" alt="slika">
            
        </ul>
    </div>
    
   <?php require_once("footer.php"); ?>