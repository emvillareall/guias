<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
        <a href="{{ route('clientes.index') }}" class="nav-link {{ Request::is('Clientes') ? 'active' : '' }}">
        <i class="nav-icon fas fa fa-users"></i>
        <p>Clientes</p>
    </a>

</li>
<li class="nav-item">
        <a href="{{ route('tiendas.index') }}" class="nav-link {{ Request::is('Tiendas') ? 'active' : '' }}">
        <i class="nav-icon fas fa fa-building"></i>
        <p>Tiendas</p>
    </a>

</li>
<li class="nav-item">
        <a href="{{ route('pedidos.index') }}" class="nav-link {{ Request::is('Pedidos') ? 'active' : '' }}">
        <i class="nav-icon fas fa fa-truck"></i>
        <p>Pedidos</p>
    </a>
</li>

<li class="nav-item">
        <a href="{{ route('proveedores.index') }}" class="nav-link {{ Request::is('Proveedores') ? 'active' : '' }}">
        <i class="nav-icon fas fa-cubes"></i>
        <p>Proveedores</p>
    </a>
</li>

<li class="nav-item">
        <a href="{{ route('productos.index') }}" class="nav-link {{ Request::is('Productos') ? 'active' : '' }}">
        <i class="nav-icon fas fa fa-shopping-bag"></i>
        <p>Productos</p>
    </a>
</li>

<li class="nav-item">
        <a href="{{ route('compras.index') }}" class="nav-link {{ Request::is('Compras') ? 'active' : '' }}">
        <i class="nav-icon fas fa fa-archive"></i>
        <p>Compras</p>
    </a>
</li>

<li class="nav-item">
        <a href="{{ route('reportes') }}" class="nav-link {{ Request::is('Reportes') ? 'active' : '' }}">
        <i class="nav-icon fas fa fa-list-ol"></i>
        <p>Reportes</p>
    </a>
</li>