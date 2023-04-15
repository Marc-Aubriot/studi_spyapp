// créer un modal, interactif qui servivra à créer une nouvelle mission
function newMission(reponses, phase) {
    const instructions = [
        'Pour commencer, quel sera le nom de code de votre mission ?',
        'Ensuite, quel sera le titre de votre mission ?',
        'Décrivez la mission.',
        'Dans quel pays ?',
        'Choisir le type de mission.',
        'Definir les spécialités nécessaires à son accomplissement.',
        'Choisir un agent qui (contrainte possède au moins une spécialité requise).',
        "Choisir une cible (contrainte: elle ne peut pas avoir la même nationalité que l'agent choisi).",
        "Choisir un contact (contrainte: il doit avoir la même nationalité que le pays de la mission).",
        "Choisir une planque (contrainte: elle doit se trouver dans le même pays que la mission).",
        "La mission commence quand ?",
        "Elle fini quand ?",
        "Enfin, quel statut pour la mission ?"
    ];

    const placeholderText = [
        'nom de mission',
        'titre de la mission',
        'description de mission',
        'FRA',
        'Détruire un pays',
        'assassinat infiltration...',
        "nom de code de l'agent",
        "nom de code de la cible",
        "nom de code du contact",
        "nom de code de la planque",
        "date début year-month-day",
        "date fin year-month-day",
        "en cours préparation etc...."
    ];

    if (phase === undefined || phase === null ) {
        let phase = 0;
        let reponses = [];
        popModal();
        popInstruction(instructions[phase], placeholderText[phase], phase, reponses);
    } else {
        switch (phase) {
            case 3 :
                popInstruction(instructions[phase], placeholderText[phase], phase, reponses, 'pays');
            break;

            case 6 :
                popInstruction(instructions[phase], placeholderText[phase], phase, reponses, 'agent');
            break;

            case 7 :
                popInstruction(instructions[phase], placeholderText[phase], phase, reponses, 'cible');
            break;

            case 8 :
                popInstruction(instructions[phase], placeholderText[phase], phase, reponses, 'contact');
            break;

            case 9 :
                popInstruction(instructions[phase], placeholderText[phase], phase, reponses, 'planque');
            break;

            default:
                popInstruction(instructions[phase], placeholderText[phase], phase, reponses);
            break;
        }
        
    };

};

// pop le modal d'opération de newMission()
function popModal() {
    // container modal
    const main = document.getElementById('main');
    const div = document.createElement('div');
    div.classList = 'modalBox';
    div.id = "contentBox";
    main.appendChild(div);

    // btn pour cloturer
    const closeBtn = document.createElement('button');
    closeBtn.innerHTML = "X";
    closeBtn.id = "closeBtn";
    closeBtn.classList = 'closeBtn';
    closeBtn.addEventListener('click', () => { div.remove(); });
    div.appendChild(closeBtn);

    
};

// passe à la phase suivante de newMission()
function nextPhase(str, phase, strArray) {

    if (phase < 13) {
        document.getElementById(`inputBox-${phase}`).disabled = true;
        document.getElementById(`nextBtn-${phase}`).hidden = true;
        strArray.push(str);  
        phase++; 
    }

       
    
    if (phase === 14 ) {

        const div = document.getElementById('contentBox');

        // la zone d'instruction
        const messageBox = document.createElement('p');
        messageBox.id = `messageBox-submit`;
        messageBox.classList = "messageBox";
        messageBox.innerHTML = `Confirmer l'enregistrement de votre mission ? Ou Annuler`;
        div.appendChild(messageBox);

        const submitBtn = document.createElement('button');
        submitBtn.innerHTML = "Enregistrer la mission";
        submitBtn.id = `submit-mission`;
        submitBtn.classList = 'nextBtn mb-2';
        submitBtn.addEventListener('click', () => { sendMissionToServeur(strArray); div.remove(); });
        div.appendChild(submitBtn);

        const annulBtn = document.createElement('button');
        annulBtn.innerHTML = "Annuler";
        annulBtn.id = `submit-mission`;
        annulBtn.classList = 'nextBtn mb-2 ms-2';
        annulBtn.addEventListener('click', () => { div.remove(); });
        div.appendChild(annulBtn);
        
    } else {
        newMission(strArray, phase);
    };

};

// envoie la requête au serveur à la fin de l'éxecution de newMission()
function sendMissionToServeur(strArray) {
    validateDatas2(strArray);
}

// pop les zones d'instructions et d'input de newMission()
function popInstruction(instructionText, placeholderText, phase, strArray, onkeyuptable) {
    const div = document.getElementById('contentBox');
    let showHintActive = true;

    if (onkeyuptable == undefined || onkeyuptable == null ) {
        showHintActive = false;
    }

    if ( phase >= 1) {
        const previousMessageBox = document.getElementById(`messageBox-${phase-1}`);
        previousMessageBox.style.visibility = 'hidden';
        previousMessageBox.style.position = "absolute";
        const previousInputBox = document.getElementById(`inputBox-${phase-1}`);
        previousInputBox.style.visibility = 'hidden';
        previousInputBox.style.position = "absolute";
    }

    // la zone d'instruction
    const messageBox = document.createElement('p');
    messageBox.id = `messageBox-${phase}`;
    messageBox.classList = "messageBox";
    messageBox.innerHTML = `${instructionText}`;

    // la zone de réponse
    const inputBox = document.createElement('input');
    inputBox.id = `inputBox-${phase}`;
    inputBox.classList = "inputBox";
    inputBox.focus();
    inputBox.placeholder = `${placeholderText}`;
    if (showHintActive) { inputBox.setAttribute('onkeyup', `showHint(this.value, '${onkeyuptable}')`) };

    // btn suivant
    const nextBtn = document.createElement('button');
    nextBtn.innerHTML = "Suivant";
    nextBtn.id = `nextBtn-${phase}`;
    nextBtn.classList = 'nextBtn';
    nextBtn.addEventListener('click', () => { nextPhase(inputBox.value, phase, strArray); });

    if (phase === 13) {
        const tableZone = document.createElement('div');
        tableZone.id = "table-zone";
        div.appendChild(tableZone);
        getTable(strArray);
        phase++;
        document.getElementById('closeBtn').remove();
        nextPhase(" ", phase,  strArray);
        return;
    }

    div.appendChild(messageBox);
    div.appendChild(inputBox);
    div.appendChild(nextBtn);
};

// créer une table avec les infos renvoyées par le serveur pour newMission()
function getTable(strArray) {
    const div = document.getElementById('table-zone');

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        div.innerHTML = this.responseText;
        };
    };
    xmlhttp.open("GET",  `../../../src/service/gettable.php?q=` + strArray, true);
    xmlhttp.send();
}

// affiche message actione et log dans la view de la liste des missions
function messageToLog(messageText, pText) {
    if (pText === undefined || pText === null ) {
        pText = messageText;
    };
    const message = document.getElementById('blink');
    message.classList = 'blink_me';
    message.textContent = `${messageText}`;

    const log = document.getElementById('logs');
    const p = document.createElement("p");
    p.classList = 'blink_me';
    p.textContent = `${pText}`;
    log.appendChild(p);
}

// delete la mission selectionnée dans la view de la liste des missions
function delMission(btnID) {
    const tr = document.getElementById(`tr-mission-${btnID}`);
  
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //div.innerHTML = this.responseText;
        let message = `Eradication réussie : MISSION ${btnID} => supprimée`;
        messageToLog(message);
        tr.remove();
      };
    };
    xmlhttp.open("GET",  `../../../src/service/delmission.php?q=` + btnID, true);
    xmlhttp.send();
  
    
};

// barre de recherche basique dans la view de la liste des missions
function searchBar(str) {
    if (str.length == 0) {
      document.getElementById("txtHint").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("txtHint").innerHTML = this.responseText;
        };
      };
      xmlhttp.open("GET",  "../../../src/service/searchbar.php?q=" + str, true);
      xmlhttp.send();
    };
};

// fonction de recherche basique dans les champs d'input dans la view de la liste des missions
function showHint(str, table) {

    if (str.length == 0) {
      document.getElementById("txtHint").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("txtHint").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET",  `../../../src/service/gethint-${table}.php?q=` + str , true);
      xmlhttp.send();
    }
}

// update la mission selectionnée dans la view de la liste des missions
function updateMission(btnID) {
    let datas = [];
    const code = document.getElementById(`input-13-${btnID}`).value;

    for ( i=0; i<=12; i++) {
        var value = document.getElementById(`input-${i}-${btnID}`).value;
        datas[i] = value;
    };

    datas.push(code);

    // vérifie que les informations correspondent aux contraintes, sinon renvoit un message d'erreur
    validateDatas(datas);
}

// vérifie les contraintes opérationnelles
function validateDatas(datas) {
    // on vérifie que l'agent possède une spécialité demandée
    let response;

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const message = document.getElementById('blink');
            message.textContent = xmlhttp.responseText;
            response = xmlhttp.responseText;

            if ( response === 'true' ) {
                sendUpdate(datas);
            } else if (response === 'false' ) {
                let message = `Modification échouée : Mission ${datas[0]} => Veuillez vérifier les contraintes opérationnelles, les champs renseignés ne correspondent pas aux contraintes.`;
                messageToLog(message);
                return;
            } else {
                console.log('something happened...');
            }
        };
    };
    xmlhttp.open("GET",  `../../../src/service/validation-datas-update.php?q=` + datas , true);
    xmlhttp.send();
}

// vérifie les contraintes opérationnelles
function validateDatas2(datas) {
    // on vérifie que l'agent possède une spécialité demandée
    let response;

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const message = document.getElementById('blink');
            message.textContent = xmlhttp.responseText;
            response = xmlhttp.responseText;

            if ( response === 'true' ) {
                sendMission(datas);
            } else if (response === 'false' ) {
                let message = `Création échouée : Mission ${datas[0]} => Veuillez vérifier les contraintes opérationnelles, les champs renseignés ne correspondent pas aux contraintes.`;
                messageToLog(message);
                return;
            } else {
                console.log('something happened...');
            }
        };
    };
    xmlhttp.open("GET",  `../../../src/service/validation-datas-create.php?q=` + datas , true);
    xmlhttp.send();
}

// send datas to serveur for update after validation 
function sendUpdate(datas) {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() { if (this.readyState == 4 && this.status == 200) {
        const message = document.getElementById('blink');
        message.textContent = this.response;
    }; };
    xmlhttp.open("GET",  `../../../src/service/update-mission.php?q=` + datas , true);
    xmlhttp.send();

    let message = `Modification réussie : Mission ${datas[0]} => modifiée`;
    messageToLog(message);
}

// send datas to serveur for creation after validation 
function sendMission(datas) {
    const table = document.getElementById('mission-table');
    const tr = document.createElement('tr');
    tr.id = `tr-mission-${datas[0]}`;
    table.appendChild(tr);

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        tr.innerHTML = this.responseText;
        };
    };
    xmlhttp.open("GET",  `../../../src/service/validation-mission.php?q=` + datas , true);
    xmlhttp.send();

    let message = `Création réussie : Mission ${datas[0]} => ajoutée`;
    messageToLog(message);
}