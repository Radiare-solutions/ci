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

class ImportMoleculeDataController extends Controller {

    public function load() {
        $fileName = "source/classification_specialty_disease.xlsx";
        /** automatically detect the correct reader to load for this file type */
        $excelReaderObj = new PHPExcel($fileName);
//$ob = \PHPExcel_IOFactory::load($fileName);
//$sheet = $ob->setActiveSheetIndex(1);

        $ob = \PHPExcel_IOFactory::createReaderForFile($fileName);
        $input_file_type = \PHPExcel_IOFactory::identify($fileName);
        $obj_reader = \PHPExcel_IOFactory::createReader($input_file_type);
        $obj_reader->setReadDataOnly(true);
        $objPHPExcel = $obj_reader->load($fileName);
        $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
        $highest_row = $objWorksheet->getHighestRow();
        $highest_col = $objWorksheet->getHighestColumn();

        $molecule = array();
        $level1 = array();
        $level2 = array();
        $level1Name = "";
        $level2Name = "";
        for ($counter = 2; $counter <= $highest_row; $counter++) {
            $i = $counter - 1;
            $row = $objWorksheet->rangeToArray('A' . $counter . ':' . $highest_col . $counter);

            if (empty($row[$i][0])) {
                if (empty($row[$i][1])) {
                    $tOb = \App\Models\Molecule\Level1::where('Name', $level1Name)->first();
                    $tID = $tOb['attributes']['_id'];
                    $iOb = new \App\Models\Molecule\Level2();
                    $iOb->addLevel2((string) $tID, $row[$i][1]);

                    if ((empty($row[$i][0])) && (empty($row[$i][1]))) {
                        $tOb = \App\Models\Molecule\Level1::where('Name', $level1Name)->first();
                        $tID = $tOb['attributes']['_id'];
                        $l2Ob = new \App\Models\Molecule\Level2();
                        $l2Obj = $l2Ob->getLevel2IDByName($level2Name);
                        $l2ID = (string) $l2Obj;

                        $mOb = new \App\Models\Molecule\Molecule();
                        $mOb->addMolecule((string) $tID, (string) $l2ID, $row[$i][2]);
                        array_push($molecule, $row[$i][2]);
                    } else {
                        $tOb = \App\Models\Molecule\Level1::where('Name', $level1Name)->first();
                        $tID = $tOb['attributes']['_id'];
                        $l2Ob = new \App\Models\Molecule\Level2();
                        $l2Obj = $l2Ob->getLevel2IDByName($level2Name);
                        $l2ID = (string) $l2Obj;

                        $mOb = new \App\Models\Molecule\Molecule();
                        $mOb->addMolecule((string) $tID, (string) $l2ID, $row[$i][2]);
                        array_push($molecule, $row[$i][2]);
                    }
                } else {
                    $level2Name = $row[$i][1];
                    if (!in_array($level2Name, $level2)) {
                        $tOb = \App\Models\Molecule\Level1::where('Name', $level1Name)->first();
                        $tID = $tOb['attributes']['_id'];
                        $l2ob = new \App\Models\Molecule\Level2();
                        $l2ob->addLevel2((string) $tID, $level2Name);
                        $level2Name = $row[$i][1];
                        array_push($level2, $level2Name);
                    }
                }
            } else {
                $level1Name = $row[$i][0];
                if (!in_array($level1Name, $level1)) {
                    $l1ob = new \App\Models\Molecule\Level1();
                    $l1ob->addLevel1($level1Name);
                    array_push($level1, $level1Name);
                    
                    $tOb = \App\Models\Molecule\Level1::where('Name', $level1Name)->first();
                    $tID = $tOb['attributes']['_id'];
                    $l2Ob = new \App\Models\Molecule\Level2();
                    $l2Ob->addLevel2((string) $tID, $row[$i][1]);
                    $level2Name = $row[$i][1];
                    $l2Obj = $l2Ob->getLevel2IDByName($row[$i][1]);
                    $l2ID = (string) $l2Obj;

                    $mOb = new \App\Models\Molecule\Molecule();
                    $mOb->addMolecule((string) $tID, (string) $l2ID, $row[$i][2]);
                    array_push($molecule, $row[$i][2]);
                }
            }
        }
        echo '<pre>';
        print_r($level1);
        print_r($level2);
        print_r($molecule);
    }

}
