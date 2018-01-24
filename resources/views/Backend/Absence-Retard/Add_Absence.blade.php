@extends('Backend.index')

@section('title','Absence/Retard')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-5 col-md-5">
			
		<h2 class="content-heading">Absence/Retard {{!isset($grp_nom) ? '' : ': '.$grp_nom[0]}}</h2>
		<h2 class="content-description">List des Absence et Retard</h2>
		</div>
	</div>
</div>
	{!! Form::open(['route' => $my_url == "Etudiants" ? 'adding_std_ab' : 'adding_prof_ab' ,'method' => 'post','class'=>'etud_form']) !!}
	{!! Form::hidden('id_etudiant',isset($id_etudiant) ? $id_etudiant : null) !!}
	{!! Form::hidden('id_prof',isset($id_prof) ? $id_prof : null) !!}
<div class="container-fluid">

	<div class="row">
		{{-- <h2 class="content-description">Choose Reason</h2> --}}
	</div>
	<div class="row">
		<div class="col-md-6 col-lg-6 col-sm-6">
			<label class="switch-inline">
	            <span class="switch">
		            {{ Form::radio('method', 'retard',true) }}
	                <span class="switch-slider">
						<span class="switch-slider__on"></span>
						<span class="switch-slider__off"></span>
	                </span>
	            </span>
	            <span class="switch-inline__text">Retard</span>
	        </label>
		</div>
		<div class="col-md-6 col-lg-6 col-sm-6 ">
			<label class="switch-inline">
		            <span class="switch">
			            {{ Form::radio('method', 'absence') }}
		                <span class="switch-slider">
							<span class="switch-slider__on"></span>
							<span class="switch-slider__off"></span>
		                </span>
		            </span>
		            <span class="switch-inline__text">Absence</span>
	          </label>
		</div>
	</div>
</div>


<div class="container-fluid box_retard">
	<div class="pay-mth-all" style="padding: 50px;">
		<div class="row retard">
			<div class="col-md-12 col-lg-12">
				<h3 class="content-heading">Retard</h3>
			<br>
			</div>
			<div class="col-md-4 col-lg-4">
				{{ Form::label('De:',null, ['class' => '']) }}
				{{ Form::date('Begin','8:00', ['class' => 'flatpickr form-control flatpickr-input active', 'placeholder' =>'8:00','data-enable-time'=>'true','data-no-calendar'=>'true'])}}
				
			</div>
			<div class="col-md-4 col-lg-4">
				{{ Form::label('A:',null, ['class' => '']) }}
				{{ Form::date('End','8:15', ['class' => 'flatpickr form-control flatpickr-input active', 'placeholder' =>'8:15','data-allow-input'=>'true','data-enable-time'=>'true','data-no-calendar'=>'true'])}}
			</div>
			<div class="col-md-4 col-lg-4">
			</div>

			<div class="col-md-4 col-lg-4">
				<label class="switch-inline">
		            <span class="switch">
			            {{ Form::checkbox('justifiee_r', 'justifiee',false) }}
		                <span class="switch-slider">
							<span class="switch-slider__on"></span>
							<span class="switch-slider__off"></span>
		                </span>
		            </span>
		            <span class="switch-inline__text">Justifée</span>
		        </label>
			</div>
			<div class="col-lg-12 col-md-12">
				{{ Form::textarea('justification_r', null, ['style' =>'display: none','size' => '140x5','class' => 'justif_r form-control','placeholder'=>'Donner Justification']) }}
			</div>
		</div>
	</div>
</div>




<div class="container-fluid box_absence" style="display:none">
	<div class="pay-mth-all" style="padding: 50px;">
		<div class="row retard">
			<div class="col-md-12 col-lg-12">
				<h3 class="content-heading">Absence</h3>
			<br>
			</div>
			<div class="col-md-4 col-lg-4">
				<label class="switch-inline">
		            <span class="switch">
			            {{ Form::checkbox('justifiee_a', 'justifiee',false) }}
		                <span class="switch-slider">
							<span class="switch-slider__on"></span>
							<span class="switch-slider__off"></span>
		                </span>
		            </span>
		            <span class="switch-inline__text">Justifée</span>
		        </label>
			</div>
			<div class="col-lg-12 col-md-12">
				{{ Form::textarea('justification_a', null, ['style' =>'display: none','size' => '140x5','class' => 'justif_a form-control','placeholder'=>'Donner Justification']) }}
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-lg-8">
			
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-lg-12">
			{!! Form::submit('Save',['class'=>'btn btn-primary pull-right']) !!}
			{!! Form::close() !!}			
		</div>
	</div>
</div>

<div class="my-spacer"></div>
{{-- <div class="my-spacer"></div> --}}
{{-- <div class="my-spacer"></div> --}}




<style type="text/css">
.form-control{
	margin-bottom: 20px;
}
.pay-mth-all{
	background: #ffffff;
	border-radius: 5px;
}
.date_pay{
	width: 297px;
}
</style>
@endsection


@section('myscript')

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('input[name="method"]').change(function () {
			switch ($(this).val()){ 
				case 'retard': 
					$('.box_absence').hide();
					$('.box_retard').show();
					break;
				case 'absence':
					$('.box_absence').show();
					$('.box_retard').hide(); 
					break;
			}
		});

		$('input[name="justifiee_a"]').change(function(event) {
			if ( $(this).prop( "checked" ) )
			{
				$('.justif_a').fadeIn("slow");
			}
			else{
				$('.justif_a').fadeOut("slow");
			}
		});
		$('input[name="justifiee_r"]').change(function(event) {
			if ( $(this).prop( "checked" ) )
			{
				$('.justif_r').fadeIn("slow");
			}
			else{
				$('.justif_r').fadeOut("slow");
			}
		});

	});
</script>

@endsection


