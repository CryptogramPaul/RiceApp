$(document).ready(function () {
  Disease();
});
function Disease() {
  $.post("view/disease/disease.php", {}, function (data) {
    $("#MainContent").html(data);
  });
}
