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
function Recommendations() {
  $.post("view/recommendations/recommendations.php", {}, function (data) {
    $("#MainContent").html(data);
  });
}
function Treatment() {
  $.post("view/treatment/treatment.php", {}, function (data) {
    $("#MainContent").html(data);
  });
}
