@extends('Backend.index')

@section('title','Emploi Classes')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3 col-md-3">
			
		<h2 class="content-heading">Emploi {{!isset($grp_nom) ? '' : ': '.$grp_nom[0]}}</h2>
		<h2 class="content-description">Emploi du temps</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-md-3">
			{!! Form::open(['route' => 'Emploi_classes' ,'method' => 'post']) !!}
			{{ Form::select('id_classe',$classes )}}<br><br>
		</div>
		<div class="col-lg-3 col-md-3">
			{{ Form::select('id_groupe', array()) }}<br><br>
		</div>
		<div class="col-md-1 col-lg-1">
			{!! Form::submit('Afficher',['class'=>'btn btn-primary']) !!}
			{!! Form::close() !!}
		</div>
		<div class="col-md-1 col-lg-1">
			<img class="spinner" style="display:none;height: 35px;margin-left: 10px;" src="{{ asset('spinners/spinner.gif') }}" />
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 col-lg-2"></div>
	</div>
	<hr>
</div>

<div class="container-fluid">
	@if(isset($id_groupe))
	{!! Form::hidden('id_groupe',$id_groupe) !!}
	@endif
	<div class="row">
		<div class="col-lg-12 col-md-12 emploi-table">
			@if(isset($emploi))
			<table id="emploi" style="padding: 20px;border:0px solid black">
				<thead>
					<tr>
						<th style="border: 0px;"></th>
						<th><h3>8 - 9</h3></th>
						<th><h3>9 - 10</h3></th>
						<th><h3>10 - 11</h3></th>
						<th><h3>11 - 12</h3></th>
						<th><h3>2 - 3</h3></th>
						<th><h3>3 - 4</h3></th>
						<th><h3>4 - 5</h3></th>
						<th><h3>5 - 6</h3></th>
					</tr>
				</thead>
				<tbody>
					@for ($i = 0; $i < 5; $i++) {{-- Jour --}}
					    <tr>
					    	<td class="day"><h3 style="text-align: center">{{$jours[$i]}}</h3></td>
					    	@for($j=1;$j <= 8;$j++) {{-- time periods --}}
					    		@php ($vr = 0)
					    			@foreach($emploi as $emp) {{-- populateing time periods --}}
					    				@if($emp->Jour == $i+1 && $emp->hour_start == $j)
					    					<td day="{{$i+1}}" time="{{$j}}">
					    						<p><b>Prof: </b>{{$emp->profNom}}</p>
					    						<p><b>Mat: </b>{{$emp->matNom}}</p>
					    						<p><b>Salle: </b>{{$emp->salleNom}}</p>
					    						{{-- <h3>{{$emp->profNom}}</h3> --}}
					    					</td>
					    					@php ($vr = 1)
					    					@break 
 					    				@endif
					    			@endforeach
					    			@if($vr == 0)
 					    				<td day="{{$i+1}}" time="{{$j}}">
					    				</td>
 					    			@endif               
					    	@endfor
					    </tr>
					@endfor
			</tbody>
			</table>
			@endif
		</div>
	</div>
	<div class="my-spacer"></div> 	
</div>



		<div class="row">
			<div class="col-md-2">
				<button style="display: none" type="button" id="update_emp" class="btn btn-info btn-lg btn-block mt-3" data-toggle="modal" data-target="#modal-confirm2">simple modal</button>

			</div>
		</div>

<div id="modal-confirm2" class="modal fade" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="margin-top:18%">
          <div class="modal-header">
            <h5 class="modal-title">Modifer Emploi</h5>
            <button type="button" class="close custom-modal__close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" id="close-model" class="iconfont iconfont-modal-close"></span>
            </button>
          </div>
          <div class="modal-body">
          	@if(isset($profs) && isset($mats) )
          	{!! Form::hidden('hour_start',666) !!}
          	{!! Form::hidden('jour',666) !!}
          	{{ Form::label('Professeurs:', null, ['class' => '']) }}
            {{ Form::select('id_prof',$profs )}}<br><br>
            {{ Form::label('Matieres:', null, ['class' => '']) }}
            {{ Form::select('id_matiere',$mats )}}<br><br>
            {{ Form::label('Salles:', null, ['class' => '']) }}
            {{ Form::select('id_salle',$salles )}}<br><br>
            @endif
          </div>
          <div class="modal-footer">
          	<div class="row" style="width:100%">
          		<div class="col-md-2 col-lg-2">
          			<img class="spinner" style="display:none;height: 40px;margin-left: 10px;" src="{{ asset('spinners/spinner.gif') }}" />
          		</div>
          		<div class="col-md-10 col-lg-10 ">
          			<button class="btn btn-info" id="save-emploi" type="button">Enregistrer</button>
            		<button type="button" id="empty" class="btn btn-outline-info">Vider</button>
          		</div>
          	</div>
          </div>
        </div>
      </div>
    </div>


<style type="text/css">
	td,th{
		border: 1px solid black;
		/*padding: 20px;*/
	}
	table{
		width: 100%;
	}
	td{
		width: 10%;
		height: 100px;
	}
	th h3,td p{
		text-align: center;
	}
	#emploi tbody tr td{
		cursor: pointer;
	}
	#emploi tbody tr td:hover{
		background: #dce2e6;
	}
</style>

@endsection



@section('myscript')

<script type="text/javascript">
jQuery(document).ready(function($) {
	$('select[name="id_classe"]').change(function() {
		$('select[name="id_groupe"]').empty();
		$('.spinner').show();
			$.ajaxSetup({
	            headers:{'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')}
	        });
			$.ajax({
	        type:'POST',
	        url: '{{route("get_groupes_checkboxes")}}',
	        data:{
	          'id_classe': $(this).val()
	        },
	        success:function(r){
	        	$('.get-groupes').empty();
	        	$.each(r, function(res) {
					$('select[name="id_groupe"]').append($("<option />").val(r[res].id).text(r[res].Nom));
				});
				$('.spinner').hide();
	        },error:function(r) {
	          alert('Something went wrong');
	        }
    	});   
	});

	$('#save-emploi').click(function(){
		$(this).attr("disabled", true);
		$('#empty').attr("disabled", true);
		$('.spinner').show();
		$.ajaxSetup({
            headers:{'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')}
        });
		$.ajax({
        type:'POST',
        url: '{{route("update_emp")}}',
        data:{
          'id_groupe': $('input[name="id_groupe"]').val(),
          'hour_start' : $('input[name="hour_start"]').val(),
          'jour' : $('input[name="jour"]').val(),
          'id_salle' : $('select[name="id_salle"]').val(),
          'id_matiere': $('select[name="id_matiere"]').val(),
          'id_prof' : $('select[name="id_prof"]').val(),
        },
        success:function(r){
        	$('#save-emploi').removeAttr("disabled");
        	$('#empty').removeAttr("disabled");
        	$('.spinner').hide();
        	$('#close-model').trigger( "click" );
        	console.log(r[1].Nom);
        	$.each($("#emploi tbody tr td"),function(res)
        	{
        		if($(this).attr('day') == $('input[name="jour"]').val() && $(this).attr('time') ==$('input[name="hour_start"]').val())
        		{
        			$(this).empty();
        			$(this).append("<p><b>Prof: </b>"+r[1].Nom+"</p><p><b>Mat:</b>"+r[0].Nom+"</p><p><b>Salle: </b>"+r[2].Nom+"</p>");
        		}
        	});
        },error:function(r) {
        	$('#save-emploi').removeAttr("disabled");
        	$('.spinner').hide();
          alert('Something went wrong');
        }
    	});  
	});

	$('#empty').click(function(){
		$(this).attr("disabled", true);
		$('#save-emploi').attr("disabled", true);
		$('.spinner').show();
		$.ajaxSetup({
            headers:{'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')}
        });
		$.ajax({
	        type:'POST',
	        url: '{{route("empty_emp")}}',
	        data:{
	          'id_groupe': $('input[name="id_groupe"]').val(),
	          'hour_start' : $('input[name="hour_start"]').val(),
	          'jour' : $('input[name="jour"]').val(),
	          'id_salle' : $('select[name="id_salle"]').val(),
	          'id_matiere': $('select[name="id_matiere"]').val(),
	          'id_prof' : $('select[name="id_prof"]').val(),
	        },
	        success:function(r){
	        	$('.spinner').hide();
	        $('#empty').removeAttr("disabled");
	        $('#save-emploi').removeAttr("disabled");
	        	$('#close-model').trigger( "click" );
	        	$.each($("#emploi tbody tr td"),function(res)
	        	{
	        		if($(this).attr('day') == $('input[name="jour"]').val() && $(this).attr('time') ==$('input[name="hour_start"]').val())
	        		{
	        			$(this).empty();	        		
	        		}
	        	});
	        },error:function(r) {
	        	$('.spinner').hide();
	        $('#empty').removeAttr("disabled");
	          alert('Something went wrong');
	        }
    	});
	});

	$("#emploi tbody tr td:not(.day)").click(function(){
      	$('#update_emp').trigger( "click" );
      	$('input[name="hour_start"]').val($(this).attr('time'));
      	$('input[name="jour"]').val($(this).attr('day'));
     });

	$('.day').css('cursor','initial');
		$('.day').hover(function() {
		  $(this).css('background','initial');
		});

	$("#cancel").click(function(){
      	$('#close-model').trigger( "click" );
     });
});
</script>

@endsection