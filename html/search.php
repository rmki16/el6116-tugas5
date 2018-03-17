<?php
//including the database connection file
include_once("config.php");

$start = microtime(true);
if(isset($_GET['Submit'])) {
    $searchlensname = $_GET['searchlensname'];

	// query entry

	//fetching data in descending order (lastest entry first)
	$result = mysqli_query($mysqli, "SELECT SQL_NO_CACHE * FROM generated_lens_unencrypted WHERE lensname LIKE '%$searchlensname%' ORDER BY idx DESC LIMIT 100"); // using mysqli_query instead





}


?>

<html>
<head>
    <title>Display</title>
</head>

<body>

    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Lens Name</td>
            <td>Focal Length</td>
            <td>Equivalent Focal Length</td>
			<td>Maximum Aperture</td>
			<td>Format</td>
			<td>Introduction Year</td>
			<td>Version</td>
			<td>Macro Capability</td>
			<td>Tilt-Shift Capability</td>
			<td>Autofocus Capability</td>
			<td>USM Auto Focus Motor</td>
			<td>STM Auto Focus Motor</td>
			<td>Image Stabilizer</td>
			<td>L Lens Series</td>
			<td>Diffractive Optics Series</td>
			<td>Filter Size</td>
			<td>Serial Number</td>
			<td>Stock Available</td>
        </tr>
        <?php
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
        while($res = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$res['lensname']."</td>";
            echo "<td>".$res['focallength']."</td>";
            echo "<td>".$res['equivfocallength']."</td>";
			echo "<td>".$res['maximumaperture']."</td>";
			echo "<td>".$res['format']."</td>";
			echo "<td>".$res['introduction']."</td>";
			echo "<td>".$res['version']."</td>";
			echo "<td>".$res['macro']."</td>";
			echo "<td>".$res['tiltshift']."</td>";
			echo "<td>".$res['af']."</td>";
			echo "<td>".$res['usm']."</td>";
			echo "<td>".$res['stm']."</td>";
			echo "<td>".$res['imagestabilizer']."</td>";
			echo "<td>".$res['lseries']."</td>";
			echo "<td>".$res['do']."</td>";
			echo "<td>".$res['filtersize']."</td>";
			echo "<td>".$res['serialnumber']."</td>";
			echo "<td>".$res['stockavailable']."</td>";
        }
		 $time_elapsed_secs = microtime(true) - $start;
		echo "Elapsed Time: ".$time_elapsed_secs." second(s)";
        ?>
    </table>
</body>
</html>
