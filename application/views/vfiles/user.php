<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

</head>

<html>
<head>
<link
rel="stylesheet"
type="text/css"
href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"
/>
</head>
<body>
<span style=""> <a href="<?php echo base_url();?>Users/adduser"> Add </a> </span>
<table id="table_id">
<thead>
<tr>
    <th>user Name</th>
    <th>password</th>
    <th>Status</th>
    <th>email</th>
    <th>Country Name</th>
    <th>State name</th>
    <th>mobile</th>
    <th>Created At</th>
    <th>file Upoad</th>
    <th>Actions</th>
  </tr>
</thead>
<tbody>
</tr>
  <?php if(!empty($all_list)) { 
        foreach($all_list as $key=>$val){ 
            if($val['status'] == 1){
                $statusdp = 'Active';
            }else{
                $statusdp = 'InActive';
            }
            ?>
          <tr>
            <td><?php echo $val['user_name'];?></td>
            <td><?php echo $val['password'];?></td>
            <td><?php echo $statusdp;?></td>
            <td><?php echo $val['email'];?></td>
            <td><?php echo $val['country_name'];?></td>
            <td><?php echo $val['state_name'];?></td>
            <td><?php echo $val['mobile'];?></td>
            <td><?php echo $val['created_at'];?></td>
            <td><?php //echo $val['file'];?>
            <img  src="<?php echo base_url()?>uploads/<?php echo $val['file'];?>" alt="" width="70" height="70"></td>
            <td><a href="<?php echo base_url() ?>Users/adduser/<?php echo $val['id']?>"> Edit </a>
             |<a onclick="return confirm('Are you sure?')"  href="<?php echo base_url() ?>Users/delete/<?php echo $val['id']?>"> Delete </a></th>
        </tr>
        <?php }
    ?>

  <?php } ?>  
  <a href="<?php echo base_url() ?>Users/adduser/<?php echo $val['id']?>"> form </a>
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

</body>
</html>
</html>

