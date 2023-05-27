@if(Auth::user() && Auth::user()->role_id)
  {{ 'Page' }}
@else 
  <script>window.location = "/login"</script>
@endif