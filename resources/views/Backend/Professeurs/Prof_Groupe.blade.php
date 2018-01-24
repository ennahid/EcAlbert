@extends('Backend.index')
@section('title','Matieres')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-lg-4">
			<h2 class="content-heading">Professeur</h2>
			<h5 class="content-description">{{$Professeur[0]->Nom}} {{$Professeur[0]->Prenom}}</h5>			
		</div>
	</div>
<hr>
	<div class="row">
		<div class="col-lg-0 col-md-0">
			{{-- {!! Form::open(['route' => 'Enseignement_affect' ,'method' => 'post']) !!} --}}
			{!! Form::open(['route' => array('Enseignement_affect', $id_prof),'method' => 'post']) !!}
			{!! Form::hidden('id_prof',$id_prof) !!}
		</div>
		<div class="col-lg-2 col-md-2">
		</div>
	</div>
</div>


<div class="container-fluid">

	<div class="row">
		<div class="col-md-4 col-lg-4">
			<h2 class="content-heading">Classes</h2>
			<h5 class="content-description">Afficher les Classes</h5>			
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-lg-4">
			{{ Form::select('id_classe', $Classes) }}

		</div>
		<div class="col-md-2 col-lg-2">
			{!! Form::submit('Afficher',['class'=>'btn btn-primary submit']) !!}
		</div>
	</div>
	<br><br>
	<div class="row">
		<div class="col-md-4 col-lg-4">
			<h2 class="content-heading">Groupes</h2>
			<h5 class="content-description">Affecter Groupes au Professeur</h5>			
		</div>
	</div>
	<div class="row">
		@foreach($groupes as $grp)
			<div class="col-md-4 col-lg-4">
				<label class="switch-inline">
		            <span class="switch">
		            	@if(!$selected->isEmpty())
				            	@if($selected->contains('id_groupe',$grp->id))
				              		{{ Form::checkbox('groupes_check[]', $grp->id, true) }}
				              	@else
				              		{{ Form::checkbox('groupes_check[]', $grp->id) }}
				              	@endif
			            @else
			            	{{ Form::checkbox('groupes_check[]', $grp->id) }}
			            @endif
		                <span class="switch-slider">
		                  <span class="switch-slider__on"></span>
		                  <span class="switch-slider__off"></span>
		                </span>
		            </span>
		            <span class="switch-inline__text">{{$grp->Nom}}</span>
	          	</label>
	      	</div>
	        @endforeach
	</div>
	<hr>
	<br>
</div>


<div class="row">
	<div class="col-md-10 col-lg-10">
		{!! Form::submit('Affecter',['id'=>'affect','class'=>'btn btn-primary pull-right submit']) !!}
		{!! Form::close() !!}
	</div>
</div>


@endsection


@section('myscript')

<script src="{{URL::asset('js/growl-notification/growl-notification.js')}}"></script>
<script src="{{URL::asset('js/preview/growl-notifications.min.js')}}"></script>

<script type="text/javascript">
jQuery(document).ready(function($) {

	$('#affect').click(function(e) {
		e.preventDefault();
		$.ajaxSetup({
            headers:{'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')}
        });
        var idprof = '';
        var checkboxes = [];

        $.each($('input[name="groupes_check[]"]'),function(res)
        {
        	if($(this).is(':checked'))
        	checkboxes.push($(this).val());
        });

        $.ajax({
            type:'POST',
            url: '{{route("sign_professeur")}}',
            data:{
              'id_prof': $('input[name="id_prof"]').val(),
              'groupes_check' : checkboxes
            },
            success:function(r){
              (new GrowlNotification({
				  title: 'Well Done!',
				  description: 'Matiere Affecter avec succes.',
				  type: 'success',
				  position: 'top-right',
				  closeTimeout: 800
				})).show();
              $('.growl-notification').css('top','60px');
            },error:function(r) {
              alert('Something went wrong');
            }
        });   
	});
});
</script>


@endsection