<?php include "includes/head.php"; ?>
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

<h1 class="page-header">
<?php

$incident       = $_GET['id'];
$monitor        = $_SESSION['id']; 
$sql            = "SELECT * FROM incident WHERE incidentID='$incident' ";
$result         = mysqli_query($con, $sql);
$row            = mysqli_fetch_array($result);
$number         = $row['incidentID'];
echo "#".$number."</h1>";
echo "<p>".$row['name']."</p>";
?>


<?php 
if (isset($_POST['newincident'])){

$name 			= $_POST["name"];
$incidentType 	= $_POST["incidentType"];
$village 		= $_POST["village"];
$severity 		= $_POST["severity"];
$injured 		= $_POST["injured"];
$fatalities 	= $_POST["fatalities"];
$perpetrators 	= $_POST["perpetrators"];
 
$date=date_create($_POST['date']);
$date1 = date_format($date,"Y-m-d");

$monitor 		= $_SESSION['id']; 
$length = 6;
$incidentID = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

$sql = "SELECT * FROM users WHERE userID=$monitor ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$phone = $row['phone'];
echo "<h1>Godwin</h1>";

$sql = "INSERT INTO incident (incidentID, name, incidentType, village, severity, injured, fatalities, perpetrators, date1, monitor) VALUES ('$incidentID', '$name', '$incidentType', '$village', '$severity','$injured', '$fatalities', '$perpetrators', '$date1', '$monitor')";

if(mysqli_query($con, $sql)){
SendSMS('non_customised','bulk', $phone, $message);
echo "
    <div class='alert alert-primary alert-dismissible fade show' role='alert'>
        Incident added successful!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>  
        </button> 
    </div>";

} else{
    echo mysqli_error($con);
} }
?>
<!-- BEGIN #formControls -->
<div id="formControls" class="mb-5">
<div class="card">
<div class="card-body pb-2">
<form action="" method="POST"> 
<div class="row"> 
<div class="mb-3">
	<label class="form-label" for="multipleFile">Photo Evidence</label>
	<input type="file" name="photos" class="form-control" id="multipleFile" multiple>
</div>
</div>

<div class="row"> 
<div class="mb-3">
    <label class="form-label" for="multipleFile">Audio Evidence</label>
    <input type="file" name="audios" class="form-control" id="multipleFile" multiple>
</div>
</div>

<div class="row"> 
<div class="mb-3">
    <label class="form-label" for="multipleFile">Photo Evidence</label>
    <input type="file" name="videos" class="form-control" id="multipleFile" multiple>
</div>
</div>




<div class="form-group mb-3">
	<button type="submit" name="newincident" class="btn btn-theme btn"><i class="fa fa-upload "></i> Upload Evidence</button>
</div>

</form>
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


<?php include "includes/scripts.php" ?>
