<?php
$q = intval($_GET['q']);

$con = mysql_connect('localhost','root','');
if (!$con) {
    die('Could not connect: ' . mysql_error($con));
}

mysql_select_db($con,"dbpenjualan");
$sql="SELECT keterangan FROM kategori WHERE id = '".$q."'";
$result = mysql_query($con,$sql);
while($row = mysql_fetch_array($result)){
    echo $row['keterangan'];

}
// if($result)
// {
//     $d=mysql_fetch_array($result);
//     echo $d['keterangan'];
// }

// echo "<table>
// <tr>
// <th>Firstname</th>
// <th>Lastname</th>
// <th>Age</th>
// <th>Hometown</th>
// <th>Job</th>
// </tr>";
// while($row = mysqli_fetch_array($result)) {
//     echo "<tr>";
//     echo "<td>" . $row['FirstName'] . "</td>";
//     echo "<td>" . $row['LastName'] . "</td>";
//     echo "<td>" . $row['Age'] . "</td>";
//     echo "<td>" . $row['Hometown'] . "</td>";
//     echo "<td>" . $row['Job'] . "</td>";
//     echo "</tr>";
// }
// echo "</table>";
// mysqli_close($con);
?>
