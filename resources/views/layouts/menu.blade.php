<li class="side-menus avi-text-green  {{ Request::is('*') ? 'active' : '' }}">
    <a class=" nav-link  m-1" href="/home">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>

@can('ver-usuario')

    <li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
        <a class=" nav-link m-1 " href="/usuarios">
            <i class=" fas fa-users"></i><span>Usarios</span>
        </a>
    </li>
@endcan

@can('ver-rol')

    <li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
        <a class=" nav-link  m-1" href="/roles">
            <i class=" fas fa-user-lock"></i><span>Roles</span>
        </a>
    </li>
@endcan

{{-- @can('ver-blog')

    <li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
        <a class=" nav-link  m-1" href="/blogs">
            <i class=" fas fa-blog"></i><span>Blogs</span>
        </a>
    </li>
@endcan --}}


@can('ver-documento')

    <li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
        <a class=" nav-link  m-1" href="{{ route('documentos.index') }}">
            <i class=" fas fa-id-card"></i><span>Documentos</span>
        </a>
    </li>
@endcan

@can('ver-estado')

    <li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
        <a class=" nav-link  m-1" href="{{ route('estados.index') }}">
            <i class=" fas fa-bell"></i><span>Estados</span>
        </a>
    </li>
@endcan


@can('ver-sede')

    <li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
        <a class=" nav-link  m-1" href="{{ route('sedes.index') }}">
            <i class=" fas fa-city"></i><span>Sedes</span>
        </a>
    </li>
@endcan


@can('ver-carnet')

    <li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
        <a class=" nav-link  m-1" href="{{ route('carnets.index') }}">
            <i class=" fas fa-id-badge"></i><span>Carnets</span>
        </a>
    </li>
@endcan

@can('ver-area')

    <li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
        <a class=" nav-link  m-1" href="{{ route('areas.index') }}">
            <i class=" fas fa-warehouse"></i><span>Areas</span>
        </a>
    </li>
@endcan


@can('ver-cargo')

    <li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
        <a class=" nav-link  m-1" href="{{ route('cargos.index') }}">
            <i class=" fas fa-user-cog"></i><span>Cargos</span>
        </a>
    </li>
@endcan
