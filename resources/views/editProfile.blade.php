@extends('layout.app')
@section('title', 'Edit profile')
@section('link_text', 'Go to All Posts')
@section('link', '/post')
@section('profile_text', 'Profile')
@section('profileLink', '/Profile')
@section('logout_text', 'Logout')
@section('logoutLink', '/logout')

@section('content')

<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">Edit Profile</h1>
      <hr>
	<div class="row">
      <div class="col-md-9 personal-info">
        <h3>Personal info</h3>
        
        <form action="{{route('update-user')}}" method="post">
        @csrf
          <div class="form-group">
            <label class="col-lg-3 control-label">Name:</label>
            <div class="col-lg-8">
              <input class="form-control" name="name" type="text" 
              value="<?php echo $results[0]->name;?>"  placeholder="Enter Name">
            </div>
            <span class="text-danger">@error('name') {{$message}} @enderror</span>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Surname:</label>
            <div class="col-lg-8">
              <input class="form-control" name="surname" type="text" 
              value="<?php echo $results[0]->surname;?>" placeholder="Enter Surname">
            </div>
            <span class="text-danger">@error('surname') {{$message}} @enderror</span>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Adress line:</label>
            <div class="col-lg-8">
                <input class="form-control" name="adress_line" type="text" 
                value="<?php echo $results[0]->adressLine;?>" placeholder="Enter Adress line">
            </div>
          </div>
          <div class="form-group">
            <label for="city" class="col-lg-3 control-label">City:</label>
            <div class="col-lg-8">
            <select name="city" id="city">
              <option value="" disabled selected hidden>Choose City...</option>
                <?php
                foreach ($results['Cities'] as $city)
                {
                  //print_r($city); ?>
                  <option value="<?php echo $city->id;?>" 
                  <?php 
                  if($city->id == $results[0]->city_id )
                  { echo 'selected';
                  } ?> >
                  <?php echo $city->city; ?> </option>
                  <?php }
                
                //print_r($results);
                ?>
            </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Country:</label>
            <div class="col-lg-8">
            <select name="country" id="country">
              <option value="" disabled selected hidden>Choose Country...</option>
              <?php
                foreach ($results['Countries'] as $country)
                {
                  //print_r($country); ?>
                  <option value="" 
                  <?php 
                  if($country->id == $city->country_id )
                  { 
                    echo 'selected';
                    } ?> >
                    <?php 
                    echo $country->country_name;
                     ?> </option>
                  <?php 
                } ?>
            </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Gender:</label>
            <div class="col-lg-8">
              <!--<input class="form-control" type="text">-->
              <input type="radio" id="Male" name="gender" value="M" <?php 
              if($results[0]->gender == 'M')
              { 
                echo 'checked="checked"';
                } ?>>
              <label for="html">Male</label><br>
              <input type="radio" id="Female" name="gender" value="F" <?php 
              if($results[0]->gender == 'F')
              { 
                echo 'checked="checked"';
                } ?>>
              <label for="css">Female</label><br>
              <input type="radio" id="Other" name="gender" value="O" <?php 
              if($results[0]->gender == 'O')
              { 
                echo 'checked="checked"';
                } ?>>
              <label for="javascript">Other</label>
            </div>
          </div>
          <div class="form-group">
              <button class="btn btn-block btn-primary" type="submit">Save changes</button>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
@endsection