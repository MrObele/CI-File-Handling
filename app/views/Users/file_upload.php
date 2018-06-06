<div class="well" style="width:301px;text-align: center">
<h1>File Upload</h1>
<p style="font-size:19px;">Kindly select a file to upload</p>
<!--Display Errors-->

<?php if($this->session->flashdata('upload_failed')) : ?>
  <p class="alert alert-dismissable alert-success text-center"><?php echo $this->session->flashdata('upload_failed');?></p>
<?php endif; ?>

<?php if($this->session->flashdata('image_error')) : ?>
  <p class="alert alert-dismissable alert-danger text-center"><?php echo $this->session->flashdata('image_error');?></p>
<?php endif; ?>

<?php $attributes = array('id' => 'login_form','class'=> 'form-horizontal','enctype'=>'multipart/form-data','role'=>'form');?>
<?php echo form_open('Upload/uploadFile',$attributes); ?>

<!--field: Document -->
<p>
    <?php echo form_label('Document: '); ?>
	<br /><em style="color:red;">*Allowed file types doc, docx, pdf, jpg, jpeg, png (max size: 1mb)*</em>
    <?php
    $data = array(
        'name'  => 'document',
        'type' => 'file',
        'class' => 'form_control'
        );

        ?>
        <?php echo form_input($data); ?>
</p>
<!--field: Submit Buttons-->
<p>
	<?php
	$data = array(
		'name'  => 'submit',
		'value' => 'Upload',
		'class' => 'btn'
		);

		?>
		<?php echo form_submit($data); ?>
</p>

<?php echo form_close(); ?>
</div>