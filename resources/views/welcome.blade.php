@extends('layouts.app', [
    'namePage' => 'welcome',
    'class' => 'sidebar-mini',
    'activePage' => 'welcome',
])

@section('content')
  
<div class="jumbotron text-center">
  <h1>Welcome To KOKERU</h1>
  <p></p>
  
</div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      demo.checkFullPageBackgroundImage();
    });
  </script>
@endpush
