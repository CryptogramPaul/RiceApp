<?php
    require_once '../conn/connection.php';
    
    $id = $_POST['id'];
    $pest = $conn->prepare("SELECT * FROM pest WHERE id = ?");
    $pest->execute([$id]);
    $row_pest = $pest->fetch();
?>
<div class="col-12 col-xl-4 my-1">
    <div class="card mb-2">
        <img src="uploads/<?php echo $row_pest['pest_img'] ?>" class="card-img-top"
            alt="<?php echo $row_pest['pest_img'] ?>" class="m-1" />
        <div class="card-body">
            <h1 class="m-0 p-0">
                <?php echo $row_pest['pest_name'] ?>
            </h1>
        </div>
        <div class="px-2">
            <h2 class="m-0 p-0">Descriptions:</h2>
            <p class="card-text "><?php echo $row_pest['descriptions'] ?></p>
        </div>
    </div>
</div>
<div class="col-12 col-xl-4 " id="">
    <h3>REKOMENDASYON:</h3>
    <ul id="recommendations">
        <?php
            $recommendations = $conn->prepare("SELECT * FROM recommendations WHERE type_id = ? ");
            $recommendations->execute([$id]);
            $recommendations = $recommendations->fetchAll();
            foreach ($recommendations as $recommendation) {
        ?>
        <li><?php echo $recommendation['recommendations'] ?></li>
        <?php
            }
        ?>
    </ul>
</div>
<div class="col-12 col-xl-4 " id="">
    <h3>PAGBULONG:</h3>
    <ul id="treatment">
        <?php
            $treatment = $conn->prepare("SELECT * FROM treatment WHERE type_id = ?");
            $treatment->execute([$id]);
            $treatment = $treatment->fetchAll();
            foreach ($treatment as $val) {
        ?>
        <li><?php echo $val['treatment'] ?></li>
        <?php
            }
        ?>
    </ul>
</div>