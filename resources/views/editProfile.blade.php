@extends('layout.app')
@section('title', 'Dashboard')
@section('link_text', 'Go to All Posts')
@section('link', '/post')

@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">Edit Profile</h1>
      <hr>
	<div class="row">
      <div class="col-md-9 personal-info">
        <h3>Personal info</h3>
        
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">Name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Surname:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">City:</label>
            <div class="col-lg-8">
            <select name="city" id="city">
                <!--<option value="free">Free</option>
                <option value="starter" selected>Starter </option>
                <option value="professional">Professional</option>
                <option value="corporate">Corporate</option>-->
                <?php
                //print_r($data);
                ?>
            </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Country:</label>
            <div class="col-lg-8">
            <select name="country" id="country">
                <!--<option value="free">Free</option>
                <option value="starter" selected>Starter </option>
                <option value="professional">Professional</option>
                <option value="corporate">Corporate</option>-->
                <?php
                //print_r($data);
                ?>
            </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Gender:</label>
            <div class="col-lg-8">
              <!--<input class="form-control" type="text">-->
              <select name="gender" id="gender">
                <!--<option value="free">Free</option>
                <option value="starter" selected>Starter </option>
                <option value="professional">Professional</option>
                <option value="corporate">Corporate</option>-->
                <?php
                //print_r($data);
                ?>
            </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Adress line:</label>
            <div class="col-lg-8">
                <input class="form-control" type="text">
            </div>
          </div>
          <div class="col-sm-6 col-md-8">
            <br>
            <a href="dashboard" class="btn btn-primary rounded-pill">Save changes</a>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
@endsection