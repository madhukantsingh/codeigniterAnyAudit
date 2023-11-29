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

<h2>Subjects   </h2>
<span style=""> <a href="<?php echo base_url();?>Subjects/addsubject"> Add Subject </a> </span>
<a style = 'margin-left: 1085px; ' href="<?php echo base_url();?>Bharath/index"> Back to Home </a>
<table>
  <tr>
    <th>Subject Name</th>
    <th>Status</th>
    <th>Created At</th>
    <th>Actions</th>
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
            <td><?php echo $val['subject_name'];?></td>
            <td><?php echo $statusdp;?></td>
            <td><?php echo $val['created_at'];?></td>
            <td><a href="addsubject/<?php echo $val['id']?>"> Edit </a> </th>
        </tr>
        <?php }
    ?>

  <?php } ?>  
  
</table>

</body>
</html>

