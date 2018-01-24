@extends('Backend.index')
@section('title','Ajouter Classe')

@section('content')



<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-lg-4">
			<h2 class="content-heading">Groupes</h2>
			<h5 class="content-description">Ajouter des Groupes</h5>			
		</div>

	</div>
	<div class="row">
		<div class="col-lg-3 col-md-3">
			{!! Form::open(['route' => $my_url ,'method' => 'post']) !!}
			{{ Form::text('Nom', $my_url == 'Editing_classe' ? $class->Nom : null, ['class' => 'form-control', 'placeholder' =>'Nom']) }}
		</div>
		<div class="col-lg-7 col-md-7">
			{{ Form::select('id_classe', $Classes) }}
		</div>
		<div class="col-lg-2 col-md-2">
			{!! Form::submit($my_url == 'Editing_classe' ? 'Mettre A Jour' : 'Ajouter',['class'=>'btn btn-primary pull-left']) !!}
			{!! Form::close() !!}
		</div>
	</div>
	<hr>
</div><!--end container fluid -->
	

<div class="container-fluid">

	<div class="row">
		<div class="col-md-4 col-lg-4">
			<h2 class="content-heading">Afficher les Groupes</h2>
			<h5 class="content-description">Groupe par Classe</h5>			
		</div>
	</div>
	<div class="row">
		{{-- <div class="col-lg-0 col-md-0">
			{!! Form::open(['route' => $my_url ,'method' => 'post']) !!}
			{{ Form::text('Nom', $my_url == 'Editing_classe' ? $class->Nom : null, ['class' => 'form-control', 'placeholder' =>'Nom']) }}
		</div> --}}
		<div class="col-lg-7 col-md-7">
			{!! Form::open(['route' => 'Add_groupe' ,'method' => 'post']) !!}
			{{ Form::select('id_classe_get', $Classes) }}
		</div>
		<div class="col-lg-2 col-md-2">
			{!! Form::submit('Afficher',['class'=>'btn btn-primary pull-left']) !!}
			{!! Form::close() !!}
		</div>
	</div>
	<br>
	<hr>
</div>
	{{-- <div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="main-container table-container">
		        <table class="table">
		          <thead>
		          <tr>
		            <th>Nom</th>
		            <th>Niveau</th>
		            <th>Created at</th>
		            <th>N° Etudiants</th>
		            <th>Act</th>
		          </tr>
		          </thead>
		          <tbody>
		          	@foreach($Groupes as $grp)
		            <tr>
		              <td><strong>{{$grp->Nom}}</strong></td>
		              <td>test</td>
		              <td><strong>{{$grp->created_at}}</strong></td>
		              <td>25</td>
		              <td class="table__cell-actions">
		                <div class="table__cell-actions-wrap">
		                  <a href="#0" id="remove_user" data-id="" class="table__cell-actions-item table__cell-actions-icon">
		                    <span class="iconfont iconfont-remove"></span>
		                  </a>
		                  <a href="{{route('Edit_classe')}}/{{$grp->id}}" id="remove_user" data-id="" class="table__cell-actions-item table__cell-actions-icon">
		                    <span class="iconfont iconfont-export"></span>
		                  </a>
		                </div>
		              </td>
		            </tr>
		            @endforeach
		          </tbody>
		        </table>
		      </div>
		</div> --}}


<div class="container-fluid">
	
	<div class="m-datatable __web-inspector-hide-shortcut__">
   <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
      <div class="row">
         <div class="col-sm-12" id="etd_table">
            <table id="datatable" class="table table-striped dataTable no-footer" role="grid" aria-describedby="datatable_info">
               <thead>
                  <tr role="row">
                  	 <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 177px;">Nom</th>
                     <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 177px;">Nom</th>
                     <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 279px;">Prenom</th>
                     <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 132px;">N° Etudiants</th>
                     <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 111px;">Groupe</th>
                  </tr>
               </thead>
               <tbody>
		          	@foreach($Groupes as $grp)
		            <tr>
		              <td class="clickable-row" data-href="www.google.com"><strong>{{$grp->Nom}}</strong></td>
		              <td>test</td>
		              <td><strong>{{$grp->created_at}}</strong></td>
		              <td>{{$grp->count}}</td>
		              <td class="table__cell-actions">
		                <div class="table__cell-actions-wrap">
		                  <a href="#0" id="remove_user" data-id="" class="table__cell-actions-item table__cell-actions-icon">
		                    <span class="iconfont iconfont-remove"></span>
		                  </a>
		                  <a href="{{route('Groupe_show')}}/{{$grp->id}}" id="show_stud" data-id="" class="table__cell-actions-item table__cell-actions-icon">
		                    <span class="iconfont iconfont-export"></span>
		                  </a>
		                </div>
		              </td>
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
			// perPage: 10;
			limitPagination: false,
			insertAfter: $('#etd_table'),
		});

		$('.filter-container').children('input,h3').addClass('form-control');
		$('.filter-container input').css('margin-top','10px');

		$("#datatable tbody tr").css('cursor','pointer');
		$("#datatable tbody tr").click(function(){
		   window.location = $(this).children('.table__cell-actions').find('#show_stud').attr('href');
		 });
	});
</script>

@endsection