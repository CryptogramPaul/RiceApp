$(document).ready(function () {
  SymptomsDetails();

  $("#FormSymptoms").on("submit", function (e) {
    e.preventDefault();

    if ($("#SymptomsOffCanvas").attr("operation") == 0) {
      SaveSymptoms();
    } else {
      const id = $("#SymptomsOffCanvas").attr("symptoms_id");
      UpdateSymptoms(id);
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
function SymptomsDetails() {
  $.post("view/symptoms/components/symptoms-details.php", {}, function (data) {
    $("#LoadSymptomsDetails").html(data);
  });
}
function SymptomsEntry(operation, id) {
  $.post(
    "view/symptoms/components/symptoms-entry.php",
    {
      id: id,
      operation: operation,
    },
    function (data) {
      $("#SymptomsEntry").html(data);
    }
  );
}
function DeleteSymptoms(id){
  $.post(
    "view/symptoms/actions/delete.php",
    {
      id: id,
     
    },
    function (data) {
      if (jQuery.trim(data) === "success") {
        alert("Delete successfully");
        SymptomsDetails(); // Call function to refresh disease details
    } else {
        alert(data);
    }
    }
  );
}