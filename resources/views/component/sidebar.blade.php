<script src="{{asset('assets/js/core/jquery.min.js')}}"></script> 
<div class="sidebar" data-color="blue" data-background-color="black" data-image="{{asset('assets/img/sidebar-1.jpg')}}">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
      -->
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          PK
        </a>
        <a href="#" class="simple-text logo-normal">
          PKWT
        </a>
      </div>
      <div class="sidebar-wrapper ps-container ps-theme-default ps-active-y" data-ps-id="1d9eb305-f1eb-ddfb-9b45-c18f312e7051">
        <div class="user">
          <div class="photo">
            <img src="{{asset('assets/img/faces/avatar.jpg')}}">
          </div>
          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                Test
                <b class="caret"></b>
              </span>
            </a>
            <div class="collapse @yield('show-profile')" id="collapseExample">
              <ul class="nav">
                <li class="nav-item @yield('active-profile')">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> UP </span>
                    <span class="sidebar-normal"> User Profile </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item @yield('active-dashboard') ">
            <a class="nav-link" href="#">
              <i class="material-icons">dashboard</i>
              <p> Dashboard </p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#">
              <i class="material-icons">exit_to_app</i>
              <p> Logout </p>
            </a>
          </li>
        </ul>
        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
          <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;">

          </div>
        </div>
        <div class="ps-scrollbar-y-rail" style="top: 0px; height: 550px; right: 0px;">
          <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 493px;">

          </div>
        </div>
      </div>
      <div class="sidebar-background" style="background-image: url(../assets/img/sidebar-1.jpg) ">

      </div>
    </div>