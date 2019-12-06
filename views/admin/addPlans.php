<?php
    include_once('processPlan.php');
     include("../Templates/headerAdmin.html");
    ?>
<div class="container-fluid">
    <div class="login-form">
        <div class="main-div">
            <form method="POST" action="processPlan.php">
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <div class="form-group">
                    <label class="b891"> Title </label>
                    <input type="text" name="planTitle" value = <?php echo $planTitle?> >
                </div>
            <div class="form-group">
                <label class="b891"style="float:left"> Goals </label>
                <textarea rows="4" cols="50" name="planGoals"> <?php echo $planGoals?></textarea>
            </div>
            <br>
        <?php if($isAction == false) : ?> 
            <div class="form-group">
                    <label class="b891"> Number of Actions </label>
                    <input type="text" name="numAction">
                </div>
                <br>
                <button type="submit" class="btn btn-info" value="Create Action" name="createAction"> Create Action </button>
        <?php endif; ?>

            <?php if ($isAction) { ?>
                <!-- <label class="b891"> Strategic Actions</label> -->
            <?php echo $numAction;?>
                <?php $numbers = 1; ?>
                <?php while($numAction > 0):
                    //echo $msg; ?>
                
                <label class="b891"> Strategic Actions</label>
                    <div class="form-group">
                <label class="b891" style="float:left"> <?php echo $numbers; ?></label>
                <textarea rows="6" cols="50" name="strgAction[]"> </textarea>
                </div>
            <?php if($isMafs == false): ?>
                <div class="form-group">
                    <label class="b891"> Number of MAFS Action </label>
                    <input type="text" name="mafsActions<?php echo $numbers?>" required>
                </div>
            <?php endif;?>
            <?php if($isMafs) {
               // echo $msg;?>
                <label class="b891"> MAFS Actions</label>
                <?php 
                    $whileCondition = $mafsActionNum[$numbers-1];
                    $mafsCount  = 1;
                 ?>
             <?php while ( $whileCondition > 0): ?>
                    <div class="form-group">
                        <label class="b891" style="float:left"> <?php echo $mafsCount; ?></label>
                        <textarea rows="6" cols="50" name="mafsAction<?php echo $mafsCount; ?>"> </textarea>
                    </div>
                <?php $mafsCount = $mafsCount + 1; $whileCondition = $whileCondition-1;?>
            <?php endwhile; ?>
            <?php } ?>
                <?php $numbers = $numbers + 1; $numAction = $numAction - 1;?>
            <?php endwhile; ?>
            <?php }?>
            <?php if($isMafs == false && $isAction == true): ?>
            <input type="submit" class="btn btn-info" value="Create MAFS Action" name="createMafsAction">
            <?php endif;?>
                
                    


<!-- Warning: A non-numeric value encountered in C:\xampp\htdocs\MAFS\views\admin\addPlans.php on line 30

Notice: Undefined offset: 1 in C:\xampp\htdocs\MAFS\views\admin\addPlans.php on line 30 -->
            
            </form>

        </div>
    </div>
</div>
    