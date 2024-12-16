$(document).ready(function () {
  TreatmentDetails();

  $("#FormTreatment").on("submit", function (e) {
    e.preventDefault();

    if ($("#TreatmentOffCanvas").attr("operation") == 0) {
      SaveTreatment();
    } else {
      const id = $("#TreatmentOffCanvas").attr("treatment_id");
      UpdateTreatment(id);
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
function TreatmentDetails() {
  $.post(
    "view/treatment/components/treatment-details.php",
    {},
    function (data) {
      $("#LoadTreatmentDetails").html(data);
    }
  );
}
function TreatmentEntry(operation, id) {
  $.post(
    "view/treatment/components/treatment-entry.php",
    {
      id: id,
      operation: operation,
    },
    function (data) {
      $("#TreatmentEntry").html(data);
    }
  );
}
function DeleteTreatment(id) {
  $.post(
    "view/treatment/actions/delete.php",
    {
      id: id,
    },
    function (data) {
      if (jQuery.trim(data) === "success") {
        alert("Delete successfully");
        TreatmentDetails();
      } else {
        alert(data);
      }
    }
  );
}
function SaveTreatment() {
  const disease = $("#disease").val();
  const treatment = $("#treatment").val();

  $.post(
    "view/treatment/actions/save.php",
    {
      disease: disease,
      treatment: treatment,
    },
    function (data) {
      if (jQuery.trim(data) === "success") {
        $("#TreatmentCanvas").offcanvas("hide");
        alert("Treatment saved successfully");
        TreatmentDetails();
      } else {
        alert(data);
      }
    }
  );
}

function UpdateTreatment(id) {
  const disease = $("#disease").val();
  const treatment = $("#treatment").val();

  $.post(
    "view/treatment/actions/update.php",
    {
      id: id,
      disease: disease,
      treatment: treatment,
    },
    function (data) {
      if (jQuery.trim(data) === "success") {
        $("#TreatmentCanvas").offcanvas("hide");
        alert("Treatment updated successfully");
        TreatmentDetails(); // Call function to refresh disease details
      } else {
        alert(data);
      }
    }
  );
}
