<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> 
<html lang="en">
<!--<![endif]-->

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
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>css/flexigrid.css" />
    <script type="text/javascript" src="<?php echo asset_url();?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo asset_url();?>flexigrid.js"></script>
    <?php echo $jsfile;?>
    <style>
        .loadingoverlay_progress_text{
            display: none;
        }
    </style>
<script type="text/javascript">
$(document).ready(function(){
    var progress;
    var base_url = '<?php echo base_url();?>';                            
    $("#flex1").flexigrid
            (
            {
            url: base_url+'master/student_table',
            dataType: 'json',
            colModel : [
                {display: 'Sl No.', width : 70,  align: 'center'},
                {display: 'Student Name',name:'name', width : 300, sortable : true,  align: 'center'},
                {display: 'Actions', width : 200, align: 'center'}
                ],
            buttons : [
                {name: 'Add', bclass: 'add', onpress : test},
                {separator: true}
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
            rp: 10,
            showTableToggleBtn: false,
            width: 950,
            height: 255
            }
            );   
    
});
function test(com,grid)
{
if(com=='Add')
{
     var base_url = '<?php echo base_url();?>';
    document.location.href =base_url+"master/student_add";
}

else if (com=='Refresh')
        {
        sortAlpha("");
        }


}
function changestatus(st,id)
{
    var base_url = '<?php echo base_url();?>';
    if(confirm('Change status of the item?'))
           {
               $.ajax({
                   type: "POST",
                   dataType: "json",
                   url: base_url+"master/blogscategory_status",
                   data: {items:id,status:st},
                   success: function(data){
                   $("#flex1").flexReload();
                   }
                 });
            }
}

function edit(id){
    var base_url = '<?php echo base_url();?>';
    //alert(id);
    document.location.href =base_url+"master/student_edit?id="+id;
}

function edit_assign(id){
    var base_url = '<?php echo base_url();?>';
    //alert(id);
    document.location.href =base_url+"master/edit_assigned_duties?id="+id;
}

function assign(id){
    var base_url = '<?php echo base_url();?>';
    //alert(id);
    document.location.href =base_url+"master/assign_duty_m_copy?id="+id+"&method=a";
}

function add_prof(id){
    var base_url = '<?php echo base_url();?>';
    //alert(id);
    document.location.href =base_url+"master/prof?id="+id;
}



function print(exam_id){
    var base_url = '<?php echo base_url();?>';
    //alert(id);
    document.location.href =base_url+"master/printreport?exam_id="+exam_id;
}

function tick(exam_id){
    var base_url = '<?php echo base_url();?>';
    //alert(id);
    document.location.href =base_url+"master/printreport?exam_id="+exam_id+"&flag=tick";
}

function print_rec(exam_id){
    var base_url = '<?php echo base_url();?>';
    //alert(id);
    document.location.href =base_url+"master/print_receipt?exam_id="+exam_id;
}




function M_and_S(exam_id){
    if(confirm('Are you sure?')){

        progress = new LoadingOverlayProgress();

        $.LoadingOverlay("show", {
            image   : "<?php echo asset_url()?>img/mail_ani.gif",
            maxSize : "445px",
            minSize : "445px",
            custom  : progress.Init()
        });
        var count     = 0;
        var interval  = setInterval(function(){
            if (count >= 100) {
                count=0;
            }
            count++;
            progress.Update(count);
        }, 100);



        var base_url = '<?php echo base_url();?>';
        $.post(base_url+"master/mail_duty", {exam_id: exam_id}, function(result){
            if(result.trim() == 1){
                clearInterval(interval);
                delete progress;
                document.location.href =base_url+"master/timetable";
            } else {
                console.log(result);
                alert("Failed..!! Check Mail Password / Internet Connection");
                clearInterval(interval);
                delete progress;
                document.location.href =base_url+"master/timetable";
            }
        })



    }

}
        
</script></head>
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

                        <h2 class="page-header">STUDENTS</h2>

                        
                        <?php echo $this->session->flashdata('message');?>
                        <table id="flex1"></table>


                    </div>
                </div>

                <hr />
                <div class="form-actions no-margin-bottom" style="text-align:center;">
                    <a href="<?php echo base_url() . 'dutyadmin'; ?>"
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
     <script src="<?php echo asset_url();?>js/spiner.js"></script>
     <script src="<?php echo asset_url();?>js/loadingoverlay.js"></script>
    <!-- END GLOBAL SCRIPTS -->
</body>
    <!-- END BODY-->
    
</html>
