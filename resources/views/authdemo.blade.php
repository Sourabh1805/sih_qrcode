<html>
  <body>
  <form method="post" action={{action('AuthenticationController@store')}}>
    {{csrf_field()}}
    <input type="text" name="unm" placeholder="Username">
    <input type="password" name="upass" placeholder="password">
    <input type="submit" name="btn" value="Login">
  </form>
  </body>
</html>
