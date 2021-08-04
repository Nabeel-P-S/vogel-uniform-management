<!DOCTYPE html>
<html>
<head>
  <title>vogel</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>
<body>

  <div class="col-md-12 ">

   <div class="col-md-6">
    <form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>my_function Vendor</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="factory_number">Factory No</label>  
  <div class="col-md-4">
  <input id="factory_number" name="factory_number" type="text" placeholder="Factory No" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="factory_name">Factory Name</label>  
  <div class="col-md-6">
  <input id="factory_name" name="factory_name" type="text" placeholder="Factory Name" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="vendor_name">Name</label>  
  <div class="col-md-5">
  <input id="vendor_name" name="vendor_name" type="text" placeholder="Name" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="vendor_address">Address</label>  
  <div class="col-md-5">
  <input id="vendor_address" name="vendor_address" type="text" placeholder="Address" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="vendor_place">Place</label>  
  <div class="col-md-5">
  <input id="vendor_place" name="vendor_place" type="text" placeholder="Place" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="vendor_district">District</label>  
  <div class="col-md-5">
  <input id="vendor_district" name="vendor_district" type="text" placeholder="District" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="vendor_state">State</label>  
  <div class="col-md-5">
  <input id="vendor_state" name="vendor_state" type="text" placeholder="State" class="form-control input-md">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="save_vendor"></label>
  <div class="col-md-4">
    <button id="save_vendor" name="save_vendor" class="btn btn-warning">SAVE</button>
  </div>
</div>

</fieldset>
</form>

   </div>
    <div class="col-md-6">  
      <form class="form-horizontal">
        <fieldset>

          <!-- Form Name -->
          <legend>my_function Customer</legend>

          <!-- Text input-->
          <table border="0"> 
            <tr>
              <td>
              <div class="form-group">
                <label class="col-md-4 control-label" for="customer_id">Shop No</label>  
                <div class="col-md-6">
                  <input id="customer_id" name="customer_id" type="text" placeholder="Shop No" class="form-control input-md">

                </div>
              </div>
            </td>
            <td>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="shop_name">Shop Name</label>  
                <div class="col-md-6">
                  <input id="shop_name" name="shop_name" type="text" placeholder="Shop Name" class="form-control input-md">

                </div>
              </div> 
            </td>
          </tr>

            <tr>
              <td>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="customer_name">Name</label>  
                <div class="col-md-6">
                  <input id="customer_name" name="customer_name" type="text" placeholder="Customer Name" class="form-control input-md">

                </div>
              </div>
            </td>
            <td>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="customer_address">Address</label>  
                <div class="col-md-6">
                  <input id="customer_address" name="customer_address" type="text" placeholder="Address" class="form-control input-md">

                </div>
              </div>
            </tr>
          </td>
            <tr><td>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="customer_place">Place</label>  
                <div class="col-md-6">
                  <input id="customer_place" name="customer_place" type="text" placeholder="Place" class="form-control input-md">

                </div>
              </div>
            </td>
            <td>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="customer_pincode">Pincode</label>  
                <div class="col-md-6">
                  <input id="customer_pincode" name="customer_pincode" type="text" placeholder="Pincode" class="form-control input-md">

                </div>
              </div>
            </td>
          </tr>
            <tr>
              <td>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="customer_district">District</label>  
                <div class="col-md-6">
                  <input id="customer_district" name="customer_district" type="text" placeholder="District" class="form-control input-md">

                </div>
              </div>
            </td>
            <td>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="customer_state">State</label>  
                <div class="col-md-6">
                  <input id="customer_state" name="customer_state" type="text" placeholder="State" class="form-control input-md">

                </div>
              </div>
            </td>
          </tr>
            <tr>
              <td>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="customer_country">Country</label>  
                <div class="col-md-6">
                  <input id="customer_country" name="customer_country" type="text" placeholder="Country" class="form-control input-md">

                </div>
              </div>
            </td>
            <td>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="customer_email">Email</label>  
                <div class="col-md-6">
                  <input id="customer_email" name="customer_email" type="text" placeholder="Email" class="form-control input-md">

                </div>
              </div>
            </td>
          </tr>
            <tr>
              <td>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="customer_mobile1">Mobile </label>  
                <div class="col-md-6">
                  <input id="customer_mobile1" name="customer_mobile1" type="text" placeholder="Mobile " class="form-control input-md">

                </div>
              </div>
            </td>
            <td>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="customer_mobile2">Landline</label>  
                <div class="col-md-6">
                  <input id="customer_mobile2" name="customer_mobile2" type="text" placeholder="Landline" class="form-control input-md">

                </div>
              </div>
            </td>
          </tr>
            <tr>
              <td>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="customer_adhar">Adhar</label>  
                <div class="col-md-6">
                  <input id="customer_adhar" name="customer_adhar" type="text" placeholder="Adhar" class="form-control input-md">

                </div>
              </div>
            </td>
            <td>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="customer_license">License</label>  
                <div class="col-md-6">
                  <input id="customer_license" name="customer_license" type="text" placeholder="License" class="form-control input-md">

                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
               <div class="form-group">
            <label class="col-md-4 control-label" for="save_item"></label>
            <div class="col-md-4">
              <button id="save_item" name="save_item" class="btn btn-primary">SAVE</button>
            </div>
          </div>
            </td>
          </tr>
          </table>
        </fieldset>
      </form>

    </div>
  </div>




</body>
</html>