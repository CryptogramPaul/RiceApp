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

<body style="background-color: rgb(225, 243, 215);">
    <header id="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="main-logo">
                    </div>
                </div>
                <div class="col-md-10">
                    <nav id="navbar">
                        <div class="main-menu stellarnav">
                            <ul class="menu-list">
                                <li class="menu-item has-sub">
                                </li>
                                <li class="menu-item active"><a href="#home">Home</a></li>
                                <li class="menu-item"><a href="#symptoms" class="nav-link">Sintomas</a></li>
                                <li class="menu-item"><a href="#pest" class="nav-link">Peste</a></li>
                            </ul>
                            <div class="hamburger">
                                <span class="bar"></span>
                                <span class="bar"></span>
                                <span class="bar"></span>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <section id="billboard">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <button class="prev slick-arrow">
                        <i class="icon icon-arrow-left"></i>
                    </button>
                    <div class="main-slider pattern-overlay">
                        <div class="slider-item">
                            <div class="banner-content">
                                <h2 class="banner-title">Rice Disease Identifier For Beginners</h2>

                                <div class="btn-wrap">
                                    <!--<a href="#" class="btn btn-outline-accent btn-accent-arrow">Read More<i-->
                                    <!--class="icon icon-ns-arrow-right"></i></a>-->
                                </div>
                            </div>
                            <img src="images/frontlogo.png" alt="square-image"
                                style="object-fit: cover 50%; border-radius: 30px; width: 400px; height: 400px; ">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section id="client-holder" data-aos="fade-up">
		<div class="container">
			<div class="row">
				<div class="inner-content">
					<div class="logo-wrap">
						 
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->

    <section id="symptoms" class="py-5 my-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header align-center">
                        <div class="title">
                            <h2 class="section-title">Sintomas</h2>
                        </div>
                    </div>
                    <div class="product-list" data-aos="fade-up">
                        <div class="row">
                            <div class="col-12 col-xl-6">
                                <input type="search" class="form-control" onkeypress="handleSearch(event)"
                                    id="SymptomSearch" placeholder="Search for symptoms">
                            </div>
                            <div class="col-12">
                                <h4>(Select up to 5 symptoms then click view diagnosis for more info.)</h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row" id="LoadSymptoms">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-wrap align-right">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="pest" class="py-5 my-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header align-center">
                        <div class="title">
                            <h2 class="section-title">Peste</h2>
                        </div>
                    </div>
                    <div class="product-list" data-aos="fade-up">
                        <div class="row">
                            <div class="col-12 col-xl-6">
                                <input type="search" class="form-control" onkeypress="PestSearch(event)" id="PestSearch"
                                    placeholder="Search for pests">
                            </div>
                        </div>
                        <hr>
                        <div class="row" id="LoadPest">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-wrap align-right">
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
<script src="js/script.js"></script>
<!-- <script src="js/symptoms.js"></script> -->
<script src="js/pest.js"></script>
<script src="js/view.js"></script>

</html>
<!-- <script>
	LoadSymptomsScript();
	LoadPestScript();	
</script> -->