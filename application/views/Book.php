


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
<table id="table_id">
<thead>
<h1> <center> Books List </center></h1>    
<a  href="<?php echo base_url();?>Book/addbook"><b>+ Add </a>
    <tr> 
        <th>bookname</th>
        <th>email</th>
        <th>price</th>
        <th>isbn</th>
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
            <td><?php echo $val['bookname'];?></td>
            <td><?php echo $val['email'];?></td>
            <td><?php echo $val['price'];?></td>
            <td><?php echo $val['isbn'];?></td>
            <td><?php echo $statusdp;?></td>
            <td><?php echo $val['created_at'];?></td>
            <td><a href="addbook/<?php echo $val['id']?>"> Edit </a> </th>
            <a onClick="return confirm('Are You Sure?')"href="<?php echo base_url(); ?>Book/delete/<?php  echo $val['id']?>"> Delete </a> 

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


