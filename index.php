<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome to Rice Disease Identifier</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="icon" href="images/frontlogo.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="css/normalize.css"> -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/vendor.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/card.css">

</head>
<style>
body {
    background-image: url('images/background.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    height: 100%;

}

#home {
    height: 100vh;

    justify-content: center;

}

#home h1 {
    font-size: 4rem;
    color: white;
    text-align: center;

}

.main-logo {
    width: 50px;
    height: 50px;
}

.div-logo {
    display: flex;
    align-items: center;
}


.text-background {
    background-image: url('images/background-text.jpg');
    background-size: cover;
    /* Ensures the background image covers the entire element */
    background-position: center;
    /* Centers the background image */
    height: 100vh;
    /* Example height, you can adjust this value as needed */
    text-align: center;
    display: flex;
    align-items: center;
    opacity: 0.7;
    /* background-color: rgba(255, 255, 255, 0.8); */
}

.action-btn {
    padding: 10px 20px;
    height: 100vh;
    /* border-radius: 10px; */
    display: flex;
    align-items: center;
    /* margin-right: 20px; */
}
</style>

<body>
    <header id="header" class=" bg-success">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 d-flex div-logo">
                    <div class="main-logo">
                        <a href="#"><img src="images/frontlogo.png" alt="logo" height=""></a>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <!-- <h1 class="text-uppercase text-center">Rice Disease Identifier</h1> -->
                    <h2 class="text-uppercase text-center text-white">Rice Disease Identifier for Beginners</h2>
                </div>
            </div>
        </div>
    </header>
    <section id="home">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="text-background">
                        <h1 class="text-center text-uppercase">Ano ang makita nga problema sa paray?</h1>
                    </div>
                </div>
                <div class="col-md-8" id="home-div">
                    <div class="row justify-content-center action-btn">
                        <div class="text-center col-xl-4 col-sm-6 col-md-4 ">
                            <div class="card" style="width: 17rem;" onclick="SintomasPage()">
                                <img class="card-img-left" src="images/sintomas-logo.jpg">
                                <!-- <div class="card-body"> -->
                                <!-- <a href="symptoms.php" type="button" class="btn btn-secondary">Sintomas</a> -->
                                <!-- </div> -->
                                <h2>Sintomas</h2>
                            </div>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="text-center col-xl-4 col-sm-6 col-md-6" onclick="PestePage()">
                            <div class="card " style="width: 17rem;">
                                <img class="card-img-left" src="images/peste-logo.jpg">
                                <!-- <div class="card-body"> -->
                                <!-- <a href="pest.php" type="button" class="btn btn-secondary"
                                        onclick="Peste()">Peste</a> -->
                                <!-- </div> -->
                                <h2>Peste</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="images/frontlogo.png" alt="square-image" class="mt-5"
                        style="object-fit: cover 50%; border-radius: 30px; width: 400px; height: 400px; ">
                </div>
                <div class="col-md-8" id="home-div">
                    <h1 class="text-uppercase text-center">Rice Disease Identifier</h1>
                    <h1 class="text-center ">Ano ang nakita mo sa imo parayan?</h1>

                    <div class="row justify-content-center">
                        <div class="text-center col-xl-3 col-sm-6 col-md-4 ">
                            <div class="card" style="width: 14rem;">
                                <img class="card-img-left" src="images/symptoms-logo.png">
                                <div class="card-body">
                                    <a href="symptoms.php" type="button" class="btn btn-secondary">Sintomas</a>
                                </div>
                            </div>
                        </div>
                        <div class="text-center col-xl-3 col-sm-6 col-md-4 ">
                            <div class="card" style="width: 14rem;">
                                <img class="card-img-left" src="images/pest-logo.jpg">
                                <div class="card-body">
                                    <a href="pest.php" type="button" class="btn btn-secondary"
                                        onclick="Peste()">Peste</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->


    </section>

</body>
<script src="js/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>
<script src="js/plugins.js"></script>
<!-- <script src="js/script.js"></script> -->
<!-- <script src="js/symptoms.js"></script> -->
<!-- <script src="js/pest.js"></script> -->
<script src="js/view.js"></script>

</html>