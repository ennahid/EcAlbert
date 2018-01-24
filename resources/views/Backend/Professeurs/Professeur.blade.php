@extends('Backend.index')
@section('title','Professeurs')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-lg-4">
			<h2 class="content-heading">Professeurs</h2>
			<h5 class="content-description">Afficher les Professeurs</h5>			
		</div>

	</div>
	<div class="row">
		<div class="col-lg-3 col-md-3">
			{!! Form::open(['route' => 'Professeurs' ,'method' => 'post']) !!}
			{!! Form::hidden('id',null) !!}
			{{ Form::text('Nom', null, ['class' => 'form-control', 'placeholder' =>'Recherche par Nom/Matiere']) }}
		</div>
		<div class="col-lg-7 col-md-7">
			{{ Form::text('Description', null, ['class' => 'form-control', 'placeholder' =>'Liste des Matiers/textbox']) }}
		</div>
		<div class="col-lg-2 col-md-2">
			{!! Form::submit('Afficher',['class'=>'btn btn-primary pull-left']) !!}
		</div>
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
                     <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 111px;">Groupe</th>
                  </tr>
               </thead>
               <tbody>
	               	@foreach($Professeurs as $Prof)
	                  <tr role="row" class="odd">
	                     <td>{{$Prof->id}}</td>
	                     <td>{{$Prof->Nom}}</td>
	                     <td>{{$Prof->Prenom}}</td>
	                     <td class="ignore">{{$Prof->Cin}}</td>
	                     <td>{{$Prof->Tele}}</td>
	                  </tr>
	                @endforeach
               </tbody>
            </table>
         </div>
      </div>
      <div class="my-spacer"></div>
   </div>
</div>
</div> <!-- container fluid -->


@endsection


@section('myscript')

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('#datatable').filterTable({
			minRows: 1,
			containerClass: 'filter-container',
			placeholder: 'Filtrage de la Table',
			containerTag: 'h3',
			label: 'Recherche:',
			ignoreClass: 'ignore',
			callback: function(term, table){
				if(term == '')
				{
					$('.pagination-container').remove();
					$('#datatable tbody').paginathing({
					perPage: 10,
					limitPagination: false,
					insertAfter: $('#etd_table')
					});
				}
			}
		});

		$('#datatable tbody').paginathing({
			// perPage: 10,
			limitPagination: false,
			insertAfter: $('#etd_table'),
		});

		$('.filter-container').children('input,h3').addClass('form-control');
		$('.filter-container input').css('margin-top','10px');

	});
</script>

@endsection