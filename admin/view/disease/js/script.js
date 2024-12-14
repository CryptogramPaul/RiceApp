$(document).ready(function () {
  DiseaseDetails();

  $("#FormDisease").on("submit", function (e) {
    e.preventDefault();

    if ($("#DiseaseOffCanvas").attr("operation") == 0) {
      SaveDisease();
    } else {
      const id = $("#DiseaseOffCanvas").attr("disease_id");
      UpdateDisease(id);
    }
  });

  // $("#diseaseCanvas").oncanvas({
  //   width: 600,
  //   height: 400,
  //   background: "#ffffff",
  //   onDraw: function (context) {
  //     context.fillStyle = "black";
  //     context.font = "30px Arial";
  //     context.fillText("Disease Canvas", 10, 30);
  //   },
  // });
});
function DiseaseDetails() {
  $.post("view/disease/components/disease-details.php", {}, function (data) {
    $("#LoadDiseaseDetails").html(data);
  });
}
function DiseaseEntry(operation, id) {
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
