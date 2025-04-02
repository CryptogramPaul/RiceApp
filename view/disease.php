<?php
    require_once '../conn/connection.php';
    
    $page = $_POST['page'];
    $symptom_search = $_POST['symptom_search'];

    $symptoms = $conn->prepare("SELECT * FROM symptoms WHERE symptoms_name LIKE ? GROUP BY symptoms_name order by category DESC ");
    $symptoms->execute(["%".$symptom_search."%"]);
    $fetch_result = $symptoms->fetchAll();
    $count = $symptoms->rowCount();
    $forpage = $symptoms->rowCount();

    foreach($fetch_result as $key => $value){
?>
<style>
.form-check input[type="checkbox"] {
    border: 1px solid black;
}

.card-footer {
    /* height: 20px; */
    background-color: #f9f9f9;
    padding: 10px;
    border: none;
    border-radius: 4px;
    color: #333;
    cursor: pointer;
    text-align: center;
    transition: background-color 0.3s ease;
}
</style>


<div class="col-xl-3 col-sm-6 col-md-4 my-1 symptom-item">
    <div class="card mb-2 h-100">
        <img src="uploads/<?php echo $value['symptoms_img']?>" class="card-img-top symptoms_img"
            alt="<?php echo $value['symptoms_img']?>" class="m-1" width="100" height="100" />
        <div class="card-body">
            <div class="form-check">
                <input class="form-check-input symptom-checkbox" type="checkbox"
                    disease="<?php echo $value['disease_id']?>" id="<?php echo $value['symptoms_name']?>">
                <label class="form-check-label" for="<?php echo $value['symptoms_name']?>">
                    <?php echo $value['symptoms_name']?>
                </label>
            </div>
        </div>
        <div class="card-footer">
            <h3><?php echo $value['category']?></h3>
        </div>
    </div>
</div>
<?php
    }
?>
<?php
    if ($count == 0) {
?>
<!-- <div id="NoRecordFound" class="col-12">
    <p class="text-center">No records found.</p>
</div> -->
<?php
    }else{
?>
<div class="">
    <!-- <button id="viewMoreButton" class="btn btn-secondary my-3 mx-2"
        onclick="ViewDisease(`<?php echo $forpage+8 ?>`)"><small>Iban pa na sintomas</small></button> -->
    <button id="ViewSymptoms" data-bs-target="#selectedSymptomsModal" data-bs-toggle="modal"
        class="btn btn-success my-3 mx-2" title="View Symptoms" onclick="viewSelectedSymptoms()" disabled>Posible nga
        sakit</button>
</div>
<?php
    }
?>