const form = document.querySelector("#monformulaire"),
fileInput = document.querySelector(".file-input"),
progressArea = document.querySelector(".progress-area"),
uploadedArea = document.querySelector(".uploaded-area");

// form click event
form.addEventListener("click", () =>{
  fileInput.click();
});

fileInput.onchange = ({target})=>{
  let file = target.files[0]; //getting file [0] this means if user has selected multiple files then get first one only
  if(file){
    let fileName = file.name; //getting file name
    if(fileName.length >= 12){ //if file name length is greater than 12 then split it and add ...
      let splitName = fileName.split('.');
      fileName = splitName[0].substring(0, 13) + "... ." + splitName[1];
    }
    uploadFile(fileName); //calling uploadFile with passing file name as an argument
  }
}

// file upload function
function uploadFile(name){
  let xhr = new XMLHttpRequest(); //creating new xhr object (AJAX)
  xhr.open("POST", "php/upload.php"); //sending post request to the specified URL
  xhr.upload.addEventListener("progress", ({loaded, total}) =>{ //file uploading progress event
    let fileLoaded = Math.floor((loaded / total) * 100);  //getting percentage of loaded file size
    let fileTotal = Math.floor(total / 1000); //gettting total file size in KB from bytes
    let fileSize;
    // if file size is less than 1024 then add only KB else convert this KB into MB
    (fileTotal < 1024) ? fileSize = fileTotal + " KB" : fileSize = (loaded / (1024*1024)).toFixed(2) + " MB";
    let progressHTML = `<li class="row">
                          <i class="fas fa-file-alt"></i>
                          <div class="content">
                            <div class="details">
                              <span class="name">${name} • Uploading</span>
                              <span class="percent">${fileLoaded}%</span>
                            </div>
                            <div class="progress-bar">
                              <div class="progress" style="width: ${fileLoaded}%"></div>
                            </div>
                          </div>
                        </li>`;
    // uploadedArea.innerHTML = ""; //uncomment this line if you don't want to show upload history
    uploadedArea.classList.add("onprogress");
    progressArea.innerHTML = progressHTML;
    if(loaded == total){
      progressArea.innerHTML = "";
      let uploadedHTML = `<li class="row">
                            <div class="content upload">
                              <i class="fas fa-file-alt"></i>
                              <div class="details">
                                <span class="name">${name} • Uploaded</span>
                                <span class="size">${fileSize}</span>
                              </div>
                            </div>
                          </li>`;
      uploadedArea.classList.remove("onprogress");
      // uploadedArea.innerHTML = uploadedHTML; //uncomment this line if you don't want to show upload history
      uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML); //remove this line if you don't want to show upload history
    }
  });
  let data = new FormData(form); //FormData is an object to easily send form data
  xhr.send(data); //sending form data
}
function jsDecimals(event) {
  // Récupérer le code ASCII de la touche enfoncée
  var charCode = (event.which) ? event.which : event.keyCode;
  
  // Vérifier si le caractère saisi est un point ou un chiffre
  if (charCode == 46 || (charCode >= 48 && charCode <= 57)) {
    // Accepter le caractère
    return true;
  } else {
    // Ignorer le caractère
    return false;
  }
}

//const cards = document.querySelectorAll('.card'); // sélectionne toutes les cartes

/*/cards.forEach(card => {
  card.addEventListener('click', () => {
    cards.forEach(c => {
      if (c !== card) { // déselectionne les autres cartes
        c.classList.remove('selected');
      }
    });
    card.classList.toggle('selected'); // sélectionne/déselectionne la carte cliquée
  });
});*/
const cards = document.querySelectorAll('.card');

cards.forEach(card => {
  card.addEventListener('click', function() {
    cards.forEach(card => {
      card.classList.remove('selected');
    });
    this.classList.add('selected');
  });
});
// sélectionner le bouton pour ajouter un ingrédient
const addIngredientButton = document.querySelector('#addIngredientButton');

// sélectionner le conteneur où les ingrédients seront ajoutés
const ingredientContainer = document.querySelector('#container');

// fonction pour ajouter un nouvel ingrédient
function addIngredient() {
  // créer un nouvel élément div
  const newDiv = document.createElement('div');
  newDiv.classList.add('row');
  newDiv.innerHTML = `
    <div class="large-2 medium-2 small-6 columns">
      <label style="font-size: 20px; margin-bottom: 15px;">Quantité</label>
      <input type="text" name="quantite[0]" value="" placeholder="ex:120">
    </div>
    <select class="auto-mesure" name="mesure[1]">
      <option value="">(Rien)</option>
      <option value="grammes">grammes (g)</option>
      <option value="kilogrammes">kilogrammes (kg)</option>
      <option value="litres">litres (l)</option>
      <option value="millilitres">millilitres (ml)</option>
      <option value="centilitres">centilitres (cl)</option>
      <option value="c. à café">c. à café</option>
      <option value="c. à soupe">c. à soupe</option>
      <option value="c. à thé">c. à thé</option>
    </select>
    <div class="large-6 medium-6 small-10 columns">
      <label style="font-size: 20px; margin-bottom: 15px;">Ingrédient</label>
      <input type="text" name="ingredient[0]" class="ingredient" value="" autocomplete="off" placeholder="ex:farine">
    </div>
  `;
  // ajouter le nouvel élément au conteneur
  ingredientContainer.appendChild(newDiv);
  // déplacer le bouton au-dessus du dernier élément ajouté
  addIngredientButton.parentNode.appendChild(addIngredientButton);

}

// ajouter un écouteur d'événement sur le bouton pour ajouter un ingrédient
addIngredientButton.addEventListener('click', addIngredient);


// sélectionner le bouton pour ajouter une étape
const addStepButton = document.getElementById('addStepButton');
const container = document.getElementById('container1');

let etapeCount = 1;

addStepButton.addEventListener('click', function () {
  const div = document.createElement('div');
  div.classList.add('large-11', 'medium-11', 'small-10', 'columns');

  const label = document.createElement('label');
  label.style.fontSize = '20px';
  label.style.marginBottom = '15px';
  label.innerHTML = `Etape ${etapeCount + 1}`;

  const textarea = document.createElement('textarea');
  textarea.name = `etape[${etapeCount}]`;
  textarea.placeholder = 'Veuillez entrer les instructions pour cette étape';

  div.appendChild(label);
  div.appendChild(textarea);

  container.appendChild(div);

  etapeCount++;
  
  // déplacer le bouton au-dessus du dernier élément ajouté
  addStepButton.parentNode.appendChild(addStepButton);
});
// ajouter un écouteur d'événement sur le bouton pour ajouter un ingrédient
addStepButton.addEventListener('click', addStepButton);

function sauvegarderRecette() {
  // récupérer les données de la recette
  const titreRecette = document.getElementById('titreRecette').value;
  const descriptionRecette = document.getElementById('descriptionRecette').value;
  const ingredients = document.querySelectorAll('[name^="ingredient"]');
  const etapes = document.querySelectorAll('[name^="etape"]');

  // créer un objet FormData pour envoyer les données de la recette au serveur
  const formData = new FormData();
  formData.append('titre', titreRecette);
  formData.append('description', descriptionRecette);
  for (let i = 0; i < ingredients.length; i++) {
    formData.append(`ingredients[${i}]`, ingredients[i].value);
  }
  for (let i = 0; i < etapes.length; i++) {
    formData.append(`etapes[${i}]`, etapes[i].value);
  }

  const xhr = new XMLHttpRequest();
xhr.open('POST', 'sauvegarder-recette.php');
xhr.onreadystatechange = function () {
  if (xhr.readyState === XMLHttpRequest.DONE) {
    if (xhr.status === 200) {
      // la recette a été sauvegardée avec succès
      alert('Votre recette a été publiée !');
      window.location.reload(); // recharger la page pour afficher la nouvelle recette
    } else {
      // une erreur s'est produite lors de la sauvegarde
      alert('Une erreur s\'est produite lors de la publication de votre recette. Veuillez réessayer plus tard.');
    }
  }
};
xhr.send(formData);
}
        

