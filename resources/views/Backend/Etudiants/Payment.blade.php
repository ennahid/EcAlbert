@extends('Backend.index')

@section('title','Payment')

@section('content')

<div class="container-fluid">
	<div class="row">
		<h2 class="content-heading">Payment</h2>
	</div>
	<hr>
</div>
	{!! Form::open(['route' => $my_url == 'comp' ? 'Payment_comp':'Payment_pending' ,'method' => 'post','files'=> true,'class'=>'etud_form']) !!}
<div class="container-fluid">

	<div class="row">
		<h2 class="content-description">Choose Method Payment</h2>
	</div>
	<div class="row">
		<div class="col-md-4 col-lg-4 col-sm-4">
			<label class="switch-inline">
		            <span class="switch">
			            {{ Form::radio('method', 'espece',true) }}
		                <span class="switch-slider">
							<span class="switch-slider__on"></span>
							<span class="switch-slider__off"></span>
		                </span>
		            </span>
		            <span class="switch-inline__text">Espèce</span>
	          </label>
		</div>
		<div class="col-md-4 col-lg-4 col-sm-4 ">
			<label class="switch-inline">
		            <span class="switch">
			            {{ Form::radio('method', 'cheque') }}
		                <span class="switch-slider">
							<span class="switch-slider__on"></span>
							<span class="switch-slider__off"></span>
		                </span>
		            </span>
		            <span class="switch-inline__text">Chèque</span>
	          </label>
		</div>
		<div class="col-md-4 col-lg-4 col-sm-4">
			<label class="switch-inline">
		            <span class="switch">
			            {{ Form::radio('method', 'virement') }}
		                <span class="switch-slider">
							<span class="switch-slider__on"></span>
							<span class="switch-slider__off"></span>
		                </span>
		            </span>
		            <span class="switch-inline__text">Virement</span>
	          </label>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="pay-mth-all" style="padding: 50px;">
		<div class="row pay-mth-1">
			<div class="col-md-12 col-lg-12">
				<h3 class="content-heading">Espèce</h3>
			<br>
			</div>
			@if(isset($frais))
			<div class="col-lg-12 col-md-12 montant">
				<h3>Reste à Payer : {{$frais[0]->reste}} dh </h3>
				{!! Form::hidden('reste',$frais[0]->reste) !!}
			</div>
			@endif
			@if(isset($frais_classe))
			<div class="col-lg-12 col-md-12 montant">
				<h3>Montant à Payer : {{$frais_classe[0]->Frais}}dh </h3>
				{!! Form::hidden('prix',$frais_classe[0]->Frais) !!} {{-- prix --}}
			</div>
			@endif
			<div class="col-lg-3 col-md-3">
				{{ Form::text('month',$month, ['class' => 'form-control','readonly' ,'placeholder' =>'']) }}
			</div>
			<div class="col-lg-3 col-md-3">
				{{ Form::number('year',$my_url == 'adding' ? null : $year, ['required','class' => 'form-control','id'=>'datepicker' ,'placeholder' =>'Year']) }}
			</div>
			<div class="col-md-12 col-lg-12">
				 {!! Form::hidden('id_pay',$my_url == 'adding' ? null : $id_paym) !!} {{-- id payment --}}
				{!! Form::hidden('id',$id_etud) !!} {{-- id student--}}
				{!! Form::hidden('date_pay',$my_url == 'adding' ? $month_topay : null) !!}
				{{-- {{ Form::label('Date:', null, ['class' => '']) }}
				{{ Form::date('Date_Payment',null,['class' => 'flatpickr form-control flatpickr-input active date_pay', 'placeholder' =>'Entrer la Date'])}}
				<br> --}}
				<label class="switch-inline">
			            <span class="switch">
				            {{ Form::radio('payed', 'payed') }}
			                <span class="switch-slider">
								<span class="switch-slider__on"></span>
								<span class="switch-slider__off"></span>
			                </span>
			            </span>
			            <span class="switch-inline__text">Payé</span>
		          </label>
			</div>
			<div class="col-md-3 col-lg-3">
				<label class="switch-inline">
			            <span class="switch">
				            {{ Form::radio('payed', 'left') }}
			                <span class="switch-slider">
								<span class="switch-slider__on"></span>
								<span class="switch-slider__off"></span>
			                </span>
			            </span>
			            <span class="switch-inline__text">Avance</span>
		        </label>
				{{ Form::text('Avance',null, ['autocomplete'=>'off','class' => 'form-control','id' =>'left' ,'placeholder' =>'']) }}
			</div>
			<div class="col-md-3 col-lg-3">
				<br><br><br>
				<h3 id="reste"></h3>
			</div>
		</div>


{{-- 
<div class="container-fluid">
	<div class="row">
		{!! Form::open(['route' => 'Payment_pending' ,'method' => 'post','files'=> true,'class'=>'etud_form']) !!}
		{{ Form::label('Payed:',null, ['class' => '']) }}
		{{ Form::text('Payed',null, ['class' => 'form-control', 'placeholder' =>'payed']) }}
		{{ Form::label('Reste:',null, ['class' => '']) }}
		{{ Form::text('Reste',null, ['class' => 'form-control', 'placeholder' =>'Reste']) }}
		{{ Form::label('Date:', null, ['class' => '']) }}
		{{ Form::date('Date_Payment',null,['class' => 'flatpickr form-control flatpickr-input active', 'placeholder' =>'Veuillez entrer la Date de Naissance'])}}
		<br>
		{!! Form::submit('payé',['class'=>'submitter btn btn-primary pull-right']) !!}
		{!! Form::close() !!}
	</div>
</div>
 --}}

		{{-- second part cheque --}}


		<div class="row pay-mth-2">
			<div class="col-md-12 col-lg-12">
				<h3 class="content-heading">Chéque</h3>
			<br>
			</div>
			<div class="col-md-4 col-lg-4">
				{{ Form::label('Nom:',null, ['class' => '']) }}
				{{ Form::text('Nom',null, ['class' => 'form-control', 'placeholder' =>'Nom']) }}
			</div>
			<div class="col-md-4 col-lg-4">
				{{ Form::label('Prenom:',null, ['class' => '']) }}
				{{ Form::text('Prenom',null, ['class' => 'form-control', 'placeholder' =>'Prenom']) }}

			</div>
			<div class="col-md-4 col-lg-4">
				{{ Form::label('Date Echéance :',null, ['class' => '']) }}
				{{ Form::date('Date_Naiss',null, ['class' => 'flatpickr form-control flatpickr-input active', 'placeholder' =>'Date de échéance'])}}

			</div>
			<div class="col-lg-12 col-md-12">
				{{ Form::label('Numero chèque:',null, ['class' => '']) }}
				{{ Form::text('Nom',null, ['class' => 'form-control', 'placeholder' =>'Numero chèque']) }}
			</div>
			<div class="col-lg-10 col-md-10">
				{{ Form::file('thefile', ['class' => '']) }}

			</div>
		</div>
		<div class="row pay-mth-3">
			<div class="col-md-12 col-lg-12">
				<h3 class="content-heading">Virement</h3>
			<br>
			</div>
			<div class="col-md-4 col-lg-4">
				{{ Form::label('Nom:',null, ['class' => '']) }}
				{{ Form::text('Nom',null, ['class' => 'form-control', 'placeholder' =>'Nom']) }}
			</div>
			<div class="col-md-4 col-lg-4">
				{{ Form::label('Prenom:',null, ['class' => '']) }}
				{{ Form::text('Prenom',null, ['class' => 'form-control', 'placeholder' =>'Prenom']) }}

			</div>
			<div class="col-md-4 col-lg-4">
				{{ Form::label('Date Virement :',null, ['class' => '']) }}
				{{ Form::date('Date_Naiss',null, ['class' => 'flatpickr form-control flatpickr-input active', 'placeholder' =>'Date Virement'])}}

			</div>
			<div class="col-md-12 col-lg-12">
				{{ Form::label('Numero Virement:',null, ['class' => '']) }}
				{{ Form::text('Nom',null, ['class' => 'form-control', 'placeholder' =>'Numero chèque']) }}

			</div>
			<div class="col-lg-10 col-md-10">
				{{ Form::file('thefile', ['class' => '']) }}

			</div>
		</div>
		{!! Form::submit('Payer',['class'=>'submitter btn btn-primary pull-right']) !!}
			{!! Form::close() !!}	
	</div>

</div>

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
		 
		$('.pay-mth-3,.pay-mth-2').hide();
		$('input[name="method"]').change(function () {
			switch ($(this).val()){ 
				case 'cheque': 
					$('.pay-mth-1,.pay-mth-3').hide();
					$('.pay-mth-2').show();
					break;
				case 'virement': 
					$('.pay-mth-1,.pay-mth-2').hide();
					$('.pay-mth-3').show();
					break;
				case 'espece': 
					$('.pay-mth-3,.pay-mth-2').hide();
					$('.pay-mth-1').show();
					break;
			}
		});
		$('#left').hide();
		$('#reste').hide();

		$('input[name="payed"]').change(function() {
			if($(this).val() == 'left')
			{
				$('#left').show();
				//$('#reste').show();

			}
			else{
				$('#left').hide();
				$('#reste').hide();
			}
		});

		$('input[name="Avance"]').keyup(function(){

			var montant;
			if($('.montant input').attr('name') != 'reste')
			{
				montant = $('input[name="prix"]').val();
			}else{
				montant = $('input[name="reste"]').val();
			}
			var reste = (montant - $(this).val());
			$('#reste').empty();
			$('#reste').show();
			$('#reste').append('Reste: '+reste+' dh');
		})

	});
</script>

@endsection