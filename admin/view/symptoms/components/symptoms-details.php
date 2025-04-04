<?php
    require_once '../../../../conn/connection.php';

    // $keysearch = sanitize_input($_POST['keysearch']);	

    try {
        $sql=$conn->prepare("SELECT a.*, b.disease_name
            FROM symptoms a
            LEFT JOIN disease b ON b.disease_id = a.disease_id
            ");
        $sql->execute([]);
        
    } catch (PDOException $e) {
        echo "Please Contact System Administrator".$e->getMessage();
    }
    while($row = $sql->fetch(PDO::FETCH_ASSOC)){
?>

<tr>
    <td class="text-center"><?php echo $row['symptoms_id'] ?></td>
    <td class="text-center">
        <img src="../uploads/<?php echo $row['symptoms_img'] ?>" alt="<?php echo $row['symptoms_img'] ?>" height="50px"
            width="50px">
    </td>
    <td class="text-center"><?php echo $row['disease_name'] ?></td>
    <td class="text-center"><?php echo $row['category'] ?></td>
    <td class="text-center"><?php echo $row['symptoms_name'] ?></td>
    <td class="text-center">
        <div class="d-flex justify-content-center">
            <a class="badge bg-info text-white text-decoration-none badge-danger" data-bs-toggle="offcanvas"
                data-bs-target="#SymptomsCanvas" onclick="SymptomsEntry(1,<?php echo $row['symptoms_id'] ?>)"
                title="Edit">
                <i class="fa fa-pen p-1"></i>
            </a>
            &nbsp;&nbsp;&nbsp;
            <a class="badge bg-danger text-white text-decoration-none badge-primary"
                onclick="DeleteSymptoms(<?php echo $row['symptoms_id'] ?>)" title="Delete">
                <i class="fa fa-trash p-1"></i>
            </a>
        </div>
    </td>
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