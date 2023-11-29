
<?php //print_r($all_list);die;?>

<html>
<style>
table {
  font-family: Verdana,sans-serif;
  font-size: 14px;
  line-height: 1.5;
  <?php
  //border-collapse: collapse;
  ?>
  border: 8px solid #dddddd;
  text-align: center;
  width: 100%;
}

td, th {
  border: 10px solid #dddddd;
  text-align: start;
  padding: 7px;
}

tr:nth-child(even) {
  background-color: #e7f3fe;
}
</style>
<head>
<link
rel="stylesheet"
type="text/css"
href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"
/>
</head>
<body>
<h2>Controllers and Models  <span style=""> <a href="<?php echo base_url();?>Bhcnmc/addcnm"> Add  </a> </span> </h2>
<h3><a style = 'margin-left: 1150px; ' href="<?php echo base_url();?>Bhmenudb/index"> Back to Home </a></h3>
<table id="table_id">
<thead>
<tr>
    <th>Controller Name</th>
    <th>Model Name</th>
    <th>Model Description</th>
    
    
</tr>
</thead>
<tbody>
  
<?php if(!empty($all_list)) { 
        foreach($all_list as $key=>$val){ 
            // if($val['status'] == 1){
            //     $statusdp = 'Active';
            // }else{
            //     $statusdp = 'InActive';
            // }
            // ?>
          <tr>
            <td><?php echo @$val['controller_name'];?></td>            
            <td><?php echo @$val['model_name'];?></td>
            <td><?php echo @$val['description'];?></td>
                  
            <!-- <td> -->
              <!-- <a href="<?php echo base_url()?>Controllers/addcontrollers/<?php echo $val['id']?>"> Edit </a> </th>
              <a onclick = "return confirm('Confirm ahh beta')" href="<?php echo base_url()?>Library/delete_library/<?php echo $val['id']?>"> Delete </a> </th> -->
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