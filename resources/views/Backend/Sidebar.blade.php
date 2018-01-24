
<div class="page-wrap">
    <div class="sidebar">
       <div class="sidebar-nav__footer">
          <div class="sidebar__collapse">
            <span class="icon iconfont iconfont-collapse-left-arrows"></span>
          </div>
        </div>
  <div class="sidebar__scroll">
    <div>
      <div class="sidebar__user">
        <div class="sidebar__user-avatar">
          <!--<img src="img/avatars/placeholder.png" alt="" width="68" height="68" class="rounded-circle">-->
          <span class="sidebar__user-avatar-placeholder">
            <span class="iconfont iconfont-avatar-placeholder"></span>
          </span>
          <!--<img src="img/users/user-1.jpg" alt="" width="68" height="68" class="rounded-circle">-->
        </div>
        <div class="dropdown sidebar__user-dropdown">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Welcome back !
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Help</a>
            <a class="dropdown-item" href="#">Sign Out</a>
          </div>
        </div>
      </div>
<!-- ----------------------------------------------------------------------------------------------------- -->

      <ul class="sidebar-nav">
        <li class="sidebar-nav__item">
          <a class="sidebar-nav__link {{ Request::is('Administration*') ? 'out-active' : '' }}" href="">
            <span class="sidebar-nav__item_icon iconfont iconfont-home"></span>
            <span class="sidebar-nav__item-text">Administration</span>
          </a>
          <ul class="sidebar-subnav {{ Request::is('Administration*') ? 'open_list' : '' }}">
            <li class="sidebar-subnav__item"><a class="sidebar-subnav__link {{ Request::is('Administration') ? 'in-active' : '' }}" href="{{route('Administration')}}">Afficher les Personnels</a></li>
            <li class="sidebar-subnav__item"><a class="sidebar-subnav__link {{ Request::path() == 'Administration/Ajouter' ? 'in-active' : '' }}" href="{{route('Ajouter_Admin')}}">Ajouter des Personnel</a></li>
            <li class="sidebar-subnav__item"><a class="sidebar-subnav__link {{ Request::path() == 'Administration/Roles' ? 'in-active' : '' }}" href="{{route('Roles')}}">Gérer les Rôles</a></li>
            <!-- <li class="sidebar-subnav__item"><a class="sidebar-subnav__link {{ Request::path() == 'Administration/Niveau' ? 'in-active' : '' }}" href="{{route('Niveau')}}">Ajouter Niveau Scolaire</a></li> -->
          </ul>
        </li>
        <li class="sidebar-nav__item">
          <a class="sidebar-nav__link {{ Request::is('Salles*') ? 'out-active' : '' }}" href="">
            <span class="sidebar-nav__item_icon iconfont iconfont-layout"></span>
            <span class="sidebar-nav__item-text">Les Salles</span>
          </a>
          <ul class="sidebar-subnav {{ Request::is('Salles*') ? 'open_list' : '' }}">
            <li class="sidebar-subnav__item"><a class="sidebar-subnav__link {{ Request::path() == 'Salles' ? 'in-active' : '' }}" href="{{route('Salles')}}">Afficher les Salles</a></li>
            <li class="sidebar-subnav__item"><a class="sidebar-subnav__link {{ Request::path() == 'Salles/Ajouter' ? 'in-active' : '' }}" href="#0">Ajouter une Salles</a></li>
          </ul>
        </li>
        <li class="sidebar-nav__item">
          <a class="sidebar-nav__link {{ Request::is('Classes*') ? 'out-active' : '' }}" href="">
            <span class="sidebar-nav__item_icon iconfont iconfont-addon"></span>
            <span class="sidebar-nav__item-text">Classes</span>
          </a>
          <ul class="sidebar-subnav {{ Request::is('Classes*') ? 'open_list' : '' }}">
            <li class="sidebar-subnav__item"><a class="sidebar-subnav__link {{ Request::path() == 'Classes' ? 'in-active' : '' }}" href="{{route('Classes')}}">Afficher les Classes</a></li>
            <li class="sidebar-subnav__item"><a class="sidebar-subnav__link {{ Request::path() == 'Classes/Ajouter' ? 'in-active' : '' }}" href="{{route('Add_classe')}}">Ajouter des Classes</a></li>
            <li class="sidebar-subnav__item"><a class="sidebar-subnav__link {{ Request::path() == 'Classes/Groupes/Ajouter' ? 'in-active' : '' }}" href="{{route('Add_groupe')}}" >Groupes</a></li>
          </ul>
        </li>
        <li class="sidebar-nav__item">
          <a class="sidebar-nav__link {{ Request::is('Matieres*') ? 'out-active' : '' }}" href="">
            <span class="sidebar-nav__item_icon iconfont iconfont-list"></span>
            <span class="sidebar-nav__item-text">Matières</span>
          </a>
          <ul class="sidebar-subnav {{ Request::is('Matieres*') ? 'open_list' : '' }}">
            <li class="sidebar-subnav__item"><a class="sidebar-subnav__link {{ Request::path() == 'Matieres' ? 'in-active' : '' }}" href="{{route('Matieres')}}">Afficher les Matiéres</a></li>
            <li class="sidebar-subnav__item"><a class="sidebar-subnav__link {{ Request::path() == 'Matieres/Ajouter' ? 'in-active' : '' }}" href="{{route('Add_matiere')}}">Ajouter des Matiéres</a></li>
          </ul>
        </li>
        <li class="sidebar-nav__item">
          <a class="sidebar-nav__link {{ Request::is('Etudiants*') ? 'out-active' : '' }}" href="">
            <span class="sidebar-nav__item_icon iconfont iconfont-user"></span>
            <span class="sidebar-nav__item-text">Eléves</span>
          </a>
          <ul class="sidebar-subnav {{ Request::is('Etudiants*') ? 'open_list' : '' }}">
            <li class="sidebar-subnav__item"><a class="sidebar-subnav__link {{ Request::path() == 'Etudiants' ? 'in-active' : '' }}" href="{{route('Etudiants')}}">Afficher les Eléves</a></li>
            <li class="sidebar-subnav__item"><a class="sidebar-subnav__link {{ Request::path() == 'Etudiants/Ajouter' ? 'in-active' : '' }}" href="{{route('Add_etudiant')}}">Ajouter des Eléves</a></li>
            <li class="sidebar-subnav__item"><a class="sidebar-subnav__link {{ Request::path() == 'Etudiants/Payment' ? 'in-active' : '' }}" href="{{route('Payment')}}">Payment F.I</a></li>
            <li class="sidebar-subnav__item"><a class="sidebar-subnav__link {{ Request::path() == 'Etudiants/Payment_M' ? 'in-active' : '' }}" href="{{route('Payment_M')}}">Payment Mensuel</a></li>
          </ul>
        </li>
        <li class="sidebar-nav__item">
          <a class="sidebar-nav__link {{ Request::is('Professeurs*') ? 'out-active' : '' }}" href="">
            <span class="sidebar-nav__item_icon iconfont iconfont-user-solid"></span>
            <span class="sidebar-nav__item-text">Professeurs</span>
          </a>
          <ul class="sidebar-subnav {{ Request::is('Professeurs*') ? 'open_list' : '' }}">
            <li class="sidebar-subnav__item"><a class="sidebar-subnav__link {{ Request::path() == 'Professeurs' ? 'in-active' : '' }}" href="{{route('Professeurs')}}">Afficher les Professeurs</a></li>
            <li class="sidebar-subnav__item"><a class="sidebar-subnav__link {{ Request::path() == 'Professeurs/Ajouter' ? 'in-active' : '' }}" href="{{route('Add_professeur')}}">Ajouter Des Professeurs</a></li>
            <li class="sidebar-subnav__item"><a class="sidebar-subnav__link {{ Request::path() == 'Professeurs/Enseignement' ? 'in-active' : '' }}" href="{{route('Enseignement')}}">Les Enseignements</a></li>
          </ul>
        </li>
        <li class="sidebar-nav__item">
          <a class="sidebar-nav__link {{ Request::is('Absence*') ? 'out-active' : '' }}" href="">
            <span class="sidebar-nav__item_icon iconfont iconfont-invoices"></span>
            <span class="sidebar-nav__item-text">Absences/Retards</span>
          </a>
          <ul class="sidebar-subnav {{ Request::is('Absence*') ? 'open_list' : '' }}">
            <li class="sidebar-subnav__item"><a class="sidebar-subnav__link {{ Request::path() == 'Absence/Groupes' ? 'in-active' : '' }}" href="{{route('Absence_get_students')}}">Eléves</a></li>
            <li class="sidebar-subnav__item {{ Request::path() == 'Absence/Groupes/Professeurs' ? 'in-active' : '' }}"><a class="sidebar-subnav__link" href="{{route('Absence_get_profs')}}">Professeurs</a></li>
          </ul>
        </li>
        <li class="sidebar-nav__item">
          <a class="sidebar-nav__link {{ Request::is('Emploi*') ? 'out-active' : '' }}" href="#">
            <span class="sidebar-nav__item_icon iconfont iconfont-calendar"></span>
            <span class="sidebar-nav__item-text">Emploi du Temps</span>
          </a>
          <ul class="sidebar-subnav {{ Request::is('Emploi*') ? 'open_list' : '' }}">
            <li class="sidebar-subnav__item"><a class="sidebar-subnav__link {{ Request::path() == 'Emploi/Classes' ? 'in-active' : '' }}" href="{{route('Emploi_classes')}}">Eléves</a></li>
            <li class="sidebar-subnav__item"><a class="sidebar-subnav__link {{ Request::path() == 'Emploi/Professeurs' ? 'in-active' : '' }}" href="{{route('Emploi_professeurs')}}">Professeurs</a></li>
          </ul>
        </li>
        <li class="sidebar-nav__item">
          <a class="sidebar-nav__link {{ Request::is('Emploi_classes*') ? 'out-active' : '' }}" href="#">
            <span class="sidebar-nav__item_icon iconfont iconfont-pages"></span>
            <span class="sidebar-nav__item-text">Notes/Controles</span>
          </a>
          <ul class="sidebar-subnav {{ Request::is('Emploi_classes*') ? 'open_list' : '' }}">
            <li class="sidebar-subnav__item"><a class="sidebar-subnav__link {{ Request::path() == '/Emploi/Classes' ? 'in-active' : '' }}" href="{{route('show_notes')}}">Afficher les Notes</a></li>
            <li class="sidebar-subnav__item"><a class="sidebar-subnav__link {{ Request::path() == '/Emploi/Classes' ? 'in-active' : '' }}" href="{{route('profs_show_exams')}}">Afficher les contrôles</a></li>
          </ul>
        </li>
        <div class="my-spacer"></div>
        
    </div>

    
  </div>
</div>
