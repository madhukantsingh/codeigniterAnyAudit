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
<span style=""> <a href="<?php echo base_url();?>Mandal/addmandal"> Add </a> </span>
<table id="table_id">
<thead>
<tr>
    <th>District Name</th> 
    <th> mandal name</th>
    <th>status</th>
    <th>Created At</th>
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
            <td><?php echo @$val['district_name'];?></td> 
            <td><?php echo $val['mandal_name'];?></td> 
            <td><?php echo $statusdp;?></td>
            <td><?php echo $val['created_at'];?></td>
            <td><a href="<?php echo base_url() ?>Mandal/addmandal/<?php echo $val['id']?>"> Edit </a>
            |<a onclick="return confirm('Are you sure?')"  href="<?php echo base_url() ?>Mandal/delete/<?php echo $val['id']?>"> Delete </a></th>
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

</body>
</html>
</html>

