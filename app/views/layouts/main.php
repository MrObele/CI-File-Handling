<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>CodeIgniter File Handling</title>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css"/>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css"/>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/custom.css" />
      <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   </head>
   <body>
      <nav class="navbar navbar-inverse">
         <!-- Brand and toggle get grouped for better mobile display -->
         <div class="container">
            <div class="navbar-header">
               <a class="navbar-brand" id="logo" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/codeigniter.png" class="img img-responsive logoImage"></a>
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav  menu" id ="menu">
                  <?php if($this->session->userdata('logged_in')) : ?>
                  <li><a href="<?php echo base_url('Users/logout'); ?>" class="active">Logout</a></li>
                  <?php endif; ?>
               </ul>
            </div>
            <!-- /.navbar-collapse -->
         </div>
         <!-- /.container-fluid -->
      </nav>
      <div class="container" style="margin: 0 auto;">
         <div class="row">
            
            <div class="col-md-12">
               <!--MAIN CONTENT-->
               <?php $this->load->view($main_content); ?>	
            </div>
            <!--/span9-->
         </div>
         <!--/row-->
         <hr />
         <footer>
           
         </footer>
      </div>
      <!--/fluid-container-->
   </body>
</html>