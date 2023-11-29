
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
<span style=""> <a href="<?php echo base_url();?>Product/addproduct"> Add </a> </span> ||||
<script>document.write('<a href="' + document.referrer + '">Go Back</a>');</script>
<table id="table_id">
<thead>
<tr>


    <th>category</th>
    <th>subcategory</th>
    <th>File</th>
    <th>Actions</th>

  </tr>
</thead>
<tbody>
</tr>
  <?php if(!empty($all_list)) { 
        foreach($all_list as $key=>$val){ 
            // if($val['status'] == 1){
            //     $statusdp = 'Active';
            // }else{
            //     $statusdp = 'InActive';
            // }
            // ?>
          <tr>
       

            <td><?php echo $val['category'];?></td>
            <td><?php echo $val['subcategory'];?></td>
            <td><img src="<?php echo base_url()?>uploads/<?php echo  $val['file']?>" alt="" width="50" height="60"></td>

           
            <td><a href="<?php echo base_url() ?>Product/addproduct/<?php echo $val['id']?>"> Edit </a>
             |<a onclick="return confirm('Are you sure?')"  href="<?php echo base_url() ?>Product/delete/<?php echo $val['id']?>"> Delete </a></th>
        </tr>
        <?php }}
    ?>

  <?php  ?>  
 


  <span style=""> <a href="<?php echo base_url();?>Product/addproduct"> form </a> </span>

</tbody>
</table>
<!-- <script
<table id="table_id">
<thead>
<h1> <center>Product Details</center></h1>    
<a  href="<?php echo base_url();?>Product/addproduct"><b>+ Add </a>
    <tr> 
        <th>name</th>
        <th>description</th>
        <th>status</th>
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
            <td><?php echo $val['description'];?></td>
            <td><?php echo $statusdp;?></td>
            <td><?php echo $val['created_at'];?></td>
            <td><a href="addproduct/<?php echo $val['id']?>"> Edit </a> </th>
            <a onClick="return confirm('Are You Sure?')"href="<?php echo base_url(); ?>product/delete/<?php  echo $val['id']?>"> Delete </a> 

        </tr>
        <?php }
    ?>

  <?php } ?>  
</tbody>
</table>
<script
>>>>>>> 843df4313fa2f139f266f424eddde29fe9825f5c
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
</script> -->
</body>
</html>

</body>
</html>
</html>
</script>
</body>
</html>

