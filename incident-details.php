<?php include "includes/head.php"; ?>
<!-- END #header -->

<?php include "includes/menu.php"; ?>

<!-- BEGIN #content -->
<div id="content" class="app-content">
<!-- BEGIN container -->
<div class="container">
<!-- BEGIN row -->
<div class="row justify-content-center">
<!-- BEGIN col-10 -->
<div class="col-xl-11">
<!-- BEGIN row -->
<div class="row">
<!-- BEGIN col-9 -->
<div class="col-xl-12">
 <div class="row">
	<div class="col-9">
	
	</div>
	<div class="col-3">

	</div>
</div>

<div id="myBillingArea" style="padding: 20px 20px 20px 20px; " class="card">
<div class="card-body pb-2">

<h3 style="padding-top: 5px; font-size: 2em;" >INCIDENT <?php echo $_GET['id']; ?></h3>



<?php  
$incident = $_GET['id'];
$location = $_GET['loc'];


$sql2 = "SELECT * FROM parishes WHERE name='$location' ";
$result2 = mysqli_query($con, $sql2);
$row0 = mysqli_fetch_array($result2);



$sql = "SELECT * FROM incident  WHERE incidentID='$incident' ";
$result = mysqli_query($con, $sql);
$row1 = mysqli_fetch_array($result);

$sql = "SELECT * FROM  conflictdrivers WHERE incidentID='$incident' ";
$result = mysqli_query($con, $sql);
$row2 = mysqli_fetch_array($result);

$sql = "SELECT * FROM riskindicator WHERE incidentID='$incident' ";
$result = mysqli_query($con, $sql);
$row3 = mysqli_fetch_array($result);

$sql = "SELECT * FROM responseindicator WHERE incidentID='$incident' ";
$result = mysqli_query($con, $sql);
$row4 = mysqli_fetch_array($result);

$sql = "SELECT * FROM files WHERE incidentID='$incident' ";
$result5 = mysqli_query($con, $sql);
$row5 = mysqli_fetch_array($result5);


echo "<div class='row'>";
echo "<div class='col-3'>";
echo "<strong>District</strong>";
echo "<p>".$row0['district']."</p>";
echo "</div>";

echo "<div class='col-3'>";
echo "<strong>Sub County</strong>";
echo "<p>".$row0['subcounty']."</p>";
echo "</div>";

echo "<div class='col-3'>";
echo "<strong>Parish</strong>";
echo "<p>".$row0['name']."</p>";
echo "</div>";

echo "<div class='col-3'>";
echo "<strong>Date</strong>";
echo "<p>".$row1['date1']."</p>";
echo "</div>";
echo "</div>";

echo "<div class='row'>";
echo "<div class='col-3'>";
echo "<strong>Type of Incident</strong>";
echo "<p>".$row1['incidentType']."</p>";
echo "</div>";

echo "<div class='col-3'>";
echo "<strong>Severity</strong>";
echo "<p>".$row1['severity']."</p>";
echo "</div>";

echo "<div class='col-3'>";
echo "<strong>Injured</strong>";
echo "<p>".$row1['injured']."</p>";
echo "</div>";

echo "<div class='col-3'>";
echo "<strong>Perpetrators</strong>";
echo "<p>".$row1['perpetrators']."</p>";
echo "</div>";

echo "</div>";
echo "<strong>Incident Being Reported</strong>";
echo "<p>".$row1['name']."</p>";

?>
<?php
if ($row1['conflict'] == '1') {
	echo '
	<div class="card col-12" style="padding-left: 0px; padding-right: 0px; margin: 5px; flex: 1 !important; border-radius: 0px !important;">
	<div class="card-header fw-bold small" style="border-radius: 0px !important;">Conflict Drivers - '.$row2['date2'].'</div>
	<div class="card-body">
	<div class="row">
		<div class="col-6">
			<div class="response">
			<p class="qtn">Political Tension</p>
			<p class="answer mb-1">'. $row2['politicalTension'].'</p>
			</div>
			<div class="response">
			<p class="qtn">Economic Factor</p>
			<p class="answer mb-1">'. $row2['economicFactor'].'</p>
			</div>
			<div class="response-last">
			<p class="qtn">Socila/Ethnic Issues</p>
			<p class="answer mb-1">'. $row2['socialIssue'].'</p>
			</div>
		</div>
		<div class="col-6">
			<div class="response">
			<p class="qtn">Grievances or Unresolved Issues</p>
			<p class="answer mb-1">'. $row2['grievance'].'</p>
			</div>
			<div class="response">
			<p class="qtn">External Influence</p>
			<p class="answer mb-1">'. $row2['externalInfluence'].'</p>
			</div>
			<div class="response-last">
			<p class="qtn">Gender Based Violence</p>
			<p class="answer mb-1">'. $row2['gbv'] .'</p>
			</div>
		</div>
	</div></div></div>';
}elseif($row1['conflict'] == '0') {
	echo '
	<div class="card col-12" style="padding-left: 0px; padding-right: 0px; margin: 5px; flex: 1 !important; border-radius: 0px !important;">
	<div class="card-header fw-bold small" style="border-radius: 0px !important;">Conflict Drivers</div>
	<div class="card-body">
	<div class="row">
		<div class="col-6">
		
			<p class="qtn">No data available at the moment</p>
		</div>
	</div></div></div>';
}
?>

<?php
if ($row1['risk'] == '1') {
	echo '
	<div class="card col-12" style="padding-left: 0px; padding-right: 0px; margin: 5px; flex: 1 !important; border-radius: 0px !important;">
	<div class="card-header fw-bold small" style="border-radius: 0px !important;">Risk Indicators - '.$row3['date3'].'</div>
	<div class="card-body">
	<div class="row">
		<div class="col-6">
			<div class="response">
			<p class="qtn">Waepon Availability</p>
			<p class="answer mb-1">'. $row3['weapon'].'</p>
			</div>
			<div class="response">
			<p class="qtn">Mobilization of Groups</p>
			<p class="answer mb-1">'. $row3['mobilization'].'</p>
			</div>
		</div>
		<div class="col-6">
			<div class="response">
			<p class="qtn">Impact to Infrastructure</p>
			<p class="answer mb-1">'. $row3['impact'].'</p>
			</div>
			<div class="response">
			<p class="qtn">Rumors or Misinformation</p>
			<p class="answer mb-1">'. $row3['rumors'].'</p>
			</div>
		</div>
	</div></div></div>';
}elseif($row1['risk'] == '0') {
	echo '
	<div class="card col-12" style="padding-left: 0px; padding-right: 0px; margin: 5px; flex: 1 !important; border-radius: 0px !important;">
	<div class="card-header fw-bold small" style="border-radius: 0px !important;">Risk Indicators</div>
	<div class="card-body">
	<div class="row">
		<div class="col-6">
		
			<p class="qtn">No data available at the moment</p>
		</div>
	</div></div></div>';
}
?>


<?php
if ($row1['response'] == '1') {
	echo '
	<div class="card col-12" style="padding-left: 0px; padding-right: 0px; margin: 5px; flex: 1 !important; border-radius: 0px !important;">
	<div class="card-header fw-bold small" style="border-radius: 0px !important;">Response Mechanism - '.$row4['date4'].'</div>
	<div class="card-body">
	<div class="row">
		<div class="col-6">
			<div class="response">
			<p class="qtn">Security Force Presence and Response</p>
			<p class="answer mb-1">'. $row4['securityForce'].'</p>
			</div>
			<div class="response">
			<p class="qtn">Emergency Services Availability and level of preparedness</p>
			<p class="answer mb-1">'. $row4['emergencyService'].'</p>
			</div>
			<div class="response-last">
			<p class="qtn">Prevention of Conflict</p>
			<p class="answer mb-1">'. $row4['prevention'].'</p>
			</div>
		</div>
		<div class="col-6">
			<div class="response">
			<p class="qtn">Humanitarian Aid needed</p>
			<p class="answer mb-1">'. $row4['humanitarian'].'</p>
			</div>
			<div class="response">
			<p class="qtn">Effectiveness of Response</p>
			<p class="answer mb-1">'. $row4['effectiveness'].'</p>
			</div>
			<div class="response-last">
			<p class="qtn">Peace Buidling Interventions</p>
			<p class="answer mb-1">'. $row4['peaceBuilding'] .'</p>
			</div>
		</div>
	</div></div></div>';
}elseif($row1['response'] == '0') {
	echo '
	<div class="card col-12" style="padding-left: 0px; padding-right: 0px; margin: 5px; flex: 1 !important; border-radius: 0px !important;">
	<div class="card-header fw-bold small" style="border-radius: 0px !important;">Response Mechanism</div>
	<div class="card-body">
	<div class="row">
		<div class="col-6">
		
			<p class="qtn">No data available at the moment</p>
		</div>
	</div></div></div>';
}
?>


<?php
if ($row1['evidence'] == '1') {
	echo '
	<div class="card col-12" style="padding-left: 0px; padding-right: 0px; margin: 5px; flex: 1 !important; border-radius: 0px !important;">
	<div class="card-header fw-bold small" style="border-radius: 0px !important;">Evidences - Uploaded On '.$row5['uploaded_on'].'</div>
	<div class="card-body">
	<div class="row">';
 
			$sql = "SELECT * FROM files WHERE incidentID='$incident' ";
			$result = mysqli_query($con, $sql);

			while($row = mysqli_fetch_array($result)) {
				  echo '<a href="./'.$row['file_name'].'" class="menu-link">
							<span class="menu-icon"><i class="fa fa-paperclip"></i></span>
							<span class="menu-text">'.substr($row['file_name'], strpos($row['file_name'], "/") + 1).'</span>
						</a>';

			   }

	echo '</div></div></div>';
}elseif($row1['evidence'] == '0') {
	echo '
	<div class="card col-12" style="padding-left: 0px; padding-right: 0px; margin: 5px; flex: 1 !important; border-radius: 0px !important;">
	<div class="card-header fw-bold small" style="border-radius: 0px !important;">Response Mechanism</div>
	<div class="card-body">
	<div class="row">
		<div class="col-6">
		
			<p class="qtn">No data available at the moment</p>
		</div>
	</div></div></div>';
}
?>

	








</div>
</div>
</div>


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
<script type="text/javascript">
	window.jsPDF = window.jspdf.jsPDF;
var docPDF = new jsPDF();

function downloadPDF(invoiceNo){

    var elementHTML = document.querySelector("#myBillingArea");
    docPDF.html(elementHTML, {
        callback: function(docPDF) {
            docPDF.save(invoiceNo+'.pdf');
        },
        x: 15,
        y: 15,
        width: 170,
        windowWidth: 650
    });
}
</script>


<?php include "includes/scripts.php" ?>
