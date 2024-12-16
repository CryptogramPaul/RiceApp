<?php
require_once '../conn/connection.php';

// Get the JSON data
$DiseaseJson = $_POST['DiseaseJson'];    
$json_disease = json_decode($DiseaseJson, true);

// Initialize an array to store unique disease IDs (to prevent duplicate queries)
$disease_ids = array();

// Loop through the incoming JSON data to collect unique disease IDs
foreach($json_disease as $value){
    $disease_ids[] = $value['disease'];
}

// Remove duplicates from the array
$disease_ids = array_unique($disease_ids);

// Loop through each unique disease ID and query the database
foreach($disease_ids as $disease_id){
    $disease = $conn->prepare("SELECT * FROM disease WHERE disease_id = ?");
    $disease->execute([$disease_id]);

    $fetch_result = $disease->fetchAll();
    
    // Render the disease if results are found
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