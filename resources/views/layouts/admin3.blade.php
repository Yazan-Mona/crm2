<!DOCTYPE html>
<html lang="en">


<head>
@include('layouts.head')

</head>

<body>



    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="http://127.0.0.1:8000/home"><img src="{{asset("/assets/images/logo/logo.png")}}" alt="Logo" srcset=""    ></a>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            
            <li
                class="sidebar-item active ">
                <a href="{{ route('home') }}" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Users Management</span>
            
                </a>
                <ul class="submenu ">
            
                    <li class="submenu-item ">
                        <a href="{{ route('permissions.index') }}">Permission</a>
                    </li>

         
                    <li class="submenu-item ">
                        <a href="{{ route('users.index') }}">Users</a>
                    </li>
           

                
                    <li class="submenu-item ">
                        <a href="{{ route('roles.index') }}">Roles</a>
                    </li>
              

              
                    <li class="submenu-item ">
                        <a href="#">Teams</a>
                    </li>
          
                </ul>
            </li>

     
            <li
                class="sidebar-item ">
                <a href="{{ route('projects.index') }}" class='sidebar-link'>
                    <i class="bi bi-collection-fill"></i>
                    <span>Projects</span>
                </a>
               
            </li>
   


            <li
                class="sidebar-item  ">
                <a href="{{ route('owners.index') }}" class='sidebar-link'>
                    <i class="bi bi-collection-fill"></i>
                    <span>Landlords</span>
                </a>
               
            </li>
  



            <li
                class="sidebar-item ">
                <a href="{{ route('listings.index') }}" class='sidebar-link'>
                    <i class="bi bi-collection-fill"></i>
                    <span>Listings</span>
                </a>
               
            </li>
            <li
                class="sidebar-item ">
                <a href="{{ route('my-listings.index') }}" class='sidebar-link'>
                    <i class="bi bi-collection-fill"></i>
                    <span> My Listings</span>
                </a>
               
            </li>
            @if ( Auth::user()->getRoleNames()[0]== "admin")
            <li
                class="sidebar-item ">
                <a href="{{ route('index.fresh') }}" class='sidebar-link'>
                    <i class="bi bi-collection-fill"></i>
                    <span>  Un Fresh Listings</span>
                </a>
               
            </li>
            @endif
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Managing Leads</span>
                </a>
                <ul class="submenu ">
       
                    <li class="submenu-item ">
                        <a href="{{ route('contacts.index') }}">Contacts</a>
                    </li>

                    <li class="submenu-item ">
                        <a href="{{ route('leads.index') }}">Leads</a>
                    </li>
                
                </ul>
            </li>
            
    
            
           
            
           
            
           
          
            
         
            

            
            <li class="sidebar-title">   <a href="#"></a></li>

            
            <li
                class="sidebar-item  ">
                <a href="https://zuramai.github.io/mazer/docs" class='sidebar-link'>
                    <i class="bi bi-life-preserver"></i>
                    <span>Documentation</span>
                </a>
            </li>
            
            <li
                class="sidebar-item  ">
                <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md" class='sidebar-link'>
                    <i class="bi bi-puzzle"></i>
                    <span>Contribute</span>
                </a>
            </li>
            
            <li
                class="sidebar-item  ">
                <a href="https://github.com/zuramai/mazer#donate" class='sidebar-link'>
                    <i class="bi bi-cash"></i>
                    <span>Donate</span>
                </a>
            </li>
            
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
        </div>
<div id="main">
<div class="page-heading" >
        @include('layouts.heading')
</div>
<div class="page-content">

@yield('content')
 </div>

<footer>
@include('layouts.footer')
</footer>
      
        </div>
    </div>
    <script src="{{asset("/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js")}}"></script>
    <script src="{{asset("/assets/js/bootstrap.bundle.min.js")}}"></script>
    
<script src="{{asset("/assets/vendors/apexcharts/apexcharts.js")}}"></script>
<script src="{{asset("/assets/js/pages/dashboard.js")}}"></script>

    <script src="{{asset("/assets/js/mazer.js")}}"></script>
    @yield('scripts')
</body>

</html>
