<?php
    require_once '../conn/connection.php';
    
    $page = $_POST['page'];
    $symptom_search = $_POST['symptom_search'];

    $symptoms = $conn->prepare("SELECT * FROM symptoms WHERE category = ? AND symptoms_name LIKE ? GROUP BY symptoms_name order by category DESC ");
   
    $category = $conn->prepare("SELECT category FROM symptoms group by category DESC");
    $category->execute();

?>
<style>
.form-check input[type="checkbox"] {
    border: 1px solid black;
}

.card {
  background-color: white;
  border-radius: 12px;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
  padding: 10px;
}

</style>
<?php
    foreach($category->fetchAll() as $key => $value){
?>
<h1 class="text-white"><?php echo $value['category'] ?></h1>       
<div class="card-grid">
    <?php
        $symptoms->execute([$value['category'], "%".$symptom_search."%"]);
        $fetch_result = $symptoms->fetchAll();
        $count = $symptoms->rowCount();
        $forpage = $symptoms->rowCount();
     
        foreach($fetch_result as $key => $value){
    ?>
        <div class="card mb-2 h-100 symptoms-item">
            <img src="uploads/<?php echo $value['symptoms_img']?>" class="card-img-top symptoms_img"
                alt="<?php echo $value['symptoms_img']?>" class="m-1" width="100" height="100" />
            <div class="card-body">
                <div class="form-check">
                    <input class="form-check-input symptom-checkbox" type="checkbox"
                        disease="<?php echo $value['disease_id']?>" id="<?php echo $value['symptoms_id']?>">
                    <label class="form-check-label" for="<?php echo $value['symptoms_id']?>">
                    <?php echo $value['symptoms_name']?>
                    </label>
                </div>
            </div>
        </div>
    <?php }?>
</div>
<?php }?>

<div class="">
    <button id="ViewSymptoms" data-bs-target="#selectedSymptomsModal" data-bs-toggle="modal"
        class="btn btn-success my-3 mx-2" title="View Symptoms" onclick="viewSelectedSymptoms()" disabled>Posible nga
        sakit</button>
</div>


