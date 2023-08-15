<?php
include "navbar.php";
include "link.php";
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>books info</title>

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
<?php
if(isset($_SESSION['login_user'])){?>
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="profile.php">My Profile</a>
  <a href="books.php">Books</a>
  <a href="book_request.php">Book Request</a>
  <a href="issuebook_info.php">Issue Information</a>
  <a href="fine_history.php">Fine History</a>
  <a href="feedback.php">Feedback</a>
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


    <!--..........................search Book..........................-->
    <div class="container " style="  min-height: 800px;">
    <div class="searchbook form-inline ml-auto">
      <form class="ml-auto py-3 " action="" method="post">
        <div class="input-group">
          <input type="text" name="search" placeholder="Search books" class="form-control" value="">
          <div class="input-group-append">
            <button type="submit" name="submit" class="input-group-text"><span class="fa fa-search"></span>
            </button>
          </div>

        </div>
      </form>
    </div>

    <!--.......................................DElete books.........................-->

    <div class="deletebook form-inline ml-auto">
      <form class="ml-auto py-3 h-20 " action="" method="post">
        <div class="input-group">
          <input type="text" name="b_id" placeholder="Search Book Id" class="form-control" value="">
          <div class="input-group-append">
            <button type="submit" name="submit1" class="input-group-text btn btn-primary">Request
            </button>
          </div>

        </div>
      </form>
    </div>


    <h1 class="display-4">Books List</h1>


    <?php
    //..................................Search book usinf database..............

    if(isset($_POST['submit']))
    {
      $sql="select * from books where b_name like '%$_POST[search]%' || b_id='$_POST[search]';";
    	$query=mysqli_query($dblink,$sql);
    	if(mysqli_num_rows($query)==0)
    	{

    		echo "Sorry..! No Books found";
    	}
    	else{

    	  echo "<table class='table table-bordered table-hover table-sm' id='dtHorizontalVerticalExample'>";
    		echo "<tr style='background-color:gray;'>";
    		echo "<th>"; echo "ID"; echo "</th>";
    		echo "<th>"; echo "Book-Name"; echo "</th>";
    		echo "<th>"; echo "Authors Name"; echo "</th>";
    		echo "<th>"; echo "Edition"; echo "</th>";
    		echo "<th>"; echo "Status"; echo "</th>";
    		echo "<th>"; echo "Quantity"; echo "</th>";
    		echo "<th>"; echo "Department"; echo "</th>";
    		echo "</tr>";

    		while($row=mysqli_fetch_assoc($query))
    		{


    			echo "<tr>";
    			echo "<td>";echo $row['b_id']; echo "</td>";
    			echo "<td>";echo $row['b_name']; echo "</td>";
    			echo "<td>";echo $row['authors']; echo "</td>";
    			echo "<td>";echo $row['edition']; echo "</td>";
    			echo "<td>";echo $row['status']; echo "</td>";
    			echo "<td>";echo $row['quantity']; echo "</td>";
    			echo "<td>";echo $row['department']; echo "</td>";

    			echo "</tr>";


    		}
    		echo "</table>";



    	}
    }
    else{
    	$sql="SELECT * FROM `books` ORDER BY `books`.`b_name` ASC";

    		// name assending
    		$result=mysqli_query($dblink,$sql);

    		//table header
    		echo "<table class='table table-bordered table-hover'>";
    		echo "<tr style='background-color:gray;'>";
    		echo "<th>"; echo "ID"; echo "</th>";
    		echo "<th>"; echo "Book-Name"; echo "</th>";
    		echo "<th>"; echo "Authors Name"; echo "</th>";
    		echo "<th>"; echo "Edition"; echo "</th>";
    		echo "<th>"; echo "Status"; echo "</th>";
    		echo "<th>"; echo "Quantity"; echo "</th>";
    		echo "<th>"; echo "Department"; echo "</th>";
    		echo "</tr>";

    		while($row=mysqli_fetch_assoc($result))
    		{


    			echo "<tr>";
    			echo "<td>";echo $row['b_id']; echo "</td>";
    			echo "<td>";echo $row['b_name']; echo "</td>";
    			echo "<td>";echo $row['authors']; echo "</td>";
    			echo "<td>";echo $row['edition']; echo "</td>";
    			echo "<td>";echo $row['status']; echo "</td>";
    			echo "<td>";echo $row['quantity']; echo "</td>";
    			echo "<td>";echo $row['department']; echo "</td>";

    			echo "</tr>";


    		}echo "</table>";

    }

    if(isset($_POST['submit1'])){
      if(isset($_SESSION['login_user']))
      {
        $sql1="SELECT * FROM `books` WHERE b_id=$_POST[b_id]";
        //$sql2="SELECT `username` FROM `issue_book` WHERE approve='' and username='$_SESSION[login_user]';";

        $query=mysqli_query($dblink,$sql1);
        //$query1=mysqli_query($dblink,$sql2);

        $row=mysqli_fetch_assoc($query);
      //  $row1=mysqli_fetch_assoc($query1);
      $x= $row['quantity'];
if($x>0)
{
        $count=mysqli_num_rows($query);
        //$count1=mysqli_num_rows($query1);

        if($count!=0)
        {
        $user=$_SESSION['login_user'];
        $sql2="SELECT `username` FROM `issue_book` WHERE approve!='Return' AND username='$user';";
        $query1=mysqli_query($dblink,$sql2);
        $row1=mysqli_fetch_assoc($query1);
        $count1=mysqli_num_rows($query1);
        if($count1===0)
        {
          $sql="INSERT into issue_book values('$_SESSION[login_user]','$_POST[b_id]','','','')";
          mysqli_query($dblink,$sql);
          ?>
          <script type="text/javascript">
            alert("Request sent successfully");
            window.location="book_request.php";
          </script>



          <?php
        }
        else{
          ?>
          <script type="text/javascript">
            alert("You have already a pending Book request");
            </script>



        <?php
      }}
      else{?>
          <script type="text/javascript">
            alert("Books not available in library");
            </script>


        <?php
      }

    }
    else{
      ?>
        <script type="text/javascript">
          alert("Out of stock");
          </script>


      <?php

    }}


    else{?>
      <script type="text/javascript">
        alert("Please Ensure your Login then send request for book");
      </script>
  <?php  }}



    	if(isset($_POST['request']))
    	{
    		if(isset($_SESSION['login_user']))
    		{
    			$b_id=$_POST["b_id"];

    			$username=$_SESSION['login_user'];


    			$sql="insert into issue_book values( '$username','$b_id','','','');";

    		$run=mysqli_query($dblink, $sql);}
    	else{
    			?>

    			<script type=text/javascript>
    			alert ("Please login first");
    			</script>




    			<?php
    		}

    	}?>
      </div>
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
