<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD-->
<head>

    <meta charset="UTF-8"/>
    <title><?php echo title; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?php echo asset_url(); ?>plugins/bootstrap/css/bootstrap.css"/>

    <link rel="stylesheet" href="<?php echo asset_url(); ?>css/jquery.timepicker.min.css"/>
    <link rel="stylesheet" href="<?php echo asset_url(); ?>css/jquery-ui.css"/>
    <link rel="stylesheet" href="<?php echo asset_url(); ?>css/main.css"/>
    <link rel="stylesheet" href="<?php echo asset_url(); ?>css/theme.css"/>
    <link rel="stylesheet" href="<?php echo asset_url(); ?>css/MoneAdmin.css"/>
    <link rel="stylesheet" href="<?php echo asset_url(); ?>plugins/Font-Awesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="<?php echo asset_url(); ?>css/bootstrap-fileupload.min.css"/>
    <link rel="stylesheet" href="<?php echo asset_url(); ?>plugins/wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css"/>
    <link rel="stylesheet" href="<?php echo asset_url(); ?>css/Markdown.Editor.hack.css"/>
    <link rel="stylesheet" href="<?php echo asset_url(); ?>plugins/CLEditor1_4_3/jquery.cleditor.css"/>
    <link rel="stylesheet" href="<?php echo asset_url(); ?>css/jquery.cleditor-hack.css"/>
    <link rel="stylesheet" href="<?php echo asset_url(); ?>css/bootstrap-wysihtml5-hack.css"/>
    <script type="text/javascript" src="<?php echo asset_url(); ?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo asset_url(); ?>js/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo asset_url(); ?>js/jquery.timepicker.min.js"></script>
    <link rel="stylesheet" href="<?php echo asset_url();?>css/animate.css" />



    <style type="text/css">
        .mininwidth {
            width: 120px;
        }

        .mininwidth1 {
            width: 80px;
        }
        /*.ui-timepicker-viewport{*/
            /*display: none;*/
        /*}*/

        #p{
            cursor: -webkit-grab;
        }

    </style>
    <script>
        $( document ).ready(function() {
            $("html").find(".ui-timepicker-container").show();
            $("html").find(".ui-menu-item").hide();
            $(".ui-menu-item").each(function(){
                alert("");
                var time = $(this).find("a").text();
                if(time == "9:00 AM" || time == "1:30 PM" || time == "1:15 PM" || time == "8:45 AM" || time == "8:30 AM" || time == "1:00 PM" || time == "9:15 AM"){
                    $(this).show();
                }
            });
        });
    </script>
</head>
<!-- END  HEAD-->
<!-- BEGIN BODY-->
<body class="padTop53 ">

<!-- MAIN WRAPPER -->
<div id="wrap">


    <!-- HEADER SECTION -->
    <?php echo $header; ?>
    <!-- END HEADER SECTION -->


    <!-- MENU SECTION -->
    <?php echo $left; ?>
    <!--END MENU SECTION -->


    <!--PAGE CONTENT -->
    <div id="content">
        <div class="inner" style="min-height:1200px;">
            <div class="row">
                <div class="col-lg-12">

                    <h2 class="page-header">STUDENT</h2>
                    <?php if ($type == 'edit'): ?>


                        <div class="col-lg-12">
                            <div class="box">
                                <header>
                                    <div class="icons"><i class="icon-th-large"></i></div>
                                    <h5>Edit Student</h5>

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
                                    <form action="<?php echo base_url() . 'master/student_edit_save'; ?>"
                                          class="form-horizontal timeForm" id="brand-validate" method="post">

                                        <input type="hidden" value="<?php echo $std_data[0]->id;?>" name="edit_id" class="edit_id">

                                        <br><br>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Student Name<font style="color: red;">*</font></label>
                                            <div class="col-lg-3">
                                                <input type="text" id="std_name" name="std_name" required="" class="form-control" value="<?php echo $std_data[0]->name;?>">
                                                <label id="ex_id_msg" style="color: red;"></label>
                                            </div>
                                        </div>





                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Semester</label>
                                            <div class="col-lg-4">
                                                <select name="sem" class="form-control" required="">

                                                    <option value="">--select--</option>
                                                    <option value="1" <?php if($std_data[0]->sem == 1) echo "selected" ;?>>1st sem</option>
                                                    <option value="2" <?php if($std_data[0]->sem == 2) echo "selected" ;?>>2nd sem</option>
                                                    <option value="3" <?php if($std_data[0]->sem == 3) echo "selected" ;?>>3rd sem</option>
                                                    <option value="4" <?php if($std_data[0]->sem == 4) echo "selected" ;?>>4th sem</option>
                                                    <option value="5" <?php if($std_data[0]->sem == 5) echo "selected" ;?>>5th sem</option>
                                                    <option value="6" <?php if($std_data[0]->sem == 6) echo "selected" ;?>>6th sem</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-actions no-margin-bottom" style="text-align:center;">
                                            <a href="<?php echo base_url() . 'master/timetable'; ?>"
                                               class="btn btn-primary btn-sm"><i class="icon-reply "></i> Back</a>&nbsp;&nbsp;&nbsp;
                                            <button type="submit" class="btn btn-success btn-sm "><i
                                                    class="icon-save "></i> Save
                                            </button>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>

                    <?php else: ?>

                    <div class="col-lg-12">
                        <div class="box">
                            <header>
                                <div class="icons"><i class="icon-th-large"></i></div>
                                <h5>ADD STUDENT</h5>

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
                                <form action="<?php echo base_url() . 'master/student_save'; ?>"
                                      class="form-horizontal timeForm" id="brand-validate" method="post">
                                    <br><br>
                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Student Name <font style="color: red;">*</font></label>
                                        <div class="col-lg-3">
                                            <input type="text" id="std_name" name="std_name" required="" class="form-control">
                                            <label id="std_name_msg" style="color: red;"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Semester</label>
                                        <div class="col-lg-4">
                                            <select name="sem" class="form-control" required="">
                                                <option value="">--select--</option>
                                                <option value="1">1st sem</option>
                                                <option value="2">2nd sem</option>
                                                <option value="3">3rd sem</option>
                                                <option value="4">4th sem</option>
                                                <option value="5">5th sem</option>
                                                <option value="6">6th sem</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-actions no-margin-bottom" style="text-align:center;">
                                        <a href="<?php echo base_url() . 'master/timetable'; ?>"
                                           class="btn btn-primary btn-sm"><i class="icon-reply "></i> Back</a>&nbsp;&nbsp;&nbsp;
                                        <button type="submit"  class="btn btn-success btn-sm "><i
                                                class="icon-save "></i> Save
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>


                        <?php endif; ?>
                    </div>
                </div>

                <hr/>


            </div>

        </div>
        <!--END PAGE CONTENT -->


    </div>
    </div>


    <!--END MAIN WRAPPER -->

    <!-- FOOTER -->
    <div id="footer">
        <p> <?php echo fottertitle; ?> </p>
    </div>
    <!--END FOOTER -->
    <!-- GLOBAL SCRIPTS -->
    <script src="<?php echo asset_url(); ?>plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo asset_url(); ?>plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->


    <script src="<?php echo asset_url(); ?>plugins/validationengine/js/jquery.validationEngine.js"></script>
    <script src="<?php echo asset_url(); ?>plugins/validationengine/js/languages/jquery.validationEngine-en.js"></script>
    <script src="<?php echo asset_url(); ?>plugins/jquery-validation-1.11.1/dist/jquery.validate.min.js"></script>


    <?php echo $jsfile;?>

</body>
<!-- END BODY-->

</html>
