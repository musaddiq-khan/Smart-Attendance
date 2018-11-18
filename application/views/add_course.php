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
        .button5 {
            background-color: white;
            color: black;
            border: 2px solid #555555;
        }
        .button5:hover {
            background-color: #555555;
            color: white;
        }
        .button {
            background-color:gray; /* Green */
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            cursor: pointer;
        }




    </style>
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
    <?php echo $adminleft;?>
    <!--END MENU SECTION -->


    <!--PAGE CONTENT -->
    <div id="content">
        <button type="button" id="footera" class="btn btn-primary btn-sm btn-circle" onclick="locate_next();" value="asdd" name="asda"><h3 class="fl_text">Next</h3></button>
        <div class="inner" style="min-height:1200px;">
            <div class="row">
                <div class="col-lg-12">

                    <h2 class="page-header">DETAILS</h2>







                    <div class="col-lg-12 ani">

                        <div class="box">
                            <header>
                                <div class="icons"><i class="icon-th-large"></i></div>
                                <h5>Dashboard</h5>


                            </header>
                            <br>
                            <form method="post" action="<?php echo base_url();?>dutyadmin/add_sub">
                               course code:&nbsp;&nbsp;&nbsp;&nbsp;<select name="code">
                                    <option>--select--</option>
                                    <option value="16mca5dcsp">16mca5dcsp</option>
                                    <option value="16mca5dcwd">16mca5dcwd</option>
                                    <option value="16mca5demm">16mca5demm</option>
                                    <option value="16mca5demn">16mca5demn</option>
                                    <option value="16mca5dews">16mca5dews</option>
                                    <option value="16mca5desc">16mca5desc</option>
                                    <option value="16mca5dean">16mca5dean</option>
                                    <option value="16mca5deis">16mca5deis</option>
                                    <option value="16mca5derp">16mca5derp</option>
                                    <option value="16mca5debe">16mca5debe</option>
                                    <option value="16mca5dema">16mca5dema</option>
                                    <option value="16mca5deml">16mca5deml</option>
                                    <option value="16mca5dems">16mca5dems</option>
                                    <option value="16mca5deob">16mca5deob</option>

                                </select><br/><br/>
                               course name:&nbsp;&nbsp;<select name="cname">
                                    <option>--select--</option>
                                    <option value="Software_Project_Management">Software_Project_Management</option>
                                    <option value="WAD_with_c#.Net">WAD with c#.Net</option>
                                    <option value="Multimedia_systems">Multimedia_systems</option>
                                    <option value="Mobile_ad_hoc_and_wireless_sensor_network">Mobile_ad_hoc_and_wireless_sensor_network</option>
                                    <option value="Web_Services">Web_Services</option>
                                    <option value="Soft_computing">Soft_computing</option>
                                    <option value="Advanced_computer_Network">Advanced_computer_Network</option>
                                    <option value="Information_Security">Information_Security</option>
                                    <option value="Enterprise_Resource_planning">Enterprise_Resource_planning</option>
                                    <option value="Building_enterprise_application">Building_enterprise_application</option>
                                    <option value="Mobile_apllication">Mobile_apllication</option>
                                    <option value="Machine_learning">Machine_learning</option>
                                    <option value="Micro_Services">Micro_Services</option>
                                    <option value="Organizational_Beahaviour">Organizational_Beahaviour</option>

                                </select><br/><br/>
                               category:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="cat">
                                    <option>--select--</option>
                                    <option value="core">core</option>
                                    <option value="elective">elective</option>
                                    <option value="Not Valid">Not Offered</option>
                                </select><br/><br/>

                                <input type="submit" value="add">
                            </form>



                        </div>
                    </div>


                </div>
            </div>

            <hr/>


        </div>

    </div>

    <div id="collapseOne" class="accordion-body collapse in body">










        <?php echo $this->session->flashdata('message'); ?>


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
    <p><?php echo fottertitle;?> </p>
</div>
<!--END FOOTER -->
<!-- GLOBAL SCRIPTS -->
<script src="<?php echo asset_url();?>plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo asset_url();?>plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<?php echo $jsfile;?>

</body>
<!-- END BODY-->

</html>
