$(document).ready(function () {
  PestDetails();

  $("#FormPest").on("submit", function (e) {
    e.preventDefault();

    if ($("#PestOffCanvas").attr("operation") == 0) {
      SavePest();
    } else {
      const id = $("#PestOffCanvas").attr("pest_id");
      UpdatePest(id);
    }
  });
});
function PestDetails() {
  $.post("view/pest/components/pest-details.php", {}, function (data) {
    $("#LoadPestDetails").html(data);
  });
}
function PestEntry(operation, id) {
  $.post(
    "view/pest/components/pest-entry.php",
    {
      id: id,
      operation: operation,
    },
    function (data) {
      $("#PestEntry").html(data);
    }
  );
}
function DeletePest(id) {
  $.post(
    "view/pest/actions/delete.php",
    {
      id: id,
    },
    function (data) {
      if (jQuery.trim(data) === "success") {
        alert("Delete successfully");
        PestDetails(); // Call function to refresh disease details
      } else {
        alert(data);
      }
    }
  );
}
