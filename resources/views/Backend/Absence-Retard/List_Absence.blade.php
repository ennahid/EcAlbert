@extends('Backend.index')

@section('title','Absence/Retard')

@section('content')

<div class="container-fluid">
	<div class="main-container">
    <div class="row">
		<div class="col-12">
			<h3>Fiche d'absence : <b>{{$Nom[0]->Nom}} {{$Nom[0]->Prenom}}</b></h3>
			<br>
			<div>
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
					  <a class="nav-link active" data-toggle="tab" href="#Absence" role="tab" aria-controls="Absence" aria-expanded="true" aria-selected="true">Absence</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" data-toggle="tab" href="#Retard" role="tab" aria-controls="Retard" aria-expanded="false" aria-selected="false">Retard</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="Absence" role="tabpanel" aria-expanded="true">
						<!--begin tabe 1 -->
						<div class="m-datatable __web-inspector-hide-shortcut__">
						   <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
						      <div class="row">
						         <div class="col-sm-12" id="etd_table">
						            <table id="datatable" class="table table-striped dataTable no-footer" role="grid" aria-describedby="datatable_info">
						               <thead>
						                  <tr role="row">
						                  	 <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 80px;">Date</th>
						                  	 <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 80px;">Etat</th>
						                     <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 180px;">Justification</th>
						                  </tr>
						               </thead>
						               <tbody>
						               		@if(isset($Absences))
								               	@foreach($Absences as $abs)
								                  <tr role="row" class="odd">
													<td>{{$abs->created_at->format('d/m/Y')}}</td>
													@if($abs->justif != '')
													<td>Justifiée</td>
													<td>{{$abs->justif}}</td>
													@else
													<td>Non Justifiée</td>
													<td></td>
													@endif
													{{-- <td><a href=""></a></td> --}}
								                  </tr>
								                @endforeach
							                @endif
						               </tbody>
						            </table>
						         </div>
						      </div>
						      {{-- <div class="my-spacer"></div> --}}
						   </div>
						</div>
					
					</div><!-- end of tab 1 -->
					<div class="tab-pane" id="Retard" role="tabpanel" aria-expanded="false">
						<div class="m-datatable __web-inspector-hide-shortcut__">
						   <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
						      <div class="row">
						         <div class="col-sm-12" id="etd_table">
						            <table id="datatable" class="table table-striped dataTable no-footer" role="grid" aria-describedby="datatable_info">
						               <thead>
						                  <tr role="row">
						                  	 <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 80px;">Date</th>
						                     <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 80px;">De</th>
						                     <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 80px;">A</th>
						                     <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 80px;">Etat</th>
						                     <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 180px;">Justification</th>
						                  </tr>
						               </thead>
						               <tbody>
						               		@if(isset($Retard))
								               	@foreach($Retard as $rtd)
								                  <tr role="row" class="odd">
													<td>{{$rtd->created_at->format('d/m/Y')}}</td>
													<td>{{$rtd->De}}</td>
													<td>{{$rtd->A}}</td>
													@if($rtd->justif != '')
													<td>Justifiée</td>
													<td>{{$rtd->justif}}</td>
													@else
													<td>Non Justifiée</td>
													<td></td>
													@endif
													{{-- <td><a href=""></a></td> --}}
								                  </tr>
								                @endforeach
							                @endif
						               </tbody>
						            </table>
						         </div>
						      </div>
						      {{-- <div class="my-spacer"></div> --}}
						   </div>
						</div>
					</div><!--end of tabe 2-->
				</div>
			</div>
		</div>
    </div>
  </div>
</div>


@endsection