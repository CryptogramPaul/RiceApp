<?php
    require_once '../conn/connection.php';
    
    $page = $_POST['page'];

    $symptoms = $conn->prepare("SELECT * FROM symptoms GROUP BY symptoms_name LIMIT $page");
    $symptoms->execute();
    $fetch_result = $symptoms->fetchAll();
    $count = $symptoms->rowCount();
    $forpage = $symptoms->rowCount();

    foreach($fetch_result as $key => $value){
?>
<div class="col-xl-3 col-sm-6 col-md-4 my-1 symptom-item">
    <div class="card mb-2">
        <img src="uploads/<?php echo $value['symptoms_img']?>" class="card-img-top symptoms_img"
            alt="<?php echo $value['symptoms_img']?>" class="m-1" />
        <div class="card-body">
            <div class="form-check">
                <input class="form-check-input symptom-checkbox" type="checkbox"
                    disease="<?php echo $value['disease_id']?>" id="<?php echo $value['symptoms_name']?>">
                <label class="form-check-label" for="<?php echo $value['symptoms_name']?>">
                    <?php echo $value['symptoms_name']?>
                </label>
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
        onclick="ViewDisease(`<?php echo $forpage+8 ?>`)"><small>More
            Symptoms</small></button>
    <button id="ViewSymptoms" data-bs-target="#selectedSymptomsModal" data-bs-toggle="modal"
        class="btn btn-success my-3 mx-2" title="View Symptoms" onclick="viewSelectedSymptoms()" disabled>View
        Diagnosis</button>
</div>