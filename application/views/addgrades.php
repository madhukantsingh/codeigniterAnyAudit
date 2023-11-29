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
               Grades
            </h1>
            
         </div>
      </div>
      <div class="row">
         <div class="col-md-4 mx-auto">
            <div class="myform form ">
               <form action="<?php echo base_url();?>Grades/save_grades" method="post"   >
                  <div class="form-group">
                     <label>Name</label>
                     <input type="text" name="name" required  class="form-control my-input" id="name" value="<?php echo @$res_data['name']?>" placeholder="Name">
                  </div>
                 
                  <div class="form-group">
                  <label>Grades</label>
                  <select name="grades" class="txt" required >
                        <option>--- select grades--- </option>
                        <option value = "A" <?php if(@$res_data["grades"] == 'A') {echo "selected" ;}?> >A </option> 
                        <option value = "B"  <?php if(@$res_data["grades"] == 'B') {echo "selected"; }?> > B </option> 
                        <option value = "C" <?php if(@$res_data["grades"] == 'C') {echo "selected" ;}?> > C </option> 
                        <option value = "D" <?php if(@$res_data["grades"] == 'D') {echo "selected"; }?>> D </option> 
                    </select>
                  </div>
                  <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="txt" required >
                        <option>--- Select Status--- </option>
                        <option value = 1  > Active </option> 
                        <option value = 0  > InActive </option> 
                    </select>
                     </div>
                     <input type="hidden" name="edit_id" value="<?php echo @$res_data['id']?>">
                     <input type="submit" value="submit" name="submit" class="txt2">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</body>