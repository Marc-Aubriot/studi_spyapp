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