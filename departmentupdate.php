<?php
include("header.php");
if(!isset($_SESSION['staff_id']))
{
	echo "<script>window.location='login.php';</script>";
}
if(isset($_POST['submit']))
{
		if(isset($_GET['editid']))
	{
		$sql="UPDATE department SET department='$_POST[department]'";
		$sql = $sql . ",department_id='$_POST[department_id]',department_detail='$_POST[department_detail]'";
		$sql = $sql . ",department_status='$_POST[department_status]' WHERE department_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
			if(mysqli_affected_rows($con) == 1)
			{
				echo "<script>alert('Department Record updated successfully..');</script>";
				echo "<script>window.location='viewdepartment.php';</script>";
			}
		}
		else
		{
		$sql = "INSERT INTO department(department,department_detail,department_status) VALUES('$_POST[department]','$_POST[department_detail]','$_POST[department_status]')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con)==1)
		{
			echo "<script>alert('Registered successfully...');</script>";
			echo "<script>window.location='department.php';</script>";
		}
	}
}
if(isset($_GET['editid']))
{
	$sqledit= "SELECT * FROM department where department_id='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>

  <!-- contact section -->

  <section class="contact_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h3>
               Department Details
              </h3>
              <p>
                Add/Edit Department
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="contact-form">
            <h5>
              Kindly Register to get benefits
            </h5>
            <form action="" method="post" name="registration" id="registration" enctype="multipart/form-data">
			
              <div>
				<label class="labelproperty">Department Name</label>
                <input type="text" name="department" id="department" placeholder="Enter Name" required="" value="<?php echo $rsedit['department']; ?>" />
              </div>
			  
              <div>
                <label class="labelproperty">Department ID</label>
				<input type="text" name="department_id" id="department_id" class="form-control" placeholder="Enter Department ID" value="<?php echo $rsedit['department_id']; ?>"/>
              </div>
              
			  <div>
			    <label class="labelproperty">Department Details</label>
				<textarea name="department_detail" id="department_detail" class="form-control" placeholder="Enter Department Details"></textarea>
			  </div>
			  
              <div>
				<label class="labelproperty">Department Status</label>
				<select name="department_status" id="department_status" class="form-control" >
				<option value="">Select Status</option>
				<?php
				$arr = array("Active","Inactive");
				foreach($arr as $val)
				{
					if($val == $rsedit['department_status'])
					{
					echo "<option value='$val' selected>$val</option>";
					}
					else
					{
					echo "<option value='$val'>$val</option>";
					}
				}
				?>
				</select>
              </div>
			  
              <div class="d-flex justify-content-center">
                <button type="submit" name="submit" id="submit" class="btn_on-hover">Submit</button>
              </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->
<?php
include("footer.php");
?>