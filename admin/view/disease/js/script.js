$(document).ready(function () {
  DiseaseDetails();
});
function DiseaseDetails() {
  $.post("view/disease/components/disease-details.php", {}, function (data) {
    $("#LoadDiseaseDetails").html(data);
  });
}
function DiseaseEntry(id, operation) {
  $.post(
    "view/disease/components/disease-entry.php",
    {
      id: id,
      operation: operation,
    },
    function (data) {
      $("#DiseaseEntry").html(data);
    }
  );
}

function SaveDisease() {
  const disease_img = $("#disease_img")[0].files[0];
  const disease = $("#disease_name").val();
  const description = $("#disease_description").val();
  $.post(
    "view/disease/action/save.php",
    {
      disease_img: disease_img,
      disease: disease,
      description: description,
    },
    function (data) {
      if (jQuery.trim(data) == "success") {
        $("#diseaseCanvas").offcanvas("hide");
        alert("Disease saved successfully");
        DiseaseDetails();
      } else {
        alert(data);
      }
    }
  );
}
