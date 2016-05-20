<?php
    // $statusData = json_decode($statusData);
    ?>
<div class="small-padding ">
    <h4 class="text-normal text-xl">Study Status</h4>
    <ul class="nav nav-pills nav-stacked nav-transparent">
        <li>
            <div class="checkbox checkbox-styled tile-text">
                <label>
                    <input type="checkbox" value="<?php echo implode(",", $statusAllValue);?>" name="status[]" id="status" onclick="load_studies_by_filter('status', 0, '', '');">
                    <span>
                        Select All
                    </span>
                </label>
                <span class="badge pull-right"><?php echo $statusTotal; ?></span>
            </div>
        </li>
        <?php
        foreach ($statusData as $status_data) {               
            $statusChecked = "";
            if (($type == "status_id") && ($status_data['status_id'] == $value))
                $statusChecked = "checked";
            ?>
            <li>
                <div class="checkbox checkbox-styled tile-text">
                    <label>
                        <input type="checkbox" <?php echo $statusChecked; ?> value="<?php echo $status_data['status_id']; ?>" name="status[]" id="status" onclick="load_studies_by_filter('status', 0, '', '');">
                        <span>
                            <?php echo $status_data['status_name']; ?>
                        </span>
                    </label>
                    <span class="badge pull-right"><?php echo $status_data['status_count']; ?></span>
                </div>
            </li>
            <?php
            }
        ?>                                                                                                                                                                                                                                                                                                                       
    </ul>


</div>