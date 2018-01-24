@extends('Backend.index')

@section('title','Absence/Retard')

@section('content')


<div class="container-fluid">
	
	<div class="m-datatable __web-inspector-hide-shortcut__">
   <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
      <div class="row">
         <div class="col-sm-12" id="etd_table">
            <table id="datatable" class="table table-striped dataTable no-footer" role="grid" aria-describedby="datatable_info">
               <thead>
                  <tr role="row">
                  	 <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 100px;">Matricule</th>
                     <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 100px;">Nom</th>
                     <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 130px;">Prenom</th>
                     <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 120px;">Date Naiss</th>
                     {{-- <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 111px;">Absence/R</th> --}}
                  </tr>
               </thead>
               <tbody>
               		@if(isset($Professeurs))
		               	@foreach($Professeurs as $prof)
		                  <tr role="row" class="odd" my-link="{{ route('add_exam') }}/{{$prof->id}}">
							<td>{{$prof->id}}</td>
							<td>{{$prof->Nom}}</td>
							<td>{{$prof->Prenom}}</td>
							<td class="ignore">{{$prof->Date_Naiss}}</td>
							{{-- <td>{{$prof->groupe_nom}}</td> --}}
							{{-- <td><a class="form-control btn btn-primary" href="{{ route('add_student_absence') }}/{{$prof->id}}">Ajouter</a></td> --}}
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



@endsection



@section('myscript')
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$("#datatable tbody tr").css('cursor','pointer');
    	$("#datatable tbody tr").click(function(){
       		window.location = $(this).attr('my-link');
     	});
	});
</script>

@endsection