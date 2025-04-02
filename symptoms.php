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
    background-attachment: fixed;
}

#home {
    height: 100vh;
    display: flex;
    /* align-items: center; */
    justify-content: center;
}

#home.container {
    max-width: 500px;
}

#home h1 {
    font-size: 3rem;
    color: white;
    /* text-align: center; */

}

.card-img-top {
    width: 100%;
    height: 10vw;
    object-fit: cover;
}

.back-btn {
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 20px;
    padding: 10px 20px;
    cursor: pointer;
}
</style>

<body>
    <section id="home">
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-4 text-center">
                    <img src="images/frontlogo.png" alt="square-image" class="mt-5"
                        style="object-fit: cover 50%; border-radius: 30px; width: 400px; height: 400px; ">
                </div> -->
                <div class="col" id="sintomas-div">
                    <h1 class="text-uppercase">Rice Disease Identifier - Sintomas</h1>

                    <!-- <p>Welcome to the Rice Disease Identifier! This tool will help you identify rice diseases based on symptoms you might encounter. Please provide your symptoms below and click the "Search" button.</p> -->
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-xl-6">
                                <input type="search" class="form-control" onkeypress="handleSearch(event)"
                                    id="SymptomSearch" placeholder="Search for symptoms">
                            </div>
                            <div class="col-12 d-flex align-items-center">
                                <a href="index.php" class="back-btn" type="button">Back</a>
                                <h4 class="text-white"> &nbsp;&nbsp;&nbsp;&nbsp;
                                    (Select up to 5
                                    symptoms then click view
                                    diagnosis for more
                                    info.)</h4>
                            </div>
                        </div>
                        <div class="row " id="LoadSymptoms">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <div class="modal fade" id="selectedSymptomsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header py-0 my-0">
                    <h1 class="modal-title" id="selectedSymptomsModalLabel">Disease</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row" id="DiseaseList">

                    </div>
                </div>
            </div>
        </div>
    </div>
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
<script>
$(document).ready(function() {
    ViewDisease(8);
});
</script>

</html>