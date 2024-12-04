function LoadPestScript() {
  const url = "json/pest.json";
  const container = $("#LoadPest");

  // const ViewPestSymptomsButton = $(
  //   '<button id="ViewPestSymptomsButton" class="btn btn-success my-3 mx-2" title="View Symptoms" onclick="viewSelectedPest()" disabled>View Pest</button>'
  // );

  const viewPestMoreButton = $(
    '<button id="viewPestMoreButton" class="btn btn-secondary my-3 mx-2"><small>More Pest</small></button>'
  );

  let pestCount = 0; // Counter to track displayed pests
  const pestsPerLoad = 8; // Number of pests to display per load

  // Append buttons to the container
  // container.after(ViewPestSymptomsButton);
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
                <div class="card-body text-center">
                  <div class="form-check">
                    <label for="${value.pest_name}">${value.pest_name}</label>
                  </div>
                  <div class="">
                    <button class="btn btn-sm btn-outline-success" style="height: 30px;" onclick="ViewPestInformation('${value.pest_name}')">VIEW INFORMATION</button>
                  </div>
                </div>
              </div>
            </div>
        `);
        pestCount++;
      }
      
      if (pestCount >= data.length) {
        viewPestMoreButton.hide(); 
      }
    }
    
    container.append(`
      <div id="NoPestRecordFound" class="col-12">
        <p class="text-center">No records found.</p>
      </div>
    `);

    $("#NoPestRecordFound").hide(); 

    loadPests();
    viewPestMoreButton.on("click", function () {
      loadPests();
      $("#NoPestRecordFound").hide(); 
    });

  });
}

function PestSearch(event) {
  const query = event.target.value.toLowerCase(); // Get the current input value
  const container = $("#LoadPest");
  let resultsFound = false;
  $(".pest-item").each(function () {
    const name = $(this).data("name");

    if (name.includes(query)) {
      $(this).show();
      resultsFound = true;
    } else {
      $(this).hide();
    }
  });

  if (!resultsFound) {
    $("#viewPestMoreButton").hide();
    $("#NoPestRecordFound").show();
  } else {
    $("#NoPestRecordFound").hide();
    $("#viewPestMoreButton").show();
  }
}


function ViewPestInformation(pest) {

  const url = "json/pest.json";
  const PestDescription = $("#PestDescription");
  PestDescription.empty();

  $.getJSON(url, function (data) {
    const pestEntry = data.find((entry) => entry.pest_name === pest);

    if (pestEntry) {
      const pest_name = pestEntry.pest_name;
      const description = pestEntry.description;
      const pestImg = pestEntry.pest_img;
      const recommendations = pestEntry.recommendations || [];
      const treatments = pestEntry.treatment || [];

      PestDescription.append(`
      <div class="col-12 col-xl-4 my-1">
        <div class="card mb-2">
          <img src="${pestImg}" class="card-img-top symptoms_img" alt="${pest_name}" class="m-1" />
          <div class="card-body">
              <h1 class="m-0 p-0">
                ${pest_name}
              </h1>
          </div>
          <div class="px-2">  
            <h2 class="m-0 p-0">Descriptions:</h2>
            <p class="card-text ">${description}</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-xl-4 " id="">
        <h3>Recommendations:</h3>
        <ul id="recommendations"></ul>
      </div>
      <div class="col-12 col-xl-4 " id="">
        <h3>Treatment:</h3>
        <ul id="treatment"></ul>
      </div>
    `);

      const recList = document.getElementById("recommendations");
      recList.innerHTML = "";
      recommendations.forEach((rec) => {
        const li = document.createElement("li");
        li.textContent = rec;
        recList.appendChild(li);
      });

      const treList = document.getElementById("treatment");
      treList.innerHTML = "";
      treatments.forEach((treat) => {
        const li = document.createElement("li");
        li.textContent = treat;
        treList.appendChild(li);
      });

      // console.log("Description:", description);
      // console.log("Recommendations:", recommendations);
      // console.log("Treatments:", treatments);
    } else {
      console.log(`Pest "${pest_name}" not found in the dataset.`);
    }
  }).fail(function () {
    console.error("Error loading the JSON file.");
  });


    const modal = new bootstrap.Modal(
      document.getElementById("PestModal")
    );
    modal.show();
}

