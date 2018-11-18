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

                        <h2 class="page-header">Duty Attendance</h2>

            

						<div class="col-lg-12">
                            <div class="box">
                                <header>
                                    <div class="icons"><i class="icon-th-large"></i></div>
                                    <h5>Duty Attendance</h5>
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
                                    <form action="<?php echo base_url().'master/tick';?>" class="form-horizontal" id="brand-validate" method="post" target="_blank">

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Exam<font style="color: red;">*</font></label>
                                            <div class="col-lg-4">
                                                <input type="hidden" value="<?php echo $exam_id;?>" name="exam_id">
                                                <select name="exam" disabled class="form-control" >
                                                    <option value="-1">--All--</option>
                                                    <?php
                                                    if(is_array($exam) && count($exam)>=1){
                                                        foreach($exam as $val){
                                                            if($val->exam_id == $exam_id)
                                                                echo "<option selected value='{$val->exam_id}'>{$val->exam_id}</option>";
                                                            else
                                                                echo "<option value='{$val->exam_id}'>{$val->exam_id}</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <input type="hidden" name="exam" value="<?php echo $exam_id;?>">




                                        <div class="advanced">
                                            <div class="form-group">
                                                <label class="control-label col-lg-4">Date<font style="color: red;">*</font></label>
                                                <div class="col-lg-4">
                                                    <select name="ex_date" class="form-control" required="">
                                                        <option value="">--Select--</option>
                                                        <?php
                                                        if(is_array($timetable) && count($timetable)>=1){
                                                            foreach($timetable as $val){
                                                                echo "<option value='{$val->date}'>{$val->date}</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>

                                        <?php echo $this->session->flashdata('message'); ?>
                                        
                                        <div class="form-actions no-margin-bottom" style="text-align:center;">
                                            
                                            <a href="<?php echo base_url().'master/timetable';?>" class="btn btn-primary btn-sm"><i class="icon-reply "></i> Back</a>&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-success btn-sm "><i class="icon-credit-card"></i> Generate Report</button>
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
    <script src="<?php echo asset_url();?>plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
    
    
     <script src="<?php echo asset_url();?>plugins/validationengine/js/jquery.validationEngine.js"></script>
    <script src="<?php echo asset_url();?>plugins/validationengine/js/languages/jquery.validationEngine-en.js"></script>
    <script src="<?php echo asset_url();?>plugins/jquery-validation-1.11.1/dist/jquery.validate.min.js"></script>
        <script src="<?php echo asset_url();?>js/spiner.js"></script>
        <script src="<?php echo asset_url();?>js/loadingoverlay.js"></script>
        <?php echo $jsfile;?>

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
        function addmore()
        {
            var x=Math.floor((Math.random() * 10000) + 1);
            var row="<tr id='r_"+x+"'><td><input type='text' name='np[]' class='form-control' required placeholder=''/></td><td><span class='btn btn-sm btn-danger' onclick='remove123("+x+")'>- Remove</span></td></tr>";
            $('#p').append(row);
        }

        function remove123(trid)
        {
            $("#r_"+trid).fadeOut(500, function () { $("#r_"+trid).remove(); });
        }

        function getTime(date){

            mask();
            $.post("<?php echo base_url();?>master/getTime", {date: date,ex_id:"<?php echo $this->input->get("exam_id");?>"}, function(result){
                if(result.trim() != ""){
                    $("#time_drop").html(result);

                } else {
                    $("#time_drop").html('<option value="">--ERROR--</option>');
                    console.log(result);
                }
                unmask();
            });
        }
        
      
   
    </script>


     
</body>
    <!-- END BODY-->
    
</html>
