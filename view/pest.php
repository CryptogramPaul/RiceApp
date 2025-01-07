<?php
    require_once '../conn/connection.php';
    
    $page = $_POST['page'];
    $pest_search = $_POST['pest_search'];

    $pest = $conn->prepare("SELECT * FROM pest WHERE pest_name LIKE ? LIMIT $page");
    $pest->execute(["%".$pest_search."%"]);
    $fetch_result = $pest->fetchAll();
    
    $count = $pest->rowCount();
    $forpage = $pest->rowCount();

    foreach($fetch_result as $key => $value){
?>
<div class="col-xl-3 col-sm-6 col-md-4 my-1 pest-item">
    <div class="card mb-2">
        <img src="uploads/<?php echo $value['pest_img']?>" class="card-img-top pests_img"
            alt="<?php echo $value['pest_img']?>" />
        <div class="card-body text-center">
            <div class="form-check">
                <label for="<?php echo $value['pest_name']?>"><?php echo $value['pest_name']?></label>
            </div>
            <div class="">
                <button class="btn btn-sm btn-outline-success" style="height: 30px;" data-bs-target="#PestModal"
                    data-bs-toggle="modal" onclick="ViewPestInformation('<?php echo $value['id']?>')">VIEW
                    INFORMATION</button>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>
<?php
    if ($count == 0) {
?>
<div id="NoRecordFound" class="col-12">
    <p class="text-center">No records found.</p>
</div>
<?php
    }
?>
<div class="">
    <button id="viewMoreButton" class="btn btn-secondary my-3 mx-2"
        onclick="ViewPest(`<?php echo $forpage+8 ?>`)"><small>Click for More</small></button>
</div>