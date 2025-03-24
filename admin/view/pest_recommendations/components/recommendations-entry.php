<?php
    require_once '../../../../conn/connection.php';

    $id = $_POST['id'];	
    $operation = $_POST['operation'];	

    try {
        $sql=$conn->prepare("SELECT a.*, b.pest_name
            FROM recommendations a
            LEFT JOIN pest b ON b.id = a.type_id 
            WHERE a.id = ? AND a.type = 'Pest'
            ");
        $sql->execute([$id]);
        $result = $sql->fetch();

        $pest  =  $result['pest_name'] ?? '';
        $recommendations =  $result['recommendations'] ?? '';
    } catch (PDOException $e) {
        echo "Please Contact System Administrator".$e->getMessage();
    }
   
?>

<div class="row mb-2 mt-5" id="RecommendationsOffCanvas" operation="<?php echo $operation ?>"
    recommendations_id="<?php echo $id ?>">
    <div class="col">
        <label for="pest">Pest</label>
        <select class="form-control form-control-sm" id="pest" required>
            <option value="">Select Pest</option>
            <?php
                $sql=$conn->prepare("SELECT id, pest_name FROM pest");
                $sql->execute();
                while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
           ?>
            <option <?php echo $pest == $row['pest_name'] ? 'selected':''?>
                value="<?php echo $row['id'] ?>">
                <?php echo $row['pest_name'] ?></option>
            <?php
            }
           ?>
        </select>
    </div>
</div>
<div class="row mb-2">
    <div class="col">
        <label for="recommendations">Recommendations</label>
        <textarea class="form-control form-control-sm" id="recommendations" cols="30" rows="10"
            Placeholder="Recommendations" required><?php echo $operation == 0 ? '': $recommendations ?></textarea>
    </div>
</div>
<div class="row mt-5">
    <div class="flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="offcanvas" data-bs-target="#diseaseCanvas"
            aria-controls="offcanvasRight">Close</button>
        <button type="submit" class="btn btn-sm btn-primary">
            <?php echo $operation == 0 ? 'Save' : 'Update'?>
        </button>
    </div>
</div>
