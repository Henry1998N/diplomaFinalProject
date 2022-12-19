<table>
    <tr> 
        <th>File name</th>
        <th>File type</th>
        <th>File size</th>

</tr>

<?php
include "db_connect.php";
$sql='SELECT * FROM `uploads`';
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result))

{

?>
<tr>
<td><?php echo $row['file'] ?></td>
<td><?php echo $row['type'] ?></td>
<td><?php echo $row['size'] ?></td>
<td> <a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</td>


</tr>

<?php } ?>