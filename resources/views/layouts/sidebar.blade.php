<aside class="main-sidebar sidebar-dark-white elevation-4" style="background-color: #925AFF">
    <a href="{{ route('home') }}" class="brand-link">
        <img src="imagenes/logotipo.png"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-bold">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>
