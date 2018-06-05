
<?php if($this->session->flashdata('noaccess')) : ?>
  <p class="alert alert-dismissable alert-danger text-center"><?php echo $this->session->flashdata('noaccess');?></p>
<?php endif; ?>
		<?php if($this->session->flashdata('login_success')) : ?>
  <p class="alert alert-dismissable alert-success text-center"><?php echo $this->session->flashdata('login_success');?></p>
<?php endif; ?>

<?php if($this->session->flashdata('logged_out')) : ?>
  <p class="alert alert-dismissable alert-success text-center"><?php echo $this->session->flashdata('logged_out');?></p>
<?php endif; ?>
<div class="home-div text-center" style="width:100%">
               <h1>CodeIgniter MVC Pattern</h1>
               <p>A simple codeIgniter application to demonstrate MVC flow pattern</p>
               <hr/>
            </div>
   <h2 class="text-center home-text">Welcome to our awesome app</h2>


