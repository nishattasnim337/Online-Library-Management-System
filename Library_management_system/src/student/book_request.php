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

       <div id="mySidenav" class="sidenav">
       <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
       <a href="profile.php">My Profile</a>
       <a href="books.php">Books</a>
       <a href="book_request.php">Book Request</a>
       <a href="issuebook_info.php">Issue Information</a>
       <a href="fine_history.php">Fine History</a>
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

       <div class="container" style="min-height: 800px;">
         <div class="searchbook form-inline ml-auto">
           <form class="ml-auto py-3 " action="" method="post">
             <div class="input-group">
               <input type="text" name="search" placeholder="Book Id" class="form-control" value="">
               <div class="input-group-append">
                 <button type="submit" name="delete_btn" class="input-group-text"><span class="fa fa-trash"></span>
                 </button>
               </div>

             </div>
           </form>
         </div>

       <?php


       if(isset($_SESSION['login_user']))
       {
         $sql="select * from issue_book where username='$_SESSION[login_user]';";
         $query=mysqli_query($dblink,$sql);
         if(mysqli_num_rows($query)==0)
         {
           echo "<h2 class='display-5 py-5'>";
           echo "Sorry...! There is no pending book request";
           echo "</h2>";
         }
         else{
         echo "<table class='table table-bordered table-hover mt-5'>";
           echo "<tr style='background-color:gray;'>";
           echo "<th>"; echo "Book_ID"; echo "</th>";
           echo "<th>"; echo "Approve Status"; echo "</th>";
           echo "<th>"; echo "Issue Date"; echo "</th>";
           echo "<th>"; echo "Return Date"; echo "</th>";
           echo "<th>"; echo "Fine"; echo "</th>";
           //echo "<th>"; echo "Delete"; echo "</th>";



           echo "</tr>";

           while($row=mysqli_fetch_assoc($query))
           {
             $y=$row['returnbook'];

             echo "<tr>";
             echo "<form action='book_request.php' method='GET'>";
             echo "<td>";echo $row['b_id']; echo "</td>";
             echo "<td>";echo $row['approve']; echo "</td>";
             echo "<td>";echo $row['issue']; echo "</td>";
             $day=date("Y-m-d");
             if(($day>$row['returnbook'])&& $row['approve']=='Expired'){
               echo "<td class='bg-danger'>";echo $row['returnbook']; echo "</td>";
               ?>
               <td class="bg-info"> <input type="hidden" name="fine" value=""  />
                 <?php
                 if($day>$y)
                {
                  $return=strtotime($y);
                   $day=date("Y-m-d");
                   $today=strtotime($day);
                   $difference=$today-$return;
                   if($difference>0)
                   {
                    $days=floor($difference/(60*60*24));
                    //echo $days;
                   $x=$days*5;
                   echo $x;}

                }
                else{
                  echo "No Fine";
                } ?></td>
                <?php
             }
             else{
               echo "<td>";echo $row['returnbook']; echo "</td>";
             }


             echo "</tr>";

             echo "</form>";

           }

           echo "</table>";




         }
       }
else{
  //echo "<h2 class='display-3'>";
  //echo "Please Login first";
  //echo "</h2>";
}
       ?>
</div>

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
if(isset($_POST['delete_btn'])){
  $x=$_POST['search'];
  echo $x;
$sql="select username from issue_book where username='$_SESSION[login_user]' and approve=''and b_id='$x';";
$query=mysqli_query($dblink,$sql);
$row=mysqli_fetch_assoc($query);
if($row>1 ){
  //echo
echo $row['username'];
//echo "<td>";echo "<button type='submit' class='btn btn-primary d-block ' name='delete_btn'>Delete_Req</button>"; echo "</td>";
$sql="DELETE FROM `issue_book` WHERE  username='$_SESSION[login_user]' and approve=''and b_id='$x';";
$query=mysqli_query($dblink,$sql);
?>
<script type="text/javascript">
  alert("Delete Your request successfully");

</script>

<?php
}


else{?>
<script type="text/javascript">
  alert("This book id is not panding, without approval");
  window.location="books.php";
  </script>


<?php
}}



 ?>
