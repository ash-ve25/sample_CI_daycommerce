<div class="row">
    <div class="col-md-8">
        <div id="left-content">
            <h2 class="headings">Hi <?php if(isset($user['name'])){echo $user['name'];}else{echo 'User';}?>,</h2>
            <?php
            $duedate = strtotime( $user['birth_due_date'] );
            $diff = $duedate-time();
            $diff_in_weeks = $diff/60/60/24/7;
            $total_weeks = 40;
            $pregnancy_week = floor( $total_weeks-$diff_in_weeks );
            ?>
            <p class="headings">Your schedule for today on your pregnancy journey of <?php echo $pregnancy_week;?> Weeks 4 days is as follows.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div id="right-content">
            <p class="headings black">Pregnant</p>
            <p class="headings"><?php echo $pregnancy_week;?>weeks 4 days</p>
        </div>
    </div>
</div>
