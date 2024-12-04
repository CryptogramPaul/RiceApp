function LoadSymptomsScript() {
  const url = "json/symptoms.json";
  const container = $("#LoadSymptoms");
  const viewMoreButton = $(
    '<button id="viewMoreButton" class="btn btn-secondary my-3 mx-2" ><small>More Symptoms</small></button>'
  );

  const ViewSymptomsButton = $(
    '<button id="ViewSymptoms" class="btn btn-success my-3 mx-2" title="View Symptoms" onclick="viewSelectedSymptoms()" disabled>View Symptoms</button>'
  );

  $.getJSON(url, function (data) {
    const groupedSymptoms = {};

    data.forEach((value) => {
      value.symptoms.forEach((symptom) => {
        const name = symptom.name;
        const disease = value.disease || "Unknown Disease";
        if (!groupedSymptoms[name]) {
          // groupedSymptoms[name] = symptom.img_path;
          groupedSymptoms[name] = {
            img_path: symptom.img_path,
            disease: disease,
          };
        }
      });
    });

    const symptomsArray = Object.entries(groupedSymptoms);
    const totalSymptoms = symptomsArray.length;
    let displayedSymptomsCount = 8; // Start by displaying 10 symptoms

    function displaySymptoms(limit) {
      container.empty();
      for (let i = 0; i < Math.min(limit, totalSymptoms); i++) {
        // const [name, imgPath] = symptomsArray[i];
        const [name, { img_path, disease }] = symptomsArray[i];

        container.append(`
          <div class="col-xl-3 col-sm-6 col-md-4 my-1 symptom-item" data-name="${name.toLowerCase()}">
            <div class="card mb-2">
              <img src="${img_path}" class="card-img-top symptoms_img" alt="${name}"  class="m-1" />
              <div class="card-body">
                <div class="form-check">
                  <input class="form-check-input symptom-checkbox" type="checkbox" disease="${disease}" id="${name}">
                  <label class="form-check-label" for="${name}">
                    ${name} 
                  </label>
                </div>
              </div>
            </div>
          </div>
        `);
      }
      container.append(`
        <div id="NoRecordFound" class="col-12">
          <p class="text-center">No records found</p>
        </div>
      `);

      $("#NoRecordFound").hide();

      if (limit < totalSymptoms) {
        container.after(viewMoreButton);
      }
    }

    displaySymptoms(displayedSymptomsCount);
    $("#viewMoreButton").after(ViewSymptomsButton);

    viewMoreButton.on("click", function () {
      displayedSymptomsCount += 8;
      displaySymptoms(displayedSymptomsCount);

      if (displayedSymptomsCount >= totalSymptoms) {
        viewMoreButton.hide(); // Hide the button
      }

      $("#viewMoreButton").after(ViewSymptomsButton);
    });

    container.on("change", ".symptom-checkbox", function () {
      const checkedCount = $(".symptom-checkbox:checked").length;
      $(ViewSymptomsButton).attr("disabled", false);

      if (checkedCount == 0) {
        $(ViewSymptomsButton).attr("disabled", true);
      }

      if (checkedCount > 5) {
        this.checked = false; // Uncheck the current box
        alert("You can select a maximum of 5 symptoms.");
      }
    });
  });
}

let diseaseData = {};
let diseaseDataLoaded = false;

function loadDiseaseData() {
  if (diseaseDataLoaded) return Promise.resolve();

  const url = "json/symptoms.json";
  return $.getJSON(url).then((data) => {
    data.forEach((entry) => {
      const disease = entry.disease;
      const disease_img = entry.disease_img;

      if (!diseaseData[disease]) {
        diseaseData[disease] = disease_img;
      }
    });
    diseaseDataLoaded = true;
  });
}

function viewSelectedSymptoms() {
  loadDiseaseData().then(() => {
    const selectedSymptomsList = $("#DiseaseList");
    selectedSymptomsList.empty();
    const selectedDiseases = new Set();

    $(".symptom-checkbox:checked").each(function () {
      const disease = $(this).attr("disease");

      if (disease) {
        selectedDiseases.add(disease);
      }
    });

    selectedDiseases.forEach((disease) => {
      const diseaseImg = diseaseData[disease] || "images/sample.png";
      selectedSymptomsList.append(`
        <div class="col-xl-3 col-sm-6 col-md-4 my-1">
          <div class="card mb-2">
            <img src="${diseaseImg}" class="card-img-top symptoms_img" alt="${disease}" class="m-1" />
            <div class="card-body">
              <div class="form-check">
                <label class="form-check-label">
                  ${disease}
                </label>
                <button class="btn btn-sm btn-outline-success" style="height: 30px;" onclick="ViewInformation('${disease}')">VIEW INFORMATION</button>
              </div>
            </div>
          </div>
        </div>
      `);
    });

    const modal = new bootstrap.Modal(
      document.getElementById("selectedSymptomsModal")
    );
    modal.show();
  });
}

// let diseaseData = {};

// function loadDiseaseData() {
//   const url = "json/symptoms.json";

//   $.getJSON(url, function (data) {
//     data.forEach((entry) => {
//       const disease = entry.disease;
//       const disease_img = entry.disease_img;

//       if (!diseaseData[disease]) {
//         diseaseData[disease] = disease_img;
//       }
//     });
//   });
// }

// function viewSelectedSymptoms() {
//   loadDiseaseData();
//   const selectedSymptomsList = $("#DiseaseList");
//   selectedSymptomsList.empty();
//   const selectedDiseases = new Set();

//   $(".symptom-checkbox:checked").each(function () {
//     const disease = $(this).attr("disease");

//     if (disease) {
//       selectedDiseases.add(disease);
//     }
//   });

//   selectedDiseases.forEach((disease) => {
//     const diseaseImg = diseaseData[disease] || "images/sample.png";
//     selectedSymptomsList.append(`
//       <div class="col-xl-3 col-sm-6 col-md-4 my-1">
//         <div class="card mb-2">
//           <img src="${diseaseImg}" class="card-img-top symptoms_img" alt="${disease}" class="m-1" />
//           <div class="card-body">
//             <div class="form-check">
//               <label class="form-check-label">
//                 ${disease}
//               </label>
//               <button class="btn btn-sm btn-outline-success" style="height: 30px;" onclick="ViewInformation('${disease}')">VIEW INFORMATION</button>
//             </div>
//           </div>
//         </div>
//       </div>
//     `);
//   });

//   const modal = new bootstrap.Modal(
//     document.getElementById("selectedSymptomsModal")
//   );
//   modal.show();
// }

function ViewInformation(disease) {
  const url = "json/symptoms.json";
  const selectedSymptomsList = $("#DiseaseList");
  selectedSymptomsList.empty();

  $.getJSON(url, function (data) {
    const diseaseEntry = data.find((entry) => entry.disease === disease);

    if (diseaseEntry) {
      const disease = diseaseEntry.disease;
      const description = diseaseEntry.description;
      const diseaseImg = diseaseEntry.disease_img;
      const recommendations = diseaseEntry.recommendations || [];
      const treatments = diseaseEntry.treatment || [];

      selectedSymptomsList.append(`
      <div class="col-12 col-xl-4 my-1">
        <div class="card mb-2">
          <img src="${diseaseImg}" class="card-img-top symptoms_img" alt="${disease}" class="m-1" />
          <div class="card-body">
              <h1 class="m-0 p-0">
                ${disease}
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
      console.log(`Disease "${disease}" not found in the dataset.`);
    }
  }).fail(function () {
    console.error("Error loading the JSON file.");
  });
}

// function ViewInformation(disease) {
//   const url = "json/symptoms.json";

//   $.getJSON(url, function (data) {
//     data.forEach((entry) => {
//       const descrption = entry.descrption;
//       entry.recommendation.forEach((symptom) => {
//         if (!diseaseData[disease]) {
//           diseaseData[disease] = disease_img;
//         }
//       });
//       entry.recommendation.forEach((symptom) => {
//         // Store the disease and its image if not already added
//         if (!diseaseData[disease]) {
//           diseaseData[disease] = disease_img;
//         }
//       });
//     });
//   });

//   console.log(disease);
// }

function handleSearch(event) {
  const query = event.target.value.toLowerCase(); // Get the current input value
  const container = $("#LoadSymptoms");
  let resultsFound = false;
  $(".symptom-item").each(function () {
    const name = $(this).data("name");

    if (name.includes(query)) {
      $(this).show();
      resultsFound = true;
    } else {
      $(this).hide();
    }
  });

  // console.log(resultsFound);

  if (!resultsFound) {
    $("#viewMoreButton").hide();
    $("#ViewSymptoms").hide();
    $("#NoRecordFound").show();
  } else {
    $("#NoRecordFound").hide();
    $("#ViewSymptoms").show();
    $("#viewMoreButton").show();
  }
}

function SearchSymptoms() {
  $("#symptomSearch").on("input", function () {
    const query = $(this).val().toLowerCase();

    $(".symptom-item").each(function () {
      const name = $(this).data("name");
      if (name.includes(query)) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  });
}

// PEST FUNCTIONS

// function LoadPestScript() {
//   const url = "json/pest.json";
//   const container = $("#LoadPest");

//   const viewPestMoreButton = $(
//     '<button id="viewPestMoreButton" class="btn btn-secondary my-1" ><small>More Symptoms</small></button>'
//   );

//   const ViewPestSymptomsButton = $(
//     '<button id="ViewPestSymptomsButton" class="btn btn-success my-3" title="View Symptoms" onclick="viewSelectedSymptoms()" disabled>View Symptoms</button>'
//   );

//   $.getJSON(url, function (data) {
//     data.forEach((value) => {
//       container.append(`
//         <div class="col-xl-3 col-sm-6 col-md-4 my-1 pest-item" data-name="${value.pest_name.toLowerCase()}">
//             <div class="card mb-2">
//               <img src="${
//                 value.pest_img
//               }" class="card-img-top pests_img" alt="${
//         value.pest_name
//       }"  class="m-1" />
//               <div class="card-body">
//                 <div class="form-check">
//                   <input class="form-check-input pest-checkbox" type="checkbox" pest="${
//                     value.pest_name
//                   }" id="${value.pest_name}">
//                   <label for="${value.pest_name}">${value.pest_name}</label>
//                 </div>
//               </div>
//             </div>
//           </div>
//       `);
//     });

//     container.append(`
//         <div id="NoRecordFound" class="col-12">
//           <p class="text-center">No records found</p>
//         </div>
//       `);

//     $("#NoRecordFound").hide();

//     container.on("change", ".pest-checkbox", function () {
//       const checkedCount = $(".pest-checkbox:checked").length;
//       $(ViewPestSymptomsButton).attr("disabled", false);

//       if (checkedCount == 0) {
//         $(ViewPestSymptomsButton).attr("disabled", true);
//       }

//       if (checkedCount > 5) {
//         this.checked = false; // Uncheck the current box
//         alert("You can select a maximum of 5 Pest.");
//       }
//     });
//   });
// }
