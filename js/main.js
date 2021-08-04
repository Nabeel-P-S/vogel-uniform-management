

  function go_home()
  {
    window.location.href="store_index.php";
  }
  
 function items()
    {
      var date_now=Date();
      var flag=1;
          $.ajax(
          {
          type:"POST",
          url:"my_function.php",
          data:{
            date_now:date_now,
            flag:flag
          },
          success: function(data_output)
          {
            $("#store_display").html(data_output);
          }   
        });  
    }
  