

<?php 
//echo "<pre>"; print_r($catogories);die;\
//echo "<pre>"; print_r(@$res_data);die;
?>


<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<!------ Include the above in your HEAD tag ---------->
<div class="container">
	<div class="row mb-3 mt-5">
    <div class=" mx-auto col-md-5">
      <div class="card shadow-lg bg-white">
       <div class="card-header bg-info">
            <h2 class="card-title text-center font-weight-bolder text-uppercase text-white-50" >Users Form</h2>
        </div>
        <script>document.write('<a href="' + document.referrer + '">Go Back</a>');</script>
        <div class="card-body">
	    <form action="<?php echo base_url();?>Product/save_product" method="post"  enctype="multipart/form-data">
        <label class="font-weight-bold" for="category" value="">category</label>
                    <select class="form-control" name="category_id" id="category_id" class="txt"  >
                        <option  value = "">--- Select category--- </option>
                        <?php
                      
                        foreach($catogories as $category){?>
                            <option value = <?php echo  $category['id']; ?>     > <?php echo $category['category']; ?> </option>
        
                          <?php }?>  
                    </select>
            </div>
            <div class="form-group " >
            <label class="font-weight-bold" for="subcategory" value=""> subcategory </label>
                    <select class="form-control" name="subcategory" class="txt" id="subcategory_id">
                        <option  value="<?php echo @$res_data['subcategory']; ?>">--- Select subcategory--- </option>
                        
                    </select>
            </div>
            <div class="form-group " >
                <label class="font-weight-bold"  id="upload" placeholder="upload file" name="upload">File upload</label>
                <input type="file" class="form-control"  name="fileToUpload" value="<?php echo @$res_data['file']; ?>">
                
            </div>


            <input type="hidden" name="edit_id" value="<?php echo @$res_data['id']?>">
            <center class="mt-3">
            <input type="submit" class="btn btn-info w-50" value="submit">
            </center>
          </form>


          
      </div>
      </div>
    </div>
</div>
</div>
<script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"> </script> 
<script type="text/javascript">
    $(document).ready(function(){
        // function getsubcategory(){
        //     ALERT(33333);
        //     var c_id = jQuery("#category_id").val();

        //     jQuery.ajax({
        //         url: "<?php echo base_url("subcategory/getsubcategory");?>",
        //         type: "POST",
        //         data: {id: c_id}
        //         success : function(resp){

        //         }
        //     });
        // }

        // function abc(){
        //     alert(444);
        // }

        $("#category_id").on('change',function () {
            // alert(2222);

            var c_id = jQuery("#category_id").val();
           alert(c_id);

            $.ajax({
                url: "<?php echo base_url("Subcategory/getSubcategory");?>",
                type: "POST",
                data: {id: c_id},
                success : function(resp){
                    //alert(resp);

                    $("#subcategory_id").html(resp);
                }
            });
        });

    });
</script>
<!-- <script type= "text/javascript">
function myfun(data);
{
alert (data);
var req = new XMLHttpRequest();
req.open("GET","http://localhost/myweb/Product/addproduct/reponse.php?subcategory="+data,true);
req.send();

req.onreadystatechange=function(){
    if(req.readyState==4 && req.status==200){
        document.getElementById('subcategory_id').innerHTML = req.responseText;
    }
}
}



</script> -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<style>
.send-button{
background: #54C7C3;
width:100%;
font-weight: 600;
color:#fff;
padding: 8px 25px;
}
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
.g-button{
color: #fff !important;
border: 1px solid #EA4335;
background: #ea4335 !important;
width:100%;
font-weight: 600;
color:#fff;
padding: 8px 25px;
}
.my-input{
box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
cursor: text;
padding: 8px 10px;
transition: border .1s linear;
}
.header-title{
margin: 5rem 0;
}
h1{
font-size: 31px;
line-height: 40px;
font-weight: 600;
color:#4c5357;
}
h2{
color: #5e8396;
font-size: 21px;
line-height: 32px;
font-weight: 400;
}
.login-or {
position: relative;
color: #aaa;
margin-top: 10px;
margin-bottom: 10px;
padding-top: 10px;
padding-bottom: 10px;
}
.span-or {
display: block;
position: absolute;
left: 50%;
top: -2px;
margin-left: -25px;
background-color: #fff;
width: 50px;
text-align: center;
}
.hr-or {
height: 1px;
margin-top: 0px !important;
margin-bottom: 0px !important;
}
@media screen and (max-width:480px){
h1{
font-size: 26px;
}
h2{
font-size: 20px;
}
}
</style>


<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<body>
   <div class="container">
      <div class="col-md-6 mx-auto text-center">
         <div class="header-title">
            <h1 class="wv-heading--title">
               Product Details
            </h1>
            
         </div>
      </div>
      <div class="row">
         <div class="col-md-4 mx-auto">
            <div class="myform form ">
               <form action="<?php echo base_url();?>Product/save_product" method="post" >
                  <div class="form-group">
                   
                     <input type="text" name="name" required class="form-control my-input" id="name" value="<?php echo @$res_data['name'];?>" placeholder="Name">
            
                  </div>

                  <div class="form-group">
                     <input type="description" name="description" required class="form-control my-input" id="description"  value="<?php echo @$res_data['description'];?>"placeholder="Description">
                  </div>
                  
                  <div class="form-group">
                  <select name="status"  class="txt" required>
                        <option>--- Select Status--- </option>
                        <option value = 1> Active </option> 
                        <option value = 0> InActive </option> 
                    </select>
                     </div>
                     <input type="hidden" name="edit_id" value="<?php echo @$res_data['id']?>">
                     <input type="hidden" name="delete_id" value="<?php echo @$res_data['id']?>">
                     <input type="submit" value="submit" name="submit" class="txt2">
                  </div>
                  
               </form>
            </div>
         </div>
      </div>
   </div>
</body>
