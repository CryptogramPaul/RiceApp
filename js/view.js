$(document).ready(function () {
  ViewDisease(8);
});
function ViewDisease(page) {
  $.post("view/disease.php", { page: page }, function (data) {
    $("#LoadSymptoms").html(data);
  });
}

const container = $("#LoadSymptoms");

container.on("change", ".symptom-checkbox", function () {
  const checkedCount = $(".symptom-checkbox:checked").length;

  $("#ViewSymptoms").attr("disabled", false);

  if (checkedCount == 0) {
    $("#ViewSymptoms").attr("disabled", true);
  }

  if (checkedCount > 5) {
    this.checked = false; // Uncheck the current box
    alert("You can select a maximum of 5 symptoms.");
  }
});

function viewSelectedSymptoms() {
  let selectedItems = [];

  $(".symptom-checkbox:checked").each(function () {
    const disease = $(this).attr("disease");
    selectedItems.push({ disease: disease });
  });

  let DiseaseJson = JSON.stringify(selectedItems);

  $.post(
    "view/symptoms-diagnosis.php",
    {
      DiseaseJson: DiseaseJson,
    },
    function (data) {
      $("#DiseaseList").html(data);
    }
  );
}

function ViewDiseaseInformation(disease_id) {
  $("#DiseaseList").html("");

  $.post(
    "view/disease-info.php",
    {
      disease_id: disease_id,
    },
    function (data) {
      $("#DiseaseList").html(data);
    }
  );
}