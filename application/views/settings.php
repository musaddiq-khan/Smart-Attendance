<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> 
<html lang="en"> 
<!--<![endif]-->
<!-- BEGIN HEAD-->
<head>
    <meta charset="UTF-8" />
    <title><?php echo title;?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <!-- GLOBAL STYLES -->

    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?php echo asset_url();?>plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo asset_url();?>css/main.css" />
    <link rel="stylesheet" href="<?php echo asset_url();?>css/theme.css" />
    <link rel="stylesheet" href="<?php echo asset_url();?>css/MoneAdmin.css" />
    <link rel="stylesheet" href="<?php echo asset_url();?>plugins/Font-Awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo asset_url();?>css/bootstrap-fileupload.min.css" />
    <link rel="stylesheet" href="<?php echo asset_url();?>plugins/wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css" />
    <link rel="stylesheet" href="<?php echo asset_url();?>css/Markdown.Editor.hack.css" />
    <link rel="stylesheet" href="<?php echo asset_url();?>plugins/CLEditor1_4_3/jquery.cleditor.css" />
    <link rel="stylesheet" href="<?php echo asset_url();?>css/jquery.cleditor-hack.css" />
    <link rel="stylesheet" href="<?php echo asset_url();?>css/bootstrap-wysihtml5-hack.css" />
    <script type="text/javascript" src="<?php echo asset_url();?>js/jquery.min.js"></script> 
    <script src="<?php echo asset_url();?>plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
    
    <style type="text/css">
   .redborder { border:  1px solid #bf0000; }
   
   </style>

    <style type="text/css">


        .has-error {
            color: #f50200;
            border-color: #f50015 !important;

            box-shadow: none;
        }
    </style>

    <script>
    	
    $(document).ready(function(){
        CKEDITOR.config.toolbar = [
            { name: 'document', groups: [ 'mode', 'document' ], items: [ 'Source'] },
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline'] },
            { name: 'paragraph', groups: [ 'list', 'indent','align' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'] },
            { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] }

        ];
//    CKEDITOR.config.width="780px";
//    CKEDITOR.config.height="250px";
    });


    </script>
</head>
    <!-- END  HEAD-->
    <!-- BEGIN BODY-->
<body class="padTop53 " >

     <!-- MAIN WRAPPER -->

    <div id="wrap">
         <!-- HEADER SECTION -->
       <?php echo $header;?>
        <!-- END HEADER SECTION -->


        <!-- MENU SECTION -->
       <?php echo $left;?>
        <!--END MENU SECTION -->


        <!--PAGE CONTENT -->
        <div id="content">
        <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12">

            <h2 class="page-header">Settings</h2>
						<div class="col-lg-12">
                            <div class="box">
                                <header>
                                    <div class="icons"><i class="icon-th-large"></i></div>
                                    <h5>Settings</h5>
                                    <div class="toolbar">
                                        <ul class="nav">
                                            <li>
                                                <div class="btn-group">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
								 </header>
                                 
                  <div id="collapseOne" class="accordion-body collapse in body">

                      <form id="form" action="<?php echo base_url().'settings/settings_save';?>" class="form-horizontal"  method="post" enctype="multipart/form-data">
                      <br><br>
                      <?php echo $this->session->flashdata('message');?>


                      <div class="form-group">
                          <label class="control-label col-lg-2">From Email ID<font style="color: red;">*</font></label>
                          <div class="col-lg-4">
                              <input type="email" autocomplete="off" id="fromm" name="fromm" required="" class="form-control" value="<?php echo $settings[0]->from_email;?>">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-lg-2">From Email Password<font style="color: red;">*</font></label>
                          <div class="col-lg-4">
                              <input type="password" id="fromp" autocomplete="new-password" name="fromp" required="" class="form-control" value="<?php echo $settings[0]->email_password;?>">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-lg-2">Mail Subject<font style="color: red;">*</font></label>
                          <div class="col-lg-4">
                              <input type="text" id="mail_subj" name="mail_subj" required="" class="form-control" value="<?php echo $settings[0]->email_subject;?>">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-lg-2">Variables List</label>
                      <div class="col-lg-7">
                          <div class="alert alert-info alert-dismissable">
                              <strong>Variables List For Mail Body Text</strong>

                              <ul>

                                  <li>[PROF_NAME] -> Professor Name</li>
                                  <li>[PROF_EMAIL] -> Professor Email</li>
                                  <li>[PROF_DESIG] -> Professor Designation</li>
                                  <li>[PROF_DEPT] -> Professor Department</li>
                                  <li>[EXAM_ID] -> Exam Month & Year</li>
                              </ul>

                              <br>
                              <strong>Variables List For SMS Body Text</strong>

                              <ul>

                                  <li>[PROF_NAME] -> Professor Name</li>
                                  <li>[PROF_EMAIL] -> Professor Email</li>
                                  <li>[PROF_DESIG] -> Professor Designation</li>
                                  <li>[PROF_DEPT] -> Professor Department</li>
                                  <li>[EXAM_ID] -> Exam Month & Year</li>
                                  <li>[DATE] -> Exam Date</li>
                                  <li>[M_START_TIME] -> Morning Exam Starting Time</li>
                                  <li>[M_END_TIME] -> Morning Exam Ending Time</li>
                                  <li>[A_START_TIME] -> Afternoon Exam Starting Time</li>
                                  <li>[A_END_TIME] -> Afternoon Exam Starting Time</li>
                                  <li>[M_DESIGNATION] -> Morning Exam Professor Designation</li>
                                  <li>[A_DESIGNATION] -> Afternoon Exam Professor Designation</li>

                              </ul>


                          </div>
                          </div>
                          </div>

                      <div class="form-group">
                          <label class="control-label col-lg-2">Mail Body Text<font style="color: red;">*</font></label>
                          <div class="col-lg-7">
                              <textarea required="required" rows="5" cols="5" id="mb_text" name="mb_text" class="form-control ckeditor"><?php echo $settings[0]->email_text;?></textarea>
                              <label for="mb_text" class="has-error"></label>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-lg-2">SMS Body Text<font style="color: red;">*</font></label>
                          <div class="col-lg-7">
                              <textarea required="required" rows="5" cols="5" id="sms_text" name="sms_text" class="form-control ckeditor"><?php echo $settings[0]->msg_text;?></textarea>
                              <label for="sms_text" class="has-error"></label>
                          </div>
                          <div class="col-lg-3">
                              <div class="alert alert-info alert-dismissable"><strong>Note:</strong> You have to use both morning & afternoon variables</div>

                          </div>
                      </div>

                          <div class="form-group">
                              <label class="control-label col-lg-2">Report Header Text<font style="color: red;">*</font></label>
                              <div class="col-lg-7">
                                  <textarea required="required" rows="5" cols="5" id="rp_text_head" name="rp_text_head" class="form-control ckeditor"><?php echo $settings[0]->rp_text_head;?></textarea>
                                  <label for="rp_text_head" class="has-error"></label>
                              </div>
                          </div>

                      <div class="form-group">
                          <label class="control-label col-lg-2">Report Note Text<font style="color: red;">*</font></label>
                          <div class="col-lg-7">
                              <textarea required="required" rows="5" cols="5" id="rp_text" name="rp_text" class="form-control ckeditor"><?php echo $settings[0]->rp_note_text;?></textarea>
                              <label for="rp_text" class="has-error"></label>
                          </div>
                      </div>

                          <div class="form-group">
                              <label class="control-label col-lg-2">RS Priority (Max Duty)<font style="color: red;">*</font></label>
                              <div class="col-lg-4">
                                  <input type="text" id="rs_max" name="rs_max" required="" class="form-control onlynumbers" value="<?php echo $settings[0]->rs_priority_duty;?>">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="control-label col-lg-2">RLS Priority (Max Duty)<font style="color: red;">*</font></label>
                              <div class="col-lg-4">
                                  <input type="text" id="rls_max" name="rls_max" required="" class="form-control onlynumbers" value="<?php echo $settings[0]->rls_priority_duty;?>">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="control-label col-lg-2">DS Priority (Max Duty)<font style="color: red;">*</font></label>
                              <div class="col-lg-4">
                                  <input type="text" id="ds_max" name="ds_max" required="" class="form-control onlynumbers" value="<?php echo $settings[0]->ds_priority_duty;?>">
                              </div>
                          </div>


                          <div class="form-group">
                              <label class="control-label col-lg-2">RS Remuneration<font style="color: red;">*</font></label>
                              <div class="col-lg-4">
                                  <input type="text" id="rs_rem" name="rs_rem" required="" class="form-control onlynumbers" value="<?php echo $settings[0]->rs_remuneration;?>">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="control-label col-lg-2">RLS Remuneration<font style="color: red;">*</font></label>
                              <div class="col-lg-4">
                                  <input type="text" id="rls_rem" name="rls_rem" required="" class="form-control onlynumbers" value="<?php echo $settings[0]->rls_remuneration;?>">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="control-label col-lg-2">DS Remuneration<font style="color: red;">*</font></label>
                              <div class="col-lg-4">
                                  <input type="text" id="ds_rem" name="ds_rem" required="" class="form-control onlynumbers" value="<?php echo $settings[0]->ds_remuneration;?>">
                              </div>
                          </div>


                

                                    

                                                                                                              
                                     <div class="form-actions no-margin-bottom" style="text-align:center;">
                                     <label class="control-label col-lg-2"></label>
                                        <div class="col-lg-4">
                                        <span id='error' style="width: 50%;"></span> 
                                        </div>
                                         <br><br>
                                         <a href="<?php echo base_url() . 'dutyadmin'; ?>"
                                            class="btn btn-primary btn-sm"><i class="icon-reply "></i> Back</a>
                                        &nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-success btn-sm "><i class="icon-save "></i> Save Changes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
              </div>

                </div>

                <hr />
            </div>
        </div>

       <!--END PAGE CONTENT -->
    </div>

     <!--END MAIN WRAPPER -->

   <!-- FOOTER -->

     <div id="footer">
         <p> <?php echo fottertitle; ?> </p>
     </div>

    <!--END FOOTER -->

     <!-- GLOBAL SCRIPTS -->

     <script src="<?php echo asset_url();?>plugins/bootstrap/js/bootstrap.min.js"></script>

    <script src="<?php echo asset_url();?>plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- END GLOBAL SCRIPTS -->

     <script src="<?php echo asset_url();?>plugins/validationengine/js/jquery.validationEngine.js"></script>

    <script src="<?php echo asset_url();?>plugins/validationengine/js/languages/jquery.validationEngine-en.js"></script>

    <script src="<?php echo asset_url();?>plugins/jquery-validation-1.11.1/dist/jquery.validate.min.js"></script>


     <script>
         $("#form").validate({
             ignore: [],
             errorClass: "has-error",
             rules: {

                 mb_text: {
                     required: function () {
                         CKEDITOR.instances.mb_text.updateElement();
                         $("#mb_text").focus();
                     }
                 },

                 rp_text: {
                     required: function () {
                         CKEDITOR.instances.rp_text.updateElement();
                         $("#rp_text").focus();
                     }
                 },

                 sms_text: {
                     required: function () {
                         CKEDITOR.instances.sms_text.updateElement();
                         $("#sms_text").focus();
                     }
                 },

                 rp_text_head: {
                     required: function () {
                         CKEDITOR.instances.rp_text_head.updateElement();
                         $("#rp_text_head").focus();
                     }
                 }
             }
         });
     </script>

    
</body>
    <!-- END BODY-->
</html>