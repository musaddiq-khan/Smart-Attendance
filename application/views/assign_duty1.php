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
    <script type="text/javascript" src="<?php echo asset_url();?>js/jquery.min.js"></script>

    <style type="text/css">
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
                                    <div style="float: right;">
                                        <a onclick="accordion_toggle_expand();" style="text-decoration: underline;cursor: pointer;">Expand All</a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <a onclick="accordion_toggle_collapse();" style="text-decoration: underline;cursor: pointer;">Collapse All</a>
                                        &nbsp;&nbsp;
                                    </div>
                                    <br>


                                    <?php if(is_array($table_data) && count($table_data)>=1){
                                        $counter=0;
                                        foreach($table_data as $val){
                                            $width = 0;
                                            if($val->m3strength != -1)
                                                $width++;
                                            if($val->m4strength != -1)
                                                $width++;
                                            if($val->a3strength != -1)
                                                $width++;
                                            if($val->a4strength != -1)
                                                $width++;

                                            $width=100/$width;
                                            $width = $width.""."%";


                                            ?>

                                            <div class="box col-lg-12">
                                                <header style="cursor: pointer;background: #e5eaef;" data-toggle="collapse" href="#<?php echo "ex_id_".$counter?>" class="expand">
                                                    <h5><?php echo $val->date;?>&nbsp;&nbsp;&nbsp;&nbsp;
                                                        m3[<span class="label btn-metis-2" style="font-size: 11px;"><?php echo $m3_rs_count[$counter]." . ".$m3_rls_count[$counter]." . ".$m3_ds_count[$counter];?></span>]&nbsp;&nbsp;&nbsp;&nbsp;
                                                        m4[<span class="label btn-metis-2" style="font-size: 11px;"><?php echo $m4_rs_count[$counter]." . ".$m4_rls_count[$counter]." . ".$m4_ds_count[$counter];?></span>]&nbsp;&nbsp;&nbsp;&nbsp;
                                                        a3[<span class="label btn-metis-2" style="font-size: 11px;"><?php echo $a3_rs_count[$counter]." . ".$a3_rls_count[$counter]." . ".$a3_ds_count[$counter];?></span>]&nbsp;&nbsp;&nbsp;&nbsp;
                                                        a4[<span class="label btn-metis-2" style="font-size: 11px;"><?php echo $a4_rs_count[$counter]." . ".$a4_rls_count[$counter]." . ".$a4_ds_count[$counter];?></span>]</h5>
                                                    <div class="toolbar">
                                                        <div class="btn-group">
                                                            <a class="btn btn-default btn-sm accordion-toggle minimize-box collapsed" data-toggle="collapse" href="#<?php echo $val->exam_id.$counter?>">
                                                                <i class="icon-chevron-up"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </header>

                                                <div class="body_ collapse" id="<?php echo "ex_id_".$counter?>" style="height: 20px;">

                                                    <h5><b>Room Superintendent Allocation</b></h5>
                                                    <div style="text-align: -webkit-center;">
                                                        <table class="table table-striped table-bordered table-hover" <?php if($width=="100%") echo "style='width: 50%;'"?>>
                                                            <thead>
                                                            <tr>
                                                                <?php if($val->m3strength != -1) {?>
                                                                    <th style="width: <?php echo $width?>;text-align: center;">M3  <b style="color: crimson;">[<i class="icon-female icon-1x"></i> <?php echo $m3_str[$counter];?> Students]</b></th>
                                                                <?php }?>
                                                                <?php if($val->m4strength != -1) {?>
                                                                    <th style="width: <?php echo $width?>;text-align: center;">M4 <b style="color: crimson;">[<i class="icon-female icon-1x"></i> <?php echo $m4_str[$counter];?> Students]</b></th>
                                                                <?php }?>
                                                                <?php if($val->a3strength != -1) {?>
                                                                    <th style="width: <?php echo $width?>;text-align: center;">A3 <b style="color: crimson;">[<i class="icon-female icon-1x"></i> <?php echo $a3_str[$counter];?> Students]</b></th>
                                                                <?php }?>
                                                                <?php if($val->a4strength != -1) {?>
                                                                    <th style="width: <?php echo $width?>;text-align: center;">A4 <b style="color: crimson;">[<i class="icon-female icon-1x"></i> <?php echo $a4_str[$counter];?> Students]</b></th>
                                                                <?php }?>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            <tr>
                                                                <?php if($val->m3strength != -1) {?>
                                                                    <td class="rs_linkClass_m3_<?php echo getDateTag($val->date);?>"><input type="text" class="rs_input_m3_<?php echo getDateTag($val->date);?>" name="blah" /></td>
                                                                    <script type="text/javascript">
                                                                        $(document).ready(function() {
                                                                            $(".rs_input_m3_<?php echo getDateTag($val->date);?>").tokenInput("<?php echo base_url()?>master/getDropDown?eid=<?php echo $table_data[0]->exam_id?>&id=RS",{
                                                                                preventDuplicates: true, disabled: <?php echo $disabled; ?>,
                                                                                linkClass:".rs_linkClass_m4_<?php echo getDateTag($val->date);?> ul",
                                                                                linkInput:"rs_input_m4_<?php echo getDateTag($val->date);?>",
                                                                                prePopulate:[
                                                                                    <?php
                                                                                   foreach($populate[getDateTag($val->date)][0][0]["m3"] as $jkey=>$jv){
                                                                                       echo "{id:'{$jv}', name:'{$jkey}'},";
                                                                                   }
                                                                                    ?>],
                                                                                tokenLimit:<?php echo count($populate[getDateTag($val->date)][0][0]["m3"])?>

                                                                                , onAdd: function (item) {
                                                                                    //alert("Added " + item.name);
                                                                                },
                                                                                onDelete: function (item) {
                                                                                    //alert("Deleted " + item.name);
                                                                                }})

                                                                        });
                                                                    </script>
                                                                <?php }?>
                                                                <?php if($val->m4strength != -1) {?>
                                                                    <td class="rs_linkClass_m4_<?php echo getDateTag($val->date);?>"><input type="text" class="rs_input_m4_<?php echo getDateTag($val->date);?>" name="blah" /></td>
                                                                    <script type="text/javascript">
                                                                        $(document).ready(function() {
                                                                            $(".rs_input_m4_<?php echo getDateTag($val->date);?>").tokenInput("<?php echo base_url()?>master/getDropDown?eid=<?php echo $table_data[0]->exam_id?>&id=RS",{
                                                                                preventDuplicates: true, disabled: <?php echo $disabled; ?>,
                                                                                linkClass:".rs_linkClass_m3_<?php echo getDateTag($val->date);?> ul",
                                                                                linkInput:"rs_input_m3_<?php echo getDateTag($val->date);?>",
                                                                                prePopulate:[
                                                                                    <?php
                                                                                   foreach($populate[getDateTag($val->date)][0][0]["m4"] as $jkey=>$jv){
                                                                                       echo "{id:'{$jv}', name:'{$jkey}'},";
                                                                                   }
                                                                                    ?>],
                                                                                tokenLimit:<?php echo count($populate[getDateTag($val->date)][0][0]["m4"])?>

                                                                                , onAdd: function (item) {
                                                                                    //alert("Added " + item.name);
                                                                                },
                                                                                onDelete: function (item) {
                                                                                    //alert("Deleted " + item.name);
                                                                                }})

                                                                        });
                                                                    </script>
                                                                <?php }?>
                                                                <?php if($val->a3strength != -1) {?>
                                                                    <td class="rs_linkClass_a3_<?php echo getDateTag($val->date);?>"><input type="text" class="rs_input_a3_<?php echo getDateTag($val->date);?>" name="blah" /></td>
                                                                    <script type="text/javascript">
                                                                        $(document).ready(function() {
                                                                            $(".rs_input_a3_<?php echo getDateTag($val->date);?>").tokenInput("<?php echo base_url()?>master/getDropDown?eid=<?php echo $table_data[0]->exam_id?>&id=RS",{
                                                                                preventDuplicates: true, disabled: <?php echo $disabled; ?>,
                                                                                linkClass:".rs_linkClass_a4_<?php echo getDateTag($val->date);?> ul",
                                                                                linkInput:"rs_input_a4_<?php echo getDateTag($val->date);?>",
                                                                                prePopulate:[
                                                                                    <?php
                                                                                   foreach($populate[getDateTag($val->date)][0][1]["a3"] as $jkey=>$jv){
                                                                                       echo "{id:'{$jv}', name:'{$jkey}'},";
                                                                                   }
                                                                                    ?>],
                                                                                tokenLimit:<?php echo count($populate[getDateTag($val->date)][0][1]["a3"])?>

                                                                                , onAdd: function (item) {
                                                                                    //alert("Added " + item.name);
                                                                                },
                                                                                onDelete: function (item) {
                                                                                    //alert("Deleted " + item.name);
                                                                                }})

                                                                        });
                                                                    </script>
                                                                <?php }?>
                                                                <?php if($val->a4strength != -1) {?>
                                                                    <td class="rs_linkClass_a4_<?php echo getDateTag($val->date);?>"><input type="text" class="rs_input_a4_<?php echo getDateTag($val->date);?>" name="blah" /></td>
                                                                    <script type="text/javascript">
                                                                        $(document).ready(function() {
                                                                            $(".rs_input_a4_<?php echo getDateTag($val->date);?>").tokenInput("<?php echo base_url()?>master/getDropDown?eid=<?php echo $table_data[0]->exam_id?>&id=RS",{
                                                                                preventDuplicates: true, disabled: <?php echo $disabled; ?>,
                                                                                linkClass:".rs_linkClass_a3_<?php echo getDateTag($val->date);?> ul",
                                                                                linkInput:"rs_input_a3_<?php echo getDateTag($val->date);?>",
                                                                                prePopulate:[
                                                                                    <?php
                                                                                    foreach($populate[getDateTag($val->date)][0][1]["a4"] as $jkey=>$jv){
                                                                                        echo "{id:'{$jv}', name:'{$jkey}'},";
                                                                                    }
                                                                                     ?>],
                                                                                tokenLimit:<?php echo count($populate[getDateTag($val->date)][0][1]["a4"])?>

                                                                                , onAdd: function (item) {
                                                                                    //alert("Added " + item.name);
                                                                                },
                                                                                onDelete: function (item) {
                                                                                    //alert("Deleted " + item.name);
                                                                                }})

                                                                        });
                                                                    </script>
                                                                <?php }?>


                                                            </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <h5><b>Relieving Superintendent Allocation</b></h5>
                                                    <div style="text-align: -webkit-center;">
                                                        <table class="table table-striped table-bordered table-hover" <?php if($width=="100%") echo "style='width: 50%;'"?>>
                                                            <thead>
                                                            <tr>
                                                                <?php if($val->m3strength != -1) {?>
                                                                    <th style="width: <?php echo $width?>;text-align: center;">M3  <b style="color: crimson;">[<i class="icon-female icon-1x"></i> <?php echo $m3_str[$counter];?> Students]</b></th>
                                                                <?php }?>
                                                                <?php if($val->m4strength != -1) {?>
                                                                    <th style="width: <?php echo $width?>;text-align: center;">M4 <b style="color: crimson;">[<i class="icon-female icon-1x"></i> <?php echo $m4_str[$counter];?> Students]</b></th>
                                                                <?php }?>
                                                                <?php if($val->a3strength != -1) {?>
                                                                    <th style="width: <?php echo $width?>;text-align: center;">A3 <b style="color: crimson;">[<i class="icon-female icon-1x"></i> <?php echo $a3_str[$counter];?> Students]</b></th>
                                                                <?php }?>
                                                                <?php if($val->a4strength != -1) {?>
                                                                    <th style="width: <?php echo $width?>;text-align: center;">A4 <b style="color: crimson;">[<i class="icon-female icon-1x"></i> <?php echo $a4_str[$counter];?> Students]</b></th>
                                                                <?php }?>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            <tr>
                                                                <?php if($val->m3strength != -1) {?>
                                                                    <?php if($val->m3strength <=75){?>
                                                                        <td class="na"><label>---Not Applicable---</label></td>
                                                                    <?php } else {?>
                                                                        <td class="rls_linkClass_m3_<?php echo getDateTag($val->date);?>"><input type="text" class="rls_input_m3_<?php echo getDateTag($val->date);?>" name="blah" /></td>
                                                                        <script type="text/javascript">
                                                                            $(document).ready(function() {
                                                                                $(".rls_input_m3_<?php echo getDateTag($val->date);?>").tokenInput("<?php echo base_url()?>master/getDropDown?eid=<?php echo $table_data[0]->exam_id?>&id=RLS",{
                                                                                    preventDuplicates: true, disabled: <?php echo $disabled; ?>,
                                                                                    linkClass:".rls_linkClass_m4_<?php echo getDateTag($val->date);?> ul",
                                                                                    linkInput:"rls_input_m4_<?php echo getDateTag($val->date);?>",
                                                                                    prePopulate:[
                                                                                        <?php
                                                                                       foreach($populate[getDateTag($val->date)][1][0]["m3"] as $jkey=>$jv){
                                                                                           echo "{id:'{$jv}', name:'{$jkey}'},";
                                                                                       }
                                                                                        ?>],
                                                                                    tokenLimit:<?php echo count($populate[getDateTag($val->date)][1][0]["m3"])?>

                                                                                    , onAdd: function (item) {
                                                                                        //alert("Added " + item.name);
                                                                                    },
                                                                                    onDelete: function (item) {
                                                                                        //alert("Deleted " + item.name);
                                                                                    }})

                                                                            });
                                                                        </script>
                                                                    <?php }}?>
                                                                <?php if($val->m4strength != -1) {?>
                                                                    <?php if($val->m4strength <=75){?>
                                                                        <td class="na"><label>---Not Applicable---</label></td>
                                                                    <?php } else {?>
                                                                        <td class="rls_linkClass_m4_<?php echo getDateTag($val->date);?>"><input type="text" class="rls_input_m4_<?php echo getDateTag($val->date);?>" name="blah" /></td>
                                                                        <script type="text/javascript">
                                                                            $(document).ready(function() {
                                                                                $(".rls_input_m4_<?php echo getDateTag($val->date);?>").tokenInput("<?php echo base_url()?>master/getDropDown?eid=<?php echo $table_data[0]->exam_id?>&id=RLS",{
                                                                                    preventDuplicates: true, disabled: <?php echo $disabled; ?>,
                                                                                    linkClass:".rls_linkClass_m3_<?php echo getDateTag($val->date);?> ul",
                                                                                    linkInput:"rls_input_m3_<?php echo getDateTag($val->date);?>",
                                                                                    prePopulate:[
                                                                                        <?php
                                                                                       foreach($populate[getDateTag($val->date)][1][0]["m4"] as $jkey=>$jv){
                                                                                           echo "{id:'{$jv}', name:'{$jkey}'},";
                                                                                       }
                                                                                        ?>],
                                                                                    tokenLimit:<?php echo count($populate[getDateTag($val->date)][1][0]["m4"])?>

                                                                                    , onAdd: function (item) {
                                                                                        //alert("Added " + item.name);
                                                                                    },
                                                                                    onDelete: function (item) {
                                                                                        //alert("Deleted " + item.name);
                                                                                    }})

                                                                            });
                                                                        </script>
                                                                    <?php }}?>
                                                                <?php if($val->a3strength != -1) {?>
                                                                    <?php if($val->a3strength <=75){?>
                                                                        <td class="na"><label>---Not Applicable---</label></td>
                                                                    <?php } else {?>
                                                                        <td class="rls_linkClass_a3_<?php echo getDateTag($val->date);?>"><input type="text" class="rls_input_a3_<?php echo getDateTag($val->date);?>" name="blah" /></td>
                                                                        <script type="text/javascript">
                                                                            $(document).ready(function() {
                                                                                $(".rls_input_a3_<?php echo getDateTag($val->date);?>").tokenInput("<?php echo base_url()?>master/getDropDown?eid=<?php echo $table_data[0]->exam_id?>&id=RLS",{
                                                                                    preventDuplicates: true, disabled: <?php echo $disabled; ?>,
                                                                                    linkClass:".rls_linkClass_a4_<?php echo getDateTag($val->date);?> ul",
                                                                                    linkInput:"rls_input_a4_<?php echo getDateTag($val->date);?>",
                                                                                    prePopulate:[
                                                                                        <?php
                                                                                       foreach($populate[getDateTag($val->date)][1][1]["a3"] as $jkey=>$jv){
                                                                                           echo "{id:'{$jv}', name:'{$jkey}'},";
                                                                                       }
                                                                                        ?>],
                                                                                    tokenLimit:<?php echo count($populate[getDateTag($val->date)][1][1]["a3"])?>

                                                                                    , onAdd: function (item) {
                                                                                        //alert("Added " + item.name);
                                                                                    },
                                                                                    onDelete: function (item) {
                                                                                        //alert("Deleted " + item.name);
                                                                                    }})

                                                                            });
                                                                        </script>
                                                                    <?php }}?>
                                                                <?php if($val->a4strength != -1) {?>
                                                                    <?php if($val->a4strength <=75){?>
                                                                        <td class="na"><label>---Not Applicable---</label></td>
                                                                    <?php } else {?>
                                                                        <td class="rls_linkClass_a4_<?php echo getDateTag($val->date);?>"><input type="text" class="rls_input_a4_<?php echo getDateTag($val->date);?>" name="blah" /></td>
                                                                        <script type="text/javascript">
                                                                            $(document).ready(function() {
                                                                                $(".rls_input_a4_<?php echo getDateTag($val->date);?>").tokenInput("<?php echo base_url()?>master/getDropDown?eid=<?php echo $table_data[0]->exam_id?>&id=RLS",{
                                                                                    preventDuplicates: true, disabled: <?php echo $disabled; ?>,
                                                                                    linkClass:".rls_linkClass_a3_<?php echo getDateTag($val->date);?> ul",
                                                                                    linkInput:"rls_input_a3_<?php echo getDateTag($val->date);?>",
                                                                                    prePopulate:[
                                                                                        <?php
                                                                                       foreach($populate[getDateTag($val->date)][1][1]["a4"] as $jkey=>$jv){
                                                                                           echo "{id:'{$jv}', name:'{$jkey}'},";
                                                                                       }
                                                                                        ?>],
                                                                                    tokenLimit:<?php echo count($populate[getDateTag($val->date)][1][1]["a4"])?>

                                                                                    , onAdd: function (item) {
                                                                                        //alert("Added " + item.name);
                                                                                    },
                                                                                    onDelete: function (item) {
                                                                                        //alert("Deleted " + item.name);
                                                                                    }})

                                                                            });
                                                                        </script>
                                                                    <?php }}?>


                                                            </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <h5><b>Deputy Superintendent Allocation</b></h5>
                                                    <div style="text-align: -webkit-center;">
                                                        <table class="table table-striped table-bordered table-hover" <?php if($width=="100%") echo "style='width: 50%;'"?>>
                                                            <thead>
                                                            <tr>
                                                                <?php if($val->m3strength != -1) {?>
                                                                    <th style="width: <?php echo $width?>;text-align: center;">M3  <b style="color: crimson;">[<i class="icon-female icon-1x"></i> <?php echo $m3_str[$counter];?> Students]</b></th>
                                                                <?php }?>
                                                                <?php if($val->m4strength != -1) {?>
                                                                    <th style="width: <?php echo $width?>;text-align: center;">M4 <b style="color: crimson;">[<i class="icon-female icon-1x"></i> <?php echo $m4_str[$counter];?> Students]</b></th>
                                                                <?php }?>
                                                                <?php if($val->a3strength != -1) {?>
                                                                    <th style="width: <?php echo $width?>;text-align: center;">A3 <b style="color: crimson;">[<i class="icon-female icon-1x"></i> <?php echo $a3_str[$counter];?> Students]</b></th>
                                                                <?php }?>
                                                                <?php if($val->a4strength != -1) {?>
                                                                    <th style="width: <?php echo $width?>;text-align: center;">A4 <b style="color: crimson;">[<i class="icon-female icon-1x"></i> <?php echo $a4_str[$counter];?> Students]</b></th>
                                                                <?php }?>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            <tr>
                                                                <?php if($val->m3strength != -1) {?>
                                                                    <td class="ds_linkClass_m3_<?php echo getDateTag($val->date);?>"><input type="text" class="ds_input_m3_<?php echo getDateTag($val->date);?>" name="blah" /></td>
                                                                    <script type="text/javascript">
                                                                        $(document).ready(function() {
                                                                            $(".ds_input_m3_<?php echo getDateTag($val->date);?>").tokenInput("<?php echo base_url()?>master/getDropDown?eid=<?php echo $table_data[0]->exam_id?>&id=DS",{
                                                                                preventDuplicates: true, disabled: <?php echo $disabled; ?>,
                                                                                linkClass:".ds_linkClass_m4_<?php echo getDateTag($val->date);?> ul",
                                                                                linkInput:"ds_input_m4_<?php echo getDateTag($val->date);?>",
                                                                                prePopulate:[
                                                                                    <?php
                                                                                   foreach($populate[getDateTag($val->date)][2][0]["m3"] as $jkey=>$jv){
                                                                                       echo "{id:'{$jv}', name:'{$jkey}'},";
                                                                                   }
                                                                                    ?>],
                                                                                tokenLimit:<?php echo count($populate[getDateTag($val->date)][2][0]["m3"])?>

                                                                                , onAdd: function (item) {
                                                                                    //alert("Added " + item.name);
                                                                                },
                                                                                onDelete: function (item) {
                                                                                    //alert("Deleted " + item.name);
                                                                                }})

                                                                        });
                                                                    </script>
                                                                <?php }?>
                                                                <?php if($val->m4strength != -1) {?>
                                                                    <td class="ds_linkClass_m4_<?php echo getDateTag($val->date);?>"><input type="text" class="ds_input_m4_<?php echo getDateTag($val->date);?>" name="blah" /></td>
                                                                    <script type="text/javascript">
                                                                        $(document).ready(function() {
                                                                            $(".ds_input_m4_<?php echo getDateTag($val->date);?>").tokenInput("<?php echo base_url()?>master/getDropDown?eid=<?php echo $table_data[0]->exam_id?>&id=DS",{
                                                                                preventDuplicates: true, disabled: <?php echo $disabled; ?>,
                                                                                linkClass:".ds_linkClass_m3_<?php echo getDateTag($val->date);?> ul",
                                                                                linkInput:"ds_input_m3_<?php echo getDateTag($val->date);?>",
                                                                                prePopulate:[
                                                                                    <?php
                                                                               foreach($populate[getDateTag($val->date)][2][0]["m4"] as $jkey=>$jv){
                                                                                   echo "{id:'{$jv}', name:'{$jkey}'},";
                                                                               }
                                                                                ?>],
                                                                                tokenLimit:<?php echo count($populate[getDateTag($val->date)][2][0]["m4"])?>

                                                                                , onAdd: function (item) {
                                                                                    //alert("Added " + item.name);
                                                                                },
                                                                                onDelete: function (item) {
                                                                                    //alert("Deleted " + item.name);
                                                                                }})

                                                                        });
                                                                    </script>
                                                                <?php }?>
                                                                <?php if($val->a3strength != -1) {?>
                                                                    <td class="ds_linkClass_a3_<?php echo getDateTag($val->date);?>"><input type="text" class="ds_input_a3_<?php echo getDateTag($val->date);?>" name="blah" /></td>
                                                                    <script type="text/javascript">
                                                                        $(document).ready(function() {
                                                                            $(".ds_input_a3_<?php echo getDateTag($val->date);?>").tokenInput("<?php echo base_url()?>master/getDropDown?eid=<?php echo $table_data[0]->exam_id?>&id=DS",{
                                                                                preventDuplicates: true, disabled: <?php echo $disabled; ?>,
                                                                                linkClass:".ds_linkClass_a4_<?php echo getDateTag($val->date);?> ul",
                                                                                linkInput:"ds_input_a4_<?php echo getDateTag($val->date);?>",
                                                                                prePopulate:[
                                                                                    <?php
                                                                                   foreach($populate[getDateTag($val->date)][2][1]["a3"] as $jkey=>$jv){
                                                                                       echo "{id:'{$jv}', name:'{$jkey}'},";
                                                                                   }
                                                                                    ?>],
                                                                                tokenLimit:<?php echo count($populate[getDateTag($val->date)][2][1]["a3"])?>

                                                                                , onAdd: function (item) {
                                                                                    //alert("Added " + item.name);
                                                                                },
                                                                                onDelete: function (item) {
                                                                                    //alert("Deleted " + item.name);
                                                                                }})

                                                                        });
                                                                    </script>
                                                                <?php }?>
                                                                <?php if($val->a4strength != -1) {?>
                                                                    <td class="ds_linkClass_a4_<?php echo getDateTag($val->date);?>"><input type="text" class="ds_input_a4_<?php echo getDateTag($val->date);?>" name="blah" /></td>
                                                                    <script type="text/javascript">
                                                                        $(document).ready(function() {
                                                                            $(".ds_input_a4_<?php echo getDateTag($val->date);?>").tokenInput("<?php echo base_url()?>master/getDropDown?eid=<?php echo $table_data[0]->exam_id?>&id=DS",{
                                                                                preventDuplicates: true, disabled: <?php echo $disabled; ?>,
                                                                                linkClass:".ds_linkClass_a3_<?php echo getDateTag($val->date);?> ul",
                                                                                linkInput:"ds_input_a3_<?php echo getDateTag($val->date);?>",
                                                                                prePopulate:[
                                                                                    <?php
                                                                                   foreach($populate[getDateTag($val->date)][2][1]["a4"] as $jkey=>$jv){
                                                                                       echo "{id:'{$jv}', name:'{$jkey}'},";
                                                                                   }
                                                                                    ?>],
                                                                                tokenLimit:<?php echo count($populate[getDateTag($val->date)][2][1]["a4"])?>

                                                                                , onAdd: function (item) {
                                                                                    //alert("Added " + item.name);
                                                                                },
                                                                                onDelete: function (item) {
                                                                                    //alert("Deleted " + item.name);
                                                                                }})

                                                                        });
                                                                    </script>
                                                                <?php }?>


                                                            </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>


                                                </div>
                                            </div>
                                            <?php $counter++; }
                                    }?>

                                    <?php echo $this->session->flashdata('message'); ?>

                                    <div class="form-actions no-margin-bottom" style="text-align:center;">

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
    <?php echo $jsfile;?>
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





    </script>
</body>
<!-- END BODY-->

</html>
