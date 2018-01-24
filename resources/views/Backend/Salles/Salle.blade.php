@extends('Backend.index')
@section('title','Salles')

@section('content')


<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3 col-md-3">
			<h2 class="content-heading">Salles</h2>
			<h5 class="content-description">Ajouter Des Salles</h5>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-md-3">
			{!! Form::open(['route' => 'Adding_salle' ,'method' => 'post']) !!}
      {{ Form::text('Nom', null, ['class' => 'form-control', 'placeholder' =>'Nom']) }}
		</div>
    <div class="col-lg-7 col-md-7">
      {{ Form::text('Function', null, ['class' => 'form-control', 'placeholder' =>'Function']) }}
    </div>
		<div class="col-lg-2 col-md-2">
				{!! Form::submit('Ajouter',['class'=>'btn btn-primary pull-left']) !!}
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
               </thead>
                 <tbody>
                @foreach($salles as $salle)
                <tr>
                  <td><strong>{{$salle->Nom}}</strong></td>
                  <td>{{$salle->Function}}</td>
                  <td><strong>{{$salle->created_at}}</strong></td>
                  <td class="table__cell-actions">
                    <div class="table__cell-actions-wrap">
                      <a href="#0" id="remove_user" data-id="{{$salle->id}}" class="table__cell-actions-item table__cell-actions-icon">
                        <span class="iconfont iconfont-remove"></span>
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
</div>



@endsection