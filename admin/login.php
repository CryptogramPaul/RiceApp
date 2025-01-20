<?php
if (isset($_COOKIE['userid'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>


    <link rel="icon" href="../images/frontlogo.png" type="image/x-icon">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="css/style.css">
</head>
<style>
.spinner-border {
    width: 1rem;
    height: 1rem;
    display: none;
}
</style>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form id="FormLogin">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Username" id="username" autocomplete
                            required>
                        <!-- <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div> -->
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" placeholder="Password" id="password" autocomplete
                            required>
                        <!-- <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div> -->
                    </div>
                    <div class="row">
                        <!-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> -->
                        <div class="col-12">
                            <!-- <button type="submit" class="btn btn-primary btn-block">Sign In</button> -->
                            <button class="btn btn-primary btn-block" id="loginBtn" type="submit">
                                <span id="btnText">Sign In</span>
                                <div id="spinner" class="spinner-border spinner-border-sm text-light" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/login.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>