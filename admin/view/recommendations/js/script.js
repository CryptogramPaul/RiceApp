$(document).ready(function () {
  RecommendationDetails();

  $("#FormRecommendations").on("submit", function (e) {
    e.preventDefault();

    if ($("#RecommendationsOffCanvas").attr("operation") == 0) {
      SaveRecommendations();
    } else {
      const id = $("#RecommendationsOffCanvas").attr("recommendations_id");
      UpdateRecommendations(id);
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
function RecommendationDetails() {
  $.post(
    "view/recommendations/components/recommendations-details.php",
    {},
    function (data) {
      $("#LoadRecommendationsDetails").html(data);
    }
  );
}
function RecommendationsEntry(operation, id) {
  $.post(
    "view/recommendations/components/recommendations-entry.php",
    {
      id: id,
      operation: operation,
    },
    function (data) {
      $("#RecommendationsEntry").html(data);
    }
  );
}
function DeleteRecommendations(id) {
  $.post(
    "view/recommendations/actions/delete.php",
    {
      id: id,
    },
    function (data) {
      if (jQuery.trim(data) === "success") {
        alert("Delete successfully");
        RecommendationDetails(); // Call function to refresh disease details
      } else {
        alert(data);
      }
    }
  );
}
function SaveRecommendations() {
  const disease = $("#disease").val();
  const recommendations = $("#recommendations").val();

  $.post(
    "view/recommendations/actions/save.php",
    {
      disease: disease,
      recommendations: recommendations,
    },
    function (data) {
      if (jQuery.trim(data) === "success") {
        $("#RecommendationsCanvas").offcanvas("hide");
        alert("Recommendations saved successfully");
        RecommendationDetails(); // Call function to refresh disease details
      } else {
        alert(data);
      }
    }
  );
}

function UpdateRecommendations(id) {
  const disease = $("#disease").val();
  const recommendations = $("#recommendations").val();

  $.post(
    "view/recommendations/actions/update.php",
    {
      id: id,
      disease: disease,
      recommendations: recommendations,
    },
    function (data) {
      if (jQuery.trim(data) === "success") {
        $("#RecommendationsCanvas").offcanvas("hide");
        alert("Recommendations saved successfully");
        RecommendationDetails(); // Call function to refresh disease details
      } else {
        alert(data);
      }
    }
  );
}
