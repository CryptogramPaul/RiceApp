<?php
    require_once '../../../../conn/connection.php';

    $id = $_POST['id'];	
    $operation = $_POST['operation'];	

    try {
        $sql=$conn->prepare("SELECT a.*
            FROM user a
            WHERE a.id = ? 
            ");
        $sql->execute([$id]);
        $result = $sql->fetch();

        $firstname  =  $result['firstname'] ?? '';
        $middlename =  $result['middlename'] ?? '';
        $lastname =  $result['lastname'] ?? '';
        $username =  $result['username'] ?? '';
        $password =  $result['password'] ?? '';

    } catch (PDOException $e) {
        echo "Please Contact System Administrator".$e->getMessage();
    }
   
?>

<div class="row mb-2 mt-5" id="UserOffCanvas" operation="<?php echo $operation ?>"
    user_id="<?php echo $id ?>">
    <div class="col">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control form-control-sm" id="firstname"
            value="<?php echo $operation == 0 ? '': $firstname ?>" Placeholder="Firstname" required>
    </div>
</div>
<div class="row mb-2">
    <div class="col">
        <label for="middlename">Middle Name</label>
        <input type="text" class="form-control form-control-sm" id="middlename"
            value="<?php echo $operation == 0 ? '': $middlename ?>" Placeholder="Middle Name" required>
    </div>
</div>  
<div class="row mb-2">
    <div class="col">
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control form-control-sm" id="lastname"
            value="<?php echo $operation == 0 ? '': $lastname ?>" Placeholder="Last Name" required>
    </div>
</div>  
<div class="row mb-2">
    <div class="col">
        <label for="username">Username</label>
        <input type="text" class="form-control form-control-sm" id="username"
            value="<?php echo $operation == 0 ? '': $username ?>" Placeholder="Username" required>
    </div>
</div>  
<div class="row mb-2">
    <div class="col">
        <label for="password">Password</label>
        <input type="password" class="form-control form-control-sm" id="password"
            value="<?php echo $operation == 0 ? '': $password ?>" Placeholder="Password" required>
    </div>
</div>  
<div class="row mt-5">
    <div class="flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="offcanvas" data-bs-target="#UserCanvas"
            aria-controls="offcanvasRight">Close</button>
        <button type="submit" class="btn btn-sm btn-primary">
            <?php echo $operation == 0 ? 'Save' : 'Update'?>
        </button>
    </div>
</div>
<script>

</script>