<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>
<body <?php body_class( $class ); ?>>
<?php wp_body_open(); ?>
   <div class="container-fluid">
    <div class="row hjb-header my-3">
        <div class="col-2 col-md-2 pt-1">
            <?php echo get_custom_logo(); ?>
        </div>
        <div class="col-6 col-md-8">
        <nav class="navbar navbar-expand-md justify-content-md-center  justify-content-end" id="sidenav" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#hjb-navbar-collapse" aria-controls="hjb-navbar-collapse">
        <span class="navbar-toggler-icon"></span>
        </button>
            <?php
            wp_nav_menu( array(
                'theme_location'    => 'primary-menu',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse justify-content-center',
                'container_id'      => 'hjb-navbar-collapse',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker(),
            ) );
            ?>
        </nav>
        </div>
        <div class="col-4 col-md-2 pt-2">
            <div class="modal" id="hjb-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                        <form method="POST" class="hjb-post-job-form" enctype="multipart/form-data">
                        <h4>Job Poster Information</h4>
                        <p>(That information not publicly displayed)</p>
                        <label>Full Name*</label>
                        <input type="text" class="form-control" name="ufullname" placeholder="Alex" required>
                        <label>Email*</label>
                        <input type="email" class="form-control" name="uemail" placeholder="info@example.com" required>
                        <h4 class="mt-5">Enter Job Details</h4>    
                        <label>Title*</label>
                        <input type="text" class="form-control" name="jtitle" placeholder="WordPress Developer" required>
                        <label>Description*</label>
                        <?php 
                       $jdescription_editor_args = array(
                            'tinymce'       => array(
                                'toolbar1'      => 'bold,italic,underline,bullist,numlist',
                                'toolbar2'      => '',
                            ),
                            'media_buttons' => false,
                        );
                        wp_editor('','jdescription_editor', $jdescription_editor_args); ?>
                        <label>Job Category</label>
                        <select class="form-control" name="jcategory">
                        <?php 
                        $jcategory_taxomony = get_terms( array(
                            'taxonomy'   => 'job-category',
                            'hide_empty' => false
                        ) );
						if(!$jcategory_taxomony == ''){
                        foreach($jcategory_taxomony as $jcategorytax){
                            echo '<option value="'.$jcategorytax->name.'">'.$jcategorytax->name.'</option>';
						}	
						}else{
						?><option value="None">None</option>
						<?php } ?>
                        </select>
                        <label>Job Type*</label>
                        <select class="form-control" name="jjobtype" required>
                           <option value="Part Time">Part Time</option>     
                           <option value="Full Time">Full Time</option>  
                           <option value="Project Based">Project Based</option>  
                        </select>
                        <label>Location</label>
                        <select class="form-control" name="jlocation">
                        <?php 
                        $jcountry_taxomony = get_terms( array(
                            'taxonomy'   => 'job-country',
                            'hide_empty' => false
                        ) );
						if(!$jcountry_taxomony == ''){
                        foreach($jcountry_taxomony as $jcountrytax){
                            echo '<option value="'.$jcountrytax->name.'">'.$jcountrytax->name.'</option>';
						}	
						}else{
						?><option>None</option>
						<?php } ?>
                        </select>
                        <label>Budget (US Dollar & if your budget is fixed then please just fillup the first field)</label>
                        <div class="row">
                        <div class="col-md-4">
                        <input type="number" class="form-control" name="jbudgetfrom" placeholder="20000">
                        </div>   
                        <div class="col-md-4">
                        <input type="number" class="form-control" name="jbudgetto" placeholder="30000">
                        </div>   
                        <div class="col-md-4">
                        <select class="form-control" name="jbudget">
                           <option value="Per Week">Per Week</option>     
                           <option value="Per Month">Per Month</option>  
                           <option value="Per Year">Per Year</option>  
                        </select>
                        </div>   
                        </div>
                        <label>How To Apply*</label>
                        <select class="form-control" name="jhowtoapply" required>
                           <option value="Email">Email</option>     
                           <option value="Phone">Phone</option>  
                           <option value="Custom Link">Custom Link</option>  
                        </select>
                        <label>For example if you choose "Email" from above "How To Apply" options then please enter email address</label>
                        <input type="text" class="form-control" name="jhowtoapply_link" required>
                        <input type="submit" class="btn btn-success mt-4" name="jsubmitbtn">
                        </form>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#hjb-modal">Post a Job</button>
        </div>
    </div>

<?php 

/* Form Submission */
require get_template_directory() .'/inc/hjb-form-submission.php';