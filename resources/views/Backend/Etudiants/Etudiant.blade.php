@extends('Backend.index')
@section('title','Etudiants')
@section('content')


<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-lg-4">
			<h2 class="content-heading">Etudiants</h2>
			<h5 class="content-description">Afficher les Etudiants</h5>			
		</div>

	</div>
	<div class="row">
		<div class="col-lg-3 col-md-3">
			{!! Form::open(['route' => 'Etudiants' ,'method' => 'post']) !!}
			{!! Form::hidden('id',$my_url == 'Editing_classe' ? $class->id : null) !!}
			{{ Form::text('Nom', $my_url == 'Editing_classe' ? $class->Nom : null, ['class' => 'form-control', 'placeholder' =>'Nom']) }}
		</div>
		<div class="col-lg-3 col-md-3">
			{{ Form::select('id_classe',$Classes) }}
		</div>
		<div class="col-lg-3 col-md-3">
			{{ Form::select('id_groupe', $Groupes) }}
		</div>
		<div class="col-lg-2 col-md-2">
			{!! Form::submit('Afficher',['class'=>'btn btn-primary pull-left']) !!}
			{!! Form::close() !!}
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
                     <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 111px;">Payments</th>
                  </tr>
               </thead>
               <tbody>
	               	@foreach($Etudiants as $etd)
	                  <tr role="row" class="odd">
	                     <td>{{$etd->id}}</td>
	                     <td>{{$etd->Nom}}</td>
	                     <td>{{$etd->Prenom}}</td>
	                     <td class="ignore">{{$etd->Date_Naiss}}</td>
	                     <td>{{$etd->groupe_nom}}</td>
	                     <td class="sorting_1"><a href="{{ route('Payment_M') }}/{{$etd->id}}" class="link-info">View</a></td>
	                  </tr>
	                @endforeach
               </tbody>
            </table>
         </div>
      </div>
      <button>print</button>
      <div class="my-spacer"></div>
   </div>
</div>
</div> <!-- container fluid -->

	

@endsection

@section('myscript')

<script type="text/javascript">
jQuery(document).ready(function($) {


	$('select[name="id_classe"]').change(function() {
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
              $.each(r, function(res) {
              		$('select[name="id_groupe"]').append($("<option />").val(r[res].id).text(r[res].Nom));
				});
            },error:function(r) {
              alert('Something went Wrong');
            }
        });
	});

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
		//perPage: 10,
		limitPagination: false,
		insertAfter: $('#etd_table'),
	});

	$('.filter-container').children('input,h3').addClass('form-control');
	$('.filter-container input').css('margin-top','10px');

	//not working properly
	// $('.filter-container input').keyup(function(){

	// 	if($(this).val() != "")
	// 	{
	// 		$('.pagination-container').show();
	// 		$('#datatable tbody').paginathing({
	// 		perPage: 10,
	// 		limitPagination: false,
	// 		insertAfter: $('#etd_table')
	// 		});
	// 	}
	// 	else{
	// 		$('.pagination-container').hide();
	// 	}
	// });

	if($('#datatable tbody tr').length < 10 )
	{
		$('.pagination-container').hide();
	}

	$("button").click(function () {
    $('#datatable').printThis({
    	removeScripts: false,
    	importCSS: false,
    });
	});
});
</script>
@endsection