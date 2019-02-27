

    <?php
        include_once("Process.php");
        include("../Templates/headerAdmin.html");
        $query = "SELECT  * FROM `member`";
        $result= mysqli_query($con,$query);
    ?>

    <?php
        if (isset($_SESSION['message'])):
    ?>
    
    <div class= "alert alert-<?= $_SESSION['msg_type']; ?>" style="text-align:center">

    <?php 
        echo $_SESSION['message']; 
        unset ($_SESSION['message']);
    ?>
</div>

<?php endif ?>


    <div class="login-form">
        <div class="main-div">
        <form id="form" action="Process.php" method="POST" >
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
           <label> First-Name </label><input type="text" name="firstName" class="form-control addCon" id="FirstName" 
           value=<?php echo $firstName?> > 
            </div>

            <div class="form-group">
                <label>Last-Name </label><input type="text" name="lastName" class="form-control addCon" id="LastName" 
                value=<?php echo $lastName?>>
            </div>

            <div class="form-group"> 
                <label>User-Name </label><input type="text" name="userName" class="form-control addCon" id="userName"
                value="<?php echo $userName?>">
            </div>
            <div class="form-group"> 
                <label>Pass-Word </label><input type="text" name="passWord" class="form-control addCon" id="passWord"
                value="<?php echo $passWord?>" > 
            </div>

            <div class="form-group"> 
                <label>E-mail Address </label><input type="email" name="Email" class="form-control addCon" id="Email"
                value="<?php echo $mail?>"> 
            </div>
            <br>

            <?php if($update): ?>

            <button type="submit" class="btn btn-primary" name="update"> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAHUSURBVEhLtdbPK2VhHMfxazA2fsVOiY0UEQsWsxCmmUaikL1EUXaUvZ2FmWKBlb/AimaaacqUBUnyYyMr8nNjoWzk5/tz9XS/zjm3e84d91Ovuuf0nOd7n3vO+T43FjG1mEVh/CiDqcMzztCnE++ZD/iGaaxDhZwVVOC/koUBnMBO7nWLCegLRU4x/iBoYq9z9CNySrGHoEmvzedHzKEILh8RqqiW/wt2ck24gGq4h2EXTbApwF88IWWxYdgiN2iDSxXGkRM/SiQf23DXaeV2pW+iZdsb/4DPCJsluGtlCoH5CjtwEVGiFdh7qC8dmB+whWoQNd9h51An8eU33AC9+emkE7ZQL3zZgRuwqRNppBG20Bh82YAbsK8TaaQZttAgfFmGG6C2koeoGYIt1AFf1K/soB5EzU+46/V6lMAXvfm2kNpQNsKmBeoK7vp/SJpV2GIzCIrajY22imPYa7uQNPW4gwZeoAE2uZiEOrtLO05hi6whZUZwiMr4USKfoKdREx1gFGqitoBcoQyhoibpor1pHuri3km99KKrw0eOWsglgib10vZSjrSjm5psO9cqVaAb7xL9lHoC76ECR2iFftaMRL1sC/o3lPFou//y+jFsYrEXv3u+PgWqbfsAAAAASUVORK5CYII=">
            Update</button>

        <?php else: ?>

            <button type="submit" class="btn btn-primary" name="save"> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAADtSURBVEhL7dU/60FhGIfxM8gq78JiYpSJsinlBUjIqKwWi5k3gkXKJKvJShbZkD+TUlz3cE5P8Rznj2PhW5/l6ee+Fv0Y314DJ9x9uqAA7XZQP9BE1KU0brhCGztCDcXxbmGscEBNHph5RxvzEorA/PuOPDD1zstYECEhsTysBRUSU1gLMjSDNS+hEMaYoygPzHWohyQSLpSg3jDZhj7px0JryL+hqkttnKHesg1l4XUtqLdsQ06+3rrVod76hxzvR0MpbOE3NEQZ2tAC8mPlN7THEk+hDeTRVEHGoy7UWwNYy2GEyYf1EcO3ZhgP0NonIK4SN50AAAAASUVORK5CYII=">
            Save</button>
        <?php endif; ?>
            </form>

        </div>
    </div>
</div>
</html>