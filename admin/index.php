<?php 
  require_once '../conn/connection.php';
  if (!isset($_COOKIE['userid'])) {
      header("Location: login.php");
  }

  $id = $_COOKIE['userid'];
//   $user_role = $_COOKIE['user_role'];

    $sql_user = $conn->prepare("SELECT CONCAT_WS(' ', firstname, lastname) as name FROM user WHERE id = ?");
    $sql_user->execute([$id]);
    $user = $sql_user->fetch();
  ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Rice Disease Identifier - Admin</title>

    <link rel="icon" href="../images/frontlogo.png" type="image/x-icon">

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .ml-auto,
    .mx-auto {
        margin-left: auto !important;
    }

    /* .navbar-nav{
          float: right;
        } */
    </style>

    <link href="css/navbar-top-fixed.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../images/frontlogo.png" alt="" height="50px" width="50px">
                &nbsp;
                Rice Disease Identifier
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Disease
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" onclick="Disease()">Disease</a></li>
                            <li><a class="dropdown-item" href="#" onclick="Symptoms()">Symptoms</a></li>
                            <li><a class="dropdown-item" href="#" onclick="DiseaseRecommendations()">Recommendations</a>
                            </li>
                            <li><a class="dropdown-item" href="#" onclick="DiseaseTreatment()">Treatment</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Pest
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" onclick="Pest()">Pest</a></li>
                            <li><a class="dropdown-item" href="#" onclick="PestRecommendations()">Recommendations</a>
                            </li>
                            <li><a class="dropdown-item" href="#" onclick="PestTreatment()">Treatment</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#" onclick="UserRegistry()">User</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user-circle"></i>
                            <?php echo $user['name'] ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <!-- <li><a class="dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="#sign_up_modal"
                                    onclick="SignUpModal('', 1)"
                                    href="#">User Profile</a></li> -->
                            <li><a class="dropdown-item" href="#" onclick="Logout()">Logout</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container" id="MainContent">

    </main>

    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="js/menu.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>