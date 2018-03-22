function toggle(checkboxID, toggleID) {
    var checkbox = document.getElementById(checkboxID);
    var toggle = document.getElementById(toggleID);
    updatetoggle= checkbox.checked ? toggle.disabled=false:toggle.disabled=true;
}


/*****Fonction boutons ajout et suppression auteur****/

// Compteur nombre d'auteur ajouté
var cmp=1;
function addRow() {
    cmp++;
    var div = document.createElement('div');

    div.className = 'row';
    div.id='auteur'+cmp.toString();
    div.innerHTML =
        '                            <div class="col-sm-4 form-group">\n' +
        '                                <label>Nom auteur</label>\n' +
        '                                <input type="text" name="nomAuteur'+ cmp.toString() +'" placeholder="Nom Auteur '+ cmp.toString() + '" class="form-control" required="">\n' +
        '                            </div>\n' +
        '                            <div class="col-sm-4 form-group">\n' +
        '                                <label>Prenom auteur</label>\n' +
        '                                <input type="text" name="prenomAuteur'+ cmp.toString() + '" placeholder="Prénom Auteur '+ cmp.toString() + '" class="form-control">\n' +
        '                            </div>\n';

    document.getElementById('auteurDiv').appendChild(div);
    document.getElementById('nbAuteur').value = cmp;
}
function removeRow() {
    document.getElementById('auteurDiv').removeChild(document.getElementById('auteur'+cmp.toString()));
    cmp--;
}
/*****Fonction affichage Modal****/
function openModal() {
    var modal = document.getElementById('myModal');
    modal.style.display = "block";
// When the user clicks on <span> (x), close the modal
}
function closeModal() {
    var modal = document.getElementById('myModal');
    modal.style.display = "none";

}

