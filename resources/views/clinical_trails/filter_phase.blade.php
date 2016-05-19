
<div class="small-padding  ">
    <h4 class="text-normal text-xl">Study Phase</h4>
    <ul class="nav nav-pills nav-stacked nav-transparent">
        <li>
            <div class="checkbox checkbox-styled tile-text">
                <label>
                    <input type="checkbox" value="all" name="phase[]" id="phase" onclick="load_studies_by_filter('phase', 0, '', '');">
                    <span>
                        Select All
                    </span>
                </label>
                <span class="badge pull-right"><?php echo $phaseData['total']; ?></span>
            </div>
        </li>
        <?php
        foreach ($phaseData['data'] as $phase_data) {
            $phaseChecked = "";
            if (($type == "phase_id") && ($phase_data['phase_id'] == $value))
                $phaseChecked = "checked";
            ?>                                
            <li>
                <div class="checkbox checkbox-styled tile-text">
                    <label>
                        <input type="checkbox" name="phase[]" id="phase" <?php echo $phaseChecked;?> value="<?php echo $phase_data['phase_id']; ?>" onclick="load_studies_by_filter('phase', 0, '', '');">
                        <span>
                            <?php echo $phase_data['phase_name']; ?>
                        </span>
                    </label>
                    <span class="badge pull-right"><?php echo $phase_data['phase_count']; ?></span>
                </div>
            </li>
            <?php
        }
        ?>								
    </ul>
</div>
