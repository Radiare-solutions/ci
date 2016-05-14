
    <div class="small-padding  ">
        <h4 class="text-normal text-xl">Study Phase</h4>
        <ul class="nav nav-pills nav-stacked nav-transparent">
            <?php
            foreach ($phaseData as $phase_data) {
                ?>                                
                <li>
                    <div class="checkbox checkbox-styled tile-text">
                        <label>
                            <input type="checkbox" name="phase[]" id="phase" value="<?php echo $phase_data->phase_id; ?>">
                            <span>
                                <?php echo $phase_data->phase_name; ?>
                            </span>
                        </label>
                        <span class="badge pull-right"><?php echo $phase_data->phase_count; ?></span>
                    </div>
                </li>
                <?php
            }
            ?>								
        </ul>
    </div>
