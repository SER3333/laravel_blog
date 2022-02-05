
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{route('posts.index')}}" class="nav-link">
              <i class="nav-icon fas fa-blog"></i>
              <p>
                Блог
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('personal.main.index')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Головна
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('personal.comment.index')}}" class="nav-link">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Коментарі
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('personal.liked.index')}}" class="nav-link">
              <i class="nav-icon fas fa-heart"></i>
              <p>
                Вподобані пости
              </p>
            </a>
          </li>
          
          
        </ul>
  </div>
  <!-- /.sidebar -->
</aside>