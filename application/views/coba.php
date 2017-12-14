<?php 
if($this->session->flashdata('info')):
  echo $this->session->flashdata('info'); 
endif;
?>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
          
            <div class="row">
              <div class="container" style="max-width: 500px !important; margin: 0 auto;">
              </div>
            </div>


            <div class="row">
              <div class="container" style="max-width: 500px !important; margin:0 auto">
                <div class="col-sm-12">
                	<?php echo validation_errors(); ?>
                </div>
              </div>
            </div>

            <?php echo form_open(base_url().'index.php/validation/validate','',$hidden=array()); ?>
            <div class="row">
              <div class="container">
                <div class="col-sm-12">

                  <?php echo form_label('Firstname', 'firstname', $attributes=array("class"=>"col-sm-12"));?>
                  <?php echo form_input('firstname', set_value('firstname'), $attributes=array("class"=>"form-control", "id"=>"firstname")); ?>
                </div>

                <div class="form-group">
                  <?php echo form_label('Second name', 'secondname', $attributes=array("class"=>"col-sm-12"));?>
                  <?php echo form_input('secondname', set_value('secondname'),$attributes=array("class"=>"form-control", "id"=>"secondname"));?>
                </div>

                <div class="form-group">
                  <?php echo form_label('Gender', 'gender', $attributes=array("class"=>"col-sm-12")); ?>
                  <?php $option = array(
                    ""=>"Choose gender",
                    "male"=>"Male",
                    "female"=>"Female"
                    );
                  ?>
                  <?php echo form_dropdown('gender', $option,set_value('gender'), array("class"=>"form-control input-lg", "id"=>"gender")); ?>

                </div>

                <div class="form-group">

                	<?php echo form_label('How did you here about us?','',$attributes=array());?>
	                
	                <div class="checkbox">
	                	<label>
	                		<?php echo form_checkbox("how_did_you_here[]", "Search engine", set_checkbox("how_did_you_here[]", "Search engine")); ?> Search Engine
	                	</label>
	                </div>


	                <div class="checkbox">
	                	<label>
	                		<?php echo form_checkbox("how_did_you_here[]", "News Paper Advertisement", set_checkbox("how_did_you_here[]", "News Paper Advertisement")); ?> News Paper Advertisement
	                	</label>
	                </div>


	                <div class="checkbox">
	                	<label>
	                		<?php echo form_checkbox("how_did_you_here[]", "Social network", set_checkbox("how_did_you_here[]", "Social network")); ?> Social network
	                	</label>
	                </div>


	                <div class="checkbox">
	                	<label>
	                		<?php echo form_checkbox("how_did_you_here[]", "Forum and blog", set_checkbox("how_did_you_here[]", "Forum and blog")); ?> Forum and blog
	                	</label>
	                </div>

	            </div>
	            
	            <div class="form-group">    
	            	<?php echo form_label('Prefered contact type ?','',$attributes=array());?>
	                
	                 <div class="radio">
	                	<label>
	                		<?php echo form_radio("preferrded_contact_type[]", "E-mail", set_checkbox("how_did_you_here[]", "Email")); ?> E-mail
	                	</label>
	                </div>
	                 
	                 <div class="radio">
	                	<label>
	                		<?php echo form_radio("preferrded_contact_type[]", "Telephone", set_checkbox("how_did_you_here[]", "Telephone")); ?> Telephone
	                	</label>
	                </div>

	                <div class="radio">
	                	<label>
	                		<?php echo form_radio("preferrded_contact_type[]", "By post", set_checkbox("how_did_you_here[]", "By post")); ?> By Post
	                	</label>
	                </div>
	        	</div>    

                <div class="form-group">
                	<?php echo form_label('Message', 'message', $attributes=array());?>

                	<?php echo form_textarea('message', set_value('message'), array("class"=>"form-control-input-lg","id"=>"message"));?>
                </div>


                <div class="form-group">
       
                	<?php echo form_submit('submit', 'Submit', array("class"=>"btn-primary btn-lg", "id"=>"submit"));
                	?>
               </div>


              </div>
            </div>
            <?php echo form_close(); ?>  
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

