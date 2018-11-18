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


    <link rel="stylesheet" href="<?php echo asset_url();?>css/token-input-facebook.css" />
    <link rel="stylesheet" href="<?php echo asset_url();?>css/token-input.css" />

    <script type="text/javascript" src="<?php echo asset_url();?>js/jquery.min.js"></script>





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



    <script src="<?php echo asset_url();?>js/jquery.tokeninput.js"></script>


    <script src="<?php echo asset_url();?>js/spiner.js"></script>
    <script src="<?php echo asset_url();?>js/loadingoverlay.js"></script>

    <?php echo $jsfile;?>
<script>
    $(".expand").click(function(){
        $('html, body').animate({
            scrollTop: $($(this)).offset().top - 60

        }, 1000);

    });




</script>


