// function LoadSymptomsScript(){
// 		const url = 'json/symptoms-main.json';
// 		const container = document.getElementById('LoadSymptoms');

// 		$.getJSON(url, function(data){
// 			data.forEach(value => {
// 				// Create a section for each disease
// 				const diseaseDiv = document.createElement('div');
// 				diseaseDiv.classList.add('row');
// 				// diseaseDiv.innerHTML = `<h2>${value.disease}</h2>`;

// 				// List symptoms
// 				value.symptoms.forEach(symptom => {
// 					const symptomDiv = document.createElement('div');
// 					symptomDiv.classList.add('col-xl-2');
// 					symptomDiv.classList.add('col-12');
// 					symptomDiv.innerHTML = `
// 						<p><strong>${symptom.name}</strong></p>
// 						<img src="${symptom.img_path}" alt="${symptom.name}" width="auto" />
// 					`;
// 					diseaseDiv.appendChild(symptomDiv);
// 				});

// 				container.appendChild(diseaseDiv);
// 			});
// 		})
// 	}
//<label for="${symptom.name}">${symptom.name}</label>
// <img src="${symptom.img_path}" alt="${symptom.name}" width="auto" />

function LoadSymptomsScript() {
  const url = "json/symptoms-main.json";
  // const container = document.getElementById('LoadSymptoms');
  const container = $("#LoadSymptoms");

  $.getJSON(url, function (data) {
    data.forEach((value) => {
      value.symptoms.forEach((symptom) => {
        container.append(`
                    <div class="col-12 col-xl-2">
                        <input type="checkbox" class="form-control" id="${symptom.name}">
                        
                    </div>
                `);
      });
    });
  });
}
