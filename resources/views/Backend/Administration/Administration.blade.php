@extends('Backend.index')
@section('title','Administration')
@section('content')


<div class="container-fluid">
	<div class="row">
		<div class="col-xl-3 col-lg-3 col-md-6">
	      <div class="widget widget-alpha widget-alpha--color-java widget-alpha--help">
	        <div>
	          <div class="widget-alpha__amount">425</div>
	          <div class="widget-alpha__description">Eleves</div>
	        </div>
	        <span class="widget-alpha__icon iconfont iconfont-help-outline"></span>
	      </div>
	    </div>
	    <div class="col-xl-3 col-lg-3 col-md-6">
	      <div class="widget widget-alpha widget-alpha--color-amaranth">
	        <div>
	          <div class="widget-alpha__amount">278</div>
	          <div class="widget-alpha__description">Personnels</div>
	        </div>
	        <span class="widget-alpha__icon iconfont iconfont-bag-outline"></span>
	      </div>
	    </div>
	    <div class="col-xl-3 col-lg-3 col-md-6">
	      <div class="widget widget-alpha widget-alpha--color-green-jungle">
	        <div>
	          <div class="widget-alpha__amount">156</div>
	          <div class="widget-alpha__description">Professeurs</div>
	        </div>
	        <span class="widget-alpha__icon iconfont iconfont-user-outline"></span>
	      </div>
	    </div>
	    <div class="col-xl-3 col-lg-3 col-md-6">
	      <div class="widget widget-alpha widget-alpha--color-orange widget-alpha--donut">
	        <div>
	          <div class="widget-alpha__amount">64</div>
	          <div class="widget-alpha__description">Classes</div>
	        </div>
	        <span class="widget-alpha__icon iconfont iconfont-company-outline"></span>
	      </div>
	    </div>
	    <div class="col-xl-3 col-lg-3 col-md-6">
	      <div class="widget widget-alpha widget-alpha--color-java widget-alpha--help">
	        <div>
	          <div class="widget-alpha__amount">25</div>
	          <div class="widget-alpha__description">Matières</div>
	        </div>
	        <span class="widget-alpha__icon iconfont iconfont-help-outline"></span>
	      </div>
	    </div>
	    <div class="col-xl-3 col-lg-3 col-md-6">
	      <div class="widget widget-alpha widget-alpha--color-java widget-alpha--help">
	        <div>
	          <div class="widget-alpha__amount">45</div>
	          <div class="widget-alpha__description">Examens</div>
	        </div>
	        <span class="widget-alpha__icon iconfont iconfont-help-outline"></span>
	     </div>
	    </div>
	    <div class="col-xl-3 col-lg-3 col-md-6">
	      <div class="widget widget-alpha widget-alpha--color-java widget-alpha--help">
	        <div>
	          <div class="widget-alpha__amount">32</div>
	          <div class="widget-alpha__description">Controles</div>
	        </div>
	        <span class="widget-alpha__icon iconfont iconfont-help-outline"></span>
	      </div>
	    </div>
  </div>
</div>
  <hr>

{{-- 
<div class="container-fluid">
  <div class="row">
  	<div class="col-xl-6 col-lg-6 col-md-6">
	  	<h2 class="content-heading">Liste Des Personnels</h2>
	  	<a href="{{route('Ajouter_Admin')}} " class="btn btn-purple icon-left btn-lg mr-3">+ Ajouter Personnel</a>
  	</div>
  </div>
  <br>
  <div class="row">
  	<div class="col-lg-12">
      <div class="main-container table-container">
        <table class="table table__actions">
          <thead>
            <tr>
              <th class="table__checkbox">
                <label class="custom-control custom-checkbox">
                  &nbsp&nbsp&nbsp<input type="checkbox" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                </label>
              </th>
              <th></th>
              <th id="god">Nom</th>
              <th>Prenom</th>
              <th>Cin</th>
              <th>Rôle</th>
              <th>Téle</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($Admins as $admin)
            <tr class="is-selected">
              <td class="table__checkbox">
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                </label>
              </td>
              <td>
                <div class="table-img-round">
                  <img src="{{URL::asset('photos/personnels\/')}}{{$admin->Photo}}" alt="" class="table__cell-user-avatar rounded-circle">
                </div>
              </td>
              <td>
               {{$admin->Nom}}
              </td>
              <td>
                {{$admin->Prenom}}
              </td>
              <td>
                {{$admin->Cin}}
              </td>
              <td class="table__label"><span class="badge badge-success">{{substr($admin->Role, 0, 5)}}</span></td>
              <td>{{$admin->Tele}}</td>
              <td class="table__cell-actions">
                <div class="table__cell-actions-wrap">
                  <a href="{{route('Modifier_Admin')}}/{{$admin->id}}" class="table__cell-actions-item table__cell-actions-icon">
                    <span class="iconfont iconfont-export"></span>
                  </a>
                  <a href="#0" data-id="{{$admin->id}}" class="remove_user table__cell-actions-item table__cell-actions-icon">
                    <span class="iconfont iconfont-remove"></span>
                  </a>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div> <!-- div for table -->
    </div> <!-- col-lg-12 -->
  </div>   <!-- row for table -->
</div><!--  container-fluid -->
 --}}
@endsection


@section('myscript')



<script type="text/javascript">



$(document).ready(function(){
  $('.remove_user').click(function(e) {
   var ID = $(this).attr('data-id');

    bootbox.confirm({
              title: "Message",
              message: "Voulez vous supprimer ?",
              buttons: {
                  cancel: {
                      label: '<i class="fa fa-times"></i> Annuler'
                  },
                  confirm: {
                      label: '<i class="fa fa-check"></i> Confirmer'
                  }
              },
              callback: function (res) {
                if(res)
                  {
                    $.ajaxSetup({
                        headers:{'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')}
                        });

                    $.ajax({
                        type:'POST',
                        url: '{{route("Remove_user")}}',
                        data:{
                          'id': ID
                        },
                        success:function(r){
                          
                        },error:function(r) {
                          alert('Something went wrong');
                        }
                    });

                  }
                }
          });
e.preventDefault();
  });


});



</script>


@endsection