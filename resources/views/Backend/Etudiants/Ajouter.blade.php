@extends('Backend.index')
@section('title','Ajouter Administrateur')
@section('content')



<div class="main-container" style="background: initial;">
    <div class="row">
      <div class="col-md-12 col-lg-12">
      <h2 class="content-heading">Etudiant</h2>
      <h3 class="content-description">Ajout d'etudiant</h3>
      <hr>
        <div>
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-expanded="true" aria-selected="true">Etudiant</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-expanded="false" aria-selected="false">Parent</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Suivi</a>
            </li>
          </ul>
          <div class="tab-content" style="">
            <div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">
            	<div class="col-md-6 col-lg-6">
            	<div class="form-group">
				<div class="mybox-text etud"><h2 style="color: white">Etudiant</h2></div>
				<div class="form_cont_etud">
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
						{{ Form::label('Sexe:', null, ['class' => '']) }}
						{{ Form::select('Sexe', array('Masculin' => 'Masculin', 'Feminin' => 'Feminin'), 'Masculin' ) }}<br><br>
						{{ Form::label('Date de Naissance:', null, ['class' => '']) }}
						{{ Form::date('Date_Naiss', $my_url == 'Edit_user' ? $Admin->Date_Naiss : null,['class' => 'flatpickr form-control flatpickr-input active', 'placeholder' =>'Veuillez entrer la Date de Naissance'])}}
						{{ Form::label('Ville:', null, ['class' => '']) }}
						{{ Form::text('Ville', $my_url == 'Edit_user' ? $Admin->Ville : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer la Ville']) }}
						{{ Form::label('Adresse:', null, ['class' => '']) }}
						{{ Form::text('Adresse', $my_url == 'Edit_user' ? $Admin->Adresse : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer la Adresse']) }}
				</div>
			</div>
			<div class="mybox-text grp"><h2 style="color: white">Groupe</h2></div>
				<div class="form_cont_grp">	
					{{ Form::label('Classe :',null, ['class' => '']) }}
					{{ Form::select('id_classe', $Classes) }}
					{{ Form::label('Groupe :',null, ['class' => '']) }}
					{{ Form::select('id_groupe', $Groupes) }}	
				</div>	
		</div>
			<div class="col-md-6 col-lg-6">
				<div class="mybox-text etud_ar"><h2 style="color: white">Information Arabe</h2></div>
				<div class="form_cont_etud_ar">
						{{ Form::label(':الاسم العائلي',null, ['class' => 'pull-right']) }}
						{{ Form::text('Nom_ar', $my_url == 'Edit_user' ? $Admin->Nom : null, ['style'=>'direction:rtl','class' => 'form-control', 'placeholder' =>'']) }}
						{{ Form::label(':الاسم الشخصي', null, ['class' => 'pull-right']) }}
						{{ Form::text('Prenom_ar', $my_url == 'Edit_user' ? $Admin->Prenom : null, ['style'=>'direction:rtl','class' => 'form-control', 'placeholder' =>''])}}
						{{ Form::label('مكان الازدياد', null, ['class' => 'pull-right']) }}
						{{ Form::text('Ville_Naiss_ar', $my_url == 'Edit_user' ? $Admin->Ville : null, ['style'=>'direction:rtl','class' => 'form-control', 'placeholder' =>'']) }}
						{{ Form::label(':الجنسية', null, ['class' => 'pull-right']) }}
						{{ Form::text('Nationalite_ar', $my_url == 'Edit_user' ? $Admin->Adresse : null, ['style'=>'direction:rtl','class' => 'form-control', 'placeholder' =>'']) }}
						{{ Form::label(':العنوان', null, ['class' => 'pull-right']) }}
						{{ Form::text('Adresse_ar', $my_url == 'Edit_user' ? $Admin->Adresse : null, ['style'=>'direction:rtl','class' => 'form-control', 'placeholder' =>'']) }}

				</div>
				<br>

				<div class="mybox-text etud_an"><h2 style="color: white">Informations sur l'ancienne école</h2></div>
				<div class="form_cont_etud_an">
						{{ Form::label('Ancienne école:',null, ['class' => '']) }}
						{{ Form::text('Nom_ecole', $my_url == 'Edit_user' ? $Admin->Nom : null, ['style'=>'','class' => 'form-control', 'placeholder' =>'']) }}
						{{ Form::label(':.م.س .م', null, ['class' => 'pull-right']) }}
						{{ Form::text('Nom_ecole_ar', $my_url == 'Edit_user' ? $Admin->Prenom : null, ['style'=>'direction:rtl','class' => 'form-control', 'placeholder' =>''])}}
						{{ Form::label('Niveau en ancienne école:', null, ['class' => '']) }}
						{{ Form::text('Niveau_ecole', $my_url == 'Edit_user' ? $Admin->Ville : null, ['style'=>'','class' => 'form-control', 'placeholder' =>'']) }}
						{{ Form::label(':.م .س .م .م', null, ['class' => 'pull-right']) }}
						{{ Form::text('Niveau_ecole_ar', $my_url == 'Edit_user' ? $Admin->Adresse : null, ['style'=>'direction:rtl','class' => 'form-control', 'placeholder' =>'']) }}
				</div>
			</div>
		</div>








            <div class="tab-pane" id="profile" role="tabpanel" aria-expanded="false">
            	<div class="col-md-6 col-lg-6 etud_col" style="padding: 0px;">
			<div class="mybox-text par"><h2 style="color: white">Parent</h2></div>
			<div class="form_cont_par">	
				{{ Form::label('Nom père :',null, ['class' => '']) }}
				{{ Form::text('Nom_pere', $my_url == 'Edit_user' ? $Admin->Nom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Nom de père']) }}
				{{ Form::label('Nom mère,:',null, ['class' => '']) }}
				{{ Form::text('Nom_mere', $my_url == 'Edit_user' ? $Admin->Nom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Nom de mère']) }}
				{{ Form::label('Tel père:',null, ['class' => '']) }}
				{{ Form::text('Tele_parent', $my_url == 'Edit_user' ? $Admin->Nom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Tel père']) }}
				{{ Form::label('Fonction:',null, ['class' => '']) }}
				{{ Form::text('Function_parent', $my_url == 'Edit_user' ? $Admin->Nom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer la Fonction']) }}
				{{ Form::label('Email:',null, ['class' => '']) }}
				{{ Form::email('Email_parent', $my_url == 'Edit_user' ? $Admin->Nom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer l\'Email']) }}
			</div>
			<br>
			
		</div>
            </div>
            <div class="tab-pane" id="messages" role="tabpanel">
            	<div class="col-md-6 col-lg-6 etud_col" style="padding: 0px;">
			<div class="mybox-text suivi"><h2 style="color: white">Suivi</h2></div>
			<div class="form_cont_suivi">
				<div class="row">
					<div class="col-md-6">
						<label class="switch-inline">
				            <span class="switch">
					            	{{ Form::checkbox('classes_check[]') }}
				                <span class="switch-slider">
				                  <span class="switch-slider__on"></span>
				                  <span class="switch-slider__off"></span>
				                </span>
				            </span>
				            <span class="switch-inline__text">Allergie</span>
	          			</label>
					</div>
					<div class="col-md-6">
						<label class="switch-inline">
				            <span class="switch">
					            	{{ Form::checkbox('Varicelle') }}
				                <span class="switch-slider">
				                  <span class="switch-slider__on"></span>
				                  <span class="switch-slider__off"></span>
				                </span>
				            </span>
				            <span class="switch-inline__text">Varicelle</span>
	          			</label>
					</div>
					<div class="col-md-6">
						<label class="switch-inline">
				            <span class="switch">
					            	{{ Form::checkbox('Rubeole') }}
				                <span class="switch-slider">
				                  <span class="switch-slider__on"></span>
				                  <span class="switch-slider__off"></span>
				                </span>
				            </span>
				            <span class="switch-inline__text">Rubeole</span>
	          			</label>
					</div>
					<div class="col-md-6">
						<label class="switch-inline">
				            <span class="switch">
					            	{{ Form::checkbox('Rougeole') }}
				                <span class="switch-slider">
				                  <span class="switch-slider__on"></span>
				                  <span class="switch-slider__off"></span>
				                </span>
				            </span>
				            <span class="switch-inline__text">Rougeole</span>
	          			</label>
					</div>
					<div class="col-md-6">
						<label class="switch-inline">
				            <span class="switch">
					            	{{ Form::checkbox('Oreillons') }}
				                <span class="switch-slider">
				                  <span class="switch-slider__on"></span>
				                  <span class="switch-slider__off"></span>
				                </span>
				            </span>
				            <span class="switch-inline__text">Oreillons</span>
	          			</label>
					</div>
				</div>
				{{ Form::label('Observation :',null, ['class' => '']) }}
				{{ Form::text('Observation', $my_url == 'Edit_user' ? $Admin->Nom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Nom de père']) }}
				{{ Form::label('Nom pediatre:',null, ['class' => '']) }}
				{{ Form::text('Nom_pediatre', $my_url == 'Edit_user' ? $Admin->Nom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Nom de mère']) }}
				{{ Form::label('Téléphone pediatre:',null, ['class' => '']) }}
				{{ Form::text('Tele_pediatre', $my_url == 'Edit_user' ? $Admin->Nom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Tel père']) }}
				{{ Form::label('Adresse pediatre',null, ['class' => '']) }}
				{{ Form::text('Adresse_pediatre', $my_url == 'Edit_user' ? $Admin->Nom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer la Fonctions']) }}
				</div>
				<br>
				<div class="submit">
					<img class="spinner" src="{{ asset('spinners/spinner.gif') }}" />
					<br>
					{!! Form::submit($my_url == 'Editing_classe' ? 'Mettre A Jour' : 'Ajouter',['class'=>'submitter btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
		</div>
            </div>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="my-spacer"></div>
<div class="my-spacer"></div>











{{-- 
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 etud_col">
			<div class="form-group">
				<div class="mybox-text etud"><h2 style="color: white">Etudiant</h2></div>
				<div class="form_cont_etud">
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
						{!! Form::hidden('id',$my_url == 'Edit_user' ? $Admin->id : null) !!}
						{{ Form::label('Nom:',null, ['class' => '']) }}
						{{ Form::text('Nom', $my_url == 'Edit_user' ? $Admin->Nom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Nom']) }}
						{{ Form::label('Prenom:', null, ['class' => '']) }}
						{{ Form::text('Prenom', $my_url == 'Edit_user' ? $Admin->Prenom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Prenom'])}}
						{{ Form::label('Sexe:', null, ['class' => '']) }}
						{{ Form::select('Sexe', array('Masculin' => 'Masculin', 'Feminin' => 'Feminin'), 'Masculin' ) }}<br><br>
						{{ Form::label('Date de Naissance:', null, ['class' => '']) }}
						{{ Form::date('Date_Naiss', $my_url == 'Edit_user' ? $Admin->Date_Naiss : null,['class' => 'flatpickr form-control flatpickr-input active', 'placeholder' =>'Veuillez entrer la Date de Naissance'])}}
						{{ Form::label('Ville:', null, ['class' => '']) }}
						{{ Form::text('Ville', $my_url == 'Edit_user' ? $Admin->Ville : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer la Ville']) }}
						{{ Form::label('Adresse:', null, ['class' => '']) }}
						{{ Form::text('Adresse', $my_url == 'Edit_user' ? $Admin->Adresse : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer la Adresse']) }}
				</div>
			</div>
		</div>
		<div class="my-spacer"></div>
			<div class="my-spacer"></div>
		<div class="col-md-6 etud_col" style="padding: 0px;">
			<div class="mybox-text par"><h2 style="color: white">Parent</h2></div>
			<div class="form_cont_par">	
				{{ Form::label('Nom père :',null, ['class' => '']) }}
				{{ Form::text('Nom_pere', $my_url == 'Edit_user' ? $Admin->Nom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Nom de père']) }}
				{{ Form::label('Nom mère,:',null, ['class' => '']) }}
				{{ Form::text('Nom_mere', $my_url == 'Edit_user' ? $Admin->Nom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Nom de mère']) }}
				{{ Form::label('Tel père:',null, ['class' => '']) }}
				{{ Form::text('Tele_parent', $my_url == 'Edit_user' ? $Admin->Nom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Tel père']) }}
				{{ Form::label('Fonctions',null, ['class' => '']) }}
				{{ Form::text('Function_parent', $my_url == 'Edit_user' ? $Admin->Nom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer la Fonctions']) }}
				{{ Form::label('Email:',null, ['class' => '']) }}
				{{ Form::email('Email_parent', $my_url == 'Edit_user' ? $Admin->Nom : null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer l\'Email']) }}
			</div>
			<br>
			<div class="mybox-text grp"><h2 style="color: white">Groupe</h2></div>
			<div class="form_cont_grp">	
				{{ Form::label('Classe :',null, ['class' => '']) }}
				{{ Form::select('id_classe', $Classes) }}
				{{ Form::label('Groupe :',null, ['class' => '']) }}
				{{ Form::select('id_groupe', $Groupes) }}	
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-lg-12">
			<br>
			{!! Form::submit($my_url == 'Edit_user' ? 'Mettre a Jour' : 'Ajouter',['class'=>'btn btn-primary pull-right']) !!}
			{!! Form::close() !!}
			<div class="my-spacer"></div>
			<div class="my-spacer"></div>
		</div>
	</div>
</div>  --}}

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

.spinner{
 	width: 80px;
    position: absolute;
    margin-left: calc(100% - 80px);
    display: none;
}

</style>



@endsection

@section('myscript')

<script type="text/javascript">
jQuery(document).ready(function($) {


	$('.submitter').click(function() {
		$('.submitter').hide();
		$('.spinner').show();
	});
	$('.select2-hidden-accessible:nth-child(2)').change(function() {
		$('select[name="id_groupe"]').empty();
		$.ajaxSetup({
            headers:{'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')}
        });

        $.ajax({
            type:'POST',
            url: '{{route("get_groupes")}}',
            data:{
              'id_classe': $(this).val()
            },
            success:function(r){
              $.each(r, function(res) {
              		$('select[name="id_groupe"]').append($("<option />").val(r[res].id).text(r[res].Nom));
				});
            },error:function(r) {
              alert('Something went wrong');
            }
        });
	});
});
</script>

@endsection