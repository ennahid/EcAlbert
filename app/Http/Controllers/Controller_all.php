<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use Carbon\Carbon;
use App\Database\Personnels;
use App\Database\Niveaux;
use App\Database\Matieres;
use App\Database\Salles;
use App\Database\Classes;
use App\Database\Parents;
use App\Database\Etudiants;
use App\Database\Groupes;
use App\Database\Classe_Matiere;
use App\Database\Etudiant_Parent;
use App\Database\Professeurs;
use App\Database\Professeur_Groupe;
use App\Database\Payments;
use App\Database\Emploi;
use App\Database\Frais;
use App\Database\Absence_Retard;
use App\Http\Controllers\Input;
use Illuminate\Support\Facades\DB;

class Controller_g extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //----------- BEGIN Login ----------------------------

    public function Login(Request $req)
    {
        return view('Login');
    }

    public function Login_check(Request $req)
    {
        if($req->input('email') == 'admin' && $req->input('password') == 'admin')
        {
            return Redirect()->Route('Administration');
        }
        else{
            return Redirect()->Back()->withErrors('Login Failed');
        }
    }

    //----------- END LOGIN --------------------------------


    //----------- BEGIN Administration------------------------

    public function Administration(Request $req)
    {
        $Admins = DB::table('personnels')->get();
    	return view('Backend.Administration.Administration')->with('Admins',$Admins);
    }

    public function Ajouter_Admin(Request $req)
    {
    	return view('Backend.Administration.Ajouter_Admin')->with('my_url','Adding_user');
    }

    public function Roles(Request $require)
    {
    	return view('Backend.Administration.Roles');
    }

    public function Niveau(Request $require)
    {
         $Niveaux = DB::table('niveaux')->orderby('created_at','desc')->get();
        return view('Backend.Administration.Niveau')->with('Niveaux',$Niveaux);
    }

    public function Adding_level(Request $req)
    {
        $Niveaux = new Niveaux;
        $Niveaux->Nom = $req->input('Nom');
        $Niveaux->Description = $req->input('Description');
        $Niveaux->save();
        return Redirect()->Back();
    }

    public function Adding_user(Request $req)
    {
        // $test = new test;
        // $test->test1 = $req->input('Nom');
        // $test->test2 = $req->input('Prenom');
        // $test->test3 = $req->input('Cin');
        // $test->test4 = $req->input('Tele');
        // $test->save();
        // return Redirect()->Back();
        // $personnels = new personnels;
        //         $personnels->Photo = $req->file('hello');
        //         $personnels->Nom = $req->input('Nom');
        //         $personnels->Prenom = $req->input('Prenom');
        //         $personnels->Cin = $req->input('Cin');
        //         $personnels->Email = $req->input('Email');
        //         $personnels->Tele = $req->input('Tele');
        //         $personnels->Ville = $req->input('Ville');
        //         $personnels->Adresse = $req->input('Adresse');
        //         $personnels->Date_Naiss = $req->input('Date_Naiss');
        //         $personnels->Date_insription = $req->input('Date_inscr');
        //         $personnels->Function = $req->input('Function');
        //         $personnels->Role = $req->input('Role');
        //         $personnels->save();
        //     }
        $personnels = new personnels;
        if($req->hasFile('img_admin'))
        {
            $file = $req->file('img_admin');
            $dest = public_path().'/photos/personnels';
            $name = str_random(6).'_'.$req->input('Nom').'_'. $file->getClientOriginalName();
            $file->move($dest,$name);
            $type = $file->getClientOriginalExtension();
            if($type == 'png' || $type == 'jpg' || $type== 'jpeg')
            {
                $personnels->Photo = $name;
            }
        }else{
                $personnels->Photo = 'personnel.png';
        } 
                $personnels->Nom = $req->input('Nom');
                $personnels->Prenom = $req->input('Prenom');
                $personnels->Cin = $req->input('Cin');
                $personnels->Email = $req->input('Email');
                $personnels->Tele = $req->input('Tele');
                $personnels->Ville = $req->input('Ville');
                $personnels->Sexe = $req->input('Sexe');
                $personnels->Adresse = $req->input('Adresse');
                $personnels->Date_Naiss = $req->input('Date_Naiss');
                $personnels->Date_inscription = $req->input('Date_inscription');
                $personnels->Function = $req->input('Function');
                $personnels->Role = $req->input('Role');
                $personnels->save();
                return Redirect()->Route('Administration');

    }

    public function Modifier_Admin(Request $req,$id=null)
    {
        $Admin = DB::table('personnels')->where('id',$id)->first();
        return view('Backend.Administration.Ajouter_Admin')->with('Admin',$Admin)
                                                            ->with('my_url','Edit_user');
    }

    public function Edit_user(Request $req)
    {
        DB::table('personnels')->where('id',$req->input('id'))
                                ->update(['Nom' => $req->input('Nom'),
                                    'Prenom' => $req->input('Prenom'),
                                    'Function' => $req->input('Function'),
                                    'Ville' => $req->input('Ville'),
                                    'Tele' => $req->input('Tele'),
                                    'Adresse' => $req->input('Adresse'),
                                    'Email' => $req->input('Email'),
                                    'Cin' => $req->input('Cin'),
                                    'Photo' => $req->input('Photo'),
                                    'Date_Naiss' => $req->input('Date_Naiss'),
                                    'Date_inscription' => $req->input('Date_inscription'),
                                    'Sexe' => $req->input('Sexe')]);
        return Redirect()->Route('Administration');
    }

    public function Remove_user(Request $req)
    {
        DB::table('personnels')->where('id',$req->input('id'))->delete();
    }

    ///--------------------- END Administration------------------------


    //------------------------BEGIN Salles----------------------

    public function Salles(Request $req)        
    {
        $salles = DB::table('salles')->orderby('created_at','desc')->get();
       return view('Backend.Salles.Salle')->with('salles',$salles);
    }

    public function adding_salle(Request $req)
    {
        $salles = new salles;
        $salles->Nom = $req->input('Nom');
        $salles->Function = $req->input('Function');
        $salles->save();

        return Redirect()->Back();
    }

    //--------------------- BEGIN Classes -------------------

    public function Classes(Request $req)
    {
        $Classes = DB::table('classes')->get();
        return view('Backend.Classes.Classe')->with('Classes',$Classes);

    }

    public function add_classe(Request $req)
    {
        $Matieres = DB::table('matieres')->get();
        $my_url = 'Adding_classe';
        // $cm = DB::table('classes_matieres')->get();
        return view('Backend.Classes.Ajouter')->with(compact('Matieres','my_url'));
    }

    public function Adding_classe(Request $req)
    {
        $inc = 0;
        $Classes = new Classes;
        $Classes->Nom = $req->input('Nom');
        $Classes->Description = $req->input('Description');
        $Classes->Frais = $req->input('Frais');
        $Classes->save();
        if($req->input('matieres_check')!== null)
        {
            foreach($req->input('matieres_check') as $checkbox) {
                $cm = new Classe_Matiere;
                $cm->id_classe = DB::table('classes')->orderby('id','desc')->pluck('id')->first();
                $cm->id_matiere = $checkbox;
                $cm->save();
            }
        }
        return Redirect()->Back();
    }

    public function Edit_classe(Request $req,$id=null)
    {
        $selected = DB::table('matieres')->join('classes_matieres','matieres.id','=','classes_matieres.id_matiere')
                                        ->join('classes','classes.id','=','classes_matieres.id_classe')
                                        ->select('classes_matieres.*')->where('classes.id',$id)
                                        ->get();

        $my_url = 'Editing_classe';
        $class = DB::table('classes')->where('id',$id)->first();
        $Matieres = DB::table('matieres')->get();
        return view('Backend.Classes.Ajouter')->with(compact('selected','my_url','class','Matieres'));
    }

    public function Editing_classe(Request $req)
    {
        DB::table('classes')->where('id',$req->input('id'))
                                ->update(['Nom' => $req->input('Nom'),
                                    'Description' => $req->input('Description'),
                                    'Frais' => $req->input('Frais')]);
        if($req->input('matieres_check')!== null)
        {
            foreach($req->input('matieres_check') as $checkbox) {
                // $selected = DB::table('classes_matieres')->where('id_classe',$req->input('id'))->get();
                DB::table('classes_matieres')->where('id_classe',$req->input('id'))->whereNotIn('id_matiere',$req->input('matieres_check'))->delete();
                $getcm = DB::table('classes_matieres')->where([['id_classe','=',$req->input('id')],['id_matiere','=',$checkbox]])->get();
                if($getcm->isEmpty()){
                $cm = new Classe_Matiere;
                $cm->id_classe = $req->input('id');
                $cm->id_matiere = $checkbox;
                $cm->save();
                }
            }
            return Redirect()->back();
        }else
        {
            DB::table('classes_matieres')->where('id_classe',$req->input('id'))->delete();
            // foreach($req->input('matieres_check') as $checkbox) {
            //     $getcm = DB::table('classe_matiere')->where('id',$checkbox)->first();
            //     if($getcm->id_classe == $req->input('id') && $getcm->id_matiere == $checkbox ){
            //     DB::table('classe_matiere')->where('id',$req->input('id'))->delete();
            //     }
            // }
            return Redirect()->Back();
        }

    }

    public function Add_groupe(Request $req)
    {
        $my_url = 'Adding_groupe';
        $Classes = Classes::pluck('Nom','id');
        // $Groupes = DB::table('matieres')->join('classes_matieres','Matieres.id','=','classes_matieres.id_matiere')
        //                                 ->join('classes','classes.id','=','classes_matieres.id_classe')
        //                                 ->select('classes_matieres.*')->where('matieres.id',$id)
        //                                 ->get();                          
        if(!$req->input('id_classe_get'))
        {
            $Groupes = Groupes::get();
        }else{
            $Groupes = Groupes::where('id_classe',$req->input('id_classe_get'))->get();
        }
        foreach ($Groupes as $grp) {

            $grp['count'] .= Etudiants::where('id_groupe',$grp->id)->count();
        }
        // return $Groupes;
            // $Groupes['count'] = $count_students;
        return view('Backend.Classes.Groupe')->with(compact('Classes','Groupes','my_url'));
    }

    public function Adding_groupe(Request $req)
    {
        $Groupe = new Groupes;
        $Groupe->Nom = $req->input('Nom');
        $Groupe->id_classe = $req->input('id_classe');
        $Groupe->save();
        for ($i=1; $i < 7; $i++) {
            for ($j=1; $j<9; $j++) {
                $emploi = new Emploi;
                $emploi->Jour = $i;
                $emploi->hour_start = $j;
                $emploi->hour_end = $j+1;
                $emploi->id_groupe = Groupes::orderby('id','desc')->pluck('id')->first(); 
                $emploi->save();
            }
        }
        return Redirect()->Back();
    }

    public function Groupe_show(Request $req,$id=null)
    {
         $Etudiants = Etudiants::where('id_groupe',$id)->get();
         $Groupe = Groupes::where('id',$id)->first();
        return view('Backend.Classes.Groupe_Show')->with(compact('Etudiants','Groupe'));
    }

    public function Filter_groupe_show(Request $req,$id=null)
    {
        $html = "";
         $Etudiants = Etudiants::where('Nom', 'like', '%'.$req->input('Nom').'%')->where('id_groupe',$req->input('id'))->get();
         return $Etudiants;
    }


    public function get_groupes_byclasse(Request $req)
    {
        $my_url = 'Adding_groupe';
        $Classes = Classes::pluck('Nom','id');
        $Groupes = Groupes::where('id',$req->input('id_classe'))->get();
        return Redirect()->Route('Add_groupe')->with(compact('Groupes'));
    }
        
    //----------------- END Classes ------------------

    //----------------- BEGIN Matiere -----------------

    public function Matieres(Request $req)
    {
        $Matieres = DB::table('matieres')->get();
        return view('Backend.Matieres.Matiere')->with('Matieres',$Matieres);
    }

    public function Add_matiere(Request $req)
    {
        $Matieres = DB::table('classes')->get();
        $my_url = 'Adding_matiere';
        $Classes = DB::table('classes')->get();
        return view('Backend.Matieres.Ajouter')->with(compact('Matieres','my_url','Classes'));
    }

    public function Adding_matiere(Request $req)
    {
        $Matieres = new Matieres;
        $Matieres->Nom = $req->input('Nom');
        $Matieres->save();
        if($req->input('classes_check')!== null)
        {
            foreach($req->input('classes_check') as $checkbox) {
                $cm = new Classe_Matiere;
                $cm->id_classe = $checkbox;
                $cm->id_matiere = DB::table('matieres')->orderby('id','desc')->pluck('id')->first();
                $cm->save();
            }

        }
        return Redirect()->Back();

    }

    public function Edit_matiere(Request $req, $id=null)
    {
        
        $selected = DB::table('matieres')->join('classes_matieres','matieres.id','=','classes_matieres.id_matiere')
                                        ->join('classes','classes.id','=','classes_matieres.id_classe')
                                        ->select('classes_matieres.*')->where('matieres.id',$id)
                                        ->get();
        // // return var_dump($tables);
        // // return var_dump($selected);

        $my_url = 'Editing_matiere';
        $Classes = DB::table('classes')->get();
        $Matieres = DB::table('matieres')->where('id',$id)->first();
        return view('Backend.Matieres.Ajouter')->with(compact('selected','my_url','Classes','Matieres'));
    }

    public function Editing_matiere(Request $req)
    {
        $value = '';
        $i = 0;
        DB::table('matieres')->where('id',$req->input('id'))
                                ->update(['Nom' => $req->input('Nom')]);
        if($req->input('classes_check')!== null)
        {
            foreach($req->input('classes_check') as $checkbox) {
                $i++;
                DB::table('classes_matieres')->where('id_matiere',$req->input('id'))->whereNotIn('id_classe',$req->input('classes_check'))->delete();
                $getcm = DB::table('classes_matieres')->where([['id_matiere','=',$req->input('id')],['id_classe','=',$checkbox]])->get();
                if($getcm->isEmpty()){
                    $value ='is empty';
                $cm = new Classe_Matiere;
                $cm->id_classe = $checkbox;
                $cm->id_matiere = $req->input('id');
                $cm->save();
                }
            }
            return Redirect()->back();
            // return $value .'checked'.$i;
        }else
        {
            DB::table('classes_matieres')->where('id_matiere',$req->input('id'))->delete();
            return Redirect()->Back();
            // return 'is null';
        }
    }

    //------------------------ END Matiere -------------------------------------

    //----------------------- BEGIN GROUPES AND CLASSES -----------------------------


    public function get_groupes(Request $req)
    {
        $Groupes = Groupes::where('id_classe',$req->input('id_classe'))->get();

        return $Groupes;
        
    }

    public function get_groupes_foremploi_prof(Request $req)
    {
        $Groupes = Groupes::where('id_classe',$req->input('id_classe'))->get();

        if(!$Groupes->isEmpty())
        {
            if(count($Groupes) == 1)
            {
                $profs = Professeur_Groupe::where('id_groupe',$Groupes[0]['id'])
                                    ->join('Professeurs','Professeurs.id','=','professeurs_groupes.id_professeur')
                                    ->select('Professeurs.*')
                                    ->get();

                return array($Groupes,$profs);
            }
            else
            {   
                $profs = Professeur_Groupe::where('id_groupe',$Groupes[0]['id'])
                                        ->join('Professeurs','Professeurs.id','=','professeurs_groupes.id_professeur')
                                        ->select('Professeurs.*')
                                        ->get();
                return array($Groupes,$profs);
            }
        }

        // $Groupes = Groupes::where('id_classe','32')->pluck('Nom','id');
        // $Groupes->get('');
        // $Groupes = Groupes::where('id_classe',32)->get();
    }

    public function get_groupes_checkboxes(Request $req)
    {
        $Groupes = Groupes::where('id_classe',$req->input('id_classe'))->get();
        // $Groupes = Groupes::where('id_classe','32')->pluck('Nom','id');
        // $Groupes->get('');
        // $Groupes = Groupes::where('id_classe',32)->get();
        $html = '';
        if($Groupes !== null)
        {
            foreach ($Groupes as $grp) {
                $html .="<div class='col-md-4 col-lg-4'>
                <label class='switch-inline'>
                <span class='switch'>
                <input name='groupe_check' type='checkbox' value='".$grp->id."'>
                <span class='switch-slider'><span class='switch-slider__on'>
                </span><span class='switch-slider__off'></span></span></span>
                <span class='switch-inline__text'>".$grp->Nom."</span></label></div>";
            }

        }
        else{
            $html = null;
        }

        // return $html;
        return $Groupes;
    }

    public function get_classes(Request $req)
    {
        // $Classes = Classes::where('id_classe',$req->input('id_matiere'))->get();
        $Classes = Classes::join('classes_matieres','classes_matieres.id_classe','=','classes.id')
                            ->where('classes_matieres.id_matiere',$req->input('id_matiere'))
                            ->select('classes.Nom','classes.id')
                            ->get();

        // $Groupes = Groupes::where('id_classe','32')->pluck('Nom','id');
        // $Groupes->get('');
        // $Groupes = Groupes::where('id_classe',32)->get();
        return $Classes;
    }

    //----------------------- END GROUPES AND CLASSES -----------------------------


     //---------------- BEGIN Etudiant ------------------

    public function Etudiants(Request $req)
    {
        $my_url = 'Etudiants';
        $Classes = Classes::pluck('Nom','id');
        $Groupes = Groupes::where('id_classe',Classes::orderby('id','asc')->pluck('id')->first())->pluck('Nom','id');
        // $Groupes = Groupes::where('id_classe',Classes::pluck('id')->first())->pluck('Nom','id');
        if($req->input('id_groupe')!= null)
        {
            $Etudiants = Etudiants::join('groupes','groupes.id','=','etudiants.id_groupe')
                                    ->select('etudiants.*','groupes.Nom as groupe_nom')
                                    ->where('id_groupe',$req->input('id_groupe'))->get();
        }
        else{
            $Etudiants = Etudiants::join('groupes','groupes.id','=','etudiants.id_groupe')
                                    // ->where('etudiants.id_groupe',$req->input('id_groupe'))
                                    ->select('etudiants.*','groupes.Nom as groupe_nom')->get();
        }
        return view('Backend.Etudiants.Etudiant')->with(compact('Groupes','Classes','Etudiants','my_url'));
    }


    public function Add_etudiant(Request $req)
    {
        $my_url = 'Adding_etudiant';
        $Classes = Classes::pluck('Nom','id');
        $myclasses = Classes::first();
        $Groupes = Groupes::where('id_classe',$myclasses->id)->pluck('Nom','id');
        return view('Backend.Etudiants.Ajouter')->with(compact('Classes','Groupes','my_url'));
    }

    public function Adding_etudiant(Request $req)
    {
        $etudiant = new Etudiants;
        if($req->hasFile('img_admin'))
        {
            $file = $req->file('img_admin');
            $dest = public_path().'/photos/personnels';
            $name = str_random(6).'_'.$req->input('Nom').'_'. $file->getClientOriginalName();
            $file->move($dest,$name);
            $type = $file->getClientOriginalExtension();
            if($type == 'png' || $type == 'jpg' || $type== 'jpeg')
            {
                $etudiant->Photo = $name;
            }
        }else{
                if($req->input('Sexe') == 'Masculin'){
                    $etudiant->Photo = 'boy.png';
                }
                else{
                    $etudiant->Photo = 'girl.png';
                }
        } 
        $etudiant->Matricule = rand(1000, 5000)."_".Groupes::where('id',3)->pluck('Nom')->first();
        $etudiant->Nom = $req->input('Nom');
        $etudiant->Prenom = $req->input('Prenom');
        $etudiant->Sexe = $req->input('Sexe');
        $etudiant->Ville = $req->input('Ville');
        $etudiant->Adresse = $req->input('Adresse');
        $etudiant->Date_Naiss = $req->input('Date_Naiss');
        $etudiant->id_groupe = $req->input('id_groupe');
        $etudiant->Nom_ar = $req->input('Nom_ar');
        $etudiant->Prenom_ar = $req->input('Prenom_ar');
        $etudiant->Ville_Naiss_ar = $req->input('Ville_Naiss_ar');
        $etudiant->Adresse_ar = $req->input('Adresse_ar');
        $etudiant->Nationalite_ar = $req->input('Nationalite_ar');
        $etudiant->Ancienne_Ecole = $req->input('Nom_ecole');
        $etudiant->Ancienne_Ecole_ar = $req->input('Nom_ecole_ar');
        $etudiant->Niv_Ancienne_Ecole = $req->input('Niveau_ecole');
        $etudiant->Niv_Ancienne_Ecole_ar = $req->input('Niveau_ecole_ar');
        $etudiant->save();
        $parent = new Parents;
        $parent->Nom = $req->input('Nom_pere');
        $parent->Nom_mere = $req->input('Nom_mere');
        $parent->Email = $req->input('Email_parent');
        $parent->Function = $req->input('Function_parent');
        $parent->Tele = $req->input('Tele_parent');
        $parent->save();
        $etd_par = new Etudiant_Parent;
        $etd_par->id_parent = Parents::orderby('id','desc')->pluck('id')->first();
        $etd_par->id_etudiant = Etudiants::orderby('id','desc')->pluck('id')->first();
        $etd_par->save();
        // return 'done';
        return Redirect()->Route('Payment');

    }

    public function Edit_etudiant(Request $req)
    {
        $my_url = 'Editing_etudiant';
        return view('Backend.Etudiants.Ajouter')->with(compact('my_url'));
    }

    public function Payment_M(Request $req, $id=null)
    {
        // $id is for the student
        $Payments = Payments::where('id_etudiant',$id)
                            ->join('frais','payments.id','=','frais.id_payment')
                            ->select('payments.id','payments.date_payment','frais.payed','frais.reste')
                            ->get();
        $Months = ['septembre','octobre','décembre','janvier','février','mars','avril','mai','juin','juillet','août'];
        $id_etud = $id;
        $montant = Etudiants::where('etudiants.id',$id)
                                ->join('groupes','groupes.id','=','etudiants.id_groupe')
                                ->join('classes','classes.id','=','groupes.id_classe')
                                ->pluck('classes.Frais');
        // $Payments = Payments::where('id_etudiant',34)->get();
        // $Frais = Frais::where('id_payment',)->get();
        // $month = Carbon::parse($Payments[0]->date_payment)->format('F');
        //$grp['count'] .= Etudiants::where('id_groupe',$grp->id)->count();


        $payed_months[] = null;
        foreach ($Payments as $pay) {
            Date::setLocale('fr');
          $pay['month'] .= Date::parse($pay->date_payment)->format('F');
          $payed_months[] = $pay['month'];
          $my_url = 'adding';
        }
        return view('Backend.Etudiants.Payment_M')->with(compact('my_url','montant','Payments','Months','payed_months','id_etud'));
    }

    public function Payment(Request $req,$id_stud=null,$month=null,$id_pay=null)
    {
        $frais_classe = Etudiants::where('etudiants.id',$id_stud)
                                ->join('groupes','groupes.id','=','etudiants.id_groupe')
                                ->join('classes','classes.id','=','groupes.id_classe')
                                ->select('classes.Frais')->get();
        // $id is for the payment
        Date::setLocale('fr');
        $month_topay = Date::parse($month)->format('m');
        // $month_topay = $month;
        $frais = Frais::where('id_payment',$id_pay)->first();
        $id_etud = $id_stud;
        // return $frais_classe;
        // return $id_stud;
        $my_url = 'adding';
        return view('Backend.Etudiants.Payment')->with(compact('my_url','id_etud','frais_classe','id_pay','reste','month','month_topay'));
    }

    public function Comp_Payment(Request $req,$id_stud=null,$id_pay=null,$month=null)
    {
        $id_etud = $id_stud;
        $Payments = Payments::where('id',$id_pay)->first();
        $frais = Frais::where('id_payment',$id_pay)->get();
        Date::setLocale('Fr');
        $month = Date::parse($Payments->date_payment)->format('F');
        $year = Date::parse($Payments->date_payment)->format('Y');
        $my_url = 'comp';
        $id_paym = $id_pay;

        return view('Backend.Etudiants.Payment')->with(compact('my_url','id_paym','frais','month','year','id_etud'));
    }

    public function Payment_comp(Request $req)
    {
        $deja_paye = Frais::where('id_payment',$req->input('id_pay'))->value('payed');

        if($req->input('method') != null)
        {
            if($req->input('payed') == 'payed')
            {
                Frais::where('id_payment',$req->input('id_pay'))
                                ->update([
                                    'payed' => $req->input('reste')+ $deja_paye,
                                    'reste' => 0,
                                ]);
            }else{
                Frais::where('id_payment',$req->input('id_pay'))
                                ->update([
                                    'payed' => $req->input('Avance')+ $deja_paye,
                                    'reste' => ($req->input('reste') - $req->input('Avance'))
                                ]);
            }
        }
    }

    public function Payment_pending(Request $req)
    {
        $Payment = new Payments;
        $Payment->id_etudiant = $req->input('id');
        $Payment->date_payment = $req->input('year').'-'.$req->input('date_pay').'-01';
        $Payment->save();
        $Frais = new Frais;
        $Frais->id_payment = Payments::orderby('id','desc')->pluck('id')->first();
        // $Frais->id_payment = $req->input('id_pay');;
        if($req->input('method') != null)
        {
            if($req->input('payed') == 'payed')
            {
                $Frais->payed = $req->input('prix');
                $Frais->reste = 0;
            }else{
                $Frais->payed = $req->input('Avance');
                $Frais->reste = ($req->input('prix') - $req->input('Avance'));
                // $Frais->reste = 222;
            }
        }
        $Frais->save();
        // return ($req->input('prix') - $req->input('Avance'));
        // return $id;
        return Redirect()->Back();
    }

    //---------------- END Etudiant --------------------


    //---------------- BEGIN Professeurs ---------------

    public function Professeurs(Request $req)
    {
       $Professeurs = Professeurs::get();
        return view('Backend.Professeurs.Professeur')->with(compact('my_url','Professeurs'));
    }

    public function Add_professeur(Request $req)
    {
        $my_url = 'Adding_prof';
        return view('Backend.Professeurs.Ajouter')->with(compact('my_url'));
    }

    public function Adding_prof(Request $req)
    {
        $Professeurs = new Professeurs;
        $Professeurs->Nom = $req->input('Nom');
        $Professeurs->Prenom = $req->input('Prenom');
        $Professeurs->Sexe = $req->input('Sexe');
        $Professeurs->Email = $req->input('Email');
        $Professeurs->Date_Naiss = $req->input('Date_Naiss');
        $Professeurs->Adresse = $req->input('Adresse');
        $Professeurs->Ville = $req->input('Ville');
        $Professeurs->Cin = $req->input('Cin');
        $Professeurs->Tele = $req->input('Tele');
        $Professeurs->save();
        return Redirect()->back();
    }

    public function Enseignement(Request $req)
    {
        $Professeurs = Professeurs::get();
        $Matieres = Matieres::pluck('Nom','id');
        if($req->input('id_matiere')!=null)
        {
            $classes = Classe_Matiere::where('id_matiere',$req->input('id_matiere'))
                                        ->join('classes','classes.id','=','classes_matieres.id_classe')
                                        ->get();
        }else{
            $classes = Classes::get();
        }
        $my_url = 'hello';
        return view('Backend.Professeurs.Enseignement')->with(compact('Professeurs'));
    }

    public function Enseignement_affect(Request $req,$id=null)
    {  
        if($req->input('id_classe') != null)
        {
            $groupes = Groupes::where('id_classe',$req->input('id_classe'))->get();
        }else{
            $groupes = Groupes::get();
        }
        $selected = DB::table('groupes')->join('professeurs_groupes','groupes.id','=','professeurs_groupes.id_groupe')
                                        ->join('professeurs','professeurs.id','=','professeurs_groupes.id_professeur')
                                        ->select('professeurs_groupes.*')->where('professeurs.id',$id)
                                        ->get();
        $id_prof = $id;
        $Classes = Classes::pluck('Nom','id');
        if($id != null)
        {
            $Professeur = Professeurs::where('id',$id)->get();
        }else{
            $Professeur = Professeurs::where('id',$req->input('id_prof'))->get();
        }

        return view('Backend.Professeurs.Prof_Groupe')->with(compact('Classes','selected','id_prof','Professeur','groupes'));
        // return $selected;
    }

    public function sign_professeur(Request $req)
    {
        if($req->input('groupes_check')!== null)
        {
            $check = $req->input('groupes_check');
            foreach ($req->input('groupes_check') as $check) 
            {
                //get the prof id to use
                Professeur_Groupe::where('id_professeur',$req->input('id_prof'))->whereNotIn('id_groupe',$req->input('groupes_check'))->delete();
                $getpg = Professeur_Groupe::where([['id_professeur','=',$req->input('id_prof')],['id_groupe','=',$check]])->get();
                if($getpg->isEmpty())
                {
                    $pg = new Professeur_Groupe;
                    $pg->id_professeur = $req->input('id_prof');
                    $pg->id_groupe = $check;
                    $pg->save();
                }
            }
        }else{
            Professeur_Groupe::where('id_professeur',$req->input('id_prof'))->delete();
        }
        $Professeur = Professeurs::where('id',$req->input('id_prof'))->get();

        // return Redirect()->Back()->with(compact('Professeur'));
        return 'done';
    }

    //---------------- END Professeurs ----------------


    //---------------- BEGIN Emploi -------------------

    public function Emploi_classes(Request $req)
    {
        $my_url = '';
        $id_groupe = 0;
        if($req->input('id_classe') != null && $req->input('id_groupe')!= null)
        {
            $emploi = Emploi::where('emploi.id_groupe',$req->input('id_groupe')) 
                    // ->join('professeurs_groupes','professeurs_groupes.id_groupe','=','emploi.id_groupe')
                    ->join('professeurs','professeurs.id','=','emploi.id_prof')
                    ->join('groupes','groupes.id','=','emploi.id_groupe')
                    ->join('classes_matieres','classes_matieres.id_classe','=','groupes.id_classe')
                    ->join('matieres','matieres.id','=','emploi.id_matiere')
                    ->join('salles','salles.id','=','emploi.id_salle')
                    ->select('emploi.*','professeurs.Nom as profNom','salles.Nom as salleNom','matieres.Nom as matNom')
                    ->orderby('Jour','asc')
                    ->orderby('hour_start','asc')
                    ->get();

            $profs = Professeur_Groupe::where('id_groupe',$req->input('id_groupe'))
                            ->join('professeurs','professeurs.id','=','professeurs_groupes.id_professeur')
                            ->pluck('professeurs.Nom','professeurs.id');
            $mats = Classe_Matiere::where('id_classe',$req->input('id_classe'))
                            ->join('matieres','matieres.id','=','classes_matieres.id_matiere')
                            ->pluck('matieres.Nom','matieres.id');

            $grp_nom = Groupes::where('id',$req->input('id_groupe'))->pluck('Nom');


        $id_groupe = $req->input('id_groupe');
        }
        $jours =['Lundi','Mardi','Mercredi','Jeudi','Vendredi'];
        $classes = Classes::pluck('Nom','id');
        $salles = salles::pluck('Nom','id');
        $groupes = Groupes::pluck('Nom','id');

        return view('Backend.Emploi.Etudiants')->with(compact('grp_nom','id_groupe','salles','mats','profs','classes','groupes','emploi','my_url','jours'));
        // return $profs;
    }


    public function update_emp(Request $req)
    {
        Emploi::where([['Jour','=',$req->input('jour')],['hour_start','=',$req->input('hour_start')],['id_groupe','=',$req->input('id_groupe')]])
                                ->update(['id_salle' => $req->input('id_salle'),
                                    'id_prof' => $req->input('id_prof'),
                                    'id_matiere' => $req->input('id_matiere')]);



        $mats = Classe_Matiere::where('id_matiere',$req->input('id_matiere'))
                            ->join('matieres','matieres.id','=','classes_matieres.id_matiere')
                            ->first();
        $profs = Professeur_Groupe::where('id_groupe',$req->input('id_groupe'))
                            ->join('professeurs','professeurs.id','=','professeurs_groupes.id_professeur')
                            ->first();
        $salles = salles::where('id',$req->input('id_salle'))->first();

        return  array($mats,$profs,$salles);
    }


    public function empty_emp(Request $req)
    {
        Emploi::where([['Jour','=',$req->input('jour')],['hour_start','=',$req->input('hour_start')],['id_groupe','=',$req->input('id_groupe')]])
                                ->update(['id_salle' => null,
                                        'id_prof' => null,
                                        'id_matiere' => null]);
        
    }

    public function get_profs(Request $req)
    {
        $profs = Professeur_Groupe::where('id_groupe',$req->input('id_groupe'))
                                ->join('professeurs','professeurs.id','=','professeurs_groupes.id_professeur')
                                ->pluck('professeurs.Nom','professeurs.id');

    }

    public function get_profs_bygroupe(Request $req)
    {
        // $groupes = Groupes::where('id',$req->input('id_classe'))->get();
        $profs = Professeur_Groupe::where('id_groupe',$req->input('id_groupe'))
                                    ->join('Professeurs','Professeurs.id','=','professeurs_groupes.id_professeur')
                                    ->select('Professeurs.*')
                                    ->get();
                                    // ->pluck('Professeurs.Nom','Professeurs.id');
            return $profs;
    }

    public function Emploi_professeurs(Request $req)
    {
        if($req->input('id_classe') != null && $req->input('id_groupe')!= null && $req->input('id_prof')!= null)
        {
            $emploi = Emploi::where('emploi.id_prof',$req->input('id_prof')) 
                    // ->join('professeurs_groupes','professeurs_groupes.id_groupe','=','emploi.id_groupe')
                    // ->join('professeurs','professeurs.id','=','emploi.id_prof')
                    ->join('groupes','groupes.id','=','emploi.id_groupe')
                    ->join('classes_matieres','classes_matieres.id_classe','=','groupes.id_classe')
                    ->join('matieres','matieres.id','=','emploi.id_matiere')
                    ->join('salles','salles.id','=','emploi.id_salle')
                    ->select('emploi.*','groupes.Nom as grpNom','salles.Nom as salleNom','matieres.Nom as matNom')
                    ->orderby('Jour','asc')
                    ->orderby('hour_start','asc')
                    ->get();

            $prof_nom = Professeurs::where('id',$req->input('id_prof'))->pluck('Nom');
        }

        $jours =['Lundi','Mardi','Mercredi','Jeudi','Vendredi'];
        $classes = Classes::pluck('Nom','id');
        $salles = salles::pluck('Nom','id');
        $groupes = Groupes::pluck('Nom','id');
        $profs = Professeurs::pluck('Nom','id');
        return view('Backend.Emploi.Professeurs')->with(compact('prof_nom','emploi','profs','classes','salles','groupes','jours'));
    }


    //---------------- END Emploi ---------------------


    //--------------- BEGIN Absence --------------------

    public function Absence_get_students(Request $req)
    {
        if($req->input('id_groupe') != null)
        {
            $Etudiants = Etudiants::where('id_groupe',$req->input('id_groupe'))->get();
        }

        $classes = Classes::pluck('Nom','id');
        $my_url= "Etudiants";
        return view('Backend.Absence-Retard.List_personnes')->with(compact('my_url','Etudiants','classes'));
        
    }

    public function Absence_get_profs(Request $req)
    {
        if($req->input('id_groupe') != null)
        {
            $Professeurs = Professeurs::join('professeurs_groupes','professeurs_groupes.id_professeur','=','professeurs.id')->where('professeurs_groupes.id_groupe',$req->input('id_groupe'))->get();
        }
        else{
            $Professeurs = Professeurs::get();

        }
        $classes = Classes::pluck('Nom','id');
        $my_url= "Professeurs";
        return view('Backend.Absence-Retard.List_personnes')->with(compact('my_url','Professeurs','classes'));
    }

    public function add_student_absence(Request $req, $id=null)
    {
        $id_etudiant = $id;
        $my_url = "Etudiants";
        return view('Backend.Absence-Retard.Add_Absence')->with(compact('id_etudiant','my_url'));
        
    }

    public function add_prof_absence(Request $req, $id=null)
    {
        $id_prof = $id;
        $my_url = "Professeurs";
        return view('Backend.Absence-Retard.Add_Absence')->with(compact('id_prof','my_url'));
        
    }

    public function adding_std_ab(Request $req)
    {
        if($req->input('method')!== null)
        {
            // return 'retard not null';
            $absence = new Absence_Retard;
                if($req->input('method') == 'retard')
                {
                    $absence->A_R = $req->input('method');
                    $absence->De = $req->input('Begin');
                    $absence->A = $req->input('End');
                }else if($req->input('method') == 'absence')
                {
                    $absence->A_R = $req->input('method');
                }
                $absence->id_etudiant = $req->input('id_etudiant');
                    $absence->justif = $req->input('justification_a');
                    $absence->save();
        }
        return Redirect()->Back();
    }

    public function adding_prof_ab(Request $req)
    {
        if($req->input('method')!== null)
        {
            // return 'retard not null';
            $absence = new Absence_Retard;
                if($req->input('method') == 'retard')
                {
                    $absence->A_R = $req->input('method');
                    $absence->De = $req->input('Begin');
                    $absence->A = $req->input('End');
                }else if($req->input('method') == 'absence')
                {
                    $absence->A_R = $req->input('method');
                }
                $absence->id_etudiant = $req->input('id_etudiant');
                $absence->id_prof = $req->input('id_prof');
                $absence->justif = $req->input('justification_a');
                $absence->save();
        }
        return Redirect()->Back();
    }


    public function get_student_absence(Request $req,$id=null)
    {
        $Retard = Absence_Retard::where([['id_etudiant',$id],['A_R','retard']])->get();
        $Absences = Absence_Retard::where([['id_etudiant',$id],['A_R','absence']])->get();
        $Nom = Etudiants::where('id',$id)->select('Nom','Prenom')->get();

        return view('Backend.Absence-Retard.List_Absence')->with(compact('Nom','Absences','Retard'));
    }

    public function get_prof_absence(Request $req,$id=null)
    {
        $Retard = Absence_Retard::where([['id_prof',$id],['A_R','retard']])->get();
        $Absences = Absence_Retard::where([['id_prof',$id],['A_R','absence']])->get();
        $Nom = Professeurs::where('id',$id)->select('Nom','Prenom')->get();

        return view('Backend.Absence-Retard.List_Absence')->with(compact('Nom','Absences','Retard'));
    }

    //--------------- END Absence ----------------------

    //--------------- BEGIN Note/Controle -------------

    public function profs_show_exams(request $req)
    {
        $Professeurs = Professeurs::get();
        return view('Backend.Note-Control.list_profs')->with(compact('Professeurs','Absences','Retard'));
    }

    public function add_exam(Request $req,$id=null)
    {

        $matieres = Professeur_Groupe::join('groupes','groupes.id','=','professeurs_groupes.id_groupe')
                        ->join('classes_matieres','classes_matieres.id_classe','=','groupes.id_classe')
                        ->join('matieres','matieres.id','=','classes_matieres.id_matiere')
                        ->where('professeurs_groupes.id_professeur',$id)
                        ->pluck('matieres.Nom','matieres.id');

        return view('Backend.Note-Control.Exams')->with(compact('matieres','Absences','Retard'));
    }

    public function show_notes(Request $req)
    {
        return view('Backend.Note-Control.Notes');
    }

    //--------------- END Note/Contole ----------------
}

