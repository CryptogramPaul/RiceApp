function LoadPestScript() {
  const url = "json/pest.json";
  const container = $("#LoadPest");

  const ViewPestSymptomsButton = $(
    '<button id="ViewPestSymptomsButton" class="btn btn-success my-3" title="View Symptoms" onclick="viewSelectedPest()" disabled>View Symptoms</button>'
  );

  const viewPestMoreButton = $(
    '<button id="viewPestMoreButton" class="btn btn-secondary my-3"><small>More Symptoms</small></button>'
  );

  let pestCount = 0; // Counter to track displayed pests
  const pestsPerLoad = 8; // Number of pests to display per load

  // Append buttons to the container
  container.after(ViewPestSymptomsButton);
  container.after(viewPestMoreButton);

  $.getJSON(url, function (data) {
    function loadPests() {
      const remainingPests = data.length - pestCount;
      const loadLimit = Math.min(remainingPests, pestsPerLoad);

      for (let i = 0; i < loadLimit; i++) {
        const value = data[pestCount];
        container.append(`
          <div class="col-xl-3 col-sm-6 col-md-4 my-1 pest-item" data-name="${value.pest_name.toLowerCase()}">
              <div class="card mb-2">
                <img src="${
                  value.pest_img
                }" class="card-img-top pests_img" alt="${value.pest_name}" />
                <div class="card-body">
                  <div class="form-check">
                    <input class="form-check-input pest-checkbox" type="checkbox" pest="${
                      value.pest_name
                    }" id="${value.pest_name}">
                    <label for="${value.pest_name}">${value.pest_name}</label>
                  </div>
                </div>
              </div>
            </div>
        `);
        pestCount++;
      }

      if (pestCount >= data.length) {
        viewPestMoreButton.hide(); // Hide the button when no more pests are left
      }
    }

    loadPests();

    viewPestMoreButton.on("click", function () {
      loadPests();
    });

    // Checkbox selection logic
    container.on("change", ".pest-checkbox", function () {
      const checkedCount = $(".pest-checkbox:checked").length;
      $(ViewPestSymptomsButton).attr("disabled", checkedCount === 0);

      if (checkedCount > 5) {
        this.checked = false; // Uncheck the current box
        alert("You can select a maximum of 5 Pests.");
      }
    });
  });
}
