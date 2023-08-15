<?php
include "navbar.php";
include "link.php";
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Book Request </title>

     <!--................slide navigaton style  -->
     <style>

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
<div class="darkoverlay text-light" style="
background: rgba(0,0,0,0.7);

top:0;
left:0;
height:100%;
width:100%;



">
       <div id="mySidenav" class="sidenav">
       <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
       <a href="profile.php">My Profile</a>
       <a href="books.php">Books</a>
       <a href="add_book.php">Add Book</a>
       <a href="book_request.php">Book Request Info</a>
       <a href="issuebook_info.php">Issue Information</a>
       <a href="expired_info.php">Expired Book Information</a>
       </div>

       <div id="main">

       <span style="font-size:30px;cursor:pointer" onclick="openNav()" class="sticky-top">&#9776; More option</span>

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

       <?php
       //........................Fine calculation................
       $_name=$_GET['hiddenuser'];
       echo $_name;
       echo "<br>";
       $_bid=$_GET['hidden_b_id'];
       echo $_bid;
       $returndate=$_GET['hidden_returndate'];
       echo $returndate;
       $roll=$_GET['hidden_roll'];
       echo $roll;

       //............................problem Solved ..................
       $return=strtotime($_GET['hidden_returndate']);

        $day=date("Y-m-d");
        $today=strtotime($day);
        $difference=$today-$return;
        if($difference>0)
        {
         $days=floor($difference/(60*60*24));
        $x=$days*5;
        echo $x."Taka";}
        ?>


       <div class="container-fluid" style="min-height: 800px;">
         <h2 class="display-5 text-center pt-5">Fine Details</h2>
         <hr class="bg-light">
         <div class="container">
           <div class="row justify-content-center">
             <div class="col-md-3"></div>
             <div class=" col-md-6 d-inline">
               <form action="" method="POST" class="font-weight-bold">
                 <div class="form-group row">
                  <label for="bookid" class="col-sm-3 col-form-label">Book Id</label>
                  <div class="col-sm-9">
                    <input type="text" readonly class="form-control" value="<?php echo $_GET['hidden_b_id'];?>"></input>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="username" class="col-sm-3 col-form-label ">UserName</label>
                  <div class="col-sm-9">
                    <input type="text" readonly class="form-control" value="<?php echo $_GET['hiddenuser'];?>"></input>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="username" class="col-sm-3 col-form-label ">Roll No</label>
                  <div class="col-sm-9">
                    <input type="text" readonly class="form-control" value="<?php echo $_GET['hidden_roll'];?>"></input>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="username" class="col-sm-3 col-form-label ">Return Date</label>
                  <div class="col-sm-9">
                    <input type="text" readonly class="form-control" value="<?php echo $_GET['hidden_returndate'];?>"></input>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="username" class="col-sm-3 col-form-label ">Expired Days</label>
                  <div class="col-sm-9">
                    <input type="text" readonly class="form-control" value="<?php echo $days;?>"></input>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="username" class="col-sm-3 col-form-label ">Total Fine</label>
                  <div class="col-sm-9">
                    <input type="text" readonly class="form-control text-danger font-weight-bold" value="<?php echo $x." "."Taka";?>"></input>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="username" class="col-sm-3 col-form-label ">Receive Fine</label>
                  <div class="col-sm-9">
                    <input type="text"  class="form-control text-danger font-weight-bold" name="fine_receive"></input>
                  </div>
                </div>
                <div class="form-group row ">
               <button class="btn btn-danger form control btn-block col-sm-6   btn-rounded" type="submit" name="not_paid">Not Paid</button>
                  <div class="col-sm-6">
                     <button class="btn btn-success form control btn-block" type="submit" name="paid">Fine Paid</button>
                  </div>
                </div>
              </form>
             </div>
             <div class="col-md-3"></div>
           </div>

         </div>

</div>
</div>

<footer class="bg-dark text-light text-center">
  <div class="container">
    <div class="row">
      <div class="col">
        <p>Copyright 2021 &copy; library</p>
      </div>
   </body>
 </html>

 <?php
 //echo $x;
 //echo $_POST['fine_receive'];
 //..................................Issue Book update Successfully....................

 $sql3="SELECT * FROM `books` WHERE b_id='$_bid';";
 $run3=mysqli_query($dblink, $sql3);
 $row3=mysqli_fetch_assoc($run3);
 $present_book= $row3['quantity'];
 echo $present_book;
 if(isset($_POST['paid']))
 {
   if($_POST['fine_receive']==$x){
    $present_book=$present_book+1;
   $sql="UPDATE `issue_book` SET `approve`='Return' WHERE `username`='$_name' and `b_id`='$_bid';";
   mysqli_query($dblink,$sql);
   $sql2="INSERT INTO `fine_collection`(`b_id`, `username`, `roll`,`return_date`, `days`, `fine`) VALUES ('$_bid','$_name','$roll','$day','$days','$x')";
   mysqli_query($dblink,$sql2 );
 ?>

   <script type="text/javascript">
   alert("Return Book successfully");
   window.location="expired_info.php";
   </script>
   <?php
   if($present_book>0)
   {
     $sql4="UPDATE `books` SET `status`='Available',`quantity`='$present_book' WHERE b_id='$_bid';";
     $run4=mysqli_query($dblink,$sql4);
   }
   else{

   }
}
   else{
     ?>

       <script type="text/javascript">
       alert("Take Exact Fine");

       </script>
       <?php


   }}
   elseif (isset($_POST['not_paid'])) {?>
     <script type="text/javascript">
     window.location="expired_info.php";
     </script>
     <?php

   }
/*  else{
    ?>
    <script type="text/javascript">
    window.location="expired_info.php";
    </script>

  <?php
}*/
  ?>
