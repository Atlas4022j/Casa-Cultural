<nav id="sidebar" class="sidebar">
    <div class="sidebar-header">
        <img src="https://via.placeholder.com/50" alt="Logo" class="logo">
        <h1>El Mirador</h1>
    </div>
    
    <ul class="sidebar-menu">
        <li class="menu-item {{ request()->routeIs('reportes') ? 'active' : '' }}">
            <a href="{{ route('reportes') }}" data-page="reportes">
                <i class="fas fa-chart-line"></i>
                <span>Reportes</span>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('reservas*') ? 'active' : '' }}">
            <a href="#" data-page="reservas">
                <i class="fas fa-calendar-check"></i>
                <span>Reservas</span>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('rooms.index') ? 'active' : '' }}">
            <a href="{{ route('rooms.index') }}" data-page="habitaciones">
                <i class="fas fa-bed"></i>
                <span>Habitaciones</span>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('clientes.index') ? 'active' : '' }}">
            <a href="{{ route('clientes.index') }}" data-page="clientes">
                <i class="fas fa-users"></i>
                <span>Clientes</span>
            </a>
        </li>
        <li class="menu-item has-submenu {{ 
            request()->routeIs('restaurant.index') || 
            request()->routeIs('tours*') ? 'active' : '' 
        }}">
            <a href="#" data-page="servicios">
                <i class="fas fa-concierge-bell"></i>
                <span>Servicios</span>
                <i class="fas fa-chevron-down submenu-icon"></i>
            </a>
            <ul class="submenu">
                <li class="{{ request()->routeIs('restaurant.index') ? 'active' : '' }}">
                    <a href="{{ route('restaurant.index') }}" data-page="restaurante">
                        <i class="fas fa-utensils"></i>
                        <span>Restaurante</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('tours*') ? 'active' : '' }}">
                    <a href="{{ route('tours.index') }}" data-page="tours">
                        <i class="fas fa-map-marked-alt"></i>
                        <span>Tours</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>