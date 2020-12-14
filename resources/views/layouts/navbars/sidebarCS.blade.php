
<div class="sidebar" data-color="blue">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
      <div class="logo">
        <a href="/" class="simple-text logo-normal">
            {{ __('Kokeru') }}
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
          <ul class="nav">
          <li class="@if ($activePage == 'home') active @endif">
              <a href="/dashboard">
              <i class="now-ui-icons design_app"></i>
              <p>{{ __('Dashboard') }}</p>
              </a>
          </li>
          <li class="@if ($activePage == 'profile') active @endif">
              <a href="/profile">
              <i class="now-ui-icons users_single-02"></i>
              <p>{{ __('Profile') }}</p>
              </a>
          </li>
          
          </ul>
      </div>
  </div>