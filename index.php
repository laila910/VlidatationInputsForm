 <?php 
  $errorMessages=array(); //associative array to carry the errors during check the validation 
  
function CleanInputs($input)
{ 
    $input=trim($input);
    $input=stripcslashes($input);
    $input=htmlspecialchars($input);
    return $input; 
}


function ValidURL($AccountOfLinkedIn){
    if(!empty( $AccountOfLinkedIn)){
         $AccountOfLinkedIn=trim($AccountOfLinkedIn);
         $AccountOfLinkedIn=htmlspecialchars($AccountOfLinkedIn);
    if(!filter_var( $AccountOfLinkedIn,FILTER_VALIDATE_URL)){
        $s_URL = filter_var($AccountOfLinkedIn,FILTER_SANITIZE_URL);
        if(!filter_var($s_URL,FILTER_VALIDATE_URL)){
            echo '<br>Note:YOUR url is not valid Please try this'.' '.$s_URL;
              
          }
        
    }else{
        return 'Valid URL';
        
    }
}else{
    echo 'Note : Please Enter Your URL!';
}
}
function validpass($password){
        if(empty($password)){
            echo '<br>please enter your Password!';
        }else{
            return 'Valid Password';
        }
 }

 if($_SERVER['REQUEST_METHOD']=="POST"){
     
     $name =CleanInputs($_POST["name"]);  
     $email =CleanInputs($_POST["email"]);  
     $password =CleanInputs($_POST["password"]);  
     $AccountOfLinkedIn=$_POST["account"];
     //check the email
       if(!empty($email)){
        
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                 $s_email = filter_var($email,FILTER_SANITIZE_EMAIL);
                   if(!filter_var($s_email,FILTER_VALIDATE_EMAIL)){
                        $errorMessages['email'] = 'error your Email is not valid! ';
              
                    }
        
             }else{
                      return $email;
        
                  }
        }else{
                  $errorMessages['email'] = 'error Email Required!';
            }
     
     
     if(count($errorMessages) == 0){

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
         <title>Register</title>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     </head>

     <body>

         <div class="container">
             <h2>Vertical (basic) form</h2>
             <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"
                 enctype="multipart/form-data">

                 <div class="form-group">
                     <label for="exampleInputEmail1">Name</label>
                     <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby=""
                         placeholder="Enter Name">
                 </div>


                 <div class="form-group">
                     <label for="exampleInputEmail1">Email address</label>
                     <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                         aria-describedby="emailHelp" placeholder="Enter email">
                 </div>

                 <div class="form-group">
                     <label for="exampleInputPassword1">New Password</label>
                     <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                         placeholder="Password">
                 </div>


                 <div class="form-group">
                     <label for="exampleInputPassword1">Birth Date</label>
                     <input type="date" name="Bdate" class="form-control">
                 </div>



                 <button type="submit" class="btn btn-primary">Submit</button>
             </form>
         </div>

     </body>

 </html>
