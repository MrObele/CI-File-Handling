<?php if($this->session->flashdata('upload_success')) : ?>
<p class="alert alert-dismissable alert-success text-center"><?php echo $this->session->flashdata('upload_success');?></p>
<?php endif; ?>
<div class="home-div text-center" style="width:100%">
   <h1>CodeIgniter File Handling</h1>
   <p>A simple codeIgniter application to demonstrate File handling</p>
   <hr/>
</div>
<h2 class="text-center home-text">Welcome to our awesome app</h2>
<a class="navbar-brand" id="upload-link" href="<?php echo base_url(); ?>">Upload another file</a>