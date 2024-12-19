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
    "view/pest_treatment/components/treatment-details.php",
    {},
    function (data) {
      $("#LoadTreatmentDetails").html(data);
    }
  );
}
function TreatmentEntry(operation, id) {
  $.post(
    "view/pest_treatment/components/treatment-entry.php",
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
    "view/pest_treatment/actions/delete.php",
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
  const pest = $("#pest").val();
  const treatment = $("#treatment").val();

  $.post(
    "view/pest_treatment/actions/save.php",
    {
      pest: pest,
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
  const pest = $("#pest").val();
  const treatment = $("#treatment").val();

  $.post(
    "view/pest_treatment/actions/update.php",
    {
      id: id,
      pest: pest,
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
