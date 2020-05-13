// Fonction pour la recherche par l'input
function rechercheInput() {
    // Déclaration des variables
    var input, filter, table, tr, td, cell, i, j;
    // Récupération de la valeur de l'input
    input = document.getElementById("myInput");
    // On met cette valeur en majuscule
    filter = input.value.toUpperCase();
    // On récupère le tableau
    table = document.getElementById("myTable");
    // On récupère toutes les lignes du tableau
    tr = table.getElementsByTagName("tr");
    // Pour i allant de 1 jusqu'au nombre de lignes
    for (i = 1; i < tr.length; i++) {
        // On masque toutes les lignes
        tr[i].style.display = "none";

        // On récupère toutes les colones de la lignes
        td = tr[i].getElementsByTagName("td");
        // Pour j allant de 0 jusqu'au nombre de colonnes
        for (var j = 0; j < td.length; j++) {
            // On récupère la cellule correspondant à la ligne et à la colonne des boucles for
            cell = tr[i].getElementsByTagName("td")[j];
            // Si cette cellule existe
            if (cell) {
                // On met ses informations en majuscule et on vérifie si elle correspond à l'entrée de l'input
                if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    // Si ouin on l'affiche
                    tr[i].style.display = "";
                    // Et on sort de la boucle
                    break;
                }
            }
        }
    }
}
// Fonction pour la recherche par la liste déroulante
function rechercheSelect() {
    // Déclaration des variables
    var select, table, tr, td, i;
    // Récupération de la valeur de la liste déroulante qu'on met en majuscule
    select = document.getElementById("mySelect").value.toUpperCase();
    // On récupère le tableau
    table = document.getElementById("myTable");
    // On récupère toutes les lignes du tableau
    tr = table.getElementsByTagName("tr");
    // Pour i allant de 1 jusqu'au nombre de lignes
    for (i = 0; i < tr.length; i++) {
        /*
        On récupère la colonne nous intéressant
        Dans mon cas, la colonne 4, "type de praticien
        ATTENTION : La colonne 1 possède l'indice 0 !
        Donc la colonne 4 possède l'indice 3
        */
        td = tr[i].getElementsByTagName("td")[3];
        // Si cette colonne existe
        if (td) {
            // On vérifie que sa valeur correspond à celle de la liste déroulante
            if (td.innerHTML.toUpperCase().indexOf(select) > -1) {
                // Si oui, on l'affiche
                tr[i].style.display = "";
            } else {
                // Sinon, on ne l'affiche pas
                tr[i].style.display = "none";
            }
        }
    }
}
