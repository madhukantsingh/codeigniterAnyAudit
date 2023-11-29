<!DOCTYPE html>
<style>
    html,body
{
    width: 500px;
    margin: auto;
}
.container
{
    width: 500px;
    margin: 20px auto;
}

.preview
{
    padding: 10px;
    position: relative;
}

.preview i
{
    color: white;
    font-size: 35px;
    transform: translate(50px,130px);
}

.preview-img
{
    border-radius: 100%;
    box-shadow: 0px 0px 5px 2px rgba(0,0,0,0.7);
}

.browse-button
{
    width: 200px;
    height: 200px;
    border-radius: 100%;
    position: absolute; /* Tweak the position property if the element seems to be unfit */
    top: 10px;
    left: 132px;
    background: linear-gradient(180deg, transparent, black);
    opacity: 0;
    transition: 0.3s ease;
}

.browse-button:hover
{
    opacity: 1;
}

.browse-input
{
    width: 200px;
    height: 200px;
    border-radius: 100%;
    transform: translate(-1px,-26px);
    opacity: 0;
}

.form-group
{
    width:  250px;
    margin: 10px auto;
}

.form-group input
{
    transition: 0.3s linear;
}

.form-group input:focus
{
    border: 1px solid crimson;
    box-shadow: 0 0 0 0;
}

.Error
{
    color: crimson;
    font-size: 13px;
}

.Back
{
    font-size: 25px;
}
body
   
</style>
<style>
    
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"/>
</head>

<body>
    <!-- <div class="container">
       <div class="Back">
            <i class="fa fa-arrow-left" onclick="Back()"></i>
        </div> -->
        <p class="h2 text-center">Form</p>
        <form action="<?php echo base_url();?>Students/save_student" method="post" enctype="multipart/form-data"> 
            
            
            <div class="form-group">
                <label>Full Name:</label>
                <input class="form-control" type="text" name="fullname" required 
                required="" placeholder="Please Enter Subject Name" name="name" class="txt" value="<?php echo @$res_data['name'];?>"
                placeholder="Enter Your Full Name"/>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Branch :</label>
                <input class="form-control" type="text" name="branch" required 
                required="" placeholder="Enter Your Branch Name" name="subject_name" class="txt" value="<?php echo @$res_data['branch'];?>"
                placeholder="Enter Your Branch Name"/>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input class="form-control" type="email" name="email" required 
                required="" placeholder="Enter Your Email Id" name="subject_name" class="txt" value="<?php echo @$res_data['email_id'];?>">
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input class="form-control" type="password" name="password" required 
                placeholder="Enter Password"/>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>City :</label>
                <input class="form-control" type="text" name="city" required
                required="" placeholder="Enter Your City Name" name="subject_name" class="txt" value="<?php echo @$res_data['city'];?>">
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Phone No :</label>
                <input class="form-control" type="text" 
                required="" placeholder="Enter Your Phone no" name="phone" class="txt" value="<?php echo @$res_data['phone'];?>">
                <span class="Error"></span>
            </div>
           
            <html>
            <body>

            <!-- <form action="upload.php" method="post" enctype="multipart/form-data"> -->
            Select image to upload: 
            <input type="file" name="fileToUpload" id="fileToUpload">
            <!-- <input type="submit" value="Upload Image" name="submit"> -->
            <!-- </form> -->

            </body>
            </html> 

            <!-- <div class="preview text-center">
                <img class="preview-img" src= "http://simpleicon.com/wp-content/uploads/account.png" alt="Preview Image" width="200" height="200"/>
                <div class="browse-button">
                <i class="fa fa-pencil-alt"></i>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                <input class="browse-input" type="file" required name="uploadedfile" id="uploadedfile"/>
                </div> -->
                
            <div class="form-group">
                <label>Gender:</label><br/>
                <label><input type="radio" name="gender" required value="Male" checked /> Male</label>
                <label><input type="radio" name="gender" required value="Female" /> Female</label>
                <label><input type="radio" name="gender" required value="Other" /> Other</label>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <input type="hidden" name="edit_id" value="<?php echo @$res_data['id']?>">
                
                <input class="btn btn-primary btn-block" type="submit" value="Submit"/>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>