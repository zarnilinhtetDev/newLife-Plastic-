 <div class="sb-sidenav-menu">
     <div class="nav">
         <div class="sb-sidenav-menu-heading">Core</div>
         <a class="nav-link" href="{{ url('/dashboard') }}">
             <div class="sb-nav-link-icon"><i class="fas fa-car"></i></div>
             Cars
         </a>
         <a class="nav-link" href="{{ '/Driver' }}">
             <div class="sb-nav-link-icon"><i class="fas fa-person"></i></div>
             Drivers
         </a>


         <a class="nav-link" href="{{ url('/company_list') }}">
             <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
             Company
         </a>
         <a class="nav-link" href="{{ url('/payment') }}">
             <div class="sb-nav-link-icon"><i class="fa-solid fa-money-check-dollar"></i></div>
             Payment
         </a>
         <a class="nav-link" href="{{ url('/car_expenses') }}">
             <div class="sb-nav-link-icon"><i class="fas fa-car-side"></i></div>
             Car Expenses
         </a>
         <a class="nav-link" href="{{ url('/company_expenses') }}">
             <div class="sb-nav-link-icon"><i class="fas fa-industry"></i></div>
             Company Expenses
         </a>
         <a class="nav-link" href="{{ url('/monthly_payment') }}">
             <div class="sb-nav-link-icon"><i class="fa-solid fa-money-check-dollar"></i></div>
             Monthly Payment
         </a>

         @if (auth()->user()->is_admin)
             <a class="nav-link" href="{{ url('/User_Register') }}">
                 <div class="sb-nav-link-icon"><i class="fa-solid fa-user-plus"></i></div>
                 Users
             </a>
         @endif

     </div>
 </div>
 <div class="sb-sidenav-footer">
     <div class="small">SSE Web Solution</div>

 </div>
