
<div class="small-padding  ">
    <h4 class="text-normal text-xl">Study Phase</h4>
    <ul class="nav nav-pills nav-stacked nav-transparent">
        <?php
$sponsorData = json_decode($sponsorData);
        foreach ($sponsorData as $sponsor_data) {
            $sponsorChecked = "";
            if (($type == "sponsor_id") && ($sponsor_data->sponsor_id == $value))
                $sponsorChecked = "checked";
            ?>                                
            <li>
                <div class="checkbox checkbox-styled tile-text">
                    <label>
                        <input type="checkbox" <?php echo $sponsorChecked;?> name="sponsor[]" id="sponsor" value="<?php echo $sponsor_data->sponsor_id; ?>" onclick="load_studies_by_filter('sponsor', 0, '', '');">
                        <span>
                            <?php echo $sponsor_data->sponsor_name; ?>
                        </span>
                    </label>
                    <span class="badge pull-right"><?php echo $sponsor_data->sponsor_count; ?></span>
                </div>
            </li>
            <?php
        }
        ?>								
    </ul>
</div>
