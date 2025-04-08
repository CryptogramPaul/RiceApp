<?php
require_once '../conn/connection.php';

$DiseaseJson = $_POST['DiseaseJson'];    
$json_disease = json_decode($DiseaseJson, true);
$count = 0;

$disease_ids = array();

// foreach($json_disease as $value){
//     $disease_ids[] = $value['disease'];
// }

// $disease_ids = [];
foreach($json_disease as $value){
    // $disease_ids[] = $value['disease'];
    
    $symptoms_name = $value['symptoms'];
    
    $symptoms = $conn->prepare("SELECT disease_id FROM symptoms WHERE symptoms_name = ?  ");
    $symptoms->execute([$symptoms_name]);

    foreach($symptoms->fetchAll() as $key => $value){

        $disease_ids[] = $value['disease_id'];
    }
}
// $unique_disease_ids = array_unique($disease_ids);
// print_r($unique_disease_ids);
// exit();

$disease_ids = array_unique($disease_ids);

// foreach ($disease_ids as $disease_id) {
//    echo $disease_id;
// }

// exit();
foreach($disease_ids as $disease_id){
    $disease = $conn->prepare("SELECT * FROM disease WHERE disease_id = ?");
    $disease->execute(params: [$disease_id]);
    $fetch_result = $disease->fetchAll();
    $count = $disease->rowCount();
    
    foreach($fetch_result as $key => $value){
?>
<div class="col-xl-3 col-sm-6 col-md-4">
    <div class="card mb-2 h-100">
        <img src="uploads/<?php echo $value['disease_img']?>" class="card-img-top"
            alt="<?php echo $value['disease_img']?>" class="m-1" width="100" height="100" />
        <div class="card-body">
            <div class="text-center">
                <h2 class="">
                    <?php echo $value['disease_name']?>
                </h2>
                <button class="btn btn-sm btn-outline-success" style="height: 30px;"
                    onclick="ViewDiseaseInformation(`<?php echo $value['disease_id']?>`)">IMPORMASYON</button>
            </div>
        </div>
    </div>
</div>
<?php
    }
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