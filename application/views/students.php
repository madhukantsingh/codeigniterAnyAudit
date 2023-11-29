<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
    .custab{
    border: 1px solid #ccc;
    padding: 5px;
    margin: 5% 0;
    box-shadow: 3px 3px 2px #ccc;
    transition: 0.5s;
    }
.custab:hover{
    box-shadow: 3px 3px 0px transparent;
    transition: 0.5s;
    }
</style>

<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
            <a href="<?php echo base_url() ?>Students/adstudents" class="btn btn-primary btn-xs pull-right"><b>+</b> Add Students</a>
        <tr>
           
            <th>Id</th>
            <th>Name</th>
            <th>Branch</th>
            <th>Email Id</th>            
            <th>City</th>
            <th>Phone no</th>
            <th>Created On</th>
            
            <!-- <th class="text-center">Action</th> -->
        </tr>
    </thead>
    <tr>
    </tr>
  <?php if(!empty($all_list)) { 
        foreach($all_list as $key=>$val){ 
            
            ?>
          <tr>
            <td><?php echo @$val['id'];?></td>
            <td><?php echo @$val['name'];?></td>
            <td><?php echo @$val['branch'];?></td>
            <td><?php echo @$val['email'];?></td>
            <td><?php echo @$val['city'];?></td>
            <td><?php echo @$val['phone'];?></td>
            <td><?php echo @$val['created_at'];?></td>
            
            <td><?php echo @$val['uploadedfile'];?></td>
            <td><img class="preview-img" src= "<?php echo base_url().'uploads/'. $val['uploadedfile'];?>" alt="Preview Image" width="100" height="100"/></td>
            <td><div class="browse-button"></td>

            <td><? ></td>
            



            <td><a href="<?php echo base_url();?>Students/addstudent/<?php echo $val['id']?>"> Edit </a> </td>
            <td><a href="<?php echo base_url();?>Students/deletestudent/<?php echo $val['id']?>"> Delete </a> </td>
        </tr>
        <?php }
    ?>

  <?php } ?> 
    </table>
    </div>
</div>


</body>