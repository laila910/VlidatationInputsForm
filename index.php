 <?php 
  $errorMessages=array(); //associative array to carry the errors during check the validation 
  
function CleanInputs($input)
{ 
    $input=trim($input);
    $input=stripcslashes($input);
    $input=htmlspecialchars($input);
    return $input; 
}

 if($_SERVER['REQUEST_METHOD']=="POST"){
     
     $name =CleanInputs($_POST["name"]);  
     $email =CleanInputs($_POST["email"]);  
     $password =CleanInputs($_POST["password"]);  
     $AccountOfLinkedIn=$_POST["account"];
     //check the file 
     if(!empty($_FILES['uploadedFile']['name'])){ //check if the file is uploded or not
        $PathOfTemp = $_FILES['uploadedFile']['tmp_name']; //path of temp is the name of the file when is uploaded and is putted in the temp folder in the server 
        $name = $_FILES['uploadedFile']['name']; //the Original name of the file that is in the user's Device. Note: the name is sent and included the extension of the uploaded file
        $sizeOfTheFile = $_FILES['uploadedFile']['size']; 
        $type = $_FILES['uploadedFile']['type'];//the type of the uploaded file 
         
     }else{
            $errorMessages['file'] = 'error your file is required please uploaded it!';
     }
     
     // Name Validation ...
        if(!empty($name)){
           if(strlen($name) < 3){
              $errorMessages['name'] = "Name Length must be > 2 "; 
             }
        }else{
          $errorMessages['name'] = " your Name is Required!";
        }
     //check the email
       if(!empty($email)){
        
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                 $s_email = filter_var($email,FILTER_SANITIZE_EMAIL);
                   if(!filter_var($s_email,FILTER_VALIDATE_EMAIL)){
                        $errorMessages['email'] = 'error your Email is not valid! ';
              
                    }
        
             }
        }else{
                  $errorMessages['email'] = 'error Email Required!';
            }
    // Password Validation ... 
        if(!empty($password)){
            if(strlen($password) < 6){

               $errorMessages['Password'] = "Password Length must be > 5 "; 
            }

        }else{

          $errorMessages['Password'] = " your Password Required";

        }
    // account Validation
    if(!empty( $AccountOfLinkedIn)){
         $AccountOfLinkedIn=trim($AccountOfLinkedIn);
         $AccountOfLinkedIn=htmlspecialchars($AccountOfLinkedIn);
        if(!filter_var( $AccountOfLinkedIn,FILTER_VALIDATE_URL)){
             $s_URL = filter_var($AccountOfLinkedIn,FILTER_SANITIZE_URL);
              if(!filter_var($s_URL,FILTER_VALIDATE_URL)){
                  $errorMessages['url_account'] = 'error your URl is not valid! ';
              
              }
        
        }
    }else{
      $errorMessages['url_account'] = 'error URL is Required!';
}
    
    
     //print the result 
     
     if(count($errorMessages) == 0){
       //form is valid then print the data 
        echo 'your name is : '.$name.'<br> your email is :'.$email.'<br> your password is:'.$password.'<br> your LinkedIn Account is:'.$AccountOfLinkedIn;
     }else{

     // print error messages 
     foreach($errorMessages as $key => $value){

        echo '* '.$key.' : '.$value.'<br>';
     }


    }
}
        
    
                    
  ?>
 <!DOCTYPE html>
 <html lang="en">

     <head>
         <title>ValidationForm</title>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     </head>

     <body>

         <div class="container">
             <h2> Form</h2>
             <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"
                 enctype="multipart/form-data">

                 <div class="form-group">
                     <label for="exampleInputEmail1">Enter your Name</label>
                     <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby=""
                         placeholder="Enter Name">
                 </div>


                 <div class="form-group">
                     <label for="exampleInputEmail1">Enter your Email</label>
                     <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                         aria-describedby="emailHelp" placeholder="Enter email">
                 </div>

                 <div class="form-group">
                     <label for="exampleInputPassword1">Enter your Password</label>
                     <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                         placeholder="Password">
                 </div>
                 <div class="form-group">
                     <label for="exampleInputPassword1">Please enter your LinkedIn account </label>
                     <input type="url" name=" account" class="form-control" id="exampleInputPassword1"
                         placeholder="https://www.linkedIn.com/">
                 </div>
                 <div class="form-group">
                     <label for="exampleInputEmail1">Enter your Cv</label>
                     <input type="file" name="uploadedFile" id=" exampleInputName" aria-describedby="">
                 </div>

                 <button type="submit" class="btn btn-primary">Submit</button>
             </form>
         </div>

     </body>

 </html>
