
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
	    <form action="<?php echo base_url();?>Users/save_user" method="post" >
        
            <div class="form-group">
                <label for="uname" class="font-weight-bold">Username:</label>
                <input type="text" class="form-control" id="uname" placeholder="Enter username" name="user_name" value="<?php echo @$res_data['user_name']; ?>" required>
                
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
            <label class="font-weight-bold" for="country" value="">Country</label>
                    <select class="form-control" name="country_id" id="country_id" class="txt"  >
                        <option  value = "">--- Select Countries--- </option>
                        <?php
                       
                        foreach($country_data as $country){?>
                            <option value = <?php echo  $country['id']; ?>  <?php if($res_data['country_name'] == $country['id']) { ?> selected="selected" <?php } ?>   > <?php echo $country['country_name']; ?> </option>
        
                          <?php }?>  
                    </select>
            </div>
            <div class="form-group " >
            <label class="font-weight-bold" for="state" value="">State Name</label>
                    <select class="form-control" name="state" class="txt" id="state_id">
                        <option  value="<?php echo @$res_data['state']; ?>">--- Select state--- </option>
                        
                    </select>
            </div>
            <div class="form-group " >
                <label class="font-weight-bold"  id="mobile" placeholder="Enter mobile number" name="mobile">Mobile</label>
                <input type="number" class="form-control"  name="mobile" value="<?php echo @$res_data['mobile']; ?>">
                
            </div>
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

        // function abc(){
        //     alert(444);
        // }

        $("#country_id").on('change',function () {

            var c_id = jQuery("#country_id").val();
           // alert(c_id);

            $.ajax({
                url: "<?php echo base_url("State/getStates");?>",
                type: "POST",
                data: {id: c_id},
                success : function(resp){
                    //alert(resp);

                    $("#state_id").html(resp);
                }
            });
        });

    });
</script>