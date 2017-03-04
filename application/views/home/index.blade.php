@extends('templates/main')
@section('title', 'Home Page')

@section('content')
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">PinoyCentral</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <form role="form" id="login_form" class="navbar-form navbar-right" data-toggle="validator">
          <input type="hidden" class="hash" name="{{ $csrf_name }}" value="{{ $csrf_token }}">
        <div class="form-group">
          <input class="username form-control" type="text"  pattern="^[a-zA-Z0-9]{3,}$" placeholder="Username" required>
          <span class="help-inline with-errors"></span>
        </div>
        <div class="form-group">
          <input class="password form-control" type="password" pattern="^.{3,}$" placeholder="Password" required>
          <span class="help-inline with-errors"></span>
        </div>
        <button type="submit" class="login btn btn-primary">Log in</button>
      </form>
    </div><!--/.navbar-collapse -->
  </div>
</nav>
@endsection
