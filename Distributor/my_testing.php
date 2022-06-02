<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("#view_report").click(function(){
	  var from_date=jQuery("#fromdate").val();
	  var to_date=jQuery("#todate").val();
	  var data =
	  {		
	  	from_date	 : from_date,
		to_date		 : to_date
	  }
	jQuery.ajax({	
					type: "POST",
					url: "testing.php",
					data: data,
					success: function(responce){
						$("#txtHint").after(responce);
				  }	
			 });
  });
});
</script>