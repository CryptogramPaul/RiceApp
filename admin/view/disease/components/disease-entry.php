<?php
    require_once '../../../../conn/connection.php';

    $id = $_POST['id'];	
    $operation = $_POST['operation'];	

    try {
        $sql=$conn->prepare("SELECT *
            FROM disease a
            WHERE a.disease_id = ?
            ");
        $sql->execute([$id]);
        
    } catch (PDOException $e) {
        echo "Please Contact System Administrator".$e->getMessage();
    }
   
?>

<div class="row mb-2 mt-5">
    <div class="col">
        <label for="disease_img">Disease Photo</label>
        <input type="file" class="form-control form-control-sm" id="disease_img">
    </div>
</div>
<div class="row mb-2">
    <div class="col">
        <label for="disease_name">Disease</label>
        <input type="text" class="form-control form-control-sm" id="disease_name" Placeholder="Disease">
    </div>
</div>
<div class="row mb-2">
    <div class="col">
        <label for="disease_description">Disease Description</label>
        <textarea class="form-control form-control-sm" id="disease_description" cols="30" rows="10"
            Placeholder="Description"></textarea>
    </div>
</div>
<div class="row mt-5">
    <div class="flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="offcanvas" data-bs-target="#diseaseCanvas"
            aria-controls="offcanvasRight">Close</button>
        <button type="submit" class="btn btn-sm btn-primary">Save</button>
    </div>
</div>