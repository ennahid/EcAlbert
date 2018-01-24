@extends('Backend.index')
@section('title','Ajouter Niveau')
@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3 col-md-3">
			{!! Form::open(['route' => 'Adding_level' ,'method' => 'post']) !!}
      {{ Form::text('Nom', null, ['class' => 'form-control', 'placeholder' =>'Nom']) }}
		</div>
    <div class="col-lg-7 col-md-7">
      {{ Form::text('Description', null, ['class' => 'form-control', 'placeholder' =>'Description']) }}
    </div>
		<div class="col-lg-2 col-md-2">
				{!! Form::submit('Ajouter',['class'=>'btn btn-primary pull-left']) !!}
			{!! Form::close() !!}
	</div>
</div>
<hr>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-8 col-md-8">
			<div class="main-container table-container">
        <table class="table">
          <thead>
          <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Created at</th>
            <th>Act</th>
          </tr>
          </thead>
          <tbody>
            @foreach($Niveaux as $niveau)
            <tr>
              <td><strong>{{$niveau->Nom}}</strong></td>
              <td>{{$niveau->Description}}</td>
              <td><strong>{{$niveau->created_at}}</strong></td>
              <td class="table__cell-actions">
                <div class="table__cell-actions-wrap">
                  <a href="#0" id="remove_user" data-id="{{$niveau->id}}" class="table__cell-actions-item table__cell-actions-icon">
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
			
	</div>
</div>

@endsection