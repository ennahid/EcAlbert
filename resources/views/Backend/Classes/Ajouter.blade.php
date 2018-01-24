@extends('Backend.index')
@section('title','Ajouter Classe')

@section('content')



<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-lg-4">
			<h2 class="content-heading">Classes</h2>
			<h5 class="content-description">Ajouter des Classe</h5>			
		</div>

	</div>
	<div class="row">
		<div class="col-lg-3 col-md-3">
			{!! Form::open(['route' => $my_url ,'method' => 'post']) !!}
			{!! Form::hidden('id',$my_url == 'Editing_classe' ? $class->id : null) !!}
			{{ Form::text('Nom', $my_url == 'Editing_classe' ? $class->Nom : null, ['class' => 'form-control', 'placeholder' =>'Nom']) }}
		</div>
		<div class="col-lg-5 col-md-5">
			{{ Form::text('Description', $my_url == 'Editing_classe' ? $class->Description : null, ['class' => 'form-control', 'placeholder' =>'Description']) }}
		</div>
		<div class="col-lg-2 col-md-2">
			{{ Form::number('Frais', $my_url == 'Editing_classe' ? $class->Frais : null, ['class' => 'form-control', 'placeholder' =>'Frais']) }}
		</div>
		<div class="col-lg-1 col-md-1">
			{!! Form::submit($my_url == 'Editing_classe' ? 'Mettre A Jour' : 'Ajouter',['class'=>'btn btn-primary pull-left']) !!}
		</div>
	</div>
</div>
	

<div class="container-fluid">

	<div class="row">
		<div class="col-md-4 col-lg-4">
			<h2 class="content-heading">Matières</h2>
			<h5 class="content-description">Ajouter Matieres au Classes</h5>			
		</div>
	</div>
	<div class="row">
		@if($my_url == 'Editing_classe')
			@foreach($Matieres as $mat)
			<div class="col-md-4 col-lg-4">
				<label class="switch-inline">
		            <span class="switch">
		            	@if(!$selected->isEmpty())
				            	@if($selected->contains('id_matiere',$mat->id))
				              		{{ Form::checkbox('matieres_check[]', $mat->id, true) }}
				              	@else
				              		{{ Form::checkbox('matieres_check[]', $mat->id) }}
				              	@endif
			            @else
			            	{{ Form::checkbox('matieres_check[]', $mat->id) }}
			            @endif
		                <span class="switch-slider">
		                  <span class="switch-slider__on"></span>
		                  <span class="switch-slider__off"></span>
		                </span>
		            </span>
		            <span class="switch-inline__text">{{$mat->Nom}}</span>
	          	</label>
	      	</div>
	        @endforeach
        @else
	        @foreach($Matieres as $mat)
				<div class="col-md-4 col-lg-4">
					<label class="switch-inline">
			            <span class="switch">
			              	   {{ Form::checkbox('matieres_check[]', $mat->id) }}
			                <span class="switch-slider">
			                  <span class="switch-slider__on"></span>
			                  <span class="switch-slider__off"></span>
			                </span>
			            </span>
			            <span class="switch-inline__text">{{$mat->Nom}}</span>
		          	</label>
		      	</div>
	        @endforeach
	    @endif
	</div>
		{!! Form::close() !!}
</div>


@endsection