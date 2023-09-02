<?php
include "navbar.php";
include "link.php";
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student Information Details</title>
  </head>
  <body>
    <!--..........................search option..........................-->
    <div class="container">
    <div class="">
      <form class="ml-auto py-3 " action="" method="post">
        <div class="input-group">
          <input type="text" name="search" placeholder="Search Student" class="form-control" value="">
          <div class="input-group-append">
            <button type="submit" name="submit" class="input-group-text"><span class="fa fa-search"></span>
            </button>
          </div>

        </div>
      </form>
    </div>


    <h1 class="display-4">Student List</h1>

    <?php


    if(isset($_POST['submit']))
    {
    	$sql="select * from student where username like '%$_POST[search]%';";
    	$query=mysqli_query($dblink,$sql);
    	if(mysqli_num_rows($query)==0)
    	{

    		echo "Sorry..! This username can't exit";
    	}
    	else{
    	echo "<table class='table table-bordered table-hover'>";
    		echo "<tr style='background-color:gray;'>";
    		echo "<th>"; echo "ID"; echo "</th>";
    		echo "<th>"; echo "First Name"; echo "</th>";
    		echo "<th>"; echo "Last Name"; echo "</th>";
    		echo "<th>"; echo "Department"; echo "</th>";
    		echo "<th>"; echo "Session"; echo "</th>";
        echo "<th>"; echo "Username"; echo "</th>";
    		echo "<th>"; echo "Roll"; echo "</th>";
    		echo "<th>"; echo "Email"; echo "</th>";
    		echo "</tr>";

    		while($row=mysqli_fetch_assoc($query))
    		{


    			echo "<tr>";
    			echo "<td>";echo $row['id']; echo "</td>";
    			echo "<td>";echo $row['f_name']; echo "</td>";
    			echo "<td>";echo $row['l_name']; echo "</td>";
    			echo "<td>";echo $row['department']; echo "</td>";
    			echo "<td>";echo $row['session_year']; echo "</td>";
          echo "<td>";echo $row['username']; echo "</td>";
    			echo "<td>";echo $row['roll']; echo "</td>";
    			echo "<td>";echo $row['email']; echo "</td>";

    			echo "</tr>";


    		}
    		echo "</table>";



    	}
    }
    else{
    	$sql="SELECT id,f_name,l_name,department,session_year,username,roll,email  FROM `student` ORDER BY `student`.`f_name` ASC";

    		// name assending
    		$result=mysqli_query($dblink,$sql);

    		//table header
        echo "<table class='table table-bordered table-hover'>";
      		echo "<tr style='background-color:gray;'>";
      		echo "<th>"; echo "ID"; echo "</th>";
      		echo "<th>"; echo "First Name"; echo "</th>";
      		echo "<th>"; echo "Last Name"; echo "</th>";
      		echo "<th>"; echo "Department"; echo "</th>";
      		echo "<th>"; echo "Session"; echo "</th>";
          echo "<th>"; echo "Username"; echo "</th>";
      		echo "<th>"; echo "Roll"; echo "</th>";
      		echo "<th>"; echo "Email"; echo "</th>";
      		echo "</tr>";
    		while($row=mysqli_fetch_assoc($result))
    		{


          echo "<tr>";
    			echo "<td>";echo $row['id']; echo "</td>";
    			echo "<td>";echo $row['f_name']; echo "</td>";
    			echo "<td>";echo $row['l_name']; echo "</td>";
    			echo "<td>";echo $row['department']; echo "</td>";
    			echo "<td>";echo $row['session_year']; echo "</td>";
          echo "<td>";echo $row['username']; echo "</td>";
    			echo "<td>";echo $row['roll']; echo "</td>";
    			echo "<td>";echo $row['email']; echo "</td>";

    			echo "</tr>";


    		}echo "</table>";

    }

    	if(isset($_POST['request']))
    	{
    		if(isset($_SESSION['admin_login_user']))
    		{
    			$b_id=$_POST["b_id"];

    			$username=$_SESSION['admin_login_user'];


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
  </body>
</html>
