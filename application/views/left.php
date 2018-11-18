<?php $active=$this->uri->segment(1);

$active1=$this->uri->segment(2); 

$active2=$this->uri->segment(3);
?>

<div id="left">

            <div class="media user-media well-small">

                <a class="user-link" >
                <?php

                if(empty($detail[0]->profile_img))

                {
					
                ?>

                   <img class="media-object img-thumbnail user-img" alt="User Picture" src="<?php echo asset_url();?>img/user.gif" />


               <?php 
                }
               else

                {?>

                <img class="media-object img-thumbnail user-img" alt="User Picture" src="<?php echo base_url().$detail[0]->profile_img;?>" style="height: 120px;width: 120px;"/>

                	<?php	

                }

                ?>


                </a>

                <br />

                <div class="media-body">

                    <h5 class="media-heading"><b><?php echo $detail[0]->name;?></b></h5>

                    

                </div>

                <br />

            </div>



            <ul id="menu" class="collapse">

                <li class="panel <?php if($active1=='timetable' || $active1=="timetable_add" || $active1=="timetable_edit" || $active1=="edit_assigned_duties") echo 'active'; ?>">

                    <a href="<?php echo base_url().'dutyadmin';?>" >

                        <i class="icon-info-sign"></i> Home Page

                    </a>

                </li>



                 <li class="panel <?php if($active1=="timetable_add" || $active1=="timetable_edit" || $active1=="edit_assigned_duties") echo 'active'; ?>">
             
                               <a href="<?php echo base_url().'master/attendance';?>" >
                        <i class="icon-desktop"></i> Semester

                    </a>                   

                </li>







<!--                <li class="panel --><?php //if($active1=='prof' || $active1=='prof_add' || $active1=='prof_edit' || $active1=='prof_csv' ) echo 'active'; ?><!--">-->
<!---->
<!--                    <a href="--><?php //echo base_url().'master/prof';?><!--" >-->
<!---->
<!--                        <i class="icon-group"></i> Faculties-->
<!---->
<!--                    </a>-->
<!---->
<!--                </li>-->

                <li class="panel <?php if($active1=='timetable' || $active1=="timetable_add" || $active1=="timetable_edit" || $active1=="edit_assigned_duties") echo 'active'; ?>">

                    <a href="<?php echo base_url().'master/timetable';?>" >

                        <i class="icon-info-sign"></i> Student Details

                    </a>

                </li>



                <?php
                if($this->session->userdata('BMSAdmin')){
                    $det=$this->home_db->getdetails($this->session->userdata('BMSAdmin'));
                    if($det[0]->login_type != "US"){
                       ?>
                        <li class="panel <?php if($active1=='settings' || $active=='settings') echo 'active'; ?>">

                            <a href="<?php echo base_url().'settings';?>" >

                                <i class=""></i>

                            </a>

                        </li>

                    <?php }
                }

                ?>
                <li class="panel">
                    <a href="<?php echo base_url().'Sms/duty_SMS';?>" >
                        <i class=""></i>
                    </a>
                </li>
            </ul>

        </div>

