$(document).ready(function () {
  Disease();
});
function Disease() {
  $.post("view/disease/disease.php", {}, function (data) {
    $("#MainContent").html(data);
  });
}
function Symptoms() {
  $.post("view/symptoms/symptoms.php", {}, function (data) {
    $("#MainContent").html(data);
  });
}
function DiseaseRecommendations() {
  $.post(
    "view/disease_recommendations/recommendations.php",
    {},
    function (data) {
      $("#MainContent").html(data);
    }
  );
}
function DiseaseTreatment() {
  $.post("view/treatment/treatment.php", {}, function (data) {
    $("#MainContent").html(data);
  });
}
function Pest() {
  $.post("view/pest/pest.php", {}, function (data) {
    $("#MainContent").html(data);
  });
}
function PestRecommendations() {
  $.post("view/pest_recommendations/recommendations.php", {}, function (data) {
    $("#MainContent").html(data);
  });
}
function PestTreatment() {
  $.post("view/pest_treatment/treatment.php", {}, function (data) {
    $("#MainContent").html(data);
  });
}
function UserRegistry() {
  $.post("view/user/user.php", {}, function (data) {
    $("#MainContent").html(data);
  });
}
