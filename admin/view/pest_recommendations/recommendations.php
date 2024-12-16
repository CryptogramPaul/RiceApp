<div class="container-fluid mt-5">
    <!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
        id="title">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button"
                class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
                <i class="bi bi-calendar3"></i>
                This week
            </button>
        </div>
    </div> -->
    <div class="row ">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
            <h2>Recommendations Registry</h2>
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#RecommendationsCanvas" aria-controls="offcanvasRight"
                onclick="RecommendationsEntry(0,null)">Add</button>
        </div>
        <div class="table-responsive small mt-2">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Disease</th>
                        <th scope="col">Recommendations</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody id="LoadRecommendationsDetails">

                </tbody>
            </table>
        </div>
    </div>
</div>
<form id="FormRecommendations">
    <div class="offcanvas offcanvas-end" data-bs-backdrop="false" tabindex="-1" id="RecommendationsCanvas"
        aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Recommendations Entry</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" id="RecommendationsEntry">

        </div>
    </div>
</form>
<script src="view/pest_recommendations/js/script.js"></script>