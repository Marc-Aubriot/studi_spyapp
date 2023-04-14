// créer un modal, interactif qui servivra à créer une nouvelle mission
function newMission(reponses, phase) {
    const instructions = [
        'Pour commencer, quel sera le nom de code de votre mission ?',
        'Ensuite, quel sera le titre de votre mission ?',
        'Décrivez la mission.',
        'Dans quel pays ?',
        'Choisir le type de mission.',
        'Definir les spécialités nécessaires à son accomplissement.',
        'Choisir un agent qui possède au moins une spécialité requise.',
        "Choisir une cible (elle ne peut pas avoir la même nationalité que l'agent choisi).",
        "Choisir un contact (il doit avoir la même nationalité que le pays de la mission).",
        "Choisir une planque (elle doit se trouver dans le même pays que la mission).",
        "La mission commence quand ?",
        "Elle fini quand ?",
        "Enfin, quel statut pour la mission ?"
    ];

    const placeholderText = [
        'nom de mission',
        'titre de la mission',
        'description de mission',
        'pays "FRA"',
        'Détruire un pays',
        'assassinat, infiltration...',
        "nom de code de l'agent",
        "nom de code de la cible",
        "nom de code du contact",
        "nom de code de la planque",
        "date début, year-month-day",
        "date fin, year-month-day",
        "en cours, préparation etc...."
    ];

    if (phase === undefined || phase === null ) {
        let phase = 0;
        let reponses = [];
        popModal();
        popInstruction(instructions[phase], placeholderText[phase], phase, reponses);
    } else {
        popInstruction(instructions[phase], placeholderText[phase], phase, reponses);
    };

};

// pop le modal
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

// passe à la phase suivante du modal
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

// envoie la requête au serveur
function sendMissionToServeur(strArray) {
    
    const table = document.getElementById('mission-table');
    const tr = document.createElement('tr');
    tr.id = `tr-mission-${strArray[0]}`;
    table.appendChild(tr);

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        tr.innerHTML = this.responseText;
        };
    };
    xmlhttp.open("GET",  `../../../src/service/validation-mission.php?q=` + strArray , true);
    xmlhttp.send();

    let message = `Création réussie : Mission ${strArray[0]} => ajoutée`;
    messageToLog(message);
}

// pop les zones d'instructions et d'input
function popInstruction(instructionText, placeholderText, phase, strArray) {
    const div = document.getElementById('contentBox');

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
    inputBox.value = `${placeholderText}`;

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

// créer une table avec les infos du serveur
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

// affiche message actione et log
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