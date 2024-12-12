<?php
    require_once '../../../../conn/connection.php';

    // $keysearch = sanitize_input($_POST['keysearch']);	

    try {
        $sql=$conn->prepare("SELECT *
            FROM disease a
            ");
        $sql->execute([]);
        
    } catch (PDOException $e) {
        echo "Please Contact System Administrator".$e->getMessage();
    }
    while($row = $sql->fetch(PDO::FETCH_ASSOC)){
?>

<tr>
    <td><?php echo $row['disease_id'] ?></td>
    <td><?php echo $row['img_name'] ?></td>
    <td><?php echo $row['disease_name'] ?></td>
    <td><?php echo $row['descriptions'] ?></td>
    <td></td>
</tr>

<?php } ?>
<?php
    if($sql->rowCount() == 0){
?>
<tr>
    <td colspan="5" class="text-center">No record found.</td>
</tr>
<?php
    }
?>