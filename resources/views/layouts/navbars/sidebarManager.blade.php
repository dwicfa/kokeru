
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
              <a href="/manager/dashboard">
              <i class="now-ui-icons design_app"></i>
              <p>{{ __('Dashboard') }}</p>
              </a>
          </li>
          <li class="@if ($activePage == 'dataCS') active @endif">
            <a href="/manager/dataCS">
            <i class="now-ui-icons design_bullet-list-67"></i>
            <p>{{ __('Data Cleaning Service') }}</p>
            </a>
        </li>
        <li class="@if ($activePage == 'ruangan') active @endif">
            <a href="/manager/ruangan">
            <i class="now-ui-icons design_bullet-list-67"></i>
            <p>{{ __('Data Ruangan') }}</p>
            </a>
        </li>
        <li class="@if ($activePage == 'laporan') active @endif">
            <a href="/manager/laporan">
            <i class="now-ui-icons design_bullet-list-67"></i>
            <p>{{ __('Laporan') }}</p>
            </a>
        </li>
          {{-- <li class="@if ($activePage == 'profile') active @endif">
              <a href="/manager/profile">
              <i class="now-ui-icons users_single-02"></i>
              <p>{{ __('Profile') }}</p>
              </a>
          </li> --}}
          
          </ul>
      </div>
  </div>