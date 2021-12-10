<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <img class="navbar-brand-full app-header-logo "
            src="{{ asset('https://avicolaelmadrono.com/wp-content/uploads/2015/02/avicampo-logo-e1432591797104.png') }}"
            width="100" alt="Infyom Logo">
        <a href="{{ url('/') }}"></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}" class="small-sidebar-text">
            <img class="navbar-brand-full "
                src="{{ asset('https://avicolaelmadrono.com/wp-content/uploads/2015/02/avicampo-logo-e1432591797104.png') }}"
                width="75px" alt="" />
        </a>
    </div>
    <ul class="sidebar-menu">
        @include('layouts.menu')
    </ul>
</aside>
