
	<script>
	$(document).ready(function(){

		$('input').bind('copy paste', function (e) {
			//e.preventDefault();
		});

	 	 $(".onlynumbers").keypress(function(evt) {
	 					var charCode = (evt.which) ? evt.which : event.keyCode
	 						 if(charCode==8)//back space
	 							return true;
	 						 if (charCode < 48 || charCode > 57)	//0-9
	 						 {
	 							return false;
	 						 }
	 						 return true;
	 					});	
	 	  });

	$('.floatval').keypress(function(event) {
  		 var charCode = (event.which) ? event.which : event.keyCode
  		 if(charCode ==8 || charCode ==9){

  		 }
  		 else if ((charCode != 46 || $(this).val().indexOf('.') != -1) && (charCode < 48 || charCode > 57)) {
  		    event.preventDefault();
  		  }
  		});	



	function mask(cls=""){
		if(cls==""){
			$.LoadingOverlay("show", {
				image   : "<?php echo asset_url()?>img/spin.gif"


			});
			$.LoadingOverlay("show");
		} else {
			$("#"+cls).LoadingOverlay("show", {
				image   : "<?php echo asset_url()?>img/spin.gif"


			});
			$("#"+cls).LoadingOverlay("show");
		}

	}

	function unmask(cls=""){
		if(cls=="") {
			$.LoadingOverlay("hide", true);
		} else{
			$("#"+cls).LoadingOverlay("hide", true);
		}
	}
        </script>
