<?php

if($this->session->userdata('BMSAdmin')){
    $det=$this->home_db->getdetails($this->session->userdata('BMSAdmin'));
    if($det[0]->login_type != "US"){
        $disabled = "false";
    } else {
        $disabled = "true";
    }
}

function getDateTag($date){


    $dates = date('Y-m-d', strtotime($date));
    $converted = date_create($dates);
    $dateTag = date_format($converted,"d_M_Y");
    return $dateTag;
}

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

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
    <link rel="stylesheet" href="<?php echo asset_url();?>css/token-input-facebook.css" />
    <link rel="stylesheet" href="<?php echo asset_url();?>css/token-input.css" />
    <link rel="stylesheet" href="<?php echo asset_url();?>plugins/CLEditor1_4_3/jquery.cleditor.css" />
    <link rel="stylesheet" href="<?php echo asset_url();?>css/jquery.cleditor-hack.css" />
    <link rel="stylesheet" href="<?php echo asset_url();?>css/bootstrap-wysihtml5-hack.css" />
    <link rel="stylesheet" href="<?php echo asset_url();?>css/animate.css" />
    <link rel="stylesheet" href="<?php echo asset_url();?>css/powerange.css" />
    <script type="text/javascript" src="<?php echo asset_url();?>js/jquery.min.js"></script>


    <style type="text/css">
        .blink{
            animation:blink 300ms infinite alternate;
        }

        @keyframes blink {
            from { opacity:1; }
            to { opacity:0; }
        };

        .mininwidth{
            width: 120px;
        }
        .mininwidth1{
            width: 80px;
        }

        .quick-btn{
            width: 125px;
        }

        .token-input-input-token{
            width: inherit !important;
        }

        .token-input-input-token input{
            width: inherit !important;
        }

        .token-input-list{
            width: inherit !important;
        }
        #footera {
            position: fixed;
            right: 10px;
            bottom: 20px;
            z-index: 9999999999;
            float: right;
            display: none;

        }

        .btn-circle {
            width: 85px !important;
            height: 85px !important;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 100%;
        }

        .fl_text{
            margin-top: 0px !important;
            margin-bottom: 0px !important;
            font-weight: bolder !important;
        }
        .showhide {
            float:right;
            cursor:pointer;
        }

        .show_num_duty{
            display: none;
            color: black !important;
            font-size: smaller;
        }

        .na{
            text-align: -webkit-center;
            text-align: center;
        }




    </style>
</head>
<!-- END  HEAD-->
<!-- BEGIN BODY-->
<body class="padTop53 ">


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
        <button type="button" id="footera" class="btn btn-primary btn-sm btn-circle" onclick="locate_next();" value="asdd" name="asda"><h3 class="fl_text">Next</h3></button>
        <div class="inner" style="min-height:1200px;">
            <div class="row">
                <div class="col-lg-12">

                    <h2 class="page-header">Assign Duty</h2>








                    <div class="col-lg-12 ani">

                        <div class="box">
                            <header>
                                <div class="icons"><i class="icon-th-large"></i></div>
                                <h5>Assign Duty -- <?php if(is_array($table_data) && count($table_data)>=1){ echo $table_data[0]->exam_id;}?></h5>
                                <div class="toolbar">
                                    <ul class="nav">
                                        <li>
                                            <div class="btn-group">

                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </header>
                            <br>


                            <div style="margin-left: 3%;">
                                <div style="margin-left: 3%;">
                                    <input type="radio" autocomplete="off" name="opt" value="c" <?php if($this->input->get('method')=="c") echo "checked";?> onclick="redirect(this.value)">
                                    <span class="control-label"><b>Continuous Allocation</b> -> Faculty is allocated to <b>both</b> morning and afternoon session and to <b>continuous</b> dates in <b>best possible way</b>. </span>
                                    <br><br>
                                    <input type="radio" autocomplete="off" name="opt" value="m" <?php if($this->input->get('method')=="m") echo "checked";?> onclick="redirect(this.value)">
                                    <span class="control-label"><b>Moderate Allocation</b> -> Faculty is allocated to <b>either</b> morning <b>or</b> afternoon session and to <b>continuous</b> dates in <b>best possible way</b>.</span>
                                    <br><br>
                                    <input type="radio" autocomplete="off" name="opt" value="s" <?php if($this->input->get('method')=="s") echo "checked";?> onclick="redirect(this.value)">
                                    <span class="control-label"><b>Random Allocation</b> -> Faculty is allocated <b>randomly</b>.</span>
                                    <br><br>
                                    <input type="radio" autocomplete="off" name="opt" value="a" <?php if($this->input->get('method')=="a") echo "checked";?> onclick="redirect(this.value)">
                                    <span class="control-label"><b>Advanced Allocation</b> -> Allocate with advanced settings.</span>
                                </div>
                                <br><br>
                                <div class="form-actions no-margin-bottom" style="text-align:center;">
                                    <button type="button" class="btn btn-success btn-sm " onclick="manual();" style="padding: 15px 53px;font-size: 14px;margin-right: 105px;">Allocate using manual settings</button>
                                    <button type="button" class="btn btn-success btn-sm " onclick="automatic();" style="padding: 15px 53px;font-size: 14px;">Allocate using Automatic settings (Takes Time)</button>
                                </div>
                                <br><br>
                            </div>









                            <div id="collapseOne" class="accordion-body collapse in body">


                                <form action="<?php echo base_url().'master/import_csv';?>" class="form-horizontal" id="brand-validate" method="post" enctype="multipart/form-data">


                                    <table class="table">
                                        <tr>
                                            <td style="text-align: center;"><h4><b>Available</b></h4></td>
                                            <td style="text-align: center;"><h4><b>Required</b></h4></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-12" style="text-align: center">

                                                        <a class="quick-btn" href="#">
                                                            <i class="icon-user icon-2x"></i>
                                                            <span>Room Superintendent</span>
                                                            <span class="label label-warning"><?php if(is_array($RS) && count($RS) >= 1) echo count($RS); else echo 0;?></span>
                                                        </a>

                                                        <a class="quick-btn" href="#">
                                                            <i class="icon-exchange icon-2x"></i>
                                                            <span>Relieving Superintendent</span>
                                                            <span class="label btn-metis-2"><?php if(is_array($RLS) && count($RLS) >= 1) echo count($RLS); else echo 0;?></span>
                                                        </a>

                                                        <a class="quick-btn" href="#">
                                                            <i class="icon-male icon-2x"></i>
                                                            <span>Deputy Superintendent</span>
                                                            <span class="label btn-metis-4"><?php if(is_array($DS) && count($DS) >= 1) echo count($DS); else echo 0;?></span>
                                                        </a>

                                                    </div>

                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-12" style="text-align: center">

                                                        <a class="quick-btn" href="#">
                                                            <i class="icon-user icon-2x"></i>
                                                            <span>Room Superintendent<br> <b>MAX Duty <?php echo $rs_max_duty?></b></span>
                                                            <span class="label label-warning"><?php echo $rs_count;?></span>
                                                        </a>

                                                        <a class="quick-btn" href="#">
                                                            <i class="icon-exchange icon-2x"></i>
                                                            <span>Relieving Superintendent <br> <b>MAX Duty <?php echo $rls_max_duty?></b></span>
                                                            <span class="label btn-metis-2"><?php echo $rls_count;?></span>
                                                        </a>

                                                        <a class="quick-btn" href="#">
                                                            <i class="icon-male icon-2x"></i>
                                                            <span>Deputy Superintendent <br> <b>MAX Duty <?php echo $ds_max_duty?></b></span>
                                                            <span class="label btn-metis-4"><?php echo $ds_count;?></span>
                                                        </a>

                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                    </table>

                                    <table class="table table-bordered table-striped" style="width: 95%;margin: 10px auto;">
                                        <thead>
                                        <tr>
                                            <th colspan="2" onClick="showfilter()" style="cursor:pointer;">Search <div class="showhide" onClick="showfilter()"><img src="<?php echo asset_url();?>images/plus-sign.png" id="toggleimage" onClick="showfilter()"></div></th>
                                        </tr>
                                        </thead>
                                        <tbody  id="filterbody" style="display: none;">
                                        <tr style="text-align: center;">
                                            <td><b>Prof. Name</b></td>
                                            <td>
                                                <input type="text"   id="usearch"  class="form-control" style="width:33%; float: left">
                                                <button style="float: left;" type="button" class="btn btn-primary" onclick="uusearch($('#usearch').val())"><i class="icon-search"></i> Search</button>
                                            </td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td><b>Advanced</b></td>
                                            <td style="text-align: left;text-align: -webkit-left;">
                                                <button type="button" class="btn btn-primary" onclick="showDutyCount()"><i class="icon-search"></i> Faculties with less than MAX duty</button>
                                            </td>
                                        </tr>
                                        <tr style="text-align: center;text-align: -webkit-center;" >
                                            <td colspan="2">
                                                <span id="srs"></span>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                    <div class="manual">


                                        <div id="collapseOne" class="accordion-body collapse in body" >
                                            <div class="panel-body">
                                                <div class="panel-group" id="accordion">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title" id="firsth">
                                                                <a class="disable allhd first" data-toggle="collapse" id="first" data-parent="#accordion" href="#collapseTwo">Room Superintendent Settings</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapseTwo" class="panel-collapse collapse1 collapse in">
                                                            <div class="panel-body">


                                                                <table class="table table-bordered table-striped" >

                                                                    <tbody  id="filterbody2_rs" >
                                                                    <tr style="text-align: -webkit-center;text-align: center;" class="ov_rs">
                                                                        <td>
                                                                            <div class="col-md-12">
                                                                                <div style="padding: 0% 1% 3% 1%;" class="col-md-4">
                                                                                    <b>Duty Sacrifice</b><br><br>
                                                                                    <div class="col-md-6">
                                                                                        <input type="text" class="slider1_rs"><br>
                                                                                        <h6 id="slider1_rs">Value : </h6>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <input type="text" class="slider2_rs"><br>
                                                                                        <h6 id="slider2_rs">Value : </h6>
                                                                                    </div>
                                                                                </div>
                                                                                <div style="padding: 0% 1% 3% 5%;" class="col-md-4">
                                                                                    <b>Duty Adjust</b><br><br>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text" class="slider3_rs"><br>
                                                                                        <h6 id="slider3_rs">Value : </h6>
                                                                                    </div>
                                                                                </div>
                                                                                <div style="padding: 0% 1% 3% 5%;" class="col-md-4">
                                                                                    <b>Magic Slider</b><br><br>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text" class="slider4_rs"><br>
                                                                                        <h6 id="slider4_rs">Value : </h6>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr style="text-align: center;text-align: -webkit-center;" >
                                                                        <td colspan="3">
                                                                            <div class="container">
                                                                                <div class="col-md-6">
                                                                                    <h2>Long Gap</h2>
                                                                                    <p>More than 2 days gap in allotment</p>
                                                                                    <table class="table table-bordered">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th>#</th>
                                                                                            <th>Name</th>
                                                                                            <th>Gap</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody id="ass_gap_rs">

                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h2>Duty Count</h2>
                                                                                    <p>Number of faculties and duty count</p>
                                                                                    <table class="table table-bordered">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th>Faculties</th>
                                                                                            <th>Duties</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody id="ass_duties_rs">

                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    </tbody>
                                                                </table>

                                                                <div class="form-actions no-margin-bottom" style="text-align:center;">
    <!--                                                                <button type="button" id="next1" class="btn btn-success btn-sm skip" ><i class="icon-step-forward"></i> Next</button>-->
                                                                </div>
                                                                <div id="msgbox1"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title" id="secondh">
                                                                <a class="disable allhd second" data-toggle="collapse" id="second"  data-parent="#accordion" href="#collapseThree">Relieving Superintendent Settings</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapseThree" class="panel-collapse collapse1 collapse in">
                                                            <div class="panel-body">


                                                                <table class="table table-bordered table-striped" >

                                                                    <tbody  id="filterbody2_rls" >
                                                                    <tr style="text-align: -webkit-center;text-align: center;" class="ov_rls">
                                                                        <td>
                                                                            <div class="col-md-12">
                                                                                <div style="padding: 0% 1% 3% 1%;" class="col-md-4">
                                                                                    <b>Duty Sacrifice</b><br><br>
                                                                                    <div class="col-md-6">
                                                                                        <input type="text" class="slider1_rls"><br>
                                                                                        <h6 id="slider1_rls">Value : </h6>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <input type="text" class="slider2_rls"><br>
                                                                                        <h6 id="slider2_rls">Value : </h6>
                                                                                    </div>
                                                                                </div>
                                                                                <div style="padding: 0% 1% 3% 5%;" class="col-md-4">
                                                                                    <b>Duty Adjust</b><br><br>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text" class="slider3_rls"><br>
                                                                                        <h6 id="slider3_rls">Value : </h6>
                                                                                    </div>
                                                                                </div>
                                                                                <div style="padding: 0% 1% 3% 5%;" class="col-md-4">
                                                                                    <b>Magic Slider</b><br><br>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text" class="slider4_rls"><br>
                                                                                        <h6 id="slider4_rls">Value : </h6>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr style="text-align: center;text-align: -webkit-center;" >
                                                                        <td colspan="3">
                                                                            <div class="container">
                                                                                <div class="col-md-6">
                                                                                    <h2>Long Gap</h2>
                                                                                    <p>More than 2 days gap in allotment</p>
                                                                                    <table class="table table-bordered">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th>#</th>
                                                                                            <th>Name</th>
                                                                                            <th>Gap</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody id="ass_gap_rls">

                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h2>Duty Count</h2>
                                                                                    <p>Number of faculties and duty count</p>
                                                                                    <table class="table table-bordered">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th>Faculties</th>
                                                                                            <th>Duties</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody id="ass_duties_rls">

                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    </tbody>
                                                                </table>

                                                                <div class="form-actions no-margin-bottom" style="text-align:center;">
    <!--                                                                <a class="btn btn-primary btn-sm previous" uid="first"><i class="icon-step-backward"></i> Previous</a>&nbsp;&nbsp;&nbsp;<button type="button" id="next1" class="btn btn-success btn-sm skip1" ><i class="icon-step-forward"></i> Next</button>-->
                                                                </div>

                                                                <div id="msgbox2"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title" id="thirdh">
                                                                <a class="disable allhd third" data-toggle="collapse" id="third"  data-parent="#accordion" href="#collapseFour">Deputy Superintendent Allocation</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapseFour" class="panel-collapse collapse1 collapse in">
                                                            <div class="panel-body">

                                                                <table class="table table-bordered table-striped" >

                                                                    <tbody  id="filterbody2_ds" >
                                                                    <tr style="text-align: -webkit-center;text-align: center;" class="ov_ds">
                                                                        <td>
                                                                            <div class="col-md-12">
                                                                                <div style="padding: 0% 1% 3% 1%;" class="col-md-4">
                                                                                    <b>Duty Sacrifice</b><br><br>
                                                                                    <div class="col-md-6">
                                                                                        <input type="text" class="slider1_ds"><br>
                                                                                        <h6 id="slider1_ds">Value : </h6>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <input type="text" class="slider2_ds"><br>
                                                                                        <h6 id="slider2_ds">Value : </h6>
                                                                                    </div>
                                                                                </div>
                                                                                <div style="padding: 0% 1% 3% 5%;" class="col-md-4">
                                                                                    <b>Duty Adjust</b><br><br>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text" class="slider3_ds"><br>
                                                                                        <h6 id="slider3_ds">Value : </h6>
                                                                                    </div>
                                                                                </div>
                                                                                <div style="padding: 0% 1% 3% 5%;" class="col-md-4">
                                                                                    <b>Magic Slider</b><br><br>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text" class="slider4_ds"><br>
                                                                                        <h6 id="slider4_ds">Value : </h6>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr style="text-align: center;text-align: -webkit-center;" >
                                                                        <td colspan="3">
                                                                            <div class="container">
                                                                                <div class="col-md-6">
                                                                                    <h2>Long Gap</h2>
                                                                                    <p>More than 2 days gap in allotment</p>
                                                                                    <table class="table table-bordered">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th>#</th>
                                                                                            <th>Name</th>
                                                                                            <th>Gap</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody id="ass_gap_ds">

                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h2>Duty Count</h2>
                                                                                    <p>Number of faculties and duty count</p>
                                                                                    <table class="table table-bordered">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th>Faculties</th>
                                                                                            <th>Duties</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody id="ass_duties_ds">

                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    </tbody>
                                                                </table>

                                                                <div class="form-actions no-margin-bottom" style="text-align:center;">
    <!--                                                                <a class="btn btn-primary btn-sm previous" uid="second" ><i class="icon-step-backward"></i> Previous</a>&nbsp;&nbsp;&nbsp;-->
                                                                    <button type="button" class="btn btn-success btn-sm " onclick="gen_duty();"><i class="icon-save"></i> Generate Duty Allocation</button>
                                                                </div>

                                                                <div id="msgbox3"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="float: right;">
                                            <a onclick="accordion_toggle_expand();" style="text-decoration: underline;cursor: pointer;">Expand All</a>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <a onclick="accordion_toggle_collapse();" style="text-decoration: underline;cursor: pointer;">Collapse All</a>
                                            &nbsp;&nbsp;
                                        </div>
                                    </div>
                                        <br>


                                        <div class="append_duty">

                                        </div>

                                        <?php echo $this->session->flashdata('message'); ?>

                                        <div class="form-actions no-margin-bottom bottom_buttons" style="text-align:center;display: none">

                                            <a href="<?php echo base_url().'master/timetable';?>" class="btn btn-primary btn-sm"><i class="icon-reply "></i> Back</a>&nbsp;&nbsp;&nbsp;<button type="button" onclick="duty_validate()" class="btn btn-success btn-sm "><i class="icon-save "></i> Save Changes</button>
                                        </div>


                                </form>
                            </div>
                        </div>
                    </div>




                </div>

                <hr />




            </div>

        </div>
        <!--END PAGE CONTENT -->
    </div>
    </div>


    <!--END MAIN WRAPPER -->

    <!-- FOOTER -->
    <div id="footer">
        <p>  <?php echo fottertitle;?> </p>
    </div>
    <!--END FOOTER -->
    <!-- GLOBAL SCRIPTS -->
    <script src="<?php echo asset_url();?>plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo asset_url();?>js/jquery.tokeninput.js"></script>

    <script src="<?php echo asset_url();?>plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="<?php echo asset_url();?>js/spiner.js"></script>
    <script src="<?php echo asset_url();?>js/loadingoverlay.js"></script>
<script src="<?php echo asset_url();?>js/powerange.js"></script>
    <?php echo $jsfile;?>
<script>
//    $(document).ready(function() {
        var stp1_rs = document.querySelector('.slider1_rs');
        var initstp1_rs = new Powerange(stp1_rs, {min: 0, max: 3, start: 0, step: 1, hideRange: true, callback: setVal1_rs});

        var stp2_rs = document.querySelector('.slider2_rs');
        var initstp2_rs = new Powerange(stp2_rs, {min: 0, max: 3, start: 0,step: 1, hideRange: true, callback: setVal2_rs});

        var stp3_rs = document.querySelector('.slider3_rs');
        var initstp3_rs = new Powerange(stp3_rs, {min: 0, max: 3, start: 0,step: 1, hideRange: true, callback: setVal3_rs});

        var stp4_rs = document.querySelector('.slider4_rs');
        var initstp4_rs = new Powerange(stp4_rs, {min: 1, max: <?php if(is_array($RS) && count($RS) >= 1) echo count($RS); else echo 0;?>, start: 0, step: 1, hideRange: true, callback: setVal4_rs});

        function setVal1_rs() {
            document.querySelector('#slider1_rs').innerText = "Value :" + stp1_rs.value;
        }

        function setVal2_rs() {
            document.querySelector('#slider2_rs').innerText = "Value :" + stp2_rs.value;
        }

        function setVal3_rs() {
            document.querySelector('#slider3_rs').innerText = "Value :" + stp3_rs.value;
        }

        function setVal4_rs() {
            document.querySelector('#slider4_rs').innerText = "Value :" + stp4_rs.value;
        }

        var stp1_rls = document.querySelector('.slider1_rls');
        var initstp1_rls = new Powerange(stp1_rls, {min: 0, max: 3, start: 0, step: 1, hideRange: true, callback: setVal1_rls});

        var stp2_rls = document.querySelector('.slider2_rls');
        var initstp2_rls = new Powerange(stp2_rls, {min: 0, max: 3, start: 0,step: 1, hideRange: true, callback: setVal2_rls});

        var stp3_rls = document.querySelector('.slider3_rls');
        var initstp3_rls = new Powerange(stp3_rls, {min: 0, max: 3, start: 0,step: 1, hideRange: true, callback: setVal3_rls});

        var stp4_rls = document.querySelector('.slider4_rls');
        var initstp4_rls = new Powerange(stp4_rls, {min: 1, max: <?php if(is_array($RLS) && count($RLS) >= 1) echo count($RLS); else echo 0;?>, start: 0, step: 1, hideRange: true, callback: setVal4_rls});

        function setVal1_rls() {
            document.querySelector('#slider1_rls').innerText = "Value :" + stp1_rls.value;
        }

        function setVal2_rls() {
            document.querySelector('#slider2_rls').innerText = "Value :" + stp2_rls.value;
        }

        function setVal3_rls() {
            document.querySelector('#slider3_rls').innerText = "Value :" + stp3_rls.value;
        }

        function setVal4_rls() {
            document.querySelector('#slider4_rls').innerText = "Value :" + stp4_rls.value;
        }

        var stp1_ds = document.querySelector('.slider1_ds');
        var initstp1_ds = new Powerange(stp1_ds, {min: 0, max: 3, start: 0, step: 1, hideRange: true, callback: setVal1_ds});

        var stp2_ds = document.querySelector('.slider2_ds');
        var initstp2_ds = new Powerange(stp2_ds, {min: 0, max: 3, start: 0,step: 1, hideRange: true, callback: setVal2_ds});

        var stp3_ds = document.querySelector('.slider3_ds');
        var initstp3_ds = new Powerange(stp3_ds, {min: 0, max: 3, start: 0,step: 1, hideRange: true, callback: setVal3_ds});

        var stp4_ds = document.querySelector('.slider4_ds');
        var initstp4_ds = new Powerange(stp4_ds, {min: 1, max: <?php if(is_array($DS) && count($DS) >= 1) echo count($DS); else echo 0;?>, start: 0, step: 1, hideRange: true, callback: setVal4_ds});

        function setVal1_ds() {
            document.querySelector('#slider1_ds').innerText = "Value :" + stp1_ds.value;
        }

        function setVal2_ds() {
            document.querySelector('#slider2_ds').innerText = "Value :" + stp2_ds.value;
        }

        function setVal3_ds() {
            document.querySelector('#slider3_ds').innerText = "Value :" + stp3_ds.value;
        }

        function setVal4_ds() {
            document.querySelector('#slider4_ds').innerText = "Value :" + stp4_ds.value;

        }





        $('.range-handle').mousedown( function(e) {
            //e.preventDefault();
            //e.stopPropagation();

            if (e.which !== 0) {
                var $this = $(this);

                if (e.which !== 0)
                    $('body').off('mouseup').one('mouseup', function() {
                        //e.preventDefault();
//                        mask("filterbody2_rs");
//                        mask("filterbody2_rls");
//                        mask("filterbody2_ds");
//                        //$("#filterbody2").LoadingOverlay("show");
//                        $.post("<?php //echo base_url()?>//master/ana2", {id: "<?php //echo $ex_id?>//",rs_one:stp1_rs.value,rs_two:stp2_rs.value,rs_three:stp3_rs.value,rs_four:stp4_rs.value,ds_one:stp1_ds.value,ds_two:stp2_ds.value,ds_three:stp3_ds.value,ds_four:stp4_ds.value,rls_one:stp1_rls.value,rls_two:stp2_rls.value,rls_three:stp3_rls.value,rls_four:stp4_rls.value,req_flag: $this.parent().parent().children().first().attr('class').slice(-2)}, function(result){
//                            $("#ass_gap_rs").html("Error");
//                            $("#ass_duties_rs").html("Error");
//
//                            $("#ass_gap_rls").html("Error");
//                            $("#ass_duties_rls").html("Error");
//
//                            $("#ass_gap_ds").html("Error");
//                            $("#ass_duties_ds").html("Error");
//
//                            $(".append_duty").html("Error");
//                            unmask("filterbody2_rs");
//                            unmask("filterbody2_rls");
//                            unmask("filterbody2_ds");
//                            console.log(result);
//                            var ar = JSON.parse(result);
//                            $("#ass_gap_rs").html(ar[0]);
//                            $("#ass_duties_rs").html(ar[1]);
//
//                            $("#ass_gap_rls").html(ar[2]);
//                            $("#ass_duties_rls").html(ar[3]);
//
//                            $("#ass_gap_ds").html(ar[4]);
//                            $("#ass_duties_ds").html(ar[5]);
//
//                            $(".append_duty").html(ar[6]);
//                        });
                        mask();
                        var base_url = '<?php echo base_url();?>';
                        $.post("<?php echo base_url()?>master/ana2", {id: "<?php echo $ex_id?>",rs_one:stp1_rs.value,rs_two:stp2_rs.value,rs_three:stp3_rs.value,rs_four:stp4_rs.value,ds_one:stp1_ds.value,ds_two:stp2_ds.value,ds_three:stp3_ds.value,ds_four:stp4_ds.value,rls_one:stp1_rls.value,rls_two:stp2_rls.value,rls_three:stp3_rls.value,rls_four:stp4_rls.value,req_flag: $this.parent().parent().children().first().attr('class').slice(-2)}, function(result){
                                unmask();
                                $("#ass_gap_rs").html("Error");
                            $("#ass_duties_rs").html("Error");

                            $("#ass_gap_rls").html("Error");
                            $("#ass_duties_rls").html("Error");

                            $("#ass_gap_ds").html("Error");
                            $("#ass_duties_ds").html("Error");

                            $(".append_duty").html("Error");

                            console.log(result);
                            var ar = JSON.parse(result);
                            $("#ass_gap_rs").html(ar[0]);
                            $("#ass_duties_rs").html(ar[1]);

                            $("#ass_gap_rls").html(ar[2]);
                            $("#ass_duties_rls").html(ar[3]);

                            $("#ass_gap_ds").html(ar[4]);
                            $("#ass_duties_ds").html(ar[5]);

                            $(".append_duty").html(ar[6]);
                            $(".bottom_buttons").hide();
                        });






                    });
                if (e.which !== 0)
                $this.off('mouseup').one('mouseup', function(e){
                   // e.preventDefault();
                    $(this).unbind('mouseleave');
                });


            }
        });


        function gen_duty(){
            mask();
            var base_url = '<?php echo base_url();?>';
            $.post("<?php echo base_url()?>master/alloc_final", {id: "<?php echo $ex_id?>",rs_one:stp1_rs.value,rs_two:stp2_rs.value,rs_three:stp3_rs.value,rs_four:stp4_rs.value,ds_one:stp1_ds.value,ds_two:stp2_ds.value,ds_three:stp3_ds.value,ds_four:stp4_ds.value,rls_one:stp1_rls.value,rls_two:stp2_rls.value,rls_three:stp3_rls.value,rls_four:stp4_rls.value}, function(result){

                unmask();
                $("#ass_gap_rs").html("Error");
                $("#ass_duties_rs").html("Error");

                $("#ass_gap_rls").html("Error");
                $("#ass_duties_rls").html("Error");

                $("#ass_gap_ds").html("Error");
                $("#ass_duties_ds").html("Error");

                $(".append_duty").html("Error");

                console.log(result);
                var ar = JSON.parse(result);
                $("#ass_gap_rs").html(ar[0]);
                $("#ass_duties_rs").html(ar[1]);

                $("#ass_gap_rls").html(ar[2]);
                $("#ass_duties_rls").html(ar[3]);

                $("#ass_gap_ds").html(ar[4]);
                $("#ass_duties_ds").html(ar[5]);

                $(".append_duty").html(ar[6]);
                $(".bottom_buttons").show();
                accordion_toggle_expand();

                $('html, body').animate({
                    scrollTop: $(".append_duty").offset().top-100
                }, 2000);
            });
        }
//    });



</script>
    <!-- END GLOBAL SCRIPTS -->





    <script>
        var next_arr={};
        function animate_empty(id,css=false){

            if(css){
                accordion_toggle_expand();
                $('html, body').animate({
                    scrollTop: $(id).parent().offset().top - 300
                }, 500);

                $(id).parent().animateWithCss('shake',"border: 3px solid red;background: red;");
            } else {
                accordion_toggle_expand();
                $('html, body').animate({
                    scrollTop: $(id).parent().find(".to_be_added").offset().top - 300
                }, 500);
                $(id).parent().find(".to_be_added").animateCss('shake');
            }

           // $(id).animateCss('shake');
        }
        function duty_validate(){
            accordion_toggle_expand();
            var arr = {};
            var tobeaddedcheck=false;
            $('[name="blah"]').each(function(){

                var value_ = $(this).val();
                var date = $(this).attr('class').substr(-11);

                var desig = $(this).attr('class').substr(0,3).replace("_","").toUpperCase();
                var session = $(this).attr('class').substr(-14).substr(0,2);
                if(value_.includes("-1")){

                    //alert("Please Check "+date+" "+desig+" "+session);
                    animate_empty($(this));
                    tobeaddedcheck=true;
                    return false;
                }
                if(!(arr.hasOwnProperty(date))) // true)
                    arr[date]= {};
                if(!(arr[date].hasOwnProperty(desig))) // true)
                    arr[date][desig]={};
                if(!(arr[date][desig].hasOwnProperty(session))) // true)
                    arr[date][desig][session]=value_;





            });

            if(tobeaddedcheck){
                return;
            }

            var check=false;
            $('.ib').each(function(){
                if($(this).is(":visible")&& !check ){

                    check=true;
                    animate_empty($(this),true);
                    return false;

                }
            });
            if(check)
                return;

//            console.log(JSON.stringify(arr));
            mask();

            $.post("<?php echo base_url()?>master/duty_save", {arr: JSON.stringify(arr),exam_id: "<?php echo $this->input->get('id');?>", rs_max_duty:"<?php echo $rs_max_duty;?>",rs_count:"<?php echo $rs_count;?>",rls_max_duty:"<?php echo $rls_max_duty;?>",rls_count:"<?php echo $rls_count;?>",ds_max_duty:"<?php echo $ds_max_duty;?>",ds_count:"<?php echo $ds_count;?>"}, function(result){
                console.log(result);
                location.href="<?php echo base_url()?>master/timetable";

            });
        }

        $(".expand").click(function(){
            $('html, body').animate({
                scrollTop: $($(this)).offset().top - 60

            }, 1000);

        });



        function uusearch(val){
            next_arr = {};
            val = val.toLowerCase().trim();
            var counter=1;
            var tab="<table class='table' style='width: inherit;'>"
            $(".token-input-token p").each(function(){


                if($($(this)).text().toLowerCase().trim().indexOf(val)!=-1){
                    var id = $($(this)).attr("class");
                    var text = $($(this)).parent().parent().parent().attr('class');
                    tab += "<tr onclick=locate('"+id+"')"+"><td>"+counter+"</td><td>"+$($(this)).text()+"<td><span>"+text.replace("linkClass","").replace(/_/g, " ").toUpperCase()+"</span></td><td><button style='padding: 2px 10px;border-radius: 5px;' type='button' class='btn btn-primary'><i class='icon-arrow-right'></i> Locate</button></td></tr>";
                    next_arr[id] = 0;
                    counter++;

                }
            });
            tab += "</table>";
            if(counter != 1)
                $("#srs").html(tab);
            else {
                $("#srs").html("<b>Not Found..!!!</b>");
            }
            $("html, body").animate({ scrollTop: $("#filterbody").offset().top }, 500);

        }

        function accordion_toggle_expand(){
            $(".accordion-toggle").removeClass("collapsed");
            $(".body_").removeClass("collapse");
            $(".body_").addClass("in");
            $(".body_").css("height","auto");
        }

        function accordion_toggle_collapse(){
            $(".accordion-toggle").addClass("collapsed");
            $(".body_").removeClass("in");
            $(".body_").addClass("collapse");
            $(".body_").css("height","20px");
        }

        function locate(id){
            accordion_toggle_expand();
            $("#footera").show();
            delete next_arr[id];
            if(Object.keys(next_arr).length==0){
                $("#footera").hide();

            }

            console.log(next_arr);
            $('html, body').animate({
                scrollTop: $("."+id).offset().top - 300
            }, 500);


            $(".token-input-selected-token").removeClass('token-input-selected-token');
            $("."+id).parent().addClass('token-input-selected-token');
            $("."+id).parent().animateCss('flip');
            $("."+id).animateCss('shake');

        }

        $.fn.extend({
            animateCss: function (animationName) {
                var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
                this.addClass('animated ' + animationName).one(animationEnd, function() {
                    $(this).removeClass('animated ' + animationName);
                });
            },
            animateWithCss: function (animationName,style_css) {
                var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
                this.attr("style",style_css);
                this.addClass('animated ' + animationName).one(animationEnd, function() {
                    $(this).removeClass('animated ' + animationName);
                    $(this).attr("style","");
                });
            }
        });

        function locate_next(){
            console.log(next_arr);

            if(Object.keys(next_arr).length>=1){
                var one=0;
                for (var key in next_arr)
                    if(one==0){
                        locate(key);
                        one++;
                    }
            }
            else{
                $("#footera").hide();
            }



        }
        var filterhiden=1;

        function showfilter() {
            $("#srs").html("");
            if(filterhiden==1) {
                $("#filterbody").show(); filterhiden=0;
                $('#toggleimage').attr('src',"<?php echo asset_url();?>images/minus-sign.png");
            } else {
                $("#filterbody").hide(); filterhiden=1;
                $('#toggleimage').attr('src',"<?php echo asset_url();?>images/plus-sign.png");
            }
        }

        function showfilter2() {
            $("#srs").html("");
            if(filterhiden==1) {
                $("#filterbody2").show(); filterhiden=0;
                $('#toggleimage2').attr('src',"<?php echo asset_url();?>images/minus-sign.png");
            } else {
                $("#filterbody2").hide(); filterhiden=1;
                $('#toggleimage2').attr('src',"<?php echo asset_url();?>images/plus-sign.png");
            }
        }

        $(document).on("mouseenter", ".token-input-token", function(){
            var name = $(this).find("p").text().replace(/\s/g, "_").toLowerCase();
            var len = $(".hover"+name).length;
            $($(this).find(".hover"+name)).html(len);
            $($(this).find(".hover"+name)).toggle();
        });

        $(document).on("mouseleave", ".token-input-token", function(){
            var name = $(this).find("p").text().replace(/\s/g, "_").toLowerCase();

            $($(this).find(".hover"+name)).toggle();
        });

        function showDutyCount(){
            mask();
            var rs = [];
            var rls = [];
            var ds = [];

            var ex_rs = [];
            var ex_rls = [];
            var ex_ds = [];

            $(".token-input-token").each(function(){
                var name = $(this).find("p").text().replace(/\s/g, "_").toLowerCase();
                var len = $(".hover"+name).length;
                var to_arr = $(this).find("p").attr("class").substring(0,3).replace(/_/g, "").trim();
                if(to_arr == "rs"){
                    if(len < <?php echo $rs_max_duty?>){
                        var to_name = $(this).find("p").text();
                        rs[to_name] = len;
                    } else{
                        var to_name = $(this).find("p").text();
                        ex_rs[to_name] = len;
                    }
                }

                if(to_arr == "rls"){
                    if(len < <?php echo $rls_max_duty?>){
                        var to_name = $(this).find("p").text();
                        rls[to_name] = len;
                    } else{
                        var to_name = $(this).find("p").text();
                        ex_rls[to_name] = len;
                    }
                }

                if(to_arr == "ds"){
                    if(len < <?php echo $ds_max_duty?>){
                        var to_name = $(this).find("p").text();
                        ds[to_name] = len;
                    } else{
                        var to_name = $(this).find("p").text();
                        ex_ds[to_name] = len;
                    }
                }
            });
            console.log(rs);
            console.log(rls);
            console.log(ds);
            var rs_str = '';
            var rls_str = '';
            var ds_str = '';

            var rs_arr = '';
            var rls_arr = '';
            var ds_arr = '';

            var g1 = $.get("<?php echo base_url();?>master/getDropDown_v2", {
                id: "RS",ex_id:"<?php echo $this->input->get('id');?>"
            }, function (result) {
                rs_arr = JSON.parse(result);
                if((rs_arr).length>=1){
                    for (var key in rs_arr) {

                        if(!(rs_arr[key].name in rs) && !(rs_arr[key].name in ex_rs)){

                            console.log(rs_arr[key].name);
                            rs[rs_arr[key].name] = 0;
                            console.log(rs);
                        }
                    }
                }

                if(Object.keys(rs).length>=1) {

                    rs_str = "<table class='table' style='width: inherit;float: left; margin: 40px;'><caption><label style='color: darkred;'>RS</label></caption><tr><th><label>Name</label></th><th><label>Total Duty</label></th></tr>";
                    for (var key in rs) {
                        rs_str += "<tr><th><label>" + key + "</label></th><th style='text-align: center;'><label>" + rs[key] + "</label></th></tr>"
                    }
                    rs_str += "</table>";
                }

            });



            var g2 =$.get("<?php echo base_url();?>master/getDropDown_v2", {
                id: "RLS",ex_id:"<?php echo $this->input->get('id');?>"
            }, function (result) {
                rls_arr = JSON.parse(result);
                if((rls_arr).length>=1){
                    for (var key in rls_arr) {

                        if(!(rls_arr[key].name in rls) && !(rls_arr[key].name in ex_rls)){
                            console.log(rls_arr[key].name);
                            rls[rls_arr[key].name] = 0;
                            console.log(rls);
                        }
                    }
                }

                if(Object.keys(rls).length>=1) {

                    rls_str = "<table class='table' style='width: inherit;float: left; margin: 40px;'><caption><label style='color: darkred;'>RLS</label></caption><tr><th><label>Name</label></th><th><label>Total Duty</label></th></tr>";
                    for (var key in rls) {
                        rls_str += "<tr><th><label>" + key + "</label></th><th style='text-align: center;'><label>" + rls[key] + "</label></th></tr>"
                    }
                    rls_str += "</table>";
                }

            });

            var g3 = $.get("<?php echo base_url();?>master/getDropDown_v2", {
                id: "DS",ex_id:"<?php echo $this->input->get('id');?>"
            }, function (result) {
                ds_arr = JSON.parse(result);
                if((ds_arr).length>=1){
                    for (var key in ds_arr) {

                        if(!(ds_arr[key].name in ds) && !(ds_arr[key].name in ex_ds)){
                            console.log(ds_arr[key].name);
                            ds[ds_arr[key].name] = 0;
                            console.log(ds);
                        }
                    }
                }

                if(Object.keys(ds).length>=1) {

                    ds_str = "<table class='table' style='width: inherit;float: left; margin: 40px;'><caption><label style='color: darkred;'>DS</label></caption><tr><th><label>Name</label></th><th><label>Total Duty</label></th></tr>";
                    for (var key in ds) {
                        ds_str += "<tr><th><label>" + key + "</label></th><th style='text-align: center;'><label>" + ds[key] + "</label></th></tr>"
                    }
                    ds_str += "</table>";
                }


            });


            $.when(g1, g2, g3).done(function() {
                $("html, body").animate({ scrollTop: $("#filterbody").offset().top }, 500);
                if((rs_str+rls_str+ds_str).trim() == ""){
                    $("#srs").html("<b>Not Found...!!!</b>");
                } else {
                    $("#srs").html(rs_str+rls_str+ds_str);
                }
                unmask();
            });

        }

        function redirect(val){
            var base_url = '<?php echo base_url();?>';
            var id = "<?php echo $this->input->get('id');?>";
            if(val=="c")
                document.location.href =base_url+"master/assign_duty_c?id="+id+"&method=c";
            if(val=="s")
                document.location.href =base_url+"master/assign_duty_s?id="+id+"&method=s";
            if(val=="m")
                document.location.href =base_url+"master/assign_duty_m?id="+id+"&method=m";
            if(val=="a")
                document.location.href =base_url+"master/assign_duty_m_copy?id="+id+"&method=a";
        }

        function manual(){
            $(".manual").show();
            $('html, body').animate({
                scrollTop: $(".manual").offset().top-100
            }, 2000);
        }

        $(".manual").hide();

        function automatic(){
            mask();
            var base_url = '<?php echo base_url();?>';
            $.post("<?php echo base_url()?>master/ana3", {id: "<?php echo $ex_id?>",rs_one:stp1_rs.value,rs_two:stp2_rs.value,rs_three:stp3_rs.value,rs_four:stp4_rs.value,ds_one:stp1_ds.value,ds_two:stp2_ds.value,ds_three:stp3_ds.value,ds_four:stp4_ds.value,rls_one:stp1_rls.value,rls_two:stp2_rls.value,rls_three:stp3_rls.value,rls_four:stp4_rls.value}, function(result){

                unmask();
                $("#ass_gap_rs").html("Error");
                $("#ass_duties_rs").html("Error");

                $("#ass_gap_rls").html("Error");
                $("#ass_duties_rls").html("Error");

                $("#ass_gap_ds").html("Error");
                $("#ass_duties_ds").html("Error");

                $(".append_duty").html("Error");

                console.log(result);
                var ar = JSON.parse(result);
                $("#ass_gap_rs").html(ar[0]);
                $("#ass_duties_rs").html(ar[1]);

                $("#ass_gap_rls").html(ar[2]);
                $("#ass_duties_rls").html(ar[3]);

                $("#ass_gap_ds").html(ar[4]);
                $("#ass_duties_ds").html(ar[5]);

                $(".append_duty").html(ar[6]);
                $(".bottom_buttons").show();
                accordion_toggle_expand();

                $('html, body').animate({
                    scrollTop: $(".append_duty").offset().top-100
                }, 2000);
            });
        }








    </script>
</body>
<!-- END BODY-->

</html>
