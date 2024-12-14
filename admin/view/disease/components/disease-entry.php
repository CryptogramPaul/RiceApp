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
        $result = $sql->fetch();

        $disease_img =   $result['disease_img'];
        $disease_name =  $result['disease_name'];
        $descriptions =  $result['descriptions'];
    } catch (PDOException $e) {
        echo "Please Contact System Administrator".$e->getMessage();
    }
   
?>

<div class="row mb-2 mt-5" id="DiseaseOffCanvas" operation="<?php echo $operation ?>" disease_id="<?php echo $id ?>">
    <div class="col">
        <label for="disease_img">Disease Photo</label>
        <input type="file" class="form-control form-control-sm" id="disease_img">
        <input type="text" value="<?php echo $disease_img ?>" hidden id="disease_img_update">
        <?php if (!empty($disease_img)) : ?>
        <small>Current file: <a href="../uploads/<?php echo htmlspecialchars($disease_img); ?>" target="_blank">
                <?php echo htmlspecialchars($disease_img); ?>
            </a></small>
        <?php endif; ?>
    </div>
</div>
<div class="row mb-2">
    <div class="col">
        <label for="disease_name">Disease</label>
        <input type="text" class="form-control form-control-sm" id="disease_name"
            value="<?php echo $operation == 0 ? '': $result['disease_name'] ?>" Placeholder="Disease">
    </div>
</div>
<div class="row mb-2">
    <div class="col">
        <label for="disease_description">Disease Description</label>
        <textarea class="form-control form-control-sm" id="disease_description" cols="30" rows="10"
            Placeholder="Descriptions"><?php echo $operation == 0 ? '': $result['descriptions'] ?></textarea>
    </div>
</div>
<div class="row mt-5">
    <div class="flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="offcanvas" data-bs-target="#diseaseCanvas"
            aria-controls="offcanvasRight">Close</button>
        <button type="submit" class="btn btn-sm btn-primary"><?php
            echo $operation == 0 ? 'Save' : 'Update'
        ?></button>
    </div>
</div>
<script>
function SaveDisease() {
    const disease_img = $("#disease_img")[0].files[0];
    const disease = $("#disease_name").val();
    const description = $("#disease_description").val();

    // Create a FormData object
    const formData = new FormData();
    formData.append("disease_img", disease_img);
    formData.append("disease", disease);
    formData.append("disease_description", description);

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
    var disease_img = null;
    var NotChange = false;
    if ($("#disease_img").val() == '') {
        disease_img = $("#disease_img_update").val();
        NotChange = false;
    } else {
        disease_img = $("#disease_img")[0].files[0];
        NotChange = true;
    }
    const disease = $("#disease_name").val();
    const description = $("#disease_description").val();

    // Create a FormData object
    const formData = new FormData();
    formData.append("NotChange", NotChange);
    formData.append("disease_img", disease_img);
    formData.append("disease", disease);
    formData.append("disease_description", description);
    formData.append("disease_id", id);

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