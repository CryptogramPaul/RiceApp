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
/* body {
    background-image: url('images/background.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

#home {
    height: 100vh;
    display: flex;
    justify-content: center;
}

#home.container {
    max-width: 500px;
}

#home h1 {
    font-size: 4rem;
    color: white;
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
} */

body {
    font-family: sans-serif;
    background-image: url('images/background.jpg');
    background-size: cover;
    /* background-repeat: no-repeat; */
    background-attachment: fixed;
    overflow: hidden;
}

.div-logo{
    display: flex;
    align-items: center;
}
.main-logo{
    width: 50px;
    height: 50px;
}

.main-container {
  display: flex;
  height: 100vh;
  /* overflow: hidden; */
}

.sidebar {
  width: 300px;
  /* background-color: rgba(0, 0, 0, 0.3); semi-transparent overlay */
  background-image: url('images/background-text.jpg');
  background-size: cover;
  color: white;
  text-align: center;
  padding: 40px 20px;
  flex-shrink: 0;
  opacity: 0.9;
  transition: transform 0.3s;
}

.icon {
  width: 250px;
  height: 250px;
  margin-bottom: 20px;
}

.content-area {
  flex: 1;
  padding: 20px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
}



.card-scroll {
  flex: 1;
  overflow-x: auto;
  padding-right: 10px; 
  margin-bottom: 70px;
}

.card-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 10px;
}
@media (max-width: 1024px) {
  .card-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 600px) {
  .card-grid {
    grid-template-columns: 1fr;
  }
}




</style>

<body>
    <header id="header" class="bg-success">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 d-flex div-logo" >
                    <div class="main-logo">
                        <a href="#"><img src="images/frontlogo.png" alt="logo" height="" ></a>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <h2 class="text-uppercase text-center text-white">Rice Disease Identifier for Beginners</h2>
                </div>
            </div>
        </div>
    </header>
    <div class="main-container">
        <div class="sidebar">
            <img src="images/peste-logo.jpg" class="icon" />
            <h1 class="text-white">Peste</h1>
        </div>

        <div class="content-area">
            <!-- <div class="top-bar">
            <input type="text" placeholder="Search for symptoms..." />
            <button>BACK</button>
            </div> -->
            <div class="flex items-center p-2 rounded-2xl shadow-md max-w-xl ml-auto">
                <input 
                    type="text" 
                    placeholder="Search for pests..." 
                    class="w-3/4 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    onkeypress="PestSearch(event)" id="PestSearch"
                />
                
                <button 
                    class=" bg-blue-600 text-white bg-success font-semibold rounded-lg hover:bg-blue-700 transition ml-4"
                    onclick="BackIndex()"
                >
                    Back
                </button>
            </div>
            <div class="card-scroll" id="LoadPest">
                
            </div>
        </div>
    </div>

    <div class="modal fade" id="PestModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header py-0 my-0">
                    <h1 class="modal-title" id="pestModalLabel">Pest</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row" id="PestDescription">

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
    ViewPest(8);
});
</script>

</html>