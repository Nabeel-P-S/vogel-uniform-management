<!DOCTYPE html>
<html>
<head>
	<title>search</title>
</head>
<body>

<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<br><br>
<legend>Search Order Deails</legend>

<!-- Text input-->
<div class="col-md-5" >
  <h2 >Order Id</h2>

  <div class="col-md-10">
  <input id="order_id" name="order_id" type="text" onchange="view_order(this.value)" placeholder="Type Order Id" class="form-control input-lg">
    
  </div>
</div>

<div class="col-md-5">
  <h2 >Reference No</h2>  <div class="col-md-10">
  <input id="reference_no" name="refernce_no" onchange="search_order1();" type="text" placeholder="Refernce no" class="form-control input-lg">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button id="" name="" onclick="search_order1();" class="btn btn-success">serch</button>
  </div>
</div>

</fieldset>
</form>

</body>
<script type="text/javascript">
  function view_order(id)
  {
    // alert(id);
window.location.href="details/order_view1.php?order_id="+id;
// "add_service.php";
        }

</script>
<script type="text/javascript">
	function search_order1()
	{
		var reference_no=document.getElementById("reference_no").value;
		// alert(reference_no);


    $.ajax(
    {
      type:"POST",
      url:"ref_no.php",
      dataType:"json",
      data:{
        reference_no:reference_no

      },
      success: function(data)
      {

        var id=data.order_id;

        window.location.href="details/order_view1.php?order_id="+id;

      }   
    });  
          }
</script>
	
</html>