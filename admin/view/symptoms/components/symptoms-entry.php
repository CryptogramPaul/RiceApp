<?php
    require_once '../../../../conn/connection.php';

    $id = $_POST['id'];	
    $operation = $_POST['operation'];	

    try {
        $sql=$conn->prepare("SELECT a.*, b.disease_name
            FROM symptoms a
            LEFT JOIN disease b ON b.disease_id = a.disease_id
            WHERE a.symptoms_id = ?
            ");
        $sql->execute([$id]);
        $result = $sql->fetch();

        $symptoms_img  =  $result['symptoms_img'] ?? '';
        $symptoms_name =  $result['symptoms_name'] ?? '';
        $disease =  $result['disease_name'] ?? '';
    } catch (PDOException $e) {
        echo "Please Contact System Administrator".$e->getMessage();
    }
   
?>

<div class="row mb-2 mt-5" id="SymptomsOffCanvas" operation="<?php echo $operation ?>" symptoms_id="<?php echo $id ?>">
    <div class="col">
        <label for="symptoms_img">Symptoms Photo</label>
        <input type="file" class="form-control form-control-sm" id="symptoms_img" required>
        <input type="text" value="<?php echo $symptoms_img ?>" hidden id="symptoms_img_update">
        <?php if (!empty($symptoms_img)) : ?>
        <small>Current file: <a href="../uploads/<?php echo htmlspecialchars($symptoms_img); ?>" target="_blank">
                <?php echo htmlspecialchars($symptoms_img); ?>
            </a></small>
        <?php endif; ?>
    </div>
</div>
<div class="row mb-2">
    <div class="col">
        <label for="disease">Disease</label>
        <select class="form-control form-control-sm" id="disease">
            <option value="">Select Disease</option>
            <?php
                $sql=$conn->prepare("SELECT disease_id, disease_name FROM disease");
                $sql->execute();
                while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                    echo '<option value="'.$row['disease_id'].'">'.$row['disease_name'].'</option>';
                }
           ?>
        </select>
        <!-- <input type="text" class="form-control form-control-sm" id="disease"
            value="<?php echo $operation == 0 ? '': $disease ?>" Placeholder="Disease" required> -->
    </div>
</div>

<div class="row mb-2">
    <div class="col">
        <label for="symptoms_name">Symptoms</label>
        <textarea class="form-control form-control-sm" id="symptoms_name" cols="30" rows="10"
            Placeholder="Symptoms" required><?php echo $operation == 0 ? '': $symptoms_name ?></textarea>
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
<script>
function SaveDisease() {
    const symptoms_img = $("#symptoms_img")[0].files[0];
    const disease = $("#symptoms_name").val();
    const description = $("#symptoms_description").val();

    // Create a FormData object
    const formData = new FormData();
    formData.append("symptoms_img", symptoms_img);
    formData.append("disease", disease);
    formData.append("symptoms_description", description);

    // Use $.ajax for the file upload
    $.ajax({
        url: "view/disease/actions/save.php",
        type: "POST",
        data: formData,
        processData: false, // Prevent jQuery from converting the data into a query string
        contentType: false, // Prevent jQuery from setting the Content-Type header
        success: function(data) {
            if ($.trim(data) === "success") {
                $("#diseaseCanvas").offcanvas("hide");
                alert("Disease saved successfully");
                DiseaseDetails(); // Call function to refresh disease details
            } else {
                alert(data);
            }
        },
        error: function(xhr, status, error) {
            alert("An error occurred: " + error);
        },
    });
}

function UpdateDisease(id) {
    var symptoms_img = null;
    var NotChange = false;
    if ($("#symptoms_img").val() == '') {
        symptoms_img = $("#symptoms_img_update").val();
        NotChange = false;
    } else {
        symptoms_img = $("#symptoms_img")[0].files[0];
        NotChange = true;
    }
    const disease = $("#symptoms_name").val();
    const description = $("#symptoms_description").val();

    // Create a FormData object
    const formData = new FormData();
    formData.append("NotChange", NotChange);
    formData.append("symptoms_img", symptoms_img);
    formData.append("disease", disease);
    formData.append("symptoms_description", description);
    formData.append("symptoms_id", id);

    // Use $.ajax for the file upload
    $.ajax({
        url: "view/disease/actions/update.php",
        type: "POST",
        data: formData,
        processData: false, // Prevent jQuery from converting the data into a query string
        contentType: false, // Prevent jQuery from setting the Content-Type header
        success: function(data) {
            if ($.trim(data) === "success") {
                $("#diseaseCanvas").offcanvas("hide");
                alert("Disease updated successfully");
                DiseaseDetails(); // Call function to refresh disease details
            } else {
                alert(data);
            }
        },
        error: function(xhr, status, error) {
            alert("An error occurred: " + error);
        },
    });
}
</script>