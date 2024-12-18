<?php
require_once '../conn/connection.php';

$DiseaseJson = $_POST['DiseaseJson'];    
$json_disease = json_decode($DiseaseJson, true);

$disease_ids = array();

foreach($json_disease as $value){
    $disease_ids[] = $value['disease'];
}

$disease_ids = array_unique($disease_ids);

foreach($disease_ids as $disease_id){
    $disease = $conn->prepare("SELECT * FROM disease WHERE disease_id = ?");
    $disease->execute([$disease_id]);

    $fetch_result = $disease->fetchAll();
    
    foreach($fetch_result as $key => $value){
?>
<div class="col-xl-3 col-sm-6 col-md-4 my-1">
    <div class="card mb-2">
        <img src="uploads/<?php echo $value['disease_img']?>" class="card-img-top symptoms_img"
            alt="<?php echo $value['disease_img']?>" class="m-1" />
        <div class="card-body">
            <div class="form-check">
                <label class="form-check-label">
                    <?php echo $value['disease_name']?>
                </label>
                <button class="btn btn-sm btn-outline-success" style="height: 30px;"
                    onclick="ViewDiseaseInformation(`<?php echo $value['disease_id']?>`)">VIEW INFORMATION</button>
            </div>
        </div>
    </div>
</div>
<?php
    }
}
?>
<?php
    if ($disease->rowCount() == 0) {
?>
<div id="NoRecordFound" class="col-12">
    <p class="text-center">No records found.</p>
</div>
<?php
    }
?>