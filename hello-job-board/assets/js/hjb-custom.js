jQuery(document).ready(function(){
    jQuery('[type="text"],[type="email"],[type="url"],[type="search"],textarea').addClass('form-control');
    jQuery('[type="submit"]').addClass('btn btn-primary');
    jQuery('.hjb-post-job-form').submit(function(){
        alert('Your details submit successfully for review once admin approve you will get notify, thank you');
    });
});