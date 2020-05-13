<?php


Route::get('/', function () {
    return view('PageMenu');
});

Route::get('/pageMenu', function () {
    return view('PageMenu');
});

// Recherche Praticiens selon son nom ou par sa spécialité
Route::get('/RecherchePraticiens', 'PraticiensController@listePraticiens')->middleware('connecter');

Route::get('/SignIn', function () {
    return view('vues/SignIn');
});

// Route liée à la connexion et à la deconnexion
Route::post('/SignIn', 'ConnexionController@signIn');
Route::get('/Deconnexion', 'ConnexionController@Deconnexion');

// Liste de praticiens
Route::get('/ListeSpecialite/{id}', "PraticiensController@listeSpecialite");

// Suppression de la spécialité du praticien
Route::get('/supprimer/{idpraticien}/{idspecialite}',"PraticiensController@supprimerSpecialite");

//Modification du coefficient et du diplôme
Route::get('/modifier/{idpraticien}/{idspecialite}',"PraticiensController@modifierSpecialite");
Route::post('/modifier', "PraticiensController@validModif");

Route::get('/ListeSpecialite','PraticiensController@addSpecialitePrat');


