<?php 
include "includes/head.php"; 


?>
<!-- END #header -->

<?php include "includes/menu.php"; ?>

<!-- BEGIN #content -->
<div id="content" class="app-content">
<!-- BEGIN container -->
<div class="container">
<!-- BEGIN row -->
<div class="row justify-content-center">
<!-- BEGIN col-11 -->
<div class="col-xl-11">
<!-- BEGIN row -->
<div class="row">
<!-- BEGIN col-9 -->
<div class="col-xl-12">
<div class="row">
	<div class="col-9">
	<h4 class="page-header">System Users</h4>
	</div>
	<div class="col-3">
	<button style="float: right;" type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modaluser">Add New User</button>
	</div>
</div> 

<?php 
if (isset($_POST['register'])){

$fullname 	= $_POST["fullname"];
$phone 		= $_POST["phone"]; 
$email 		= $_POST["email"];
$district 	= $_POST["district"];
$role 		= $_POST["role"];
$password   = "CAF".mt_rand(100, 1000);

$message 	= "Hello ".$fullname.", your CAF-EWRT account has been created with Username: ".$phone." and Password: ".$password;

$sql 		= "INSERT INTO users (username, password, fullname, district, phone, email, role) VALUES ('$phone', '$password', '$fullname', '$district', '$phone', '$email', '$role')";

$ask = "SELECT * FROM users";
$result = mysqli_query($con, $ask);
$user = mysqli_fetch_array($result, MYSQLI_ASSOC);

if ($email == $user["email"]) {
	echo "
    <div class='alert alert-primary alert-dismissible fade show' role='alert'>
        User with this email address already exists
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>  
        </button>
    </div>";
}elseif ($phone == $user["phone"]) {
	echo "
    <div class='alert alert-primary alert-dismissible fade show' role='alert'>
        User with this phone number already exists
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>  
        </button>
    </div>";
}else{
	if(mysqli_query($con, $sql)){
	SendSMS('non_customised','bulk', $phone, $message);
echo "
    <div class='alert alert-success alert-dismissible fade show' role='alert'>
        User added successful!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>  
        </button>
    </div>";

} else{
    echo mysqli_error($con);
}
}

}
?>
<!-- BEGIN #formControls -->
<div class="modal  fade" id="modaluser">
<div class="modal-dialog modal-lg">
<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title">New User</h5>
	</div>
	<div class="modal-body">
		<form id="form" method="POST" action="">
<div class="row">
<div class="col-md-12"> 

<div class="form-group mb-3">
<input type="text" placeholder="Enter Full Name" class="form-control" name="fullname" >
</div>

<div class="form-group mb-3">
<input type="text" placeholder="Phone Number" class="form-control" name="phone" >
</div>

<div class="form-group mb-3">
<input type="text" placeholder="Email Address" class="form-control" name="email" >
</div>

<div class="mb-3">
<label class="form-check-label" for="defaultCheck1">Select District</label>
<select class="form-select" id="example-select" class="choices form-select" name="district">

    <?php 

    $sql = "SELECT * FROM district";
    if($result = mysqli_query($con, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                    echo '<option value='.$row['districtID'].'>' 
                    . $row['name']. '</option>';
            }
            mysqli_free_result($result);
        } else{
            echo "No records found.";
        }
    }
    ?>
    
</select>
</div>

<div class="mb-3">
<label class="form-check-label" for="defaultCheck1">Select Role</label>
<select class="form-select" id="example-select" class="choices form-select" name="role">

    <option value="admin">Admin</option>
    <option value="officer">Project Officer</option>
    <option value="monitor">Peace Monitor</option>

    
</select>
</div>

</div>
</div>
<div class="form-group mb-3" style="padding-top: 10px;">
	
	<button type="submit" name="register" class="btn btn-theme btn">Register User</button>
</div>
</form>
	</div>
</div>
</div>
</div>

<div class="row">
<div class="col-12">
<div id="formControls" class="mb-5">
<div class="card">
<div class="card-body pb-2">
<table id="table" class="table text-nowrap w-100">
	<thead>
		<tr>
			<th>Full Name</th>
			<th>Username</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Role</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<tr> 
			<?php  

			$tableid = "userID";
			$tableName = "users";
			$sql = "SELECT * FROM users";
			$result = mysqli_query($con, $sql);

			while($row = mysqli_fetch_array($result)) {
				  echo "<tr>";
			      echo "<td>".$row['fullname']."</td>";
			      echo "<td>".$row['username']."</td>";
			      echo "<td>".$row['phone']."</td>";
			      echo "<td>".$row['email']."</td>";
			      echo "<td>".$row['role']."</td>";
			      echo "<td>                                                       
    <a aria-label='anchor' class='btn btn-sm bg-primary-subtle me-1' data-bs-toggle='tooltip' data-bs-original-title='Edit'>
        <i class='fa fa-edit'></i>
    </a>
    <a onclick='return checkDelete()' href='includes/delete.php?id=".$row['userID']."&t=".$tableName."&tID=".$tableid."' aria-label='anchor' class='btn btn-sm bg-danger-subtle' data-bs-toggle='tooltip' data-bs-original-title='Delete'>
        <i class='fa fa-trash'></i>
    </a>
</td>";
			      echo "</tr>";

			   }


			?>
		</tr>
	</tbody>
</table>




</div>
</div>
</div>
</div>
</div>
<!-- END #formControls -->

</div>
<!-- END col-9-->
</div>
<!-- END row -->
</div>
<!-- END col-10 -->
</div>
<!-- END row -->
</div>
<!-- END container -->
</div>
<!-- END #content -->

<!-- BEGIN btn-scroll-top -->
<a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
<!-- END btn-scroll-top -->
<!-- BEGIN theme-panel -->
<div class="theme-panel">
<a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
<div class="theme-panel-content">
<ul class="theme-list clearfix">
<li><a href="javascript:;" class="bg-red" data-theme="theme-red" data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Red" data-original-title="" title="">&nbsp;</a></li>
<li><a href="javascript:;" class="bg-pink" data-theme="theme-pink" data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Pink" data-original-title="" title="">&nbsp;</a></li>
<li><a href="javascript:;" class="bg-orange" data-theme="theme-orange" data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Orange" data-original-title="" title="">&nbsp;</a></li>
<li><a href="javascript:;" class="bg-yellow" data-theme="theme-yellow" data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Yellow" data-original-title="" title="">&nbsp;</a></li>
<li><a href="javascript:;" class="bg-lime" data-theme="theme-lime" data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Lime" data-original-title="" title="">&nbsp;</a></li>
<li><a href="javascript:;" class="bg-green" data-theme="theme-green" data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Green" data-original-title="" title="">&nbsp;</a></li>
<li><a href="javascript:;" class="bg-teal" data-theme="theme-teal" data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Teal" data-original-title="" title="">&nbsp;</a></li>
<li><a href="javascript:;" class="bg-cyan" data-theme="theme-cyan" data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Aqua" data-original-title="" title="">&nbsp;</a></li>
<li class="active"><a href="javascript:;" class="bg-blue" data-theme="" data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Default" data-original-title="" title="">&nbsp;</a></li>
<li><a href="javascript:;" class="bg-purple" data-theme="theme-purple" data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Purple" data-original-title="" title="">&nbsp;</a></li>
<li><a href="javascript:;" class="bg-indigo" data-theme="theme-indigo" data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Indigo" data-original-title="" title="">&nbsp;</a></li>
<li><a href="javascript:;" class="bg-gray-600" data-theme="theme-gray-600" data-click="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Gray" data-original-title="" title="">&nbsp;</a></li>
</ul>
<hr class="mb-0">
<div class="row mt-10px pt-3px">
<div class="col-9 control-label text-body-emphasis fw-bold">
<div>Dark Mode <span class="badge bg-theme text-theme-color ms-1 position-relative py-4px px-6px" style="top: -1px">NEW</span></div>
<div class="lh-sm fs-13px fw-semibold">
<small class="text-body-emphasis opacity-50">
Adjust the appearance to reduce glare and give your eyes a break.
</small>
</div>
</div>
<div class="col-3 d-flex">
<div class="form-check form-switch ms-auto mb-0 mt-2px">
<input type="checkbox" class="form-check-input" name="app-theme-dark-mode" id="appThemeDarkMode" value="1">
<label class="form-check-label" for="appThemeDarkMode">&nbsp;</label>
</div>
</div>
</div>
</div>
</div>
<!-- END theme-panel -->
</div>
<!-- END #app -->

<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
</script>
<?php include "includes/scripts.php" ?>
