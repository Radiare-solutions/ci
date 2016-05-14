<div class="small-padding  ">
    <h4 class="text-normal text-xl">Study Phase</h4>
    <ul class="nav nav-pills nav-stacked nav-transparent">
        <?php
        foreach ($conditionData as $condition_data) {
            ?>                                
            <li>
                <div class="checkbox checkbox-styled tile-text">
                    <label>
                        <input type="checkbox" name="condition[]" id="condition" value="<?php echo $condition_data->condition_id; ?>">
                        <span>
                            <?php echo $condition_data->condition_name; ?>
                        </span>
                    </label>
                    <span class="badge pull-right"><?php echo $condition_data->condition_count; ?></span>
                </div>
            </li>
            <?php
        }
        ?>								
    </ul>
</div>