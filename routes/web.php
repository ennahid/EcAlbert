<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return redirect()->route('Administration');
});

//---------- BRGIN Login --------------

Route::get('/login', function () {
    return redirect()->route('login');
});

// Route::get('/Login',[
//   'as' => 'Login',
//   'uses' => 'Auth\AdminController@Login'
//   ]
// );
Route::post('/Login_check',[
  'as' => 'Login_check',
  'uses' => 'Auth\AdminController@Login_check'
  ]
);

//----------- END Login -----------------


//-----------BEGIN  administraiton--------------

Route::get('/Administration',[
  'as' => 'Administration',
  'uses' => 'Controller_g@Administration'
  ]
);
Route::get('/Administration/Ajouter/',[
  'as' => 'Ajouter_Admin',
  'uses' => 'Controller_g@Ajouter_Admin'
  ]
);
Route::get('/Administration/Modifier/{id?}',[
  'as' => 'Modifier_Admin',
  'uses' => 'Controller_g@Modifier_Admin'
  ]
);
Route::get('/Administration/Roles',[
  'as' => 'Roles',
  'uses' => 'Controller_g@Roles'
  ]
);
Route::get('/Administration/Niveau',[
  'as' => 'Niveau',
  'uses' => 'Controller_g@Niveau'
  ]
);
Route::any('/Administration/Adding_user',[
  'as' => 'Adding_user',
  'uses' => 'Controller_g@Adding_user'
  ]
);
Route::post('/Administration/Edit_user',[
  'as' => 'Edit_user',
  'uses' => 'Controller_g@Edit_user'
  ]
);
Route::post('/Administration/Remove_user',[
  'as' => 'Remove_user',
  'uses' => 'Controller_g@Remove_user'
  ]
);
Route::post('/Administration/Adding_level',[
  'as' => 'Adding_level',
  'uses' => 'Controller_g@Adding_level'
  ]
);
// ------------- END administration-----------

//------------- BEGIN SALLE --------------------

Route::get('/Salles',[
  'as' => 'Salles',
  'uses' => 'Controller_g@Salles'
  ]
);

Route::post('/Salles/Adding_salle',[
  'as' => 'Adding_salle',
  'uses' => 'Controller_g@adding_salle'
  ]
);

//----------- END Salles ---------------------


//----------------- BEGIN Classes----------------

Route::get('/Classes',[
  'as' => 'Classes',
  'uses' => 'Controller_g@Classes'
  ]
);

Route::get('/Classes/Ajouter',[
  'as' => 'Add_classe',
  'uses' => 'Controller_g@add_classe'
  ]
);

Route::any('/Classes/Groupes',[
  'as' => 'Add_groupe',
  'uses' => 'Controller_g@Add_groupe'
  ]
);

Route::any('/Classes/Groupes/Etudiants/{id?}',[
  'as' => 'Groupe_show',
  'uses' => 'Controller_g@Groupe_show'
  ]
);

Route::post('/Classes/Groupes/Filter_groupe_show',[
  'as' => 'Filter_groupe_show',
  'uses' => 'Controller_g@Filter_groupe_show'
  ]
);


Route::post('/Groupes/Adding_groupe',[
  'as' => 'Adding_groupe',
  'uses' => 'Controller_g@Adding_groupe'
  ]
);

// Route::post('/Groupes/get_groupes_byclasse',[
//   'as' => 'get_groupes_byclasse',
//   'uses' => 'Controller_g@get_groupes_byclasse'
//   ]
// );



Route::post('/Classes/Adding_classe',[
  'as' => 'Adding_classe',
  'uses' => 'Controller_g@Adding_classe'
  ]
);
Route::get('/Classes/Modifier/{id?}',[
  'as' => 'Edit_classe',
  'uses' => 'Controller_g@Edit_classe'
  ]
);

Route::post('/Classes/Editing_classe',[
  'as' => 'Editing_classe',
  'uses' => 'Controller_g@Editing_classe'
  ]
);



//----------------- END Classes -----------------

//------------------ BEGIN Matieres -------------

Route::get('/Matieres',[
  'as' => 'Matieres',
  'uses' => 'Controller_g@Matieres'
  ]
);

Route::get('/Matieres/Ajouter',[
  'as' => 'Add_matiere',
  'uses' => 'Controller_g@Add_matiere'
  ]
);

Route::post('/Matieres/Adding_matiere',[
  'as' => 'Adding_matiere',
  'uses' => 'Controller_g@Adding_matiere'
  ]
);

Route::get('/Matieres/Modifier/{id?}',[
  'as' => 'Edit_matiere',
  'uses' => 'Controller_g@Edit_matiere'
  ]
);
Route::post('/Matieres/Editing_matiere',[
  'as' => 'Editing_matiere',
  'uses' => 'Controller_g@Editing_matiere'
  ]
);

//----------------- END Matieres -----------------

//----------------- BEGIN Etudiants ------------------

Route::any('/Etudiants',[
  'as' => 'Etudiants',
  'uses' => 'Controller_g@Etudiants'
  ]
);


Route::get('/Etudiants/Ajouter',[
  'as' => 'Add_etudiant',
  'uses' => 'Controller_g@Add_etudiant'
  ]
);

Route::post('/Etudiants/Adding_etudiant',[
  'as' => 'Adding_etudiant',
  'uses' => 'Controller_g@Adding_etudiant'
  ]
);

Route::any('/Etudiants/get_groupes',[
  'as' => 'get_groupes',
  'uses' => 'Controller_g@get_groupes'
  ]
);

Route::get('/Etudiants/Modifier/{id?}',[
  'as' => 'Edit_etudiant',
  'uses' => 'Controller_g@Edit_etudiant'
  ]
);

Route::post('/Etudiants/Editing_etudiant',[
  'as' => 'Editing_etudiant',
  'uses' => 'Controller_g@Editing_etudiant'
  ]
);

Route::any('/Etudiants/Payment/{id_stud?}/{month?}/{id_pay?}',[
  'as' => 'Payment',
  'uses' => 'Controller_g@Payment'
  ]
);
Route::any('/Etudiants/Payment/Complete/{id_stud?}/{id_pay?}/{month?}',[
  'as' => 'Comp_Payment',
  'uses' => 'Controller_g@Comp_Payment'
  ]
);
Route::post('/Etudiants/Payment_comp',[
  'as' => 'Payment_comp',
  'uses' => 'Controller_g@Payment_comp'
  ]
);

Route::any('/Etudiants/Payment_M/{id?}',[
  'as' => 'Payment_M',
  'uses' => 'Controller_g@Payment_M'
  ]
);
Route::post('/Etudiants/Payment_pending',[
  'as' => 'Payment_pending',
  'uses' => 'Controller_g@Payment_pending'
  ]
);


//----------------- END Etudiants --------------------

Route::post('/get_groupes_checkboxes',[
  'as' => 'get_groupes_checkboxes',
  'uses' => 'Controller_g@get_groupes_checkboxes'
  ]
);


//---------------- BEGIN Professeurs -----------------

Route::any('/Professeurs',[
  'as' => 'Professeurs',
  'uses' => 'Controller_g@Professeurs'
  ]
);

Route::get('/Professeurs/Ajouter',[
  'as' => 'Add_professeur',
  'uses' => 'Controller_g@Add_professeur'
  ]
);

Route::post('/Professeurs/Adding_prof',[
  'as' => 'Adding_prof',
  'uses' => 'Controller_g@Adding_prof'
  ]
);

Route::any('/Professeurs/Enseignement',[
  'as' => 'Enseignement',
  'uses' => 'Controller_g@Enseignement'
  ]
);
Route::any('/Professeurs/Enseignement/Affect/{id?}',[
  'as' => 'Enseignement_affect',
  'uses' => 'Controller_g@Enseignement_affect'
  ]
);

Route::post('/Professeurs/sign_professeur',[
  'as' => 'sign_professeur',
  'uses' => 'Controller_g@sign_professeur'
  ]
);


Route::post('/Professeurs/get_classes',[
  'as' => 'get_classes',
  'uses' => 'Controller_g@get_classes'
  ]
);



//---------------- END Professeurs -------------------


//----------------- BEGIN Emploi ---------------------


Route::any('/Emploi/Classes',[
  'as' => 'Emploi_classes',
  'uses' => 'Controller_g@Emploi_classes'
  ]
);
Route::post('/Emploi/Classes/Update',[
  'as' => 'update_emp',
  'uses' => 'Controller_g@update_emp'
  ]
);

Route::post('/Emploi/Classes/Empty',[
  'as' => 'empty_emp',
  'uses' => 'Controller_g@empty_emp'
  ]
);




Route::any('/Emploi/Professeurs',[
  'as' => 'Emploi_professeurs',
  'uses' => 'Controller_g@Emploi_professeurs'
  ]
);

Route::post('/Emploi/getProfesseurs',[
  'as' => 'get_profs_bygroupe',
  'uses' => 'Controller_g@get_profs_bygroupe'
  ]
);

Route::post('/Emploi/getProfesseursbyclasse',[
  'as' => 'get_groupes_foremploi_prof',
  'uses' => 'Controller_g@get_groupes_foremploi_prof'
  ]
);



//----------------- END Emploi ----------------------

//---------------- BEGIN Retard --------------------


//get list of students for absence

Route::any('/Absence/Groupes',[
  'as' => 'Absence_get_students',
  'uses' => 'Controller_g@Absence_get_students'
  ]
);

//get absence list for each student
Route::get('/Absence/Groupes/Ajouter/{id?}',[
  'as' => 'add_student_absence',
  'uses' => 'Controller_g@add_student_absence'
  ]
);


Route::get('/Absence/Groupes/Etudiant/{id?}',[
  'as' => 'get_student_absence',
  'uses' => 'Controller_g@get_student_absence'
  ]
);

Route::get('/Absence/Groupes/Professeur/{id?}',[
  'as' => 'get_prof_absence',
  'uses' => 'Controller_g@get_prof_absence'
  ]
);


Route::post('/Absence/Groupes/Adding',[
  'as' => 'adding_std_ab',
  'uses' => 'Controller_g@adding_std_ab'
  ]
);

Route::any('/Absence/Groupes/Professeurs',[
  'as' => 'Absence_get_profs',
  'uses' => 'Controller_g@Absence_get_profs'
  ]
);
Route::get('/Absence/Groupes/Professeurs/Ajouter/{id?}',[
  'as' => 'add_prof_absence',
  'uses' => 'Controller_g@add_prof_absence'
  ]
);

Route::post('/Absence/Groupes/Professeurs/Adding',[
  'as' => 'adding_prof_ab',
  'uses' => 'Controller_g@adding_prof_ab'
  ]
);



//---------------- END Retard ---------------------

//---------------- BEGIN Controle ------------------

//show exams for each prof
Route::get('/Controle/Ajouter/{id?}',[
  'as' => 'add_exam',
  'uses' => 'Controller_g@add_exam'
  ]
);

//show profs for |^|
Route::get('/Controle/Professeurs',[
  'as' => 'profs_show_exams',
  'uses' => 'Controller_g@profs_show_exams'
  ]
);


Route::get('/Notes/Afficher',[
  'as' => 'show_notes',
  'uses' => 'Controller_g@show_notes'
  ]
);



//---------------- END Control --------------------

//------------- send sms --------------------

Route::get('/sms',[
  'as' => 'smsview',
  'uses' => 'sms@smsview'
  ]
);

Route::post('sending_sms',[
  'as' => 'sendsms',
  'uses' => 'sms@sendsms'
  ]
);