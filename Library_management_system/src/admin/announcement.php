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
     <div class="container">
		<div class="panel panel-default">

             <?php if(isset($error)===true) { ?>
        <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Record Updated Successfully!</strong>
            </div>
            <?php } ?>
		  <!-- Default panel contents -->
		  <div class="panel-heading">
		  	<div class="row">
		  		<h3 class="center-block ml-4 mt-5 mb-3">Published Announcements</h3>
			</div>
		  </div>
		  <table class="table table-bordered">


      		<thead>
                <tr>
                    <th>news_id</th>
                         <th>Announcement</th>

                          <th>Delete</th>
                </tr>
          </thead>

           <?php

          $sql2 = "SELECT * from news";

      $query2 = mysqli_query($dblink, $sql2);
      $counter = 1;
      while ($row = mysqli_fetch_array($query2)) {  ?>


        <tbody>
          <td><?php echo $counter++; ?></td>
          <td><?php echo $row['announcement']; ?></td>
         <form method='post' action=''>
        <input type='hidden' value="<?php echo $row['news_id']; ?>" name='id'>

        <td><button name='del' type='submit' value='Delete' class='btn btn-warning'>DELETE</button></td>
        </form>
        </tbody>

     <?php }
           ?>

		         </tbody>
		   </table>

	  </div>

			<div class="panel panel-default">
				  <div class="panel-heading">
				    <h2 class="panel-title center-block text-center">Publish New Announcements</h2>
				  </div>
	  <div class="panel-body">
	    <form role="form" action="" method="post">
				<div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <textarea class="form-control" rows="5" draggable="false" name="news"></textarea>
          <br></div>

            <button class="btn btn-primary ml-2 my-5 " name="submit" style="width:200px;">SUBMIT</button>
		</div>
  <br>
	      				</form>
				  </div>
			</div>
	</div>

	<!-- Confirm delete modal begins here -->
	<div class="mod modal fade" id="popUpWindow">
        	<div class="modal-dialog">
        		<div class="modal-content">

        			<!-- header begins here -->
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
        				<h3 class="modal-title"> Warning</h3>
        			</div>

        			<!-- body begins here -->
        			<div class="modal-body">
        				<p>Are you sure you want to delete this book?</p>
        			</div>

        			<!-- button -->
        			<div class="modal-footer ">
        				<button class="col-lg-4 col-sm-4 col-xs-6 col-md-4 btn btn-warning pull-right"  style="margin-left: 10px" class="close" data-dismiss="modal">
        					No
        				</button>&nbsp;
        				<button class="col-lg-4 col-sm-4 col-xs-6 col-md-4 btn btn-success pull-right"  class="close" data-dismiss="modal" data-toggle="modal" data-target="#info">
        					Yes
        				</button>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- Confirm delete modal ends here -->
        <!-- delete message modal starts here -->
        <div class="modal fade" id="info">
        	<div class="modal-dialog">
        		<div class="modal-content">

        			<!-- header begins here -->
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
        				<h3 class="modal-title"> Warning</h3>
        			</div>

        			<!-- body begins here -->
        			<div class="modal-body">
        				<p>Book deleted <span class="glyphicon glyphicon-ok"></span></p>
        			</div>

        		</div>
        	</div>
        </div>
        <!-- delete message modal ends here -->
        <!-- update modal begins here -->

        <div class="modal fade" id="update">
        	<div class="modal-dialog">
        		<div class="modal-content">

        			<!-- header begins here -->
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
        				<h2 class="modal-title"> Update</h2>
        			</div>

        			<!-- body begins here -->
					<form role="form" action="" method="post" enctype="multipart/form-data">
        			<div class="modal-body">
        					<div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        					   <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> -->
        						<label for="name">Enter Id </label>
        						<input type="text" name="id" value=" <?php
								 echo $row[''];
								 ?>
								">
								 <div class="form-group ">
        						      <label for="name">Announcement</label>
        						       <textarea class="form-control" rows="3" draggable="false" name="text" value="
									    ">
        						       </textarea>
        						  </div>

        					</div>



        			</div>

        			<!-- button -->
        			<div class="modal-footer">
        				<button  name ="UpDat" class="col-lg-12 col-sm-12 col-xs-12 col-md-12 btn btn-success" data-target="alert">
        					UPDATE
        				</button>
        			</div>
					</form>

        		</div>
        	</div>
        </div>
        <!-- update modal ends here -->



  <script type="text/javascript">

        function Delete() {
            return confirm('Would you like to delete the news');
        }

         function Update() {
            return confirm('Would you like to update the news');
        }

      </script>


   </body>
   <?php
   if(isset($_POST['submit']))
   {

      $news = trim($_POST['news']);

      $sql = "INSERT INTO `news`(`news_id`, `announcement`) VALUES ('','$news')";

      $query = mysqli_query($dblink,$sql);
      $error = false;?>
      <script type="text/javascript">
      alert("Update successfully");
      </script>

        <?php /*if($query){
         $error = true;
        }
        else{
          echo "<script>alert('Not successful!! Try again.');
                      </script>";
        }*/
   }

       if(isset($_POST['UpDat'])){
      $id = sanitize(trim($_POST['id']));
          $text = sanitize(trim($_POST['text']));

          $sql_up = "UPDATE news set announcement = '$text' where news_id = '$id'";
      echo mysqli_error($sql_up);
           $result = mysqli_query($dblink,$sql_del);
                  if ($result)
                  {
                      echo "<script>


                     alert('Update successful');

           </script>";
                  }


       }

       if(isset($_POST['del'])){

          $id =trim($_POST['id']);

          $sql_del = "DELETE from news where news_id ='$id'";

          $result = mysqli_query($dblink,$sql_del);
                  if ($result)
                  {?>
                    <script type="text/javascript">
                    alert("delete successfully");
                    </script>
                <?php
               }

       }





   ?>
