  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <span class="brand-link text-center ">
          <span class="brand-text font-weight-light">Dashboard</span>
      </span>


      <!-- Sidebar -->
      <div class="sidebar">


          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">

                  <li class="nav-item">
                      <a href="{{ url('/dashboard') }}" class="nav-link">
                          <i class="fa-solid fa-list"></i>
                          <p class="pl-3">
                              Details

                          </p>
                      </a>

                  </li>
                  <li class="nav-item">
                      <a href="{{ url('/customers') }}" class="nav-link">
                          <i class="fa-solid fa-cart-shopping"></i>
                          <p class="pl-3">
                              Customers

                          </p>
                      </a>

                  </li>

                  <li class="nav-item">
                      <a class="nav-link" href="{{ url('/user') }}">
                          <i class="fa-solid fa-user-plus"></i>
                          <p class="pl-3">
                              Users
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
