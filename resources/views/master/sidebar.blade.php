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

                      <a href="{{ url('/user') }}" class="nav-link">

                          <i class="fa-solid fa-users-line "></i>
                          <p class="pl-3">
                              Users
                          </p>
                      </a>

                  </li>
                  <li class="nav-item">
                      <a href="{{ url('/dashboard') }}" class="nav-link">
                          <i class="fa-solid fa-car-side"></i>
                          <p class="pl-3">
                              Cars
                              {{-- <i class="right fas fa-angle-left"></i> --}}
                          </p>
                      </a>

                  </li>
                  <li class="nav-item">
                      <a href="{{ url('customer') }}" class="nav-link">

                          <i class="fa-solid fa-user-plus"></i>
                          <p class="pl-3">
                              Customers

                          </p>
                      </a>

                  </li>
                  <li class="nav-item">
                      <a href="{{ url('account') }}" class="nav-link">
                          <i class="fa-solid fa-credit-card"></i>
                          <p class="pl-3">
                              Accounts
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('transaction') }}" class="nav-link">
                          <i class="fa-solid fa-address-card"></i>
                          <p class="pl-3">
                              Transaction
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('expense') }}" class="nav-link">
                          <i class="fa-solid fa-money-bill-1"></i>
                          <p class="pl-3">
                              Expenses
                          </p>
                      </a>
                  </li>
                  
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
