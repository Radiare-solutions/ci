<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RssModel as RssModel;
use App\Models\ClinicalTrialModel as ClinicalTrialModel;
use App\Models\ConditionModel as ConditionModel;
use App\Models\SponserModel as SponserModel;
use App\Models\DrugModel as DrugModel;
use App\Http\Requests;
use PHPExcel;
use PHPExcel\IOFactory;

/*
 * it is used to control the clinical trial data extraction part
 */

class ImportIndicationDataController extends Controller {

    public function load() {
        echo "hello world";
        $fileName = "source/IndicationList.xlsx";

        /** automatically detect the correct reader to load for this file type */
        $excelReaderObj = new PHPExcel($fileName);
//$ob = \PHPExcel_IOFactory::load($fileName);
//$sheet = $ob->setActiveSheetIndex(1);

        $ob = \PHPExcel_IOFactory::createReaderForFile($fileName);
//$test = new $ob()

        $input_file_type = \PHPExcel_IOFactory::identify($fileName);
        $obj_reader = \PHPExcel_IOFactory::createReader($input_file_type);
        $obj_reader->setReadDataOnly(true);
        $objPHPExcel = $obj_reader->load($fileName);
        $objWorksheet = $objPHPExcel->setActiveSheetIndex(1);
         $highest_row = $objWorksheet->getHighestRow();
        echo $highest_col = $objWorksheet->getHighestColumn();
        echo '<pre>';
        $therapy = array();
        $data = array();
        $arr = array();
        $therapeuticName = "";
        for ($counter = 2; $counter <= $highest_row; $counter++) {
            $i = $counter - 1;
            $row = $objWorksheet->rangeToArray('A' . $counter . ':' . $highest_col . $counter);

            if (empty($row[$i][2])) 
            {
                $tOb = \App\Models\Therapeutic\Therapeutic::where('Name', $therapeuticName)->first();
                $tID = $tOb['attributes']['_id'];
                $iOb = new \App\Models\Indication\Indication();
                $iOb->insertFromDataFile((string) $tID, $row[$i][1]);
            } 
            else 
            {
                $therapeuticName = $row[$i][2];
                if (!in_array($row[$i][2], $therapy)) 
                {
                    $tOb = new \App\Models\Therapeutic\Therapeutic();
                    $tOb->insertFromDataFile($row[$i][2]);                    
                    array_push($therapy, $therapeuticName);

                    $tOb = \App\Models\Therapeutic\Therapeutic::where('Name', $therapeuticName)->first();
                    $tID = $tOb['attributes']['_id'];

                    $iOb = new \App\Models\Indication\Indication();
                    $iOb->insertFromDataFile((string) $tID, $row[$i][1]);
                }
                else 
                {
                    $tOb = \App\Models\Therapeutic\Therapeutic::where('Name', $therapeuticName)->first();
                    $tID = $tOb['attributes']['_id'];
                    $iOb = new \App\Models\Indication\Indication();
                    $iOb->insertFromDataFile((string) $tID, $row[$i][1]);                    
                }
            }
        }
    }

}
