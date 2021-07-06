 <?php 
function CleanInputs($input)
{ 
    $input=trim($input);
    $input=stripcslashes($input);
    $input=htmlspecialchars($input);
    return $input; 
}
function ValidEmail($email){
    if(!empty($email)){
        
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $s_email = filter_var($email,FILTER_SANITIZE_EMAIL);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            echo 'Note: You can use this email'.' '.$s_email;
              
          }
        
    }else{
        return 'Valid Email';
        
    }
}else{
    echo '<br>Note : Please Enter Your Email!';
}
    
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
    
     $email =CleanInputs($_POST["email"]);  
     $password =CleanInputs($_POST["password"]);  
     $AccountOfLinkedIn=$_POST["account"];
     
     if((validEmail($email)=="Valid Email")||(validURL($AccountOfLinkedIn)=="Valid URL")||(validpass($password)=="Valid password")){
       
          if(((validURL($AccountOfLinkedIn)=="Valid URL")||(validpass($password)=="Valid password"))){
               if((validpass($password)=="Valid password")){
              
         
              

           
        
        }else{
              echo '<br>your Email is '.' '.$email .'<br> Your Password is :'.' '.$password.'<br>your LinkdIn Account (URL) is '.' '.$AccountOfLinkedIn;
        }
    }
}
        
    
     
    
}

 

                    
  ?>
 <!DOCTYPE html>

 <html>

     <head>
         <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <title></title>
         <meta name="description" content="">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="">
         <style>
         body {
             font-size: 20px;
             color: blue;
             font-weight: bolder;
         }

         input {
             width: 50%;
             padding: 10px;
             margin-right: auto;
             margin-left: auto;
             margin-top: 20px;
             margin-bottom: 20px;
         }


         button {
             color: #fff;
             background-color: #000;
             border: none;
             padding: 10px;
             margin-right: 20px;
             font-size: 20px;
             margin-bottom: 20px;
         }

         </style>
     </head>

     <body>


         <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?> ">

             <input type="text" name="email" placeholder="please enter your email"><br>
             <input type="text" name="password" placeholder="please enter your Password"><br>
             <input type="text" name="account" placeholder="please enter URL Of Your LinkedIn Account"><br><br>

             <button type="submit" name="submit" value="submit"> Sumbit</button><span>click me to Send Your Data </span>
         </form>



         <script src="" async defer></script>
     </body>

 </html>
