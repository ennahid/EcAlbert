@extends('Backend.index')

@section('title','Absence/Retard')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-lg-4">
			<h2 class="content-heading">Examens</h2>
			<h5 class="content-description">Ajouter des examens</h5>			
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-md-3">
			{!! Form::open(['route' => 'add_exam' ,'method' => 'post']) !!}
			{{ Form::date('Date_Naiss', null,['class' => 'flatpickr form-control flatpickr-input active', 'placeholder' =>'Veuillez entrer la Date de Naissance'])}}
		</div>
		<div class="col-lg-3 col-md-3">
			{{ Form::select('id_matiere', $matieres) }}
		</div>
		{{-- <div class="col-md-3 col-lg-3">
			{{ Form::text('Nom', null, ['class' => 'form-control', 'placeholder' =>'Veuillez entrer le Nom']) }}
		</div> --}}
		<div class="col-lg-2 col-md-2">
			{!! Form::submit('Ajouter',['class'=>'btn btn-primary pull-left']) !!}
			{!! Form::close() !!}
		</div>
	</div>
	<hr>
</div><!--end container fluid -->


@endsection