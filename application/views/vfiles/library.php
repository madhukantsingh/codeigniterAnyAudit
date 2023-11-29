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
  text-align: start;
  padding: 7px;
}

table.datatable tr.odd {
  background-color: #d6d1f8 !important;
}

table.datatable tr.even td.sorting_1 {
  background-color: #ffff !important;
}

/* table.datatable tr.even td.sorting_1 {
  background-color: #FFFFFF !important;
} */


table.dataTable td {
  padding: 5px !important;
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
<h2>Library  <span style=""> <a href="<?php echo base_url();?>Library/addlibrary"> Add  </a> </span>
<!-- <a style = 'margin-left: 1100px; ' href="<?php echo base_url();?>Homepage/index"> Back to Home </a> -->
</h2>
<h3><a style = 'margin-left: 1100px; ' href="<?php echo base_url();?>Bharath/index"> Back to Home </a></h3>
<table id="table_id">
<thead>
<tr>
    <th>Book Name</th>
    <th>Author</th>
    <th> Storage</th>
    <th>Status</th>
    <th>Created At</th>
    <th>Action</th>
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