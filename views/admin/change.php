
    <?php 
        include_once('sql.php');
        include('Process.php');        
        include("../Templates/headerAdmin.html");
        $query = "SELECT  * FROM `member`";
        $result= mysqli_query($con,$query);
    ?>

<?php
        if (isset($_SESSION['deleteMsg'])):
?>
    
    <div class= "alert alert-<?= $_SESSION['msg_type']; ?>" style="text-align:center">

    <?php 
        echo $_SESSION['deleteMsg']; 
        unset ($_SESSION['deleteMsg']);
    ?>
</div>

<?php endif ?>



<table class="table">
    <thead>
        <tr>
            <th> First Name</th>
            <th>Last Name</th>
            <th> Email-Address</th>
            <th colspan="2"> Action</th>
        </tr>
    </thead>
<?php 
    while($row = $result->fetch_assoc()): 
?>
<tr>
    <td> <?php echo $row['First Name']; ?></td>
    <td> <?php echo $row['Last Name']; ?></td>
    <td> <?php echo $row['E-Mail']; ?></td>

    <td> 
        <a href="admin.php?editId=<?php echo $row['ID'];?>" class="btn btn-info"> Edit </a>
        <a href="Process.php?id=<?php echo $row['ID'];?>&first=<?php echo $row['First Name'];?>&last=<?php echo $row['Last Name'];?>" class="btn btn-danger"> Delete </a>
    </td>
</tr>
<?php 
    endwhile;
?>
    </table>
</html>

