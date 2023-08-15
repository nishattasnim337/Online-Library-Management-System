<?php
include "navbar.php";
include "link.php";

$sql="SELECT MAX(b_id ) as max FROM `books`" ;
//$query=mysqli_query($dblink,$sql);
$rowSQL = mysqli_query($dblink,$sql );
$row = mysqli_fetch_array( $rowSQL );
$largestNumber = $row['max'];
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <style>
 body {
   font-family: "Lato", sans-serif;

 }

 .sidenav {
   height: 100%;
   width: 0;
   position: fixed;
   z-index: 1;
   margin-top: 70px;
   top: 0;
   left: 0;
   background-color: #000;
   overflow-x: hidden;
   transition: 0.5s;
   padding-top: 60px;
 }

 .sidenav a {
   padding: 8px 8px 8px 32px;
   text-decoration: none;
   font-size: 25px;
   color: #818181;
   display: block;
   transition: 0.3s;
 }

 .sidenav a:hover {
   color: #f1f1f1;
 }

 .sidenav .closebtn {
   position: absolute;
   top: 0;
   right: 25px;
   font-size: 36px;
   margin-left: 50px;
 }

 #main {
   transition: margin-left .5s;
   padding: 16px;
 }

 @media screen and (max-height: 450px) {
   .sidenav {padding-top: 15px;}
   .sidenav a {font-size: 18px;}
 }
 </style>
   </head>
   <body>
     <!--...............................side nav...............................-->
     <?php
     if(isset($_SESSION['admin_login_user'])){?>
       <div id="mySidenav" class="sidenav">
       <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
       <a href="profile.php">My Profile</a>
       <a href="books.php">Books</a>
       <a href="add_book.php">Add Book</a>
       <a href="add_student.php">Add Student</a>
       <!--<a href="update_book.php">Update Book</a>-->
       <a href="book_request.php">Book Request Info</a>
       <a href="issuebook_info.php">Issue Information</a>
       <a href="expired_info.php">Expired Book Information</a>
       <a href="announcement.php">Announcement</a>
       </div>

       <div id="main">

       <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; More option</span>

       <script>
       function openNav() {
       document.getElementById("mySidenav").style.width = "250px";
       document.getElementById("main").style.marginLeft = "250px";
       }

       function closeNav() {
       document.getElementById("mySidenav").style.width = "0";
       document.getElementById("main").style.marginLeft= "0";
       }
       </script>


     <?php}
     else{?>




     <?php
     }
      ?>


     <section>
       <div class="container">
         <div class="row">
           <div class="col">
             <div class="addbox"
              style="
              width:500px;
              margin:0 auto;
              font-size: 15px;
             ">
        <h1 style="text-align:center;font-size:35px;padding-top:15px;"><b>ADD A NEW BOOK</b></h1><br>
				<div class="">
				<form class="book" action="" method="POST">
        <input class="form-control font-weight-bold" type="text" placeholder="Last Accession Number of Book: <?php echo $largestNumber ?>" readonly/><br>
        <!--<input class="form-control" type="date" name="accession_date" placeholder="Date of Accession" required=""/><br>
-->
        <input class="form-control" type="text" name="b_id" placeholder="Accession No" required=""/><br>
					<input class="form-control" type="text" name="b_name" placeholder="Title of Book" required=""/><br>
					<input class="form-control" type="text" name="authors" placeholder="Name of Author" required=""/><br>
		      <select  class="form-control" name="edition" ">
					<selectstyle="text-align:center;" class="form-control" name="edition" ">
					<option value="session">Select Book Edition</optiion>
					<option value="1st">1st</option>
					<option value="2nd">2nd</option>
					<option value="3rd">3rd</option>
					<option value="4th">4th</option>
					<option value="5th">5th</option>
					<option value="6th">6th</option>
					<option value="7th">7th</option>
					<option value="8th">8th</option>
					<option value="9th">9th</option>
					<option value="10th">10th</option>
					<option value="11th">11th</option>
					<option value="12th">12th</option>
					</select><br>
          <!--<input class="form-control" type="text" name="volume_part" placeholder="Volume Part of Book" /><br>
-->
          <input class="form-control" type="text" name="status" placeholder="Book Status" required=""/><br>
					<input class="form-control" type="text" name="quantity" placeholder="Quantity of Book" required=""/><br>
          <!--<input class="form-control" type="text" name="place_of_publication" placeholder="Place of Publication" required=""/><br>
          <input class="form-control" type="text" name="name_of_publisher" placeholder="Name of Publisher" required=""/><br>
          <input class="form-control" type="text" name="year_of_publisher" placeholder="Year of Publication" required=""/><br>
          <input class="form-control" type="text" name="page" placeholder="Total Page" required=""/><br>
          <input class="form-control" type="text" name="price" placeholder="Book Price" required=""/><br>-->
					<select  class="form-control" name="department">
					<option value="session"> Select Department</optiion>
					<option value="CSTE">CSTE</option>
					<option value="IIT">IIT</option>
					<option value="ACCE">ACCE</option>
					<option value="EEE">EEE</option>
					<option value="ICE">ICE</option>
					<option value="Math">Math</option>
					<option value="Pharmacy">Pharmacy</option>
					<option value="Microbiology">Microbiology</option>
					<option value="BGE">BGE</option>
					<option value="English">English</option>
					<option value="LAW">LAW</option>

					</select>
          <div class="text-center">


					<button class="btn btn-primary px-5 mt-3 mb-5 " name="submit">ADD</button></div>
					</div>
					</form>

				</div>

        <!--.................................php.................................-->
        <?php
        function validate($data){
          $data=trim($data);
          $data=stripcslashes($data);
          $data=htmlspecialchars($data);
        }
if(isset($_POST['submit']))

	{
		if(isset($_SESSION['admin_login_user']))

			{
				$id=$_POST["b_id"];
				$bname=$_POST["b_name"];
				$authors=$_POST['authors'];
				$edition=$_POST["edition"];
				$status=$_POST["status"];
				$quantity=$_POST["quantity"];
				$department=$_POST["department"];
        $sql="INSERT INTO `books`(`b_id`, `b_name`, `authors`, `edition`, `status`, `quantity`, `department`) VALUES ('$id','$bname','$authors','$edition','$status','$quantity','$department');";
				//$sql="insert into books values('$id','$bname','$authors','$edition','$status','$quantity','$department')";
				$run=mysqli_query($dblink,$sql);
			?>
			<script type=text/javascript>
			alert("Book Successfully Added");
			</script>

			<?php
	   }
			else{?>

			<script type=text/javascript>
			alert("Please Login your admin panel");
			</script>
			<?php

			}

	}


?>

             </div>
           </div>
         </div>

       </div>
     </section>



   </body>
 </html>
