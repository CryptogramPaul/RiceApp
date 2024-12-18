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
  
});
function RecommendationDetails() {
  $.post(
    "view/pest_recommendations/components/recommendations-details.php",
    {},
    function (data) {
      $("#LoadRecommendationsDetails").html(data);
    }
  );
}
function RecommendationsEntry(operation, id) {
  $.post(
    "view/pest_recommendations/components/recommendations-entry.php",
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
    "view/pest_recommendations/actions/delete.php",
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
  const pest = $("#pest").val();
  const recommendations = $("#recommendations").val();

  $.post(
    "view/pest_recommendations/actions/save.php",
    {
      pest: pest,
      recommendations: recommendations,
    },
    function (data) {
      if (jQuery.trim(data) === "success") {
        $("#RecommendationsCanvas").offcanvas("hide");
        alert("Recommendations saved successfully");
        RecommendationDetails();
      } else {
        alert(data);
      }
    }
  );
}

function UpdateRecommendations(id) {
  const pest = $("#pest").val();
  const recommendations = $("#recommendations").val();

  $.post(
    "view/pest_recommendations/actions/update.php",
    {
      id: id,
      pest: pest,
      recommendations: recommendations,
    },
    function (data) {
      if (jQuery.trim(data) === "success") {
        $("#RecommendationsCanvas").offcanvas("hide");
        alert("Recommendations update successfully");
        RecommendationDetails(); 
      } else {
        alert(data);
      }
    }
  );
}
