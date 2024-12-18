<?php
    require_once '../../../../conn/connection.php';

    $id = $_POST['id'];	
    $operation = $_POST['operation'];	

    try {
        $sql=$conn->prepare("SELECT *
            FROM pest a
            WHERE a.id = ?
            ");
        $sql->execute([$id]);
        $result = $sql->fetch();

        $pest_img     =  $result['pest_img'] ?? '';
        $pest_name    =  $result['pest_name'] ?? '';
        $descriptions =  $result['descriptions'] ?? '';
    } catch (PDOException $e) {
        echo "Please Contact System Administrator".$e->getMessage();
    }
   
?>

<div class="row mb-2 mt-5" id="PestOffCanvas" operation="<?php echo $operation ?>" pest_id="<?php echo $id ?>">
    <div class="col">
        <label for="pest_img">Pest Photo</label>
        <input type="file" class="form-control form-control-sm" id="pest_img">
        <input type="text" value="<?php echo $pest_img ?>" hidden id="pest_img_update">
        <?php if (!empty($pest_img)) : ?>
        <small>Current file: <a href="../uploads/<?php echo htmlspecialchars($pest_img); ?>" target="_blank">
                <?php echo htmlspecialchars($pest_img); ?>
            </a></small>
        <?php endif; ?>
    </div>
</div>
<div class="row mb-2">
    <div class="col">
        <label for="pest_name">Pest</label>
        <input type="text" class="form-control form-control-sm" id="pest_name"
            value="<?php echo $operation == 0 ? '': $pest_name ?>" Placeholder="Pest" required>
    </div>
</div>
<div class="row mb-2">
    <div class="col">
        <label for="pest_descriptions">Pest Descriptions</label>
        <textarea class="form-control form-control-sm" id="pest_descriptions" cols="30" rows="10"
            Placeholder="Descriptions" required><?php echo $operation == 0 ? '': $descriptions ?></textarea>
    </div>
</div>
<div class="row mt-5">
    <div class="flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="offcanvas" data-bs-target="#pestCanvas"
            aria-controls="offcanvasRight">Close</button>
        <button type="submit" class="btn btn-sm btn-primary">
            <?php echo $operation == 0 ? 'Save' : 'Update'?>
        </button>
    </div>
</div>
<script>
function SavePest() {
    const pest_img = $("#pest_img")[0].files[0];
    const pest = $("#pest_name").val();
    const description = $("#pest_descriptions").val();

    // Create a FormData object
    const formData = new FormData();
    formData.append("pest_img", pest_img);
    formData.append("pest", pest);
    formData.append("pest_descriptions", description);

    // Use $.ajax for the file upload
    $.ajax({
        url: "view/pest/actions/save.php",
        type: "POST",
        data: formData,
        processData: false, 
        contentType: false, 
        success: function(data) {
            if ($.trim(data) === "success") {
                $("#pestCanvas").offcanvas("hide");
                alert("Pest saved successfully");
                PestDetails(); 
            } else {
                alert(data);
            }
        },
        error: function(xhr, status, error) {
            alert("An error occurred: " + error);
        },
    });
}

function UpdatePest(id) {
    var pest_img = null;
    var NotChange = false;
    if ($("#pest_img").val() == '') {
        pest_img = $("#pest_img_update").val();
        NotChange = false;
    } else {
        pest_img = $("#pest_img")[0].files[0];
        NotChange = true;
    }
    const pest = $("#pest_name").val();
    const descriptions = $("#pest_descriptions").val();

   
    const formData = new FormData();
    formData.append("NotChange", NotChange);
    formData.append("pest_img", pest_img);
    formData.append("pest", pest);
    formData.append("pest_descriptions", descriptions);
    formData.append("pest_id", id);

   
    $.ajax({
        url: "view/pest/actions/update.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false, 
        success: function(data) {
            if ($.trim(data) === "success") {
                $("#pestCanvas").offcanvas("hide");
                alert("Pest updated successfully");
                PestDetails(); 
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