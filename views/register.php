<h1>create an account</h1>

<form action="" method="post">
  <div class="row">
    <div class="col">
      <div class="form-group">
    <label>Firstname</label>
    
    <input type="text" name="firstname" class="form-control<?php if($model->errors['firstname']){echo " is-invalid";}?>">
    <div class="invalid-feedback"><?php $error = $model->errors['firstname']; foreach($error as $key => $value){echo $value;}; ?></div> 
  </div>
  </div>
    <div class="col"> 
      <div class="form-group">
    <label>Lastname</label>
    <input type="text" name="lastname" class="form-control">
  </div>
</div>
</div>
  <div class="form-group">
    <label>Email</label>
    <input type="text" name="email" class="form-control<?php if($model->errors['email']){echo " is-invalid";}?>">
    <div class="invalid-feedback"><?php $error = $model->errors['email'];  foreach($error as $key => $value){echo $value;};?></div> 
  </div>
  <div clas="form-group">
    <label>password</label>
    <input type="password" name="password" class="form-control">
  </div>
  <div clas="form-group">
    <label>confirm password</label>
    <input type="password" name="confirmpassword" class="form-control">
  </div>
  <div class="form-group">
   </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>