<!DOCTYPE html>
<html>
<head>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

</head>
<body>

<h2>Library  <span style=""> <a href="<?php echo base_url();?>Library/addlibrary"> Add  </a> </span> </h2>

<table  id = "table_id">
  <tr>
    <th>Book Name</th>
    <th>Author</th>
    <th> Storage</th>
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
            <td><?php echo $val['bookname'];?></td>
            <td><?php echo $val['author'];?></td>
            <td><?php echo $val['storage'];?></td>
            <td><?php echo $statusdp;?></td>
            <td><?php echo $val['created_at'];?></td>
            <td>
              <a href="<?php echo base_url()?>Library/addlibrary/<?php echo $val['id']?>"> Edit </a> </th>
              <a onclick = "return confirm('Confirm ahh beta')" href="<?php echo base_url()?>Library/delete_library/<?php echo $val['id']?>"> Delete </a> </th>
        </tr>
        <?php }
    ?>

  <?php } ?>  
  
</table>
<script>
    $(document).ready(function () {
        $('#table_id').DataTable();
    });
</script>

</body>
</html>


