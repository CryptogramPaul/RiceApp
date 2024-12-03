function LoadSymptomsScript() {
  const url = "json/symptoms.json";
  const container = $("#LoadSymptoms");
  const viewMoreButton = $(
    '<button id="viewMoreButton" class="btn btn-secondary my-1" > <small>More Symptoms</small></button>'
  );

  const ViewSymptomsButton = $(
    '<button id="ViewSymptoms" class="btn btn-success my-3" title="View Symptoms" onclick="viewSelectedSymptoms()" disabled>View Symptoms</button>'
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
          <div class="col-xl-3 my-1 symptom-item" data-name="${name.toLowerCase()}">
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
        container.append(viewMoreButton);
      }
    }

    displaySymptoms(displayedSymptomsCount);
    $("#viewMoreButton").before(ViewSymptomsButton);

    viewMoreButton.on("click", function () {
      displayedSymptomsCount += 8; // Load next 10 symptoms
      displaySymptoms(displayedSymptomsCount); // Display them
      $("#viewMoreButton").before(ViewSymptomsButton);
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

// function updateSelectedSymptoms() {
//   selectedSymptoms = [];

//   $(".symptom-checkbox:checked").each(function () {
//     const symptomName = $(this).siblings("label").text().trim();
//     const disease = $(this).attr("disease");
//     // selectedSymptoms.push(symptomName, disease);
//     selectedSymptoms.push({ disease: disease, symptom: symptomName });
//   });

//   console.log(selectedSymptoms); // You can use this for debugging
// }

let diseaseData = {};

function loadDiseaseData() {
  const url = "json/symptoms.json";

  $.getJSON(url, function (data) {
    data.forEach((entry) => {
      entry.symptoms.forEach((symptom) => {
        const { disease, disease_img } = symptom;

        // Store the disease and its image if not already added
        if (!diseaseData[disease]) {
          diseaseData[disease] = disease_img;
        }
      });
    });
  });
}

function viewSelectedSymptoms() {
  loadDiseaseData();
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
    console.log(diseaseImg);
    selectedSymptomsList.append(`
      <div class="col-xl-3 my-1">
        <div class="card mb-2">
          <img src="${diseaseImg}" class="card-img-top symptoms_img" alt="${disease}" class="m-1" />
          <div class="card-body">
            <div class="form-check">
              <label class="form-check-label">
                ${disease}
              </label>
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
}

// let selectedSymptoms = [];

// function viewSelectedSymptoms() {
//   loadDiseaseData();

//   const selectedSymptomsList = $("#DiseaseList");
//   selectedSymptomsList.empty();

//   $(".symptom-checkbox:checked").each(function () {
//     const disease = $(this).attr("disease");
//     selectedSymptomsList.append(`
//         <div class="col-xl-3 my-1">
//           <div class="card mb-2">
//             <img src="" class="card-img-top symptoms_img" alt="${disease}"  class="m-1" />
//             <div class="card-body">
//               <div class="form-check">
//                 <label class="form-check-label"">
//                   ${disease}
//                 </label>
//               </div>
//             </div>
//           </div>
//         </div>
//       `);
//   });

//   const modal = new bootstrap.Modal(
//     document.getElementById("selectedSymptomsModal")
//   );
//   modal.show();
// }

// function LoadSymptomsScript() {
//   const url = "json/symptoms.json";
//   const container = $("#LoadSymptoms");
//   const viewMoreButton = $(`
//     <button id="viewMoreButton" class="btn btn-secondary my-1">
//       <small>View More Symptoms</small>
//     </button>`);

//   const ViewSymptomsButton = $(`
//     <button id="ViewSymptoms" class="btn btn-success my-3" title="View Symptoms" disabled>
//       View Symptoms
//     </button>`);

//   $.getJSON(url, function (data) {
//     const groupedSymptoms = {};
//     const diseaseData = [];

//     data.forEach((value) => {
//       value.symptoms.forEach((symptom) => {
//         const name = symptom.name;
//         if (!groupedSymptoms[name]) {
//           groupedSymptoms[name] = symptom.img_path;
//         }
//       });

//       diseaseData.push({
//         disease: value.disease,
//         symptoms: value.symptoms.map((s) => s.name.toLowerCase()), // Store symptoms as lowercase
//       });
//     });

//     const symptomsArray = Object.entries(groupedSymptoms);
//     const totalSymptoms = symptomsArray.length;
//     let displayedSymptomsCount = 8;

//     // Function to append symptoms to the container
//     function displaySymptoms(limit) {
//       container.empty(); // Clear the current symptoms
//       for (let i = 0; i < Math.min(limit, totalSymptoms); i++) {
//         const [name, imgPath] = symptomsArray[i];
//         container.append(`
//           <div class="col-xl-3 my-1 symptom-item" data-name="${name.toLowerCase()}">
//             <div class="card mb-2">
//               <img src="${imgPath}" class="card-img-top symptoms_img" alt="${name}" width="" height="" class="m-1" />
//               <div class="card-body">
//                 <div class="form-check">
//                   <input class="form-check-input symptom-checkbox" type="checkbox" value="" id="${name}">
//                   <label class="form-check-label" for="${name}">
//                     ${name}
//                   </label>
//                 </div>
//               </div>
//             </div>
//           </div>
//         `);
//       }
//       container.append(`
//         <div id="NoRecordFound" class="col-12">
//           <p class="text-center">No records found</p>
//         </div>
//       `);

//       $("#NoRecordFound").hide();
//       if (limit < totalSymptoms) {
//         container.append(viewMoreButton);
//       }
//     }

//     displaySymptoms(displayedSymptomsCount);
//     $("#viewMoreButton").before(ViewSymptomsButton);

//     viewMoreButton.on("click", function () {
//       displayedSymptomsCount += 8; // Load next 8 symptoms
//       displaySymptoms(displayedSymptomsCount); // Display them
//       $("#viewMoreButton").before(ViewSymptomsButton);
//     });

//     container.on("change", ".symptom-checkbox", function () {
//       const checkedSymptoms = $(".symptom-checkbox:checked")
//         .map(function () {
//           return $(this).attr("id").toLowerCase();
//         })
//         .get();

//       const checkedCount = checkedSymptoms.length;
//       $(ViewSymptomsButton).attr("disabled", false);

//       if (checkedCount == 0) {
//         $(ViewSymptomsButton).attr("disabled", true);
//         $("#diseaseName").text(""); // Clear disease name if no symptoms selected
//       }

//       if (checkedCount > 5) {
//         this.checked = false; // Uncheck the current box
//         alert("You can select a maximum of 5 symptoms.");
//       }

//       // Check for disease based on selected symptoms
//       if (checkedCount >= 1 && checkedCount <= 5) {
//         findDiseaseBySymptoms(checkedSymptoms);
//       }
//     });

//     function findDiseaseBySymptoms(selectedSymptoms) {
//       const matchingDiseases = diseaseData.filter((disease) => {
//         const symptoms = disease.symptoms;
//         return selectedSymptoms.every((symptom) => symptoms.includes(symptom));
//       });

//       if (matchingDiseases.length > 0) {
//         const diseaseName = matchingDiseases[0].disease;

//         console.log(diseaseName);
//         // $("#diseaseName").text("Possible Disease: " + diseaseName);
//       } else {
//         console.log("No matching disease found.");
//         // $("#diseaseName").text("No matching disease found.");
//       }
//     }
//   });
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

  console.log(resultsFound);

  if (!resultsFound) {
    $("#NoRecordFound").show();
    $("#viewMoreButton").hide();
  } else {
    $("#NoRecordFound").hide();
    $("#viewMoreButton").show();
  }
}
// function LoadSymptomsScript() {
//   const url = "json/symptoms.json";
//   const container = $("#LoadSymptoms");

//   $.getJSON(url, function (data) {
//     const groupedSymptoms = {};

//     data.forEach((value) => {
//       value.symptoms.forEach((symptom) => {
//         const name = symptom.name;
//         if (!groupedSymptoms[name]) {
//           groupedSymptoms[name] = symptom.img_path;
//         }
//       });
//     });

//     for (const [name, imgPath] of Object.entries(groupedSymptoms)) {
//       container.append(`
//         <div class="col-xl-3 my-1 symptom-item" data-name="${name.toLowerCase()}">
//           <div class="card mb-2" >
//             <img src="${imgPath}" class="card-img-top  symptoms_img" alt="${name}" width="" height="" class="m-1" />
//             <div class="card-body">
//               <div class="form-check">
//                 <input class="form-check-input symptom-checkbox" type="checkbox" value="" id="${name}">
//                 <label class="form-check-label" for="${name}">
//                   ${name}
//                 </label>
//               </div>
//             </div>
//           </div>
//         </div>
//       `);
//     }

//     container.on("change", ".symptom-checkbox", function () {
//       const checkedCount = $(".symptom-checkbox:checked").length;
//       if (checkedCount > 5) {
//         this.checked = false; // Uncheck the current box
//         alert("You can select a maximum of 5 symptoms.");
//       }
//     });
//   });
// }

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

function LoadPestScript() {
  const url = "json/pest.json";
  // const container = document.getElementById('LoadSymptoms');
  const container = $("#LoadPest");

  $.getJSON(url, function (data) {
    data.forEach((value) => {
      container.append(`
        <div class="col-12 col-xl-2">
            <input class="form-check-input" type="checkbox" value="" id="${value.pest_name}">
            <label for="${value.pest_name}">${value.pest_name}</label>
            
        </div>
      `);
    });
  });
}
