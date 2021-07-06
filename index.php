 <?php 

 if($_SERVER['REQUEST_METHOD']=="POST"){
    
     $email =$_POST["email"];
     $password =$_POST["password"];
     $AccountOfLinkedIn=$_POST["account"];
     if(str_word_count($name)<0){
         
         echo"error Please enter your name";
         
     
     } else {
        echo 'your Email is '.' '.$email .'<br> Your Password is :'.' '.$password.'<br>your LinkdIn Account (URL) is '.' '.$AccountOfLinkedIn;
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
