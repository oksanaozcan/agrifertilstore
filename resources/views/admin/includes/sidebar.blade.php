<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href={{ route('admin') }} class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">{{ config('app.name', 'Happy Plant') }}</span>
  </a>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
       
        <li class="nav-item">
          <a href={{ route('admin.fertilizers.index') }} class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Удобрения
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href={{ route('admin.fertilizers.index') }} class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Список</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.fertilizers.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Добавить</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.deleted.fertilizers.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Удаленные</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href={{ route('admin.tags.index') }} class="nav-link">
            <i class="nav-icon fas fa-tag"></i>
            <p>
              Тэги
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href={{ route('admin.tags.index') }} class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Список</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.tags.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Добавить</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.deleted.tags.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Удаленные</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href={{ route('admin.cultures.index') }} class="nav-link">
            <i class="nav-icon fas fa-leaf"></i>
            <p>
              Культуры
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href={{ route('admin.cultures.index') }} class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Список</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.cultures.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Добавить</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.deleted.cultures.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Удаленные</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.statusimport.cultures.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Статистика импортов</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href={{ route('admin.customers.index') }} class="nav-link">
            <i class="nav-icon fas fa-address-card"></i>
            <p>
              Клиенты
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href={{ route('admin.customers.index') }} class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Список</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.customers.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Добавить</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.deleted.customers.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Удаленные</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href={{ route('admin.users.index') }} class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Пользователи
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href={{ route('admin.users.index') }} class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Список</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.users.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Добавить</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.deleted.users.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Удаленные</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href={{ route('admin.deleted.index') }} class="nav-link">
            <i class="nav-icon fas fa-eraser"></i>   
            <p>
              Удаленные объекты
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.deleted.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Общая статистика</p>
              </a>
            </li>            
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.contacts.index') }}">
            <i class="far fa-envelope nav-icon"></i>
            <p>Заявки</p>
          </a>
        </li>
       
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

