<?php
//print_r($product_data);die;

?>
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<!------ Include the above in your HEAD tag ---------->
<div class="container">
	<div class="row mb-3 mt-5">
    <div class=" mx-auto col-md-5">
      <div class="card shadow-lg bg-white">
       <div class="card-header bg-info">
            <h2 class="card-title text-center font-weight-bolder text-uppercase text-white-50" >Users Form</h2>
        </div>
       
        <div class="card-body">
	    <form action="<?php echo base_url();?>Dropdown/save_dropdown" method="post" >
        
            <div class="form-group">
                <label for="uname" class="font-weight-bold">Username:</label>
                <input type="text" class="form-control" id="uname" placeholder="Enter username" name="username" value="<?php echo @$res_data['username']; ?>" required>
                
            </div>

            <div class="form-group " >
                <label class="font-weight-bold" for="pwd">Password</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password"  value="<?php echo @$res_data['password']; ?>" required>
                
            </div>

            <div class="form-group " >
            <label class="font-weight-bold" for="status" value="<?php echo @$res_data['status']; ?>">Status</label>
                    <select class="form-control" name="status" class="txt">
                        <option value = "">--- Select Status--- </option>
                        <option value = 1 <?php if(@$res_data['status'] == 1){ echo "selected"; }?> > Active </option> 
                        <option value = 0  <?php if(@$res_data['status'] == 0){ echo "selected"; }?> > InActive </option> 
                    </select>
            </div>
            
            <div class="form-group">
                <label for="email" class="font-weight-bold" >Email:</label>
                <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo @$res_data['email']; ?>" required>
                
            </div>
            <div class="form-group " >
            <label class="font-weight-bold" for="product" value="">Product</label>
                    <select class="form-control" name="product_id" id="product_id" class="txt"  >
                        <option  value = "">--- Select Products--- </option>
                        <?php
                       
                        foreach($product_data as $product){?>
                            <option value = <?php echo  $product['id']; ?>   > <?php echo $product['name']; ?> </option>
        
                          <?php }?>  
                    </select>
            </div>
            <div class="form-group " >
            <label class="font-weight-bold" for="productcompanies" value="">Productcompanies</label>
                    <select class="form-control" name="productcompanies" class="txt" id="productcompanies_id">
                        <option  value="<?php echo @$res_data['companyname']; ?>">--- Select Productcompanies--- </option>
                        
                    </select>
           
            <input type="hidden" name="edit_id" value="<?php echo @$res_data['id']?>">
            <center class="mt-3">
            <input type="submit" class="btn btn-info w-50" value="submit">
            </center>
          </form>


          
      </div>
      </div>
    </div>
</div>
</div>
<script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"> </script> 
<script type="text/javascript">
    $(document).ready(function(){
        // function getStates(){
        //     ALERT(33333);
        //     var c_id = jQuery("#country_id").val();

            // jQuery.ajax({
            //     url: "<?php echo base_url("State/getStates");?>",
            //     type: "POST",
            //     data: {id: c_id}
            //     success : function(resp){

            //     }
            // });
        // }

        //function abc(){
        //     alert(444);
        // }

        $("#product_id").on('change',function () {
             alert(2222);

            var c_id = jQuery("#product_id").val();
           // alert(c_id);

            $.ajax({
                url: "<?php echo base_url("Productcompanies/getProductcompanies");?>",
                type: "POST",
                data: {id: c_id},
                success : function(resp){
                    //alert(resp);

                    $("#productcompanies_id").html(resp);
                }
            });
        });

    });
</script>