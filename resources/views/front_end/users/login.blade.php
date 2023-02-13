<html>
    <head></head>
    <body>
    @if($errors->any())
     <div class="alert alert-danger">
          <ul class="list-unstyled">
                 @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                 @endforeach
          </ul>
      </div>
 @endif
    <form action="{{route('doLogin')}}" method="post">
        @csrf

        <input type="text" name="email" id="" value="8770433191">
        <input type="text" name="password" id="" value="@dmin123">
        <button type="submit">Clicks</button>
    </form>
    </body>
</html>