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
        $category =  $result['category'] ?? '';
    } catch (PDOException $e) {
        echo "Please Contact System Administrator".$e->getMessage();
    }
   
?>

<div class="row mb-2 mt-5" id="SymptomsOffCanvas" operation="<?php echo $operation ?>" symptoms_id="<?php echo $id ?>">
    <div class="col">
        <label for="symptoms_img">Symptoms Photo</label>
        <input type="file" class="form-control form-control-sm" id="symptoms_img">
        <input type="text" value="<?php echo $symptoms_img ?>" hidden id="symptoms_img_update">
        <!-- <input type="file" class="form-control form-control-sm" value="../../../../images/symptoms_img/sample.png"
            id="default_img"> -->
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
        <select class="form-control form-control-sm" id="disease" required>
            <option value="">Select Disease</option>
            <?php
                
                $sql=$conn->prepare("SELECT disease_id, disease_name FROM disease");
                $sql->execute();
                while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
           ?>
            <option <?php echo $disease == $row['disease_name'] ? 'selected':''?>
                value="<?php echo $row['disease_id'] ?>">
                <?php echo $row['disease_name'] ?></option>
            <?php
            }
           ?>
        </select>
        <!-- <input type="text" class="form-control form-control-sm" id="disease"
            value="<?php echo $operation == 0 ? '': $disease ?>" Placeholder="Disease" required> -->
    </div>
</div>
<div class="row mb-2">
    <div class="col">
        <label for="category">Category</label>
        <select class="form-control form-control-sm" id="category" required>
            <option <?php echo $category == "Dahon" ? 'selected':'' ?> value="Dahon">Dahon</option>
            <option <?php echo $category == "Collar" ? 'selected':'' ?> value="Collar">Collar</option>
            <option <?php echo $category == "Node" ? 'selected':'' ?> value="Node">Node</option>
            <option <?php echo $category == "Neck" ? 'selected':'' ?> value="Neck">Neck</option>
            <option <?php echo $category == "Panicle" ? 'selected':'' ?> value="Panicle">Panicle</option>
        </select>
    </div>
</div>
</div>
<div class="row mb-2">
    <div class="col">
        <label for="symptoms_name">Symptoms</label>
        <textarea class="form-control form-control-sm" id="symptoms_name" cols="30" rows="10" Placeholder="Symptoms"
            required><?php echo $operation == 0 ? '': $symptoms_name ?></textarea>
    </div>
</div>
<div class="row mt-5">
    <div class="flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="offcanvas" data-bs-target="#SymptomsCanvas"
            aria-controls="offcanvasRight">Close</button>
        <button type="submit" class="btn btn-sm btn-primary">
            <?php echo $operation == 0 ? 'Save' : 'Update'?>
        </button>
    </div>
</div>
<script>
function SaveSymptoms() {
    const symptoms_img = $("#symptoms_img")[0].files[0];
    const disease = $("#disease").val();
    const symptoms_name = $("#symptoms_name").val();
    const category = $("#category").val();

    // Create a FormData object
    const formData = new FormData();
    formData.append("symptoms_img", symptoms_img);
    formData.append("disease", disease);
    formData.append("symptoms_name", symptoms_name);
    formData.append("category", category);
    // Use $.ajax for the file upload
    $.ajax({
        url: "view/symptoms/actions/save.php",
        type: "POST",
        data: formData,
        processData: false, // Prevent jQuery from converting the data into a query string
        contentType: false, // Prevent jQuery from setting the Content-Type header
        success: function(data) {
            if ($.trim(data) === "success") {
                $("#SymptomsCanvas").offcanvas("hide");
                alert("Symptoms saved successfully");
                SymptomsDetails(); // Call function to refresh disease details
            } else {
                alert(data);
            }
        },
        error: function(xhr, status, error) {
            alert("An error occurred: " + error);
        },
    });
}

function UpdateSymptoms(id) {
    var symptoms_img = null;
    var NotChange = false;
    if ($("#symptoms_img").val() == '') {
        symptoms_img = $("#symptoms_img_update").val();
        NotChange = false;
    } else {
        symptoms_img = $("#symptoms_img")[0].files[0];
        NotChange = true;
    }
    const disease = $("#disease").val();
    const symptoms_name = $("#symptoms_name").val();
    let category = $("#category").val();

    // Create a FormData object
    const formData = new FormData();
    formData.append("NotChange", NotChange);
    formData.append("symptoms_img", symptoms_img);
    formData.append("disease", disease);
    formData.append("symptoms_name", symptoms_name);
    formData.append("category", category);
    formData.append("symptoms_id", id);

    // Use $.ajax for the file upload
    $.ajax({
        url: "view/symptoms/actions/update.php",
        type: "POST",
        data: formData,
        processData: false, // Prevent jQuery from converting the data into a query string
        contentType: false, // Prevent jQuery from setting the Content-Type header
        success: function(data) {
            if ($.trim(data) === "success") {
                $("#SymptomsCanvas").offcanvas("hide");
                alert("Symptoms updated successfully");
                SymptomsDetails(); // Call function to refresh disease details
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