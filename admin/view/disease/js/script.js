$(document).ready(function () {
  DiseaseDetails();
});
function DiseaseDetails() {
  $.post("view/disease/components/disease-details.php", {}, function (data) {
    $("#LoadDiseaseDetails").html(data);
  });
}
