@extends('Backend.index')

@section('title','Enseignement')

@section('content')


<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<h2 class="content-heading">Enseignement</h2>
			<h3 class="content-description">Afficher les Groupes</h3>
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
                     <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 177px;">Nom</th>
                     <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 177px;">Prenom</th>
                     <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 279px;">Téle</th>
                     <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 279px;">Email</th>
               </thead>
                <tbody>
            @foreach($Professeurs as $prof)
            <tr href="{{ route('Enseignement_affect') }}/{{$prof->id}}">
              <td><strong>{{$prof->Nom}}</strong></td>
              <td><strong>{{$prof->Prenom}}</strong></td>
              <td><strong>{{$prof->Tele}}</strong></td>
              <td><strong>{{$prof->Email}}</strong></td>
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

@endsection


@section('myscript')
<script type="text/javascript">
jQuery(document).ready(function($) {


	$("#datatable tbody tr").css('cursor','pointer');
    $("#datatable tbody tr").click(function(){
       window.location = $(this).attr('href');
     });





	$('select[name="id_matiere"]').change(function() {
		$('select[name="id_classe"]').empty();
		$.ajaxSetup({
            headers:{'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')}
        });

        $.ajax({
            type:'POST',
            url: '{{route("get_classes")}}',
            data:{
              'id_matiere': $(this).val()
            },
            success:function(r){
              $.each(r, function(res) {
              		$('select[name="id_classe"]').append($("<option />").val(r[res].id).text(r[res].Nom));
				});
            },error:function(r) {
              alert('Something went wrong');
            }
        });   
	});


	$('select[name="id_classe"]').change(function() {
		// alert('changed');
		// $('select[name="id_classe"]').empty();
		$.ajaxSetup({
            headers:{'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')}
        });
        $.ajax({
            type:'POST',
            url: '{{route("get_groupes_checkboxes")}}',
            data:{
              'id_classe': $('select[name="id_classe"]').val()
            },
            success:function(r){
            	// $('.get-groupes').empty();
            	$('input[name="classes_check"]').val(r[0].id)
    //         	$.each(r, function(res) {
    //         		$('.get-groupes').append("<div class='col-md-4 col-lg-4'><label class='switch-inline'><span class='switch'><input name='classes_check' type='checkbox' value='"+r[res].id+"'><span class='switch-slider'><span class='switch-slider__on'></span><span class='switch-slider__off'></span></span></span><span class='switch-inline__text'>"+r[res].Nom+"</span></label></div>");
				// });
            },error:function(r) {
              alert('Something went wrong');
            }
        });
	});


	$('input[name="groupe_check[]"]').change(function function_name(argument) {
			alert($(this).val());
		})


	// $('#myform').submit(function(e) {
	// 	e.preventDefault();
	// 	$.each($('input[name="groupe_check[]"]'), function(res) {
	// 				console.log('value is '+$(this).val());
	// 	});

	// });





});
</script>


@endsection

