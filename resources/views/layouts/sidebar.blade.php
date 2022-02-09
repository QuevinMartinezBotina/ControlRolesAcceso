<aside id="sidebar-wrapper avi-bg-green">
    <div class="sidebar-brand">
        <img class="navbar-brand-full app-header-logo" src="{{ asset('https://i.ibb.co/N2Gqfxg/new-avicampo.png') }}"
            width="100" alt="Infyom Logo">
        <a href="{{ url('/') }}"></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}" class="small-sidebar-text">
            <img class="navbar-brand-full p-2" src="{{ asset('https://i.ibb.co/N2Gqfxg/new-avicampo.png') }}"
                width="75px" alt="" />
        </a>
    </div>
    <ul class="sidebar-menu">
        @include('layouts.menu')
    </ul>
</aside>
