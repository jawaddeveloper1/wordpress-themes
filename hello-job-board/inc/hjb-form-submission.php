<?php 

if(isset($_POST['jsubmitbtn'])){
  if(!empty($_POST)){
    $jb_fullname = stripslashes($_POST['ufullname']);
    $jb_email = $_POST['uemail'];
    $job_title = stripslashes($_POST['jtitle']);
    $job_description = stripslashes($_POST['jdescription']);
    $job_type = $_POST['jjobtype'];
    $job_category = $_POST['jcategory'];
    $job_location = $_POST['jlocation'];
    $job_budgetfrom = stripslashes($_POST['jbudgetfrom']);
    $job_budgetto = stripslashes($_POST['jbudgetto']);
    $job_budget = $_POST['jbudget'];
    $job_howtoapply = $_POST['jhowtoapply'];
    $job_howtoapply_link = $_POST['jhowtoapply_link'];
        
    $job_args = array(
      'post_title' => $job_title,
      'post_content' => $job_description,
      'post_type' => 'hello-job',
      'post_status' => 'pending',
      'comment_status' => 'closed',
      'ping_status' => 'closed'
    );
  
    $jid = wp_insert_post($job_args);
  
    update_post_meta($jid, 'ufullname', $jb_fullname);
    update_post_meta($jid, 'uemail', $jb_email);
  
    update_post_meta($jid, 'jjobtype', $job_type);
    update_post_meta($jid, 'jbudgetfrom', $job_budgetfrom);
    update_post_meta($jid, 'jbudgetto', $job_budgetto);
    update_post_meta($jid, 'jbudget', $job_budget);
    update_post_meta($jid, 'jhowtoapply', $job_howtoapply);
    update_post_meta($jid, 'jhowtoapply_link', $job_howtoapply_link);
  
    wp_set_object_terms($jid, $job_category, 'job-category');
    wp_set_object_terms($jid, $job_location, 'job-country');
  
    $site_email = get_option('admin_email');
          
    $to = $site_email;
    $subject = "New Job Post";
    $header = array('Content-Type: text/html; charset=UTF-8');
    
    $body = "<h3>User Details</h3>";
    $body .= "<p><b>Full Name: </b>".$jb_fullname."</p>";
    $body .= "<p><b>Email: </b>".$jb_email."</p>";
    $body .= "<h3>Job Details</h3>";
    $body .= "<p><b>Title: </b>".$job_title."</p>";
    $body .= "<p><b>Type: </b>".$job_type."</p>";
    if(!empty($job_location)){
        $body .= "<p><b>Location </b>".$job_location."</p>";
    }	
    $body .= "<a href='".site_url()."/wp-admin/post.php?post=$jid&action=edit'>View Job Post Details & Approve It</a>";
    wp_mail($to, $subject, $body, $header); ?>
    <?php 
   }	  
  }