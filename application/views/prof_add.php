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
    <link rel="stylesheet" href="<?php echo asset_url();?>plugins/CLEditor1_4_3/jquery.cleditor.css" />
    <link rel="stylesheet" href="<?php echo asset_url();?>css/jquery.cleditor-hack.css" />
    <link rel="stylesheet" href="<?php echo asset_url();?>css/bootstrap-wysihtml5-hack.css" />
    <script type="text/javascript" src="<?php echo asset_url();?>js/jquery.min.js"></script>

<style type="text/css">
    .mininwidth{
    width: 120px;
    }
     .mininwidth1{
    width: 80px;
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
       <?php echo $left;?>
        <!--END MENU SECTION -->


        <!--PAGE CONTENT -->
        <div id="content">
        <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12">

                        <h2 class="page-header">Faculties</h2>

            

						<div class="col-lg-12">
                            <div class="box">
                                <header>
                                    <div class="icons"><i class="icon-th-large"></i></div>
                                    <h5>Import Faculties</h5>
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
                                    <form action="<?php echo base_url().'master/import_csv';?>" class="form-horizontal" id="brand-validate" method="post" enctype="multipart/form-data">


                                        <br><br><br><br>

                                        <input type="hidden" id="eid" name="eid" class="form-control" required value="<?php echo $eid;?>"/>
                                        <div class="form-group" id="imgh" >
                                            <label class="control-label col-lg-5">CSV File</label>
                                            <div class="col-lg-7">
                                                <input class="input-file uniform_on" id="pinfile" required="required"  name="pinfile" type="file">
                                                <p class="help-block alert-info" style="display:inline-block;"><b>Note: Upload only .csv file.</b></p><br>
                                            </div>
                                        </div>

                                        <div class="row-fluid padd-bottom">
                                            <div class="span12">
                                                                        <span class="thumbnail">
                                                                            <p class="help-block alert-info" style="display:inline-block;margin-left:39%;"><b>The .csv file should be in below format.</b></p>
                                        <img src="<?php echo asset_url();?>images/csv.png">

                                        </span>

                                            </div>
                                        </div>
                                        <div class="form-actions no-margin-bottom" style="text-align:center;">

                                            <a href="<?php echo base_url()."master/prof?id={$eid}";?>" class="btn btn-primary btn-sm"><i class="icon-reply "></i> Back</a>&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-success btn-sm "><i class="icon-save "></i> Import</button>
                                        </div>
                                        <br>

                                        <?php echo $this->session->flashdata('message'); ?>
                                        


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
    <script src="<?php echo asset_url();?>plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
    
    
     <script src="<?php echo asset_url();?>plugins/validationengine/js/jquery.validationEngine.js"></script>
    <script src="<?php echo asset_url();?>plugins/validationengine/js/languages/jquery.validationEngine-en.js"></script>
    <script src="<?php echo asset_url();?>plugins/jquery-validation-1.11.1/dist/jquery.validate.min.js"></script>

    <script>

        $(function () { 

        	var v = $("#brand-validate").validate({
        		errorClass: "help-block",
        		errorElement: 'span',
        		onkeyup: false,
        		onblur: false,
        		rules: {
        		    
        		      
        			'np[]': {
        		        required: true,
        		        
        		      }

        		      
        		    },
        		    
        		    messages: { 
        		    	'np[]':{
        		    	//remote: jQuery.validator.format("{0} already exists.")
        		    	},
        		    	
        		    	
        		    	
        	        },
        	        errorElement: 'span',
                    highlight: function (element, errorClass, validClass) {
                    $(element).parents('.form-group').addClass('has-error');
                    },
                    unhighlight: function (element, errorClass, validClass) {
                    $(element).parents('.form-group').removeClass('has-error');
                    }
        		    
        	});
            });

        $("#pinfile").change(function () {
            var fileExtension = ['csv', 'CSV'];
            if ($.inArray($(this).val().substring($(this).val().lastIndexOf('.') + 1).toLowerCase(), fileExtension) == -1) {
                alert("Only CSV files are allowed..!!");
                $(this).val("");
            }
        });
        
      
   
    </script>


     
</body>
    <!-- END BODY-->
    
</html>
