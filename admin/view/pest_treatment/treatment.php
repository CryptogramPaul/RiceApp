<div class="container-fluid mt-5">
    <div class="row ">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
            <h2>Pest Treatment</h2>
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#TreatmentCanvas"
                aria-controls="offcanvasRight" onclick="TreatmentEntry(0,null)">Add</button>
        </div>
        <div class="table-responsive small mt-2">
            <table class="table table-bordered table-sm">
                <thead>
                    <col width="5%">
                    <col width="10%">
                    <col width="40%">
                    <col width="10%">
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Disease</th>
                        <th class="text-center">Treatment</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody id="LoadTreatmentDetails">

                </tbody>
            </table>
        </div>
    </div>
</div>
<form id="FormTreatment">
    <div class="offcanvas offcanvas-end" data-bs-backdrop="false" tabindex="-1" id="TreatmentCanvas"
        aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Treatment Entry</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" id="TreatmentEntry">

        </div>
    </div>
</form>
<script src="view/pest_treatment/js/script.js"></script>