@extends('Backend.index')
@section('title', 'Ajouter Matiere')

@section('content')


<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-lg-4">
			<h2 class="content-heading">Matières</h2>
			<h5 class="content-description">Ajouter des Matières</h5>			
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-md-4">
			{!! Form::open(['route' => $my_url ,'method' => 'post']) !!}
			{!! Form::hidden('id',$my_url == 'Editing_matiere' ? $Matieres->id : null) !!}
			{{ Form::text('Nom', $my_url == 'Editing_matiere' ? $Matieres->Nom : null, ['class' => 'form-control', 'placeholder' =>'Nom']) }}
		</div>
		<div class="col-lg-2 col-md-2">
			{!! Form::submit($my_url == 'Editing_matiere' ? 'Mettre a Jour' : 'Ajouter',['class'=>'btn btn-primary pull-left']) !!}
		</div>
	</div>
	<hr>
</div>


<hr>

<div class="container-fluid">

	<div class="row">
		<div class="col-md-4 col-lg-4">
			<h2 class="content-heading">Classes</h2>
			<h5 class="content-description">Ajouter Matieres au Classes</h5>			
		</div>
	</div>
	<div class="row">
		@if($my_url == 'Editing_matiere')
			@foreach($Classes as $classe)
			<div class="col-md-4 col-lg-4">
				<label class="switch-inline">
		            <span class="switch">
		            	@if(!$selected->isEmpty())
				            	@if($selected->contains('id_classe',$classe->id))
				              		{{ Form::checkbox('classes_check[]', $classe->id, true) }}
				              	@else
				              		{{ Form::checkbox('classes_check[]', $classe->id) }}
				              	@endif
			            @else
			            	{{ Form::checkbox('classes_check[]', $classe->id) }}
			            @endif
		                <span class="switch-slider">
		                  <span class="switch-slider__on"></span>
		                  <span class="switch-slider__off"></span>
		                </span>
		            </span>
		            <span class="switch-inline__text">{{$classe->Nom}}</span>
	          	</label>
	      	</div>
	        @endforeach
        @else
	        @foreach($Classes as $classe)
				<div class="col-md-4 col-lg-4">
					<label class="switch-inline">
			            <span class="switch">
			              	   {{ Form::checkbox('classes_check[]', $classe->id) }}
			                <span class="switch-slider">
			                  <span class="switch-slider__on"></span>
			                  <span class="switch-slider__off"></span>
			                </span>
			            </span>
			            <span class="switch-inline__text">{{$classe->Nom}}</span>
		          	</label>
		      	</div>
	        @endforeach
	    @endif
	</div>
		{{-- {!! Form::close() !!} --}}
</div>


@endsection



