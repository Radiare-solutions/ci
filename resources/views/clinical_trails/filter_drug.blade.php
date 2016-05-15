
    <div class="small-padding  ">
        <h4 class="text-normal text-xl">Study Phase</h4>
        <ul class="nav nav-pills nav-stacked nav-transparent">
            <?php
            foreach ($drugData as $drug_data) {
                ?>                                
                <li>
                    <div class="checkbox checkbox-styled tile-text">
                        <label>
                            <input type="checkbox" name="drug[]" id="drug" value="<?php echo $drug_data->drug_id; ?>" onclick="load_studies_by_filter('drug', 0, '', '');">
                            <span>
                                <?php echo $drug_data->drug_name; ?>
                            </span>
                        </label>
                        <span class="badge pull-right"><?php echo $drug_data->drug_count; ?></span>
                    </div>
                </li>
                <?php
            }
            ?>								
        </ul>
    </div>
