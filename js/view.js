// $(document).ready(function () {
//   ViewDisease(8);
//   ViewPest(8);
// });

$("#SymptomSearch").on("keyup", function () {
  ViewDisease(8);
});
$("#PestSearch").on("keyup", function () {
  ViewPest(8);
});

function ViewDisease(page) {
  var symptom_search = $("#SymptomSearch").val();
  $.post(
    "view/disease.php",
    {
      page: page,
      symptom_search: symptom_search,
    },
    function (data) {
      $("#LoadSymptoms").html(data);
    }
  );
}
function ViewPest(page) {
  var pest_search = $("#PestSearch").val();
  $.post(
    "view/pest.php",
    {
      page: page,
      pest_search: pest_search,
    },
    function (data) {
      $("#LoadPest").html(data);
    }
  );
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

function ViewPestInformation(id) {
  $.post(
    "view/pest-info.php",
    {
      id: id,
    },
    function (data) {
      $("#PestDescription").html(data);
    }
  );
}

function Sintomas() {
  $("#home-div").html("");

  // var symptom_search = $("#SymptomSearch").val();
  $.post(
    "view/disease.php",
    {
      page: "8",
      symptom_search: "",
    },
    function (data) {
      $("#home-div").html(data);
    }
  );
}


function SintomasPage() {
  window.location.href = "symptoms.php"
}
function PestePage() {
  window.location.href = "pest.php"
}
function BackIndex() {
  window.location.href = "index.php"
}
// function BackPeste() {
//   window.location.href = "index.php"
// }

