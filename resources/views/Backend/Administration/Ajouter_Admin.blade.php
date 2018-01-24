@extends('Backend.index')
@section('title','Ajouter Administrateur')
@section('content')


<div class="main-container" style="background: initial;">
    <div class="row">
      <div class="col-md-12 col-lg-12">
      <h2 class="content-heading">Personnel</h2>
      <h3 class="content-description">Ajout Personnel</h3>
      <hr>
    </div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-lg-6">
			<div class="form-group" style="background: #fff;padding: 20px;">
				{!! Form::open(['route' => $my_url ,'method' => 'post','files'=> true]) !!}
					{{ Form::label('Image:', null, ['class' => '']) }}
						<div class="btn-upload">
							{{ Form::file('img_admin', ['class'=>'btn-upload__input-file','accept'=>'image/*']) }}
					        <div class="btn-upload__top-side">
					          <span class="iconfont iconfont-btn-upload btn-upload__icon"></span>
					          <span class="btn-upload__desc">Browse file </span>
					        </div>
				     	</div>
					<br>
					{!! Form::hidden('id',$my_url == 'Edit_user' ? $Admin->id : null) !!}
					{{ Form::label('Nom:',null, ['class' => '']) }}
					{{ Form::text('Nom', $my_url == 'Edit_user' ? $Admin->Nom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Nom']) }}
					{{ Form::label('Prenom:', null, ['class' => '']) }}
					{{ Form::text('Prenom', $my_url == 'Edit_user' ? $Admin->Prenom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Prenom'])}}
					{{ Form::label('Cin:', null, ['class' => '']) }}
					{{ Form::text('Cin', $my_url == 'Edit_user' ? $Admin->Cin : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Cin'])}}
					{{ Form::label('Email:', null, ['class' => '']) }}
					{{ Form::email('Email', $my_url == 'Edit_user' ? $Admin->Email : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer l\'email']) }}
					{{ Form::label('Téle:', null, ['class' => '']) }}
					{{ Form::text('Tele', $my_url == 'Edit_user' ? $Admin->Tele : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Tele']) }}
					{{ Form::label('Ville:', null, ['class' => '']) }}
					{{ Form::text('Ville', $my_url == 'Edit_user' ? $Admin->Ville : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer la Ville']) }}
					{{ Form::label('Adresse:', null, ['class' => '']) }}
					{{ Form::text('Adresse', $my_url == 'Edit_user' ? $Admin->Adresse : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer la Adresse']) }}
					{{ Form::label('Date de Naissance:', null, ['class' => '']) }}
					{{ Form::date('Date_Naiss', $my_url == 'Edit_user' ? $Admin->Date_Naiss : null,['class' => 'flatpickr form-control flatpickr-input active', 'placeholder' =>'Veuillez entrer la Date de Naissance'])}}
					{{ Form::label('Function:', null, ['class' => '']) }}
					{{ Form::text('Function', $my_url == 'Edit_user' ? $Admin->Nom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Function'])}}
					{{ Form::label('Sexe:', null, ['class' => '']) }}
					{{ Form::select('Sexe', array('Masculin' => 'Masculin', 'Feminin' => 'Feminin'), 'Masculin' ) }}<br><br>
					{{ Form::label('Date d\'inscription:', null, ['class' => '']) }}
					{{ Form::date('Date_inscription', $my_url == 'Edit_user' ? $Admin->Date_inscription : null , ['class' => 'flatpickr form-control flatpickr-input active', 'placeholder' =>'Veuillez entrer la Date d\'inscription'])}}
					{{ Form::label('Rôle:', null, ['class' => '']) }}
					{{ Form::select('Role', array('Administrateur' => 'Administrateur','Moderateur'=>'Moderateur','Utilisateur' => 'Utilisateur'), 'Administrateur' ) }}<br><br>
			</div>
		</div>
		<div class="col-md-6 col-lg-6 etud_col" style="padding: 0px;">
			<div class="mybox-text par"><h2 style="color: white">Diplôme</h2></div>
			<div class="form_cont_par">	
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
			{!! Form::submit($my_url == 'Edit_user' ? 'Mettre a Jour' : 'Ajouter',['class'=>'btn btn-primary pull-right']) !!}
				{!! Form::close() !!}
			
		</div>
	</div>
	<div class="my-spacer"></div>
				<div class="my-spacer"></div>
</div>




{{-- 
<div class="col-md-12 col-lg-12">
      <h2 class="content-heading">Personnel</h2>
      <h3 class="content-description">Ajout Personnel</h3>
      <hr>
        <div>
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-expanded="true" aria-selected="true">Informations de Personnel</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-expanded="false" aria-selected="false">Diplome</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">
            	
			<div class="col-md-6">
			<div class="form-group" style="background: #fff;padding:20px">
				{!! Form::open(['route' => $my_url ,'method' => 'post','files'=> true]) !!}
					{{ Form::label('Image:', null, ['class' => '']) }}
						<div class="btn-upload">
							{{ Form::file('img_admin', ['class'=>'btn-upload__input-file','accept'=>'image/*']) }}
					        <div class="btn-upload__top-side">
					          <span class="iconfont iconfont-btn-upload btn-upload__icon"></span>
					          <span class="btn-upload__desc">Browse file </span>
					        </div>
				     	</div>
					<br>
					{!! Form::hidden('id',$my_url == 'Edit_user' ? $Admin->id : null) !!}
					{{ Form::label('Nom:',null, ['class' => '']) }}
					{{ Form::text('Nom', $my_url == 'Edit_user' ? $Admin->Nom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Nom']) }}
					{{ Form::label('Prenom:', null, ['class' => '']) }}
					{{ Form::text('Prenom', $my_url == 'Edit_user' ? $Admin->Prenom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Prenom'])}}
					{{ Form::label('Cin:', null, ['class' => '']) }}
					{{ Form::text('Cin', $my_url == 'Edit_user' ? $Admin->Cin : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Cin'])}}
					{{ Form::label('Email:', null, ['class' => '']) }}
					{{ Form::email('Email', $my_url == 'Edit_user' ? $Admin->Email : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer l\'email']) }}
					{{ Form::label('Téle:', null, ['class' => '']) }}
					{{ Form::text('Tele', $my_url == 'Edit_user' ? $Admin->Tele : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Tele']) }}
					{{ Form::label('Ville:', null, ['class' => '']) }}
					{{ Form::text('Ville', $my_url == 'Edit_user' ? $Admin->Ville : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer la Ville']) }}
					{{ Form::label('Adresse:', null, ['class' => '']) }}
					{{ Form::text('Adresse', $my_url == 'Edit_user' ? $Admin->Adresse : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer la Adresse']) }}
					{{ Form::label('Date de Naissance:', null, ['class' => '']) }}
					{{ Form::date('Date_Naiss', $my_url == 'Edit_user' ? $Admin->Date_Naiss : null,['class' => 'flatpickr form-control flatpickr-input active', 'placeholder' =>'Veuillez entrer la Date de Naissance'])}}
					{{ Form::label('Function:', null, ['class' => '']) }}
					{{ Form::text('Function', $my_url == 'Edit_user' ? $Admin->Nom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Function'])}}
					{{ Form::label('Sexe:', null, ['class' => '']) }}
					{{ Form::select('Sexe', array('Masculin' => 'Masculin', 'Feminin' => 'Feminin'), 'Masculin' ) }}<br><br>
					{{ Form::label('Date d\'inscription:', null, ['class' => '']) }}
					{{ Form::date('Date_inscription', $my_url == 'Edit_user' ? $Admin->Date_inscription : null , ['class' => 'flatpickr form-control flatpickr-input active', 'placeholder' =>'Veuillez entrer la Date d\'inscription'])}}
					{{ Form::label('Rôle:', null, ['class' => '']) }}
					{{ Form::select('Role', array('Administrateur' => 'Administrateur','Moderateur'=>'Moderateur','Utilisateur' => 'Utilisateur'), 'Administrateur' ) }}<br><br>
					{!! Form::submit($my_url == 'Edit_user' ? 'Mettre a Jour' : 'Ajouter',['class'=>'btn btn-primary pull-right']) !!}
				{!! Form::close() !!}

				<div class="my-spacer"></div>
				<div class="my-spacer"></div>
			</div>
		</div>
			</div>

            <div class="tab-pane" id="profile" role="tabpanel" aria-expanded="false">
            	
            </div>
            <div class="tab-pane" id="messages" role="tabpanel">
            	
            </div>

            </div>
          </div>
        </div> --}}



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
	
</style>

@endsection