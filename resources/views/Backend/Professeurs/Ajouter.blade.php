@extends('Backend.index')
@section('title','Ajouter Professeurs')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
      <h2 class="content-heading">Professeurs</h2>
      <h3 class="content-description">Ajout des Professeurs</h3>
      <hr>
    </div>
  </div>

</div>

<div class="container-fluid">
	<div class="row">
		<!-- Nav tabs -->
<ul class="nav nav-tabs nav-justified">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#panel1" role="tab">Infos personnelles et professionnelles</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#panel2" role="tab">Informations légales</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#panel3" role="tab">Dipôme</a>
    </li>
</ul>
<!-- Tab panels -->
<div class="tab-content card" style="width: 100%; background: initial;">
    <!--Panel 1-->
    <div class="tab-pane fade in show active" id="panel1" role="tabpanel">
      <div class="container-fluid">
     		<div class="row">
     			<div class="col-md-7 offset-1">
     				<div class="form-group">
              <div class="mybox-text prof"><h2>Infos personnelles et professionnelles</h2></div>
              <div class="form_cont_prof" style="background: white; padding: 20px;">
                {!! Form::open(['route' => $my_url ,'method' => 'post','files'=> true,'class'=>'etud_form']) !!}
                {{ Form::label('Image:', null, ['class' => '']) }}
                <div class="btn-upload">
                  {{ Form::file('img_admin', ['class'=>'btn-upload__input-file','accept'=>'image/*']) }}
                  <div class="btn-upload__top-side">
                    <span class="iconfont iconfont-btn-upload btn-upload__icon"></span>
                    <span class="btn-upload__desc">Browse file </span>
                  </div>
                </div>
                <br>
                {{ Form::label('Nom:',null, ['class' => '']) }}
                {{ Form::text('Nom', $my_url == 'Edit_user' ? $Admin->Nom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Nom']) }}
                {{ Form::label('Prenom:', null, ['class' => '']) }}
                {{ Form::text('Prenom', $my_url == 'Edit_user' ? $Admin->Prenom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Prenom'])}}
                {{ Form::label('Cin:', null, ['class' => '']) }}
                {{ Form::text('Cin', $my_url == 'Edit_user' ? $Admin->Prenom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Cin'])}}
                {{ Form::label('Sexe:', null, ['class' => '']) }}
                {{ Form::select('Sexe', array('Masculin' => 'Masculin', 'Feminin' => 'Feminin'), 'Masculin' ) }}<br><br>
                {{ Form::label('Date de Naissance:', null, ['class' => '']) }}
                {{ Form::date('Date_Naiss', $my_url == 'Edit_user' ? $Admin->Date_Naiss : null,['class' => 'flatpickr form-control flatpickr-input active', 'placeholder' =>'Veuillez entrer la Date de Naissance'])}}
                {{ Form::label('Ville:', null, ['class' => '']) }}
                {{ Form::text('Ville', $my_url == 'Edit_user' ? $Admin->Ville : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer la Ville']) }}
                {{ Form::label('Adresse:', null, ['class' => '']) }}
                {{ Form::text('Adresse', $my_url == 'Edit_user' ? $Admin->Adresse : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer la Adresse']) }}
                {{ Form::label('Telephone:', null, ['class' => '']) }}
                {{ Form::number('Tele', $my_url == 'Edit_user' ? $Admin->Adresse : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le numero']) }}
                {{ Form::label('Email:', null, ['class' => '']) }}
                {{ Form::email('Email', $my_url == 'Edit_user' ? $Admin->Adresse : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer l\'email']) }}
              </div>
              <br>
              {!! Form::submit($my_url == 'Editing_matiere' ? 'Mettre a Jour' : 'Enregistrer',['class'=>'btn btn-primary pull-right']) !!}
              {!! Form::close() !!}
            </div>
     				<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus
            reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione
            porro voluptate odit minima.</p> -->
            <div class="my-spacer"></div>
            <div class="my-spacer"></div>
       		</div>
       	</div>
      </div>
    </div>
    <!--/.Panel 1-->
    <!--Panel 2-->
    <div class="tab-pane fade" id="panel2" role="tabpanel">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-7 offset-1">
              <div class="form-group">
                <div class="mybox-text prof-2"><h2>Informations légales</h2></div>
                <div class="form_cont_prof-2">
                  {!! Form::open(['route' => $my_url ,'method' => 'post','files'=> true,'class'=>'etud_form']) !!}
                  <br>
                  {!! Form::hidden('id',$my_url == 'Edit_user' ? $Admin->id : null) !!}
                  {{ Form::label('CNSS:',null, ['class' => '']) }}
                  {{ Form::text('CNSS', $my_url == 'Edit_user' ? $Admin->Nom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Nom']) }}
                  {{ Form::label('CIMR:', null, ['class' => '']) }}
                  {{ Form::text('CIMR', $my_url == 'Edit_user' ? $Admin->Prenom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Prenom'])}}
                  {{ Form::label('Salaire Brut:', null, ['class' => '']) }}
                  {{ Form::text('Salaire_brut', $my_url == 'Edit_user' ? $Admin->Prenom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Cin'])}}
                  {{ Form::label('Salaire Net:', null, ['class' => '']) }}
                  {{ Form::text('Salaire_net', $my_url == 'Edit_user' ? $Admin->Prenom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Cin'])}}                
                  {{ Form::label('Situation Familiale:', null, ['class' => '']) }}
                  {{ Form::select('Situation_fam', array('Celibataire' => 'Celibataire', 'Marié' => 'Marié', 'Divorcé' => 'Divorcé', 'veuf' => 'veuf') ) }}<br><br> 
                  {{ Form::label('Nombre d\'enfants:', null, ['class' => '']) }}
                  {{ Form::text('Nombre_enfants', $my_url == 'Edit_user' ? $Admin->Ville : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer la Ville']) }}
                  {{ Form::label('Mutuelle:', null, ['class' => '']) }}
                  {{ Form::text('Mutuelle', $my_url == 'Edit_user' ? $Admin->Adresse : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer la Adresse']) }}
                </div>
                <br>
                {!! Form::submit($my_url == 'Editing_matiere' ? 'Mettre a Jour' : 'Enregistrer',['class'=>'btn btn-primary pull-right']) !!}
                {!! Form::close() !!}
              </div>
              <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus
              reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione
              porro voluptate odit minima.</p> -->
              <div class="my-spacer"></div>
              <div class="my-spacer"></div>
            </div>
          </div>
      </div>
    </div>
    <!--/.Panel 2-->
    <!--Panel 3-->
    <div class="tab-pane fade" id="panel3" role="tabpanel">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-7 offset-1 etud_col" style="padding: 0px;">
      <div class="mybox-text par"><h2 style="color: white">Diplôme</h2></div>
      <div class="form_cont_par" style="border: 1px solid #dc3545"> 
        {{ Form::label('Intitule :',null, ['class' => '']) }}
        {{ Form::text('Nom_pere', $my_url == 'Edit_user' ? $Admin->Nom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer l\'Intitule']) }}
        {{ Form::label('Ecole:',null, ['class' => '']) }}
        {{ Form::text('Nom_mere', $my_url == 'Edit_user' ? $Admin->Nom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Nom d\'Ecole']) }}
        {{ Form::label('Specialite:',null, ['class' => '']) }}
        {{ Form::text('Tele_parent', $my_url == 'Edit_user' ? $Admin->Nom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer l Specialite']) }}
        {{ Form::label('Niveau:',null, ['class' => '']) }}
        {{ Form::text('Function_parent', $my_url == 'Edit_user' ? $Admin->Nom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Niveau']) }}
        {{ Form::label('Date obtention:',null, ['class' => '']) }}
        {{ Form::date('Date_inscription', $my_url == 'Edit_user' ? $Admin->Date_inscription : null , ['class' => 'flatpickr form-control flatpickr-input active', 'placeholder' =>'Veuillez entrer la Date obtention'])}}

      </div>
      <br>
      
      </div>
      </div>
    </div>
    </div>
    <!--/.Panel 3-->
	</div>
</div>

</div>


<style type="text/css">
	#exTab1 .tab-content {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}

#exTab2 h3 {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}

/* remove border radius for the tab */

#exTab1 .nav-pills > li > a {
  border-radius: 0;
}

/* change border radius for the tab , apply corners on top*/

#exTab3 .nav-pills > li > a {
  border-radius: 4px 4px 0 0 ;
}

#exTab3 .tab-content {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}

</style>


<style type="text/css">
.btn-upload{
  width: 150px;
  overflow: hidden;
}
.btn-upload input{
  cursor: pointer;
}
.form-control{
  margin-bottom: 20px;
}

.form_cont_etud,.form_cont_par,.form_cont_grp{
  padding: 20px;
  
} 
</style>

@endsection



