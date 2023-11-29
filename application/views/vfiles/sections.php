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

<h2>section  <span style=""> <a href="<?php echo base_url();?>Sections/addsection"> Add section </a> </span> </h2>

<table>
  <tr>
    <th>section_name</th>
    <th>description</th>
   
    <th>status</th>
    <th>Created_at</th>
    <th>Action</th>
  </tr>
  <?php 
  
    //echo "<pre>";print_r($all_list);die;
  
  if(!empty($all_list)) { 
        foreach($all_list as $key=>$val){ 
            if($val['status'] == 1){
                $statusdp = 'Active';
            }else{
                $statusdp = 'InActive';
            }
            ?>
          <tr>
            <td><?php echo $val['section_name'];?></td>
            <td><?php echo $val['description'];?></td>
            <td><?php echo $statusdp;?></td>
            <td><?php echo $val['created_at'];?></td>
            <td>
              <a href="<?php echo base_url();?>Sections/addsection/<?php echo $val['id']?>"> Edit </a> |
              <a href="<?php echo base_url();?>Sections/deletesection/<?php echo $val['id']?>"> delete </a>
             </td>
        </tr>
        <?php }
    ?>

  <?php } ?>  
  
</table>

</body>
</html>

