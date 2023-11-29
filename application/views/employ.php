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
<body>

<h2> Employee Details <span style=""> <a href="<?php echo base_url();?>Employee/addemployee"> Add  </a> </span> </h2>

<table>
<tr>
            <th>name</th>
            <th>email</th>
            <th>mobile</th>
            <th>status</th>
            <th class="text-center">Action</th>
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
            <td><?php echo $val['name'];?></td>
            <td><?php echo $val['email'];?></td>
            <td><?php echo $val['mobile'];?></td>
            <td><?php echo $statusdp;?></td>
            <td><a href="addemployee/<?php echo $val['id']?>"> Edit </a> </th>
            <a onClick="return confirm('Are you sure?')"href="<?php echo base_url(); ?>Employee/delete/<?php echo $val['id']?>"> Delete </a>
        </tr>
        <?php }
    ?>

  <?php } ?>  
  
</table>

</body>
</html>

