<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->



<!-- BEGIN HEAD --><head>

     <meta charset="UTF-8" />

    <title><?php echo title;?></title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<meta content="" name="description" />

	<meta content="" name="author" />

     <!--[if IE]>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <![endif]-->

    <!-- GLOBAL STYLES -->

     <!-- PAGE LEVEL STYLES -->

     <link rel="stylesheet" href="<?php echo asset_url();?>plugins/bootstrap/css/bootstrap.css" />

     <link rel="stylesheet" href="<?php echo asset_url();?>css/main.css" />

    <link rel="stylesheet" href="<?php echo asset_url();?>css/login.css" />

    <link rel="stylesheet" href="<?php echo asset_url();?>plugins/magic/magic.css" />

    

     <!-- END PAGE LEVEL STYLES -->

   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

    <![endif]-->

</head>

    <!-- END HEAD -->



    <!-- BEGIN BODY -->

    

<style>

		body {
            background:url(assets/img/final.png);
            background-position: 0px -60px;
            background-size: cover;
        }

		.well {

			border: 7px solid #3d93c4;

			box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05) inset;

			margin-bottom: 20px;

			min-height: 20px;

			padding: 17px;

			background-color:#fff;

		}

		.panel {

			border-radius: 0px;

		}

		legend {

			font-size: 17px;

			line-height: inherit;

			margin-bottom: 3px;

			padding-bottom: 12px;

			width: 75%;

		}

	</style>

<body >







   <!-- PAGE CONTENT --> 

    <div class="container" align="center">



    <div class="tab-content" style="border: none;width: 42%;">

    <div class="panel panel-default well well-small">
        <div class="text-center">

            <img style="width: 30%"  src="<?php echo asset_url();?>img/logo.png" id="logoimg" alt=" Logo" />

        </div>
    <legend>Login</legend>


        <div id="login" class="tab-pane active">

                <form method="post" action="<?php echo base_url();?>" class="form-signin">

                <?php echo $this->session->flashdata('message'); ?>

                <input type="email" placeholder="Username" class="form-control" name="username" required="required"/>

                <input type="password" placeholder="Password" class="form-control" name="password" required="required"/>

                <!-- <button class="btn text-muted text-center btn-danger" type="submit" name="login">Sign in</button> -->

                <div class="form-group col-lg-6 col-sm-6 col-6" style="padding-left:0px;">

		      <button class="btn btn-primary btn-block text-muted" type="submit" name="login">LOG IN</button>

              </div>

               <div class="form-group col-lg-6 col-sm-6 col-6" style="margin-top: 7px;">

               <a type="submit" name="forgotpassword" id="forgotpassword" href="<?php echo base_url();?>dutyforgot/forgot" style="cursor:pointer;"></a>

		    </div>

		     </form>

		   

		    <br><br>

           

        </div>

        </div>

        

        

        

    </div>

   





</div>

<!--END PAGE CONTENT -->     

      

      <!-- PAGE LEVEL SCRIPTS -->

        

      <script src="<?php echo asset_url();?>plugins/jquery-2.0.3.min.js"></script>

      <script src="<?php echo asset_url();?>plugins/bootstrap/js/bootstrap.js"></script>

   <script src="<?php echo asset_url();?>js/login.js"></script>

    

      <!--END PAGE LEVEL SCRIPTS -->            



</body>

    <!-- END BODY -->

</html>

