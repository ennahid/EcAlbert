@extends('Backend.index')
@section('title','Matieres')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3 col-md-3">
			<h2 class="content-heading">Matières</h2>
			<h5 class="content-description">Liste des Matières</h5>
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
               </thead>
                <tbody>
            @foreach($Matieres as $mat)
            <tr>
              <td><strong>{{$mat->Nom}}</strong></td>
              <td><strong>{{$mat->created_at}}</strong></td>
              <td class="table__cell-actions">
                <div class="table__cell-actions-wrap">
                  <a href="#0" id="remove_user" data-id="{{$mat->id}}" class="table__cell-actions-item table__cell-actions-icon">
                    <span class="iconfont iconfont-remove"></span>
                  </a>
                  <a href="{{route('Edit_matiere')}}/{{$mat->id}}" id="show_matiere" data-id="{{$mat->id}}" class="table__cell-actions-item table__cell-actions-icon">
                    <span class="iconfont iconfont-export"></span>
                  </a>
                </div>
              </td>
            <td>helllo</td>
            </tr>
            @endforeach
          </tbody>
          </tbody>
            </table>
         </div>
      </div>
      <div class="my-spacer"></div>
   </div>
</div>
</div>


@endsection


@section('myscript')


<script type="text/javascript">
  jQuery(document).ready(function($) {

    $('#datatable tbody').paginathing({
      // perPage: 10;
      limitPagination: false,
      insertAfter: $('#etd_table'),
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

    $('.filter-container').children('input,h3').addClass('form-control');
    $('.filter-container input').css('margin-top','10px');
    
    $("#datatable tbody tr").css('cursor','pointer');
    $("#datatable tbody tr").click(function(){
       window.location = $(this).children('.table__cell-actions').find('#show_matiere').attr('href');
     });

  });
</script>

@endsection