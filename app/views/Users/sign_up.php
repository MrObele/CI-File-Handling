<div class="well" style="width:304px;text-align: center">
	<?php if($this->session->flashdata('user_signup_error')) : ?>
  <p class="alert alert-dismissable alert-success text-center"><?php echo $this->session->flashdata('user_signup_error');?></p>
<?php endif; ?>
<?php if($this->session->flashdata('user_exist')) : ?>
  <p class="alert alert-dismissable alert-danger text-center"><?php echo $this->session->flashdata('user_exist');?></p>
<?php endif; ?>
<h1>Sign Up</h1>
<p>Please fill out the form below to create an account</p>
<!--Display Errors-->
<?php if($this->session->flashdata('image_error')) : ?>
  <p class="alert alert-dismissable alert-danger text-center"><?php echo $this->session->flashdata('image_error');?>
  </p>
<?php endif; ?>
<?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
<?php $attributes = array('id' => 'login_form','class'=> 'form-horizontal','enctype'=>'multipart/form-data','role'=>'form');?>
<?php echo form_open('Users/createUser',$attributes); ?>

<!--field: Username-->
<p>
	<?php echo form_label('Username:'); ?>
	<?php
	$data = array(
		'name'  => 'username',
		'value' => set_value('username'),
		'class' => 'form-control'
		);

		?>
		<?php echo form_input($data); ?>
</p>

<!--field: File -->
<p>
    <?php echo form_label('Document: '); ?>
    <?php
    $data = array(
        'name'  => 'document',
        'type' => 'file',
        'class' => 'form_control'
        );

        ?>
        <?php echo form_input($data); ?>
</p>

<!--field: Password-->
<p>
	<?php echo form_label('Password:'); ?>
	<?php
	$data = array(
		'name'  => 'password',
		'value' => set_value('password'),
		'class' => 'form-control'
		);

		?>
		<?php echo form_password($data); ?>
</p>


<!--field: Confirm Password-->
<p>
	<?php echo form_label('Confirm Password:'); ?>
	<?php
	$data = array(
		'name'  => 'password2',
		'value' => set_value('password'),
		'class' => 'form-control'
		);

		?>
		<?php echo form_password($data); ?>
</p>
<!--field: Submit Buttons-->
<p>
	<?php
	$data = array(
		'name'  => 'submit',
		'value' => 'Sign Up',
		'class' => 'btn btn-primary'
		);

		?>
		<?php echo form_submit($data); ?>
</p>
<p>Already registered? <a href="<?php echo base_url('Login'); ?>">Login</a>
</p>

<?php echo form_close(); ?>
</div>