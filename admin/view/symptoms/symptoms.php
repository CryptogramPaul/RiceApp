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
            <h2>Symptoms Registry</h2>
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#SymptomsCanvas"
                aria-controls="offcanvasRight" onclick="SymptomsEntry(0,null)">Add</button>
        </div>
        <div class="table-responsive small mt-2">
            <table class="table table-bordered table-sm">
                <thead>
                    <col width="5%">
                    <col width="10%">
                    <col width="10%">
                    <col width="10%">
                    <col width="40%">
                    <col width="10%">
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Disease</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Symptoms Name</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody id="LoadSymptomsDetails">

                </tbody>
            </table>
        </div>
    </div>
</div>
<form id="FormSymptoms">
    <div class="offcanvas offcanvas-end" data-bs-backdrop="false" tabindex="-1" id="SymptomsCanvas"
        aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Symptoms Entry</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" id="SymptomsEntry">

        </div>
    </div>
</form>
<script src="view/symptoms/js/script.js"></script>