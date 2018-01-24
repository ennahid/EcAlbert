@extends('Backend.index')
@section('title','Etudiants de Groupe')

@section('content')


<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 col-lg-4">
      <h2 class="content-heading">{{$Groupe->Nom}}</h2>
      <h5 class="content-description">Etudiants de Groupe</h5>
    </div>
  </div>
  <hr>
</div>

<div class="container-fluid">
  <div class="row">
    <label>Recherche:</label>
    <input type="text" id="Filter-Students" data-id="{{$Groupe->id}}" class="form-control" placeholder="Filtrer les Etudiants">
  </div>
  <br>
  <hr>
</div>

<div class="container-fluid">
  <div class="row students">
    @foreach($Etudiants as $etd)
      <div class="col-xl-4 col-lg-4 col-ml-4 col-sm-6 col-xs-12">
        <div class="widget widget-patient">
          <div class="widget-patient__user">
            <div class="student-image">
                <img src="{{ asset('photos/etudiants\/') }}{{$etd->Photo}}" alt="" class="widget-patient__avatar rounded-circle" width="120" height="120">
            </div>
            <a href="#" class="widget-patient__name">{{$etd->Nom}} {{$etd->Prenom}}</a>
            <div class="widget-patient__location">{{$etd->Adresse}}</div>
          </div>
          <ul class="widget-patient__params">
            <li class="widget-patient__param">
              <span class="widget-patient__param-value">{{$etd->Date_Naiss}}</span>
              <span class="widget-patient__param-name">Date Naiss</span>
            </li>
            <li class="widget-patient__param">
              <span class="widget-patient__param-value">{{$etd->Sexe}}</span>
              <span class="widget-patient__param-name">Sexe</span>
            </li>
            <li class="widget-patient__param">
              <span class="widget-patient__param-value">15</span>
              <span class="widget-patient__param-name">Retard</span>
            </li>
            <li class="widget-patient__param">
              <span class="widget-patient__param-value">17</span>
              <span class="widget-patient__param-name">Absence</span>
            </li>
          </ul>
        </div>
      </div> {{-- student-box --}}
    @endforeach
  </div>  {{-- row --}}
</div> {{-- container-fluid --}}
@endsection


@section('myscript')


<script type="text/javascript">
  jQuery(document).ready(function($) {
      $('#Filter-Students').keyup(function(e) {
        $.ajaxSetup({
            headers:{'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')}
        });
        var asset;

        if($(this).val() !== null)
        {
          $.ajax({
            type:'POST',
            url: '{{route("Filter_groupe_show")}}',
            data:{
              'Nom': $(this).val(),
              'id': $(this).attr('data-id')
            },
            success:function(r){
              $('.students').empty();
              $.each(r, function(res) {
                if(r[res].Photo === null)
                {
                  asset = '';
                  r[res].Photo = '';
                }
                else{
                  asset = '{{ asset("photos/etudiants") }}';
                }
                $('.students').append("<div class='col-xl-4 col-lg-4 col-ml-4 col-sm-6 col-xs-12'> <div class='widget widget-patient'> <div class='widget-patient__user'> <div class='student-image'> <img src="+asset+"/"+r[res].Photo+" alt=' class='widget-patient__avatar rounded-circle' width='120' height='120'> </div> <a href='#' class='widget-patient__name'>"+r[res].Nom+" "+r[res].Prenom+"</a> <div class='widget-patient__location'>"+r[res].Adresse+"</div> </div> <ul class='widget-patient__params'> <li class='widget-patient__param'> <span class='widget-patient__param-value'>"+r[res].Date_Naiss+"</span> <span class='widget-patient__param-name'>Date Naiss</span> </li> <li class='widget-patient__param'> <span class='widget-patient__param-value'>"+r[res].Sexe+"</span> <span class='widget-patient__param-name'>Sexe</span> </li> <li class='widget-patient__param'> <span class='widget-patient__param-value'>15</span> <span class='widget-patient__param-name'>Retard</span> </li> <li class='widget-patient__param'> <span class='widget-patient__param-value'>17</span> <span class='widget-patient__param-name'>Absence</span> </li> </ul> </div> </div>");    
              });
            },error:function(r) {
              alert(r);
            }
        });
        }
      });
  });
</script>

@endsection

