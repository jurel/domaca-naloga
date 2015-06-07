<?php 
require_once("header.php");
?>

<?php 
$videnja = $db->get_results("SELECT * FROM videnja ORDER BY datum DESC");
?>

<div class="seznam">
   <ul>
    <?php foreach($videnja as $videnje) {
        echo '<li><a href="videnje.php?id=' . $videnje->id . '">' . $videnje->lokacija . '</a></li>';
        }
    ?>
    </ul>
</div>

<?php require_once('footer.php'); ?>