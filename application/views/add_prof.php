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

    <script type="text/javascript" src="<?php echo asset_url();?>js/jquery.min.js"></script> 
    

	
	

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

           <?php if($type=='edit'): ?>

            



						<div class="col-lg-12">

                            <div class="box">

                                <header>

                                    <div class="icons"><i class="icon-th-large"></i></div>

                                    <h5>Edit Faculty</h5>

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

                                    <form action="<?php echo base_url().'master/prof_edit_save';?>" class="form-horizontal" id="brand-validate" onsubmit="return validate();" method="post" enctype="multipart/form-data">

										<input type="hidden" id="pid" name="pid" class="form-control" required value="<?php echo $prof[0]->id;?>"/>
                                        <input type="hidden" id="eid" name="eid" class="form-control" required value="<?php echo $eid;?>"/>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Faculty ID<font style="color: red;">*</font></label>
                                                <div class="col-lg-4">
                                                    <input type="text" id="usn" name="usn" class="form-control"  required  value="<?php echo $prof[0]->usn;?>" readonly disabled/>
                                                </div>
                                         </div>



                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Name<font style="color: red;">*</font></label>
                                            <div class="col-lg-4">

                                                <input type="text" id="name" name="name" class="form-control"  required value="<?php echo $prof[0]->name;?>"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Department<font style="color: red;">*</font></label>
                                            <div class="col-lg-4">
                                                <select name="dept" class="form-control" required="">
                                                    <option value="">--select--</option>
                                                    <?php
                                                    if(is_array($dept) && count($dept)>=1){
                                                        foreach($dept as $val){
                                                            $selected="";
                                                            if($prof[0]->dept_id == $val->id)
                                                                $selected="selected";
                                                            echo "<option value='{$val->id}' {$selected}>{$val->name}</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Designation<font style="color: red;">*</font></label>
                                            <div class="col-lg-4">
                                                <select name="desig" class="form-control" required="">
                                                    <option value="">--select--</option>
                                                    <?php
                                                    if(is_array($desig) && count($desig)>=1){
                                                        foreach($desig as $val){
                                                            $selected="";
                                                            if($prof[0]->did == $val->id)
                                                                $selected="selected";
                                                            echo "<option value='{$val->id}' {$selected}>{$val->name}</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Email ID<font style="color: red;">*</font></label>
                                            <div class="col-lg-4">
                                                <input type="email" id="email" name="email" class="form-control"  required  value="<?php echo $prof[0]->email;?>"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Phone<font style="color: red;">*</font></label>
                                            <div class="col-lg-4">
                                                <input type="text" id="phone" name="phone" class="form-control"  required  value="<?php echo $prof[0]->phone;?>"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Account Number</label>
                                            <div class="col-lg-4">
                                                <input type="text" id="acc" name="acc" class="form-control" value="<?php echo $prof[0]->acc_num;?>"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Exclude Dates</label>
                                            <div class="col-lg-3">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Tick</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php if(is_array($dates) && count($dates)>=1){
                                                        foreach($dates as $ex_dtd){
                                                            $checked="";
                                                            if(in_array($ex_dtd->db_date,$ex_dates)){
                                                                $checked = "checked";
                                                            }
                                                            echo "<tr><td>{$ex_dtd->date}</td>";
                                                            echo "<td><div class='checkbox'><input style='margin-top: -4px;' {$checked} type='checkbox' value='{$ex_dtd->db_date}' name='exclude_dt[]'></div></td></tr>";
                                                        }
                                                    }?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>



                                        


                                       

                                        <div class="form-actions no-margin-bottom" style="text-align:center;">
                                            <a href="<?php echo base_url()."master/prof?id={$eid}";?>" class="btn btn-primary btn-sm"><i class="icon-reply "></i> Back</a>&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-success btn-sm "><i class="icon-save "></i> Save Changes</button>
                                       </div>

									<div id="msgbox"></div>

                                    </form>

                                </div>

                            </div>

                        </div>


            <?php else: ?>

                        <div class="col-lg-12">

                            <div class="box">

                                <header>

                                    <div class="icons"><i class="icon-th-large"></i></div>

                                    <h5>Add New Faculty</h5>

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

                                    <form action="<?php echo base_url().'master/save_prof';?>" class="form-horizontal" id="brand-validate" method="post" enctype="multipart/form-data">

                                        <input type="hidden" id="eid" name="eid" class="form-control" required value="<?php echo $eid;?>"/>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Faculty ID<font style="color: red;">*</font></label>
                                            <div class="col-lg-4">
                                                <input type="text" id="usn" name="usn" class="form-control"  required  value="">
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Name<font style="color: red;">*</font></label>
                                            <div class="col-lg-4">

                                                <input type="text" id="name" name="name" class="form-control"  required value=""/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Department<font style="color: red;">*</font></label>
                                            <div class="col-lg-4">
                                                <select name="dept" class="form-control" required="">
                                                    <option value="">--select--</option>
                                                    <?php
                                                    if(is_array($dept) && count($dept)>=1){
                                                        foreach($dept as $val){
                                                            echo "<option value='{$val->id}'>{$val->name}</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Designation<font style="color: red;">*</font></label>
                                            <div class="col-lg-4">
                                                <select name="desig" class="form-control" required="">
                                                    <option value="">--select--</option>
                                                    <?php
                                                    if(is_array($desig) && count($desig)>=1){
                                                        foreach($desig as $val){
                                                            echo "<option value='{$val->id}'>{$val->name}</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Email ID<font style="color: red;">*</font></label>
                                            <div class="col-lg-4">
                                                <input type="email" id="email" name="email" class="form-control"  required  value=""/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Phone<font style="color: red;">*</font></label>
                                            <div class="col-lg-4">
                                                <input type="text" id="phone" name="phone" class="form-control onlynumbers"  required  value=""/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Account Number</label>
                                            <div class="col-lg-4">
                                                <input type="text" id="acc" name="acc" class="form-control"/>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Exclude Dates</label>
                                            <div class="col-lg-3">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Tick</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php if(is_array($dates) && count($dates)>=1){
                                                        foreach($dates as $ex_dtd){
                                                            echo "<tr><td>{$ex_dtd->date}</td>";
                                                            echo "<td><div class='checkbox'><input style='margin-top: -4px;' type='checkbox' value='{$ex_dtd->db_date}' name='exclude_dt[]'></div></td></tr>";
                                                        }
                                                    }?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="form-actions no-margin-bottom" style="text-align:center;">
                                            <a href="<?php echo base_url()."master/prof?id={$eid}";?>" class="btn btn-primary btn-sm"><i class="icon-reply "></i> Back</a>&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-success btn-sm "><i class="icon-save "></i> Save Changes</button>                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
           <?php endif;?>
                    </div>
                </div>
            <hr/>
            </div>
        </div>
        <!--END PAGE CONTENT -->
    </div>



     <!--END MAIN WRAPPER -->



   <!-- FOOTER -->

    <div id="footer">

        <p>  <?php echo fottertitle;?></p>

    </div>

    <!--END FOOTER -->

     <!-- GLOBAL SCRIPTS -->

     <script src="<?php echo asset_url();?>plugins/bootstrap/js/bootstrap.min.js"></script>

    <script src="<?php echo asset_url();?>plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- END GLOBAL SCRIPTS -->

    
<?php echo $jsfile;?>
    

     <script src="<?php echo asset_url();?>plugins/validationengine/js/jquery.validationEngine.js"></script>

    <script src="<?php echo asset_url();?>plugins/validationengine/js/languages/jquery.validationEngine-en.js"></script>

    <script src="<?php echo asset_url();?>plugins/jquery-validation-1.11.1/dist/jquery.validate.min.js"></script>

    <script src="<?php echo asset_url();?>plugins/jasny/js/bootstrap-fileupload.js"></script>
    

    <script>
    
        $(function () { 

        	
        	
           $('#brand-validate').validate({

           rules: {
               phone: {
                   minlength:10,
                   maxlength:10
               }
           },

            errorClass: 'help-block',

            errorElement: 'span',

            highlight: function (element, errorClass, validClass) {

                $(element).parents('.form-group').addClass('has-error');

            },

            unhighlight: function (element, errorClass, validClass) {

                $(element).parents('.form-group').removeClass('has-error');

            }

        	});

       });

	   

	   

 </script>
 





</body>

    <!-- END BODY-->

    

</html>

