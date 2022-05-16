@extends('ambu_dash_lay')


@section('content')
<form class="modal-content" action="/action_page.php">
    <div class="container">
      <h1>Delete Account</h1>
      <p>Are you sure you want to Deactivate your account?</p>

      <div class="clearfix">
        
        <button type="button" class="deletebtn">Deactivate </button>
      </div>
    </div>
  </form>
@endsection