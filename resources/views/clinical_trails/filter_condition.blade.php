<div class="small-padding  ">
    <h4 class="text-normal text-xl">Study Phase</h4>
    <ul class="nav nav-pills nav-stacked nav-transparent">
        <?php
        $conditionData = json_decode($conditionData);
        foreach ($conditionData as $condition_data) {
            $conditionChecked = "";
            if (($type == "condition_id") && ($condition_data->condition_id == $value))
                $conditionChecked = "checked";            
            ?>                                
            <li>
                <div class="checkbox checkbox-styled tile-text">
                    <label>
                        <input type="checkbox" name="condition[]" id="condition" <?php echo $conditionChecked;?> value="<?php echo $condition_data->condition_id; ?>">
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