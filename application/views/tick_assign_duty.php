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

                    <h2 class="page-header">Duty Attendance</h2>







                    <div class="col-lg-12 ani">

                        <div class="box">
                            <header>
                                <div class="icons"><i class="icon-th-large"></i></div>
                                <h5>Duty Attendance -- <?php if(is_array($table_data) && count($table_data)>=1){ echo $table_data[0]->exam_id." || ".$table_data[0]->date;}?></h5>
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



                            <div id="collapseOne" class="accordion-body collapse in body">


                                <form action="<?php echo base_url().'master/tick_save';?>" class="form-horizontal tick_save" id="brand-validate" method="post" enctype="multipart/form-data">





                                    <div class="form-group" style="text-align: center;">
                                        <label class="control-label col-lg-4">Show<font style="color: red;">*</font></label>
                                        <div class="col-lg-4">

                                            <select name="exam" class="form-control" onchange="showsession(this.value)">
                                                <option value="-1" selected>--Select--</option>
                                                <?php
                                                if(is_array($table_data) && count($table_data)>=1){
                                                    if($table_data[0]->m3strength != -1)
                                                        echo "<option value='m3'>M3 Session ({$table_data[0]->date})</option>";

                                                    if($table_data[0]->m4strength != -1)
                                                        echo "<option value='m4'>M4 Session ({$table_data[0]->date})</option>";

                                                    if($table_data[0]->a3strength != -1)
                                                        echo "<option value='a3'>A3 Session ({$table_data[0]->date})</option>";

                                                    if($table_data[0]->a4strength != -1)
                                                        echo "<option value='a4'>A4 Session ({$table_data[0]->date})</option>";
                                                }
                                                ?>
                                            </select>
                                        </div><br><br><br>
                                        <a onclick="check_all();"><label>Check All</label></a>
                                    </div>
                                    <br>


                                    <?php if(is_array($table_data) && count($table_data)>=1){
                                        $counter=0;
                                        $date ="";
                                        $date2 ="";
                                        foreach($table_data as $val){
                                            $date = getDateTag($val->date);
                                            $date2 = $val->date;
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

                                            <div class="box col-lg-12 show_hide" style="display: none;">
                                                <header style="cursor: pointer;background: #e5eaef;" data-toggle="collapse" href="#<?php echo "ex_id_".$counter?>" class="expand">
                                                    <h5><?php echo $val->date;?>&nbsp;&nbsp;&nbsp;&nbsp;


                                                </header>

                                                <div class="body_ in" id="<?php echo "ex_id_".$counter?>" style="height: auto; text-align: center;">

                                                    <h5><b>Room Superintendent Allocation</b></h5>
                                                    <div style="text-align: -webkit-center;">
                                                        <table class="table table-striped table-bordered table-hover" style="width: 50%;">
                                                            <thead>
                                                            <tr>
                                                                <?php if($val->m3strength != -1) {?>
                                                                    <th class="m3" style="width: <?php echo $width?>;text-align: center;">M3</th>
                                                                <?php }?>
                                                                <?php if($val->m4strength != -1) {?>
                                                                    <th class="m4" style="width: <?php echo $width?>;text-align: center;">M4</th>
                                                                <?php }?>
                                                                <?php if($val->a3strength != -1) {?>
                                                                    <th class="a3" style="width: <?php echo $width?>;text-align: center;">A3</th>
                                                                <?php }?>
                                                                <?php if($val->a4strength != -1) {?>
                                                                    <th class="a4" style="width: <?php echo $width?>;text-align: center;">A4</th>
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
                                                                                d_date:"<?php echo getDateTag($val->date);?>",
                                                                                d_session:"m3",
                                                                                d_desig:"RS",
                                                                                preTick:[
                                                                                    <?php
                                                                                   foreach($pre_tick["m3"] as $jv){
                                                                                       echo "'{$jv}',";
                                                                                   }
                                                                                    ?>],
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
                                                                                d_date:"<?php echo getDateTag($val->date);?>",
                                                                                d_session:"m4",
                                                                                d_desig:"RS",
                                                                                preTick:[
                                                                                    <?php
                                                                                   foreach($pre_tick["m4"] as $jv){
                                                                                       echo "'{$jv}',";
                                                                                   }
                                                                                    ?>],
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
                                                                                d_date:"<?php echo getDateTag($val->date);?>",
                                                                                d_session:"a3",
                                                                                d_desig:"RS",
                                                                                preTick:[
                                                                                    <?php
                                                                                   foreach($pre_tick["a3"] as $jv){
                                                                                       echo "'{$jv}',";
                                                                                   }
                                                                                    ?>],
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
                                                                                d_date:"<?php echo getDateTag($val->date);?>",
                                                                                d_session:"a4",
                                                                                d_desig:"RS",
                                                                                preTick:[
                                                                                    <?php
                                                                                   foreach($pre_tick["a4"] as $jv){
                                                                                       echo "'{$jv}',";
                                                                                   }
                                                                                    ?>],
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
                                                        <table class="table table-striped table-bordered table-hover" style="width: 50%;">
                                                            <thead>
                                                            <tr>
                                                                <?php if($val->m3strength != -1) {?>
                                                                    <th class="m3" style="width: <?php echo $width?>;text-align: center;">M3</th>
                                                                <?php }?>
                                                                <?php if($val->m4strength != -1) {?>
                                                                    <th class="m4" style="width: <?php echo $width?>;text-align: center;">M4</th>
                                                                <?php }?>
                                                                <?php if($val->a3strength != -1) {?>
                                                                    <th class="a3" style="width: <?php echo $width?>;text-align: center;">A3</th>
                                                                <?php }?>
                                                                <?php if($val->a4strength != -1) {?>
                                                                    <th class="a4" style="width: <?php echo $width?>;text-align: center;">A4</th>
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
                                                                                    d_date:"<?php echo getDateTag($val->date);?>",
                                                                                    d_session:"m3",
                                                                                    d_desig:"RLS",
                                                                                    preTick:[
                                                                                        <?php
                                                                                       foreach($pre_tick["m3"] as $jv){
                                                                                           echo "'{$jv}',";
                                                                                       }
                                                                                        ?>],
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
                                                                                    d_date:"<?php echo getDateTag($val->date);?>",
                                                                                    d_session:"m4",
                                                                                    d_desig:"RLS",
                                                                                    preTick:[
                                                                                        <?php
                                                                                       foreach($pre_tick["m4"] as $jv){
                                                                                           echo "'{$jv}',";
                                                                                       }
                                                                                        ?>],
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
                                                                                    d_date:"<?php echo getDateTag($val->date);?>",
                                                                                    d_session:"a3",
                                                                                    d_desig:"RLS",
                                                                                    preTick:[
                                                                                        <?php
                                                                                       foreach($pre_tick["a3"] as $jv){
                                                                                           echo "'{$jv}',";
                                                                                       }
                                                                                        ?>],
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
                                                                                    d_date:"<?php echo getDateTag($val->date);?>",
                                                                                    d_session:"a4",
                                                                                    d_desig:"RLS",
                                                                                    preTick:[
                                                                                        <?php
                                                                                       foreach($pre_tick["a4"] as $jv){
                                                                                           echo "'{$jv}',";
                                                                                       }
                                                                                        ?>],
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
                                                        <table class="table table-striped table-bordered table-hover" style="width: 50%;">
                                                            <thead>
                                                            <tr>
                                                                <?php if($val->m3strength != -1) {?>
                                                                    <th class="m3" style="width: <?php echo $width?>;text-align: center;">M3</th>
                                                                <?php }?>
                                                                <?php if($val->m4strength != -1) {?>
                                                                    <th class="m4" style="width: <?php echo $width?>;text-align: center;">M4</th>
                                                                <?php }?>
                                                                <?php if($val->a3strength != -1) {?>
                                                                    <th class="a3" style="width: <?php echo $width?>;text-align: center;">A3</th>
                                                                <?php }?>
                                                                <?php if($val->a4strength != -1) {?>
                                                                    <th class="a4" style="width: <?php echo $width?>;text-align: center;">A4</th>
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
                                                                                d_date:"<?php echo getDateTag($val->date);?>",
                                                                                d_session:"m3",
                                                                                d_desig:"DS",
                                                                                preTick:[
                                                                                    <?php
                                                                                   foreach($pre_tick["m3"] as $jv){
                                                                                       echo "'{$jv}',";
                                                                                   }
                                                                                    ?>],
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
                                                                                d_date:"<?php echo getDateTag($val->date);?>",
                                                                                d_session:"m4",
                                                                                d_desig:"DS",
                                                                                preTick:[
                                                                                    <?php
                                                                                   foreach($pre_tick["m4"] as $jv){
                                                                                       echo "'{$jv}',";
                                                                                   }
                                                                                    ?>],
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
                                                                                d_date:"<?php echo getDateTag($val->date);?>",
                                                                                d_session:"a3",
                                                                                d_desig:"DS",
                                                                                preTick:[
                                                                                    <?php
                                                                                   foreach($pre_tick["a3"] as $jv){
                                                                                       echo "'{$jv}',";
                                                                                   }
                                                                                    ?>],
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
                                                                                d_date:"<?php echo getDateTag($val->date);?>",
                                                                                d_session:"a4",
                                                                                d_desig:"DS",
                                                                                preTick:[
                                                                                    <?php
                                                                                   foreach($pre_tick["a4"] as $jv){
                                                                                       echo "'{$jv}',";
                                                                                   }
                                                                                    ?>],
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

                                    <input type="hidden" name="tick_ex_id" value="<?php echo $exam_id;?>">
                                    <input type="hidden" name="tick_ex_date" value="<?php echo $date;?>">
                                    <div class="form-actions no-margin-bottom show_hide" style="text-align:center; display: none;">

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
    <script src="<?php echo asset_url();?>js/jquery.tokeninput_tick.js"></script>

    <script src="<?php echo asset_url();?>plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="<?php echo asset_url();?>js/spiner.js"></script>
    <script src="<?php echo asset_url();?>js/loadingoverlay.js"></script>
<script src="<?php echo asset_url();?>js/powerange.js"></script>
    <?php echo $jsfile;?>
    <!-- END GLOBAL SCRIPTS -->





    <script>
        function check_all(){
            $('input:visible').each(function() {
                $(this).attr('checked', true);
            });
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

            $.post("<?php echo base_url()?>master/edit_duty_save", {arr: JSON.stringify(arr),exam_id: "<?php echo $exam_id;?>",date:"<?php echo $date2;?>"}, function(result){
                console.log(result);
                $(".tick_save").submit();
            });
        }
        function showsession(ses){
            $(".show_hide").show();
            $(".rs_linkClass_m3_<?php echo $date;?>").hide();
            $(".rls_linkClass_m3_<?php echo $date;?>").hide();
            $(".ds_linkClass_m3_<?php echo $date;?>").hide();

            $(".rs_linkClass_m4_<?php echo $date;?>").hide();
            $(".rls_linkClass_m4_<?php echo $date;?>").hide();
            $(".ds_linkClass_m4_<?php echo $date;?>").hide();

            $(".rs_linkClass_a3_<?php echo $date;?>").hide();
            $(".rls_linkClass_a3_<?php echo $date;?>").hide();
            $(".ds_linkClass_a3_<?php echo $date;?>").hide();

            $(".rs_linkClass_a4_<?php echo $date;?>").hide();
            $(".rls_linkClass_a4_<?php echo $date;?>").hide();
            $(".ds_linkClass_a4_<?php echo $date;?>").hide();

            $(".m3").hide();
            $(".m4").hide();
            $(".a3").hide();
            $(".a4").hide();

            $(".rs_linkClass_"+ses+"_<?php echo $date;?>").show();
            $(".rls_linkClass_"+ses+"_<?php echo $date;?>").show();
            $(".ds_linkClass_"+ses+"_<?php echo $date;?>").show();
            $("."+ses).show();

            if(ses==-1)
                $(".show_hide").hide();



        }

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








    </script>
</body>
<!-- END BODY-->

</html>
