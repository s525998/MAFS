
<?php
include_once("sql.php");
include("../Templates/headerAdmin.html");
    $query = "SELECT  * FROM `member`";
    $result= mysqli_query($con,$query);
?>

        <table class="table">

                <tr>
                    <th> First Name</th>
                    <th>Last Name</th>
                    <th>User Name</th>
                    <th>Pass Word </th>
                    <th> Email-Address</th>
                </tr>


        <?php  while ($row = mysqli_fetch_array($result)): ?>

        <tr>
            <td><?php echo $row['First Name']; ?></td>
            <td><?php echo $row['Last Name']; ?></td>
            <td><?php echo $row['UserName']; ?></td>
            <td><?php echo $row['Password']; ?></td>
            <td><?php echo $row['E-Mail']; ?></td>
        </tr>
        <?php endwhile; ?>
        </table>
    </div>
  </div>

</html>