@extends('Backend.index')

@section('title','Emploi Classes')

@section('content')

@if($my_url == 'Etudiants')

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3 col-md-3">
			
		<h2 class="content-heading">Liste Etudaints</h2>
		<h2 class="content-description">Afficher A/R d'etudiants</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-md-3">
			{!! Form::open(['route' => 'Absence_get_students' ,'method' => 'post']) !!}
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
	
	<div class="m-datatable __web-inspector-hide-shortcut__">
   <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
      <div class="row">
         <div class="col-sm-12" id="etd_table">
            <table id="datatable" class="table table-striped dataTable no-footer" role="grid" aria-describedby="datatable_info">
               <thead>
                  <tr role="row">
                  	 <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 177px;">Matricule</th>
                     <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 177px;">Nom</th>
                     <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 279px;">Prenom</th>
                     <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 132px;">Date Naiss</th>
                     <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 111px;">Absence/R</th>
                  </tr>
               </thead>
               <tbody>
               		@if(isset($Etudiants))
		               	@foreach($Etudiants as $etd)
		                  <tr role="row" class="odd" my-link="{{ route('get_student_absence') }}/{{$etd->id}}">
							<td>{{$etd->id}}</td>
							<td>{{$etd->Nom}}</td>
							<td>{{$etd->Prenom}}</td>
							<td class="ignore">{{$etd->Date_Naiss}}</td>
							<td>{{$etd->groupe_nom}}</td>
							<td><a class="form-control btn btn-primary" href="{{ route('add_student_absence') }}/{{$etd->id}}">Ajouter</a></td>
		                  </tr>
		                @endforeach
	                @endif
               </tbody>
            </table>
         </div>
      </div>
      <div class="my-spacer"></div>
   </div>
</div>
</div> <!-- container fluid -->


@elseif($my_url == 'Professeurs')

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3 col-md-3">
			
		<h2 class="content-heading">Liste Professeurs</h2>
		<h2 class="content-description">Afficher A/R des Professeurs</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-md-3">
			{!! Form::open(['route' => 'Absence_get_profs' ,'method' => 'post']) !!}
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
	
	<div class="m-datatable __web-inspector-hide-shortcut__">
   <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
      <div class="row">
         <div class="col-sm-12" id="etd_table">
            <table id="datatable" class="table table-striped dataTable no-footer" role="grid" aria-describedby="datatable_info">
               <thead>
                  <tr role="row">
                     <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 177px;">Nom</th>
                     <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 279px;">Prenom</th>
                     <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 132px;">Ville</th>
                     <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 111px;">Tele</th>
                     <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 111px;">Absence/R</th>
                  </tr>
               </thead>
               <tbody>
               		@if(isset($Professeurs))
		               	@foreach($Professeurs as $prof)
		                  <tr role="row" class="odd" my-link="{{ route('get_prof_absence') }}/{{$prof->id}}">
							<td>{{$prof->Nom}}</td>
							<td>{{$prof->Prenom}}</td>
							<td class="ignore">{{$prof->Ville}}</td>
							<td>{{$prof->Tele}}</td>
							<td><a class="form-control btn btn-primary" href="{{ route('add_prof_absence') }}/{{$prof->id}}">Ajouter</a></td>
		                  </tr>
		                @endforeach
	                @endif
               </tbody>
            </table>
         </div>
      </div>
      <div class="my-spacer"></div>
   </div>
</div>
</div> <!-- container fluid -->

@endif

@endsection


@section('myscript')
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('select[name="id_classe"]').change(function() {
			$('.spinner').show();
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
	            	$('.spinner').hide();
	              $.each(r, function(res) {
	              		$('select[name="id_groupe"]').append($("<option />").val(r[res].id).text(r[res].Nom));
				   });
	            },error:function(r) {
	            	$('.spinner').hide();
	              alert('Something went wrong');
	            }
	        });
		});

		$('#datatable tbody').paginathing({
			//perPage: 10,
			limitPagination: false,
			insertAfter: $('#etd_table'),
		});

		$("#datatable tbody tr").css('cursor','pointer');
    	$("#datatable tbody tr").click(function(){
       		window.location = $(this).attr('my-link');
     	});
	});
</script>

@endsection
