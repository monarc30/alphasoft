@if(Auth::user() && Auth::user()->role_id == 1)
  {{ 'Page' }}
@else 
  <script>
    window.location = "/login";
  </script>
@endif