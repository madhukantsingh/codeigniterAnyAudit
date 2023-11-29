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

<h2>patient  <span style=""> <a href="<?php echo base_url();?>Patients/addpatient"> Add patient </a> </span> </h2>
<script>document.write('<a href="' + document.referrer + '">Go Back</a>');</script>
<table>
  <tr>
    <th>name</th>
    <th>age</th>
   <th>phonenumber</th>
    <th>from</th>
  </tr>
  <?php 
  
    //echo "<pre>";print_r($all_list);die;
  
  if(!empty($all_list)) { 
        foreach($all_list as $key=>$val){?>
          <tr>
            <td><?php echo $val['name'];?></td>
            <td><?php echo $val['age'];?></td>
            <td><?php echo $val['phonenumber'];?></td>
            <td><?php echo $val['from'];?></td>
            <td>
              <a href="<?php echo base_url();?>Patients/addpatient/<?php echo $val['id']?>"> Edit </a> |
              <a href="<?php echo base_url();?>Patients/deletepatient/<?php echo $val['id']?>"> delete </a>
             </td>
        </tr>
        <?php }
    ?>

  <?php } ?>  
  
</table>

</body>
</html>

