<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client\Client;
use App\Models\Indication\Indication;
use App\Models\Molecule\Molecule;
use App\Models\MapMolecules\MapMolecules;
use App\Models\Molecule\Level1;
use App\Models\Molecule\Level2;
use Illuminate\Http\Request;
use Validator;
use MongoDB\Model;
use MongoDB\BSON\ObjectID;

class ClientController extends Controller {

    public $mid = "";

    public function index() {
        $listDetails = array();
        $therapy = array();
        $indic = array();
        $moleculeDetailArr = array();
        $listDetail = array();
        $clients = Client::all();
        foreach ($clients as $client) {
            $clientDetail = $client['attributes'];
            $test['cid'] = (string) $clientDetail['_id'];
            $test['clientName'] = $clientDetail['Name'];

            foreach ($clientDetail['BusinessGroup'] as $group) {
                $test['bgid'] = (string) $group['_id'];
                $test['bgName'] = $group['Name'];

                $bgid = new \MongoDB\BSON\ObjectId($group['_id']);
                // echo '<pre>';
                $ob = new MapMolecules();

                $indications = ($ob->loadIndicationDetails($test['bgid']));
                $indications = array_filter($indications);

                $indication = array();
                foreach ($indications as $indicationDetails) {
                    $tempDetails = $indicationDetails;
                    $indicationDetail = $this->getIndicationName($tempDetails);
                    array_push($indication, $indicationDetail);
                }
                $indication = array_filter($indication);

                foreach ($indication as $key => $value) {
                    $test['therapy'][$value[0]['therapy']][] = $value[0]['indication'];
                }
                if (!empty($indication))
                    array_push($listDetails, $test);
                else {
                    $tester['cid'] = (string) $clientDetail['_id'];
                    $tester['clientName'] = $clientDetail['Name'];
                    $tester['bgid'] = (string) $group['_id'];
                    $tester['bgName'] = $group['Name'];
                    array_push($listDetails, $tester);
                }


                echo "molecule : " . $test['bgid'] . "<br>";
                $molecules1 = $ob->loadMoleculeDetails($test['bgid']);
                $molecules1 = array_filter($molecules1);
                foreach ($molecules1 as $molecules) {
                    print_r($molecules);
                    $moleculeDetail = $this->getMoleculeDetails($molecules);
                    print_r($moleculeDetail);
                    echo $temp = implode(" : ", $moleculeDetail) . "<br>";
                    $test['Name'] = $temp;
                    array_push($listDetails, $test);
                }
            }
        }

//        echo '<pre>';
//        print_r($listDetails);
//        exit;
        $level1Details = $this->loadLevel1Details();
        $therapyDetails = $this->loadIndicationEntry();
        return view('client/index', array(
            'details' => json_encode($listDetails),
            'therapyDetails' => json_encode($therapyDetails),
            'level1Details' => json_encode($level1Details)
        ));
        // return view('client/index', array('therapy' => $therapy, 'details' => json_encode($listDetails)));
    }

    public function load_molecule_entry_list($bgid) {
        $clientObj = new Client();
        $ob = new MapMolecules();
        $groups = $clientObj->loadBGEntryListValues($bgid);
        $bgid = new \MongoDB\BSON\ObjectId($bgid);
        $molecules1 = $ob->loadMoleculeDetails($bgid);
        $molecules1 = array_filter($molecules1);
        $result = array();
        $str = "";
        foreach ($molecules1 as $molecules) {
            //print_r($molecules);
            $moleculeDetail = $this->getMoleculeDetails($molecules);
            // print_r($moleculeDetail);
            echo $temp = implode(" : ", $moleculeDetail) . "<br>";
            $test['Name'] = $temp;
            array_push($result, $temp);
        }

        $str.='<div class="row">';
        foreach ($result as $key => $value) {
            $str.='
                               <div class = "col-md-12"><div class = "col-md-11">
                                    <h6 class = "text-semibold">' . $groups["clientName"] . ' - ' . $groups["groupName"] . '</h6>
' . $value . "<br></div><div class = 'col-md-1'><button type = 'button' class = 'btn btn-link'><i class = 'icon-trash'></i></button></div>
                                            </div>";
        }
        $str.="               </div>";

        return $str;
    }

    public function load_indication_entry_list($bgid) {
        $clientObj = new Client();
        $groups = $clientObj->loadBGEntryListValues($bgid);
        $ob = new MapMolecules();
        $indications = ($ob->loadIndicationDetails($bgid));
        $indication = array();
        $test = array();
        $str = "";
        if (!empty($indications)) {
            foreach ($indications as $indicationDetails) {
                $tempDetails = $indicationDetails;
                $indicationDetail = $this->getIndicationName($tempDetails);
                array_push($indication, $indicationDetail);
            }
            foreach ($indication as $key => $value) {

                $test['clientName'] = $groups['clientName'];
                $test['groupName'] = $groups['groupName'];
                $test['therapy'][$value[0]['therapy']][] = $value[0]['indication'];
            }
            $therapy = array();
            $indication = array();
            $result = array();
            foreach ($test['therapy'] as $key => $value) {
                array_push($therapy, $key);
                array_push($indication, implode(", ", $value));
            }
            $result = array_combine($therapy, $indication);
            $str.='<div class="row">';
            foreach ($result as $key => $value) {
                $str.='
                               <div class = "col-md-12"><div class = "col-md-11">
                                    <h6 class = "text-semibold">' . $groups["clientName"] . ' - ' . $groups["groupName"] . '</h6>
<b>' . $key . '</b> - ' . $value . "<br></div><div class = 'col-md-1'><button type = 'button' class = 'btn btn-link'><i class = 'icon-trash'></i></button></div>
                                            </div>";
            }
            $str.="               </div>";
        }
        return $str;
    }

    public function getIndicationName($iid) {
        $obj = new Indication();
        return $obj->getIndicationName($iid);
    }

    public function getMoleculeDetails($mid) {
        $this->mid = new \MongoDB\BSON\ObjectId($mid);

        $obj = Molecule::where('_id', $this->mid)->get();
        $attr = $obj[0]['attributes'];

        $moleculeName = $attr['Name'];
        $l1id = $attr['level1id'];
        $l1Obj = Level1::find($l1id);

        $l1Name = $l1Obj['attributes']['Name'];
        $l2id = $attr['level2id'];
        $l2ob = new Level2();
        $l2Name = $l2ob->loadLevel2Name($l2id);
        //return $l1Obj;        
        $names['level1Name'] = $l1Name;
        $names['level2Name'] = $l2Name;
        $names['moleculeName'] = $moleculeName;
        return $names;
    }

    public function loadLevel1Details() {
        $level1 = array();
        $level1Details = Level1::all();
        foreach ($level1Details as $levelDetail['attributes']) {
            /* echo '<pre>';
              print_r($levelDetail);
              exit; */
            foreach ($levelDetail as $level1Detail) {
//                echo '<pre>';
//                print_r($level1Detail['_id']);
//                exit;
                $level1details['_id'] = (string) $level1Detail['_id'];
                $level1details['level1Name'] = $level1Detail['Name'];
                array_push($level1, $level1details);
            }
        }
        return $level1;
    }

    public function loadIndicationEntry() {
        $listDetails = array();
        $therapy = Indication::all();
        foreach ($therapy as $therapyDetail['attributes']) {
            $details['therapyName'] = $therapyDetail['attributes']['Therapy'];
            $details['tid'] = (string) $therapyDetail['attributes']['_id'];

            array_push($listDetails, $details);
            //exit;
        }
        return $listDetails;
    }

    public function loadMolecules($l1id, $l2id) {
        $obj = new Molecule();
        $str = $obj->loadMolecules($l1id, $l2id);
        return response()->json([
                    'success' => true,
                    'message' => $str
                        ], 200);
    }

    public function loadIndications($tid) {
        $str = '';
        $query = new Indication();
        $result = $query->loadIndications($tid);
        foreach ($result as $resultset) {
            
        }
        foreach ($resultset as $res) {
            $id = (string) $res['_id'];
            $name = $res['Name'];
            $str.= '<option value="' . $id . '">' . $name . '</option>';
        }
        return response()->json([
                    'success' => true,
                    'message' => $str
                        ], 200);
        //foreach($res)
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
                    'clientName' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = json_decode($errors);

            return response()->json([
                        'success' => false,
                        'message' => $errors
                            ], 422);
        } else {
            $str = $this->clientExists($request);
            return response()->json([
                        'success' => true,
                        'message' => "Client " . $str . " Successfully"
                            ], 200);
        }
    }

    public function clientExists($request) {
        $obj = new Client();
        return $result = $obj->checkClientExists($request);
    }

    public function load($cid) {
        $obj = new Client();
        return $obj->loadClientDetails($cid);
    }

    public function storeGroup(Request $request) {
        $validator = Validator::make($request->all(), [
                    'clientName' => 'required',
                    'groupName' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = json_decode($errors);

            return response()->json([
                        'success' => false,
                        'message' => $errors
                            ], 422);
        } else {
            $str = $this->groupExists($request);
            return response()->json([
                        'success' => true,
                        'message' => "Business Group " . $str . " Successfully"
                            ], 200);
        }
    }

    public function storeEditGroup(Request $request) {
        $validator = Validator::make($request->all(), [
                    'clientName' => 'required',
                    'groupName' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = json_decode($errors);

            return response()->json([
                        'success' => false,
                        'message' => $errors
                            ], 422);
        } else {
            $str = $this->groupExists($request);
//            return response()->json([
//                        'success' => true,
//                        'message' => "Business Group " . $str . " Successfully"
//                            ], 200);
        }
    }

    public function storeIndicationEntry(Request $request) {
        $validator = Validator::make($request->all(), [
                    'therapeuticName' => 'required',
                    'indicationName' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = json_decode($errors);

            return response()->json([
                        'success' => false,
                        'message' => $errors
                            ], 422);
        } else {
            //$str = $this->groupExists($request);
            $ob = new MapMolecules();
            $ob->saveIndicationEntry($request);
            return response()->json([
                        'success' => true,
                        'message' => "Indication Entry Added Successfully"
                            ], 200);
        }
    }

    public function editBGEntry($cid, $bgid) {
        $ob = new Client();
        return $ob->loadBGEntryValues($cid, $bgid);
    }

    public function groupExists($request) {
        $obj = new Client();
        return $result = $obj->checkGroupExists($request);
    }

    public function storeMoleculeEntry(Request $request) {
        $validator = Validator::make($request->all(), [
                    'level1Name' => 'required',
                    'level2Name' => 'required',
                    'moleculeName' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = json_decode($errors);

            return response()->json([
                        'success' => false,
                        'message' => $errors
                            ], 422);
        } else {
            //$str = $this->groupExists($request);
            $ob = new MapMolecules();
            $ob->saveMoleculeEntry($request);
            return response()->json([
                        'success' => true,
                        'message' => "Molecule Entry Added Successfully"
                            ], 200);
        }
    }
    
    public function removeClient($cid) {
        $obj = new Client();
        return $obj->removeClient($tid);
    }

}
