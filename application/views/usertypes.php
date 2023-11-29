<style>
    a{
        float:right;
        padding:1rem;
    }
   
</style>
<html>
<head>

<link
rel="stylesheet"
type="text/css"
href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"
/>
</head>
<body>
<table id="table_id">
<thead>
<h1> <center>User types</center></h1>    
<a  href="<?php echo base_url();?>Usertypes/addusertype"><b>+ Add </a>
    <tr> 
        <th>name</th>
        <th>email</th>
        <th>password</th>
        <th>user types</th>
        <th>status</th>
        <th>file</th>
        <th>Created_at</th>
        <th class="text-center">Action</th>
    </tr>
</thead>
<tbody>
<?php if(!empty($all_list)) { 
        foreach($all_list as $key=>$val){ 
            if($val['status'] == 1){
                $statusdp = 'Active';
            }else{
                $statusdp = 'InActive';
            }
            ?>
          <tr>
            <td><?php echo $val['name'];?></td>
            <td><?php echo $val['email'];?></td>
            <td><?php echo $val['password'];?></td>
            <td><?php echo $val['user_types'];?></td>
            
            <td><?php echo $statusdp;?></td>
            <td><?php echo $val['file'];?>
            <img src="<?php echo base_url()?>uploads/<?php echo $val['file'];?>"></td>
            <td><?php echo $val['created_at'];?></td>
            <td><a href="addusertype/<?php echo $val['id']?>"> Edit </a> </th>
            <a onClick="return confirm('Are You Sure?')"href="<?php echo base_url(); ?>usertypes/delete/<?php  echo $val['id']?>"> Delete </a> 

        </tr>
        <?php }
    ?>

  <?php } ?>  
</tbody>
</table>
<script
type="text/javascript"
charset="utf8"
src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"
></script>
<script
type="text/javascript"
charset="utf8"
src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script>
$(function() {
$("#table_id").dataTable();
});
</script>
</body>
</html>



