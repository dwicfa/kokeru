
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
{{-- @include('layouts.navbars.sidebarCS') --}}
<div >
    @include('layouts.navbars.navs.auth')
    @yield('content')
</div>