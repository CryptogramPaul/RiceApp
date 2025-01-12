<?php
    require_once '../../../../conn/connection.php';

    // $keysearch = sanitize_input($_POST['keysearch']);	

    try {
        $sql=$conn->prepare("SELECT a.*, b.pest_name
            FROM recommendations a
            LEFT JOIN pest b ON b.id = a.type_id 
            WHERE a.type = 'Pest'
            ");
        $sql->execute([]);
        
    } catch (PDOException $e) {
        echo "Please Contact System Administrator".$e->getMessage();
    }
    while($row = $sql->fetch(PDO::FETCH_ASSOC)){
?>

<tr>
    <td class="text-center"><?php echo $row['id'] ?></td>
    <td class="text-center"><?php echo $row['pest_name'] ?></td>
    <td class="text-center"><?php echo $row['recommendations'] ?></td>
    <td class="text-center">
        <div class="d-flex justify-content-center">
            <a class="badge bg-info text-white text-decoration-none badge-danger" data-bs-toggle="offcanvas"
                data-bs-target="#RecommendationsCanvas" onclick="RecommendationsEntry(1,<?php echo $row['id'] ?>)"
                title="Edit">
                <i class="fa fa-pen p-1"></i>
            </a>
            &nbsp;&nbsp;&nbsp;
            <a class="badge bg-danger text-white text-decoration-none badge-primary"
                onclick="DeleteRecommendations(<?php echo $row['id'] ?>)" title="Delete">
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