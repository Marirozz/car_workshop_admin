<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ auth()->user()->getAvatar() }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->getFullname() }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="{{route('home')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('products.index') }}" class="nav-link {{ activeSegment('products') }}">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>Productos</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('cart.index') }}" class="nav-link {{ activeSegment('cart') }}">
                        <i class="nav-icon fas fa-cart-plus"></i>
                        <p>Abrir POS</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('orders.index') }}" class="nav-link {{ activeSegment('orders') }}">
                        <i class="nav-icon fas fa-cart-plus"></i>
                        <p>Ordenes</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('maintenances.index') }}" class="nav-link {{ activeSegment('maimtenances') }}">
                        <i class="nav-icon fa-solid fa-calendar-check"></i>
                        <p>Registro Mantenimientos</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('reservations.index') }}" class="nav-link {{ activeSegment('reservations') }}">
                        <i class="nav-icon fa-solid fa-calendar-check"></i>
                        <p>Mantenimientos</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('vehicles.index') }}" class="nav-link {{ activeSegment('vehicles') }}">
                        <i class="nav-icon fa-solid fa-car"></i>
                        <p>Vehiculos</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('vehicle_entries.index') }}" class="nav-link {{ activeSegment('vehicle_entries') }}">
                        <i class="nav-icon fa-solid fa-car"></i>
                        <p>Entrada Vehiculos</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('customers.index') }}" class="nav-link {{ activeSegment('customers') }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Clientes</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('employees.index') }}" class="nav-link {{ activeSegment('employees') }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Empleados</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('settings.index') }}" class="nav-link {{ activeSegment('settings') }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Configuración</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="document.getElementById('logout-form').submit()">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Salir</p>
                        <form action="{{route('logout')}}" method="POST" id="logout-form">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
