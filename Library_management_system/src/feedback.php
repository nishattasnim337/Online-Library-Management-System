<?php
include "navbar.php";
include "link.php";

 ?>
<!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Profile</title>

  </head>
   <body>

     <section>

     <!--.............................................feedback page.................................-->
     <section id="card" style="min-height:500px;font-size:18px;">
      <div class="row my-5 row justify-content-center">
      <div class="col-lg-6 col-md-6 col-sm-4 m-2">
        <div class="card">
          <div class="card-header">
            <h2 class="text-center">Give your feedback here</h2>
          </div>
          <div class="card-body">
            <div class="row">
              <form role="form" action="" method="post">
                <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <div class="form-group ">

                      <textarea class="form-control" rows="3" draggable="false" name="news" style="width:600px;">
                         </textarea>


                </div>
                </div><br>
              <div class="input-group pull-right">
              <div class="form-group">
              <button class="btn btn-primary ml-3" name="submit">SUBMIT</button>
              </div>
              </div>

                        </form>
                      </div>
                      </div></div>
                    </div></div>

          </section>
     <footer class="bg-dark text-light text-center">
       <div class="container">
         <div class="row">
           <div class="col">
             <p>Copyright 2021 &copy; library</p>
           </div>
         </div>
       </div>
     </footer>

   </body>
 </html>
<?php
 if(isset($_POST['submit']))

 	{
 		if(isset($_SESSION['login_user']))

 			{
 				$id=$_POST["news"];
        $user=$_SESSION['login_user'];

 				$sql="INSERT INTO `feedback`(`feedback_id`, `user`, `mgs`) VALUES ('','$user','$id')";
 				$run=mysqli_query($dblink,$sql);
 			?>
 			<script type=text/javascript>
 			alert("Thanks for your feedback");
 			</script>

 			<?php
 	   }
 			else{?>

 			<script type=text/javascript>
 			alert("Please Login your first");
 			</script>
 			<?php

 			}

 	}


 ?>
