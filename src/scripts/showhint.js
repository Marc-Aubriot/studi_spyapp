// fonction de recherche basique dans les champs d'input
function showHint(str,table) {
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
      xmlhttp.open("GET",  `../../../src/service/gethint-${table}.php?q=` + str, true);
      xmlhttp.send();
    }
}