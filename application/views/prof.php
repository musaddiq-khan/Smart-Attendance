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
    <script type="text/javascript" src="<?php echo asset_url();?>js/jquery.min.js"></script>

<?php echo $popcss;?>

    <link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>css/flexigrid.css" />
    <script type="text/javascript" src="<?php echo asset_url();?>flexigrid.js"></script>

<style type="text/css">
.showhide {
    cursor: pointer;
    float: right;
}
</style>

<script type="text/javascript">

$(document).ready(function(){
 
		                                        
    var base_url = '<?php echo base_url();?>';                            
    //alert(base_url+'teksadmin/banner_table');
    $("#flex1").flexigrid({
		url: '<?php echo base_url();?>master/prof_table?eid='+"<?php echo $eid?>",
		dataType: 'json',
		colModel : [
					{display: 'Sl.No.', width : 40, sortable : true,  align: 'center'},
			    	{display: 'Prof. ID', name : 'p.usn',width : 100, sortable : true, align: 'center'},
			    	{display: 'Name', name : 'p.name',width : 200, sortable : true, align: 'center'},
			    	{display: 'Dept.',name : 'dp.name', width : 100, sortable : true, align: 'center'},
                    {display: 'Designation', name : 'd.name', width : 120, sortable : true, align: 'center'},
                    {display: 'Email', name : 'p.email',width : 150, sortable : true, align: 'center'},
                    {display: 'Phone',name : 'p.phone', width : 100, sortable : true, align: 'center'},
                    {display: 'Status',name : 'p.status', width : 100, sortable : true, align: 'center'},
                    <?php
                    if($this->session->userdata('BMSAdmin')){
                        $det=$this->home_db->getdetails($this->session->userdata('BMSAdmin'));
                        if($det[0]->login_type != "US"){
                            echo "{display: 'Priority',name : 'p.priority', width : 150, sortable : true, align: 'center'},";
                        }
                    }
                    ?>



                    <?php
                    if($this->session->userdata('BMSAdmin')){
                        $det=$this->home_db->getdetails($this->session->userdata('BMSAdmin'));
                        if($det[0]->login_type != "US"){
                            echo "{display: 'Actions', width : 200, align: 'center'}";
                        }
                    }
                    ?>
					],
					buttons : [
				                {name: 'Add New Faculty', bclass: 'add', onpress : test},
                                {separator: true},
                                {name: 'Import Faculties (CSV)', bclass: 'cgnpass', onpress: test},
				                {separator: true}
				                ],
                    searchitems : [

                        {display: 'Name', name : 'p.name',isdefault: true},
                        {display: 'Department', name : 'dp.name'},
                        {display: 'Designation', name : 'd.name'}

                    ],
				onError: function(data){
					               for (var i in data){ 
					              alert("Header: " + i +"\nMessage: " + data[i]); 
					            } 
					           },
				success: function(data){
					               for (var i in data){ 
					              alert("Header: " + i +"\nMessage: " + data[i]); 
					            } 
					            },

	
					sortname: "id",
					sortorder: "desc",
					usepager: true,
					useRp: true,
					rp: 50,
					showTableToggleBtn: false,
					width: 1000,
					height: 255,
                    ex_id: "<?php echo $eid?>"
            		}
            		);
			});

function test(com,grid)
{


if(com=='Add New Faculty')
{
     var base_url = '<?php echo base_url();?>';
    document.location.href =base_url+"master/prof_add?id="+"<?php echo $eid?>";
}

    if(com=='Import Faculties (CSV)')
    {
        var base_url = '<?php echo base_url();?>';
        document.location.href =base_url+"master/prof_csv?id="+"<?php echo $eid?>";
    }
}


function edit(id){
    var base_url = '<?php echo base_url();?>';
    document.location.href =base_url+"master/prof_edit?id="+id+"&eid="+"<?php echo $eid?>";
}




function changestatus(st,id)
{
    <?php

if($this->session->userdata('BMSAdmin')){
    $det=$this->home_db->getdetails($this->session->userdata('BMSAdmin'));
    if($det[0]->login_type != "US"){
        $disabled = "false"; ?>
    if(confirm('Are you sure?'))
    {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo base_url();?>master/prof_status",
            data: {items:id,status:st,ex_id:"<?php echo $eid?>"},
            success: function(data)
            {

                $("#flex1").flexOptions({newp: $("#flex1").flexGetPageNumber()}).flexReload();
            }
        });
    }

    <?php
    } else {?>
    alert("You Are Not Admin");
    <?php

    }
}
?>

}

function changepri(st,id)
{
    <?php

if($this->session->userdata('BMSAdmin')){
    $det=$this->home_db->getdetails($this->session->userdata('BMSAdmin'));
    if($det[0]->login_type != "US"){
        $disabled = "false"; ?>
    if(confirm('Are you sure?'))
    {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo base_url();?>master/prof_pri",
            data: {items:id,status:st,ex_id:"<?php echo $eid?>"},
            success: function(data)
            {

                $("#flex1").flexOptions({newp: $("#flex1").flexGetPageNumber()}).flexReload();
            }
        });
    }

    <?php
    } else {?>
    alert("You Are Not Admin");
    <?php

    }
}
?>

}





</script>

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

                        <h2 class="page-header">Faculties for <?php echo $eid?></h2>
                        <?php echo $this->session->flashdata('message');?>
                        
                     
                        <table id="flex1"></table>


              </div>
              </div>
              <hr />
                <div class="form-actions no-margin-bottom" style="text-align:center;">
                    <a href="<?php echo base_url() . 'master/timetable'; ?>"
                       class="btn btn-primary btn-sm"><i class="icon-reply "></i> Back</a>
                </div>
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




</body>
    <!-- END BODY-->
    
</html>
