
<?php //print_r ($res_data); die;?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
	<div class="row mb-3 mt-5">
    <div class=" mx-auto col-md-5">
      <div class="card shadow-lg bg-white">
       <div class="card-header bg-info">
            <h2 class="card-title text-center font-weight-bolder text-uppercase text-white-50">Category Name</h2>
            
        </div>
       
        <div class="card-body">
	    <form action="<?php echo base_url();?>Category/save_Category" method="post" >
            
            <div class="form-group">
                <label for="uname" class="font-weight-bold">Category name:</label>
                <input type="text" class="form-control" id="Categoryname" placeholder="Enter name" name="category" value="<?php echo @$res_data['category']; ?>" required>
                <input type="text" class="form-control" id="discription" placeholder="discription" name="discription" value="<?php echo @$res_data['discription']; ?>" required>
            </div>
            <!-- <div class="form-group " >
            <label class="font-weight-bold" for="status" value="<?php echo @$res_data['status']; ?>">Status</label>
                    <select class="form-control"  name="status" class="txt">
                        <option value = "">--- Select Status--- </option>
                        <option value = 1 <?php if(@$res_data['status'] == 1){ echo "selected"; }?> > Active </option> 
                        <option value = 0  <?php if(@$res_data['status'] == 0){ echo "selected"; }?> > InActive </option> 
                    </select>
            </div>
             -->
            
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