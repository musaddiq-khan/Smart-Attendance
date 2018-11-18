<div id="top" align="center" style="padding-top: 45px;>

        <a class="user-link" >
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="<?php echo asset_url();?>img/bmsheader.png" style="height: 160px;width: 100%;padding-left: 40px;padding-right: 40px">
                </a>

            </nav>

        </div>

<div id="top">

    <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
        <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
            <i class="icon-align-justify"></i>
        </a>
        <!-- LOGO SECTION -->
        <header class="navbar-header">

            <a href="<?php echo base_url();?>" class="navbar-brand">
                <img src="<?php echo asset_url();?>img/logo.jpg" alt="Grocery" style="height: 39px;display: none; padding-top: 15px;" /></a>
        </header>
        <!-- END LOGO SECTION -->
        <ul class="nav navbar-top-links navbar-right">

            <!--ADMIN SETTINGS SECTIONS -->

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                </a>

                <ul class="dropdown-menu dropdown-user">
                    <li><a href="<?php echo base_url('dutyadmin/myprofile');?>"><i class="icon-user"></i> My Profile </a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url('dutyadmin/changepass');?>"><i class="icon-lock"></i> Change Password </a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url('dutyadmin/logout');?>"><i class="icon-off"></i> Logout </a>
                    </li>
                </ul>

            </li>
            <!--END ADMIN SETTINGS -->
        </ul>

    </nav>

</div>