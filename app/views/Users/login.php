		
<!--Start Form-->

<div class="well middle-form">
	<?php if($this->session->flashdata('user_signup')) : ?>
  <p class="alert alert-dismissable alert-success text-center"><?php echo $this->session->flashdata('user_signup');?></p>
<?php endif; ?>
<?php if($this->session->flashdata('login_failed')) : ?>
  <p class="alert alert-dismissable alert-danger text-center"><?php echo $this->session->flashdata('login_failed');?></p>
<?php endif; ?>
<h3>Login</h3>
<?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
  <?php $attributes = array(
  	'id'      => 'login_form',
  	'class'   => 'form-horizontal', 
  	'style'   => 'width: 300px; margin: 0 auto;'
    );?>
<?php echo form_open('Users/login',$attributes); ?>
<p>
	<?php echo form_label('Username:');?>
	<?php
	 $data  = array(
	 	'name'        => 'username', 
	 	'placeholder' => 'Enter Username', 
	 	'style'       =>'width:90%', 
	 	'value'       => set_value('username'),
	 	'class' => 'form-control'
	 	);
	 ?>
	 <?php echo form_input($data); ?>
</p>
<p>
	<?php echo form_label('Password:');?>
	<?php
	 $data  = array(
	 	'name'        => 'password', 
	 	'placeholder' => 'Enter Password', 
	 	'style'       => 'width:90%', 
	 	'value'       => set_value('password'),
	 	'class'       => 'form-control'
	 	);
	 ?>
	 <?php echo form_password($data); ?>
</p>

<p>

	<?php
	 $data    = array(
	 'name'   => 'submit',
	 'class'  => 'btn btn-primary', 
	 'value'  => 'login');
	 ?>
	 <?php echo form_submit($data); ?>
</p>
<p>Not registered? <a href="<?php echo base_url('Signup'); ?>">Sign Up</a>
</p>
<?php echo form_close(); ?>
</div>