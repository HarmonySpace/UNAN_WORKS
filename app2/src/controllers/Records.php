<?php
include_once "./Controller.php";

class Records extends Controller
{
    public function __construct()
    {
        $this->dir = __DIR__ . '/../..';
        $this->json_file = $this->dir . "/assets/records.json";
    }
    // views
    public function index()
    {
        $this->returnView("/src/views/home.html");
    }
    public function records()
    {
        // $data = [
        //     "anyo" => $_POST['anyo'],
        //     "codfac" => $_POST['facultaty'],
        //     "codcorr" => $_POST['career'],
        //     "modalida" => $_POST['modality'],
        //     "id_tipo_regimen" => $_POST['regime'],
        //     "parciales" => [
        //          "i" => $_POST['i'],
        //          "ii" => $_POST['ii'],
        //          "iii" => $_POST['iii'],
        //          "final" => $_POST['final']
        //     ]
        // ];
        $res = $this->getOn();
        //define vars
        $anyo = isset($_POST["anyo"]) ? $_POST["anyo"] : null;
        $codfac = isset($_POST["facultaty"]) ? $_POST["facultaty"] : null;
        $codcarr = isset($_POST["career"]) ? $_POST["career"] : null;
        $modalidad = isset($_POST["modality"]) ? $_POST["modality"] : null;
        $id_tipo_regimen = isset($_POST["regime"]) ? $_POST["regime"] : null;
        $parcialI = isset($_POST["i"]) ? $_POST["i"] : null;
        $parcialII = isset($_POST["ii"]) ? $_POST["ii"] : null;
        $parcialIII = isset($_POST["iii"]) ? $_POST["iii"] : null;
        $final = isset($_POST["final"]) ? $_POST["final"] : null;
        $parciales = [
            "parcialI" => $parcialI,
            "parcialII" => $parcialII,
            "parcialIII" => $parcialIII,
            "final_n" => $final
        ];
        $data = array_filter($res, function ($item) use ($anyo) {
            if (empty($anyo) || $anyo == "todos") {
                return ($item);
            } elseif ($item["anyo_lec"] == $anyo) {
                return ($item);
            } else {
            }
        });
        $data = array_filter($data, function ($item) use ($codfac) {
            if (empty($codfac) || $codfac == "todos") {
                return ($item);
            } elseif ($item["codfac"] == $codfac) {
                return ($item);
            } else {
            }
        });
        $data = array_filter($data, function ($item) use ($codcarr) {
            if (empty($codcarr) || $codcarr == "todos") {
                return ($item);
            } elseif ($item["codcarr"] == $codcarr) {
                return ($item);
            } else {
            }
        });
        $data = array_filter($data, function ($item) use ($modalidad) {
            if (empty($modalidad) || $modalidad == "todos") {
                return ($item);
            } elseif ($item["modalidad"] == strtoupper($modalidad)) {
                return ($item);
            } else {
            }
        });
        $data = array_filter($data, function ($item) use ($id_tipo_regimen) {
            if (empty($id_tipo_regimen) || $id_tipo_regimen == "todos") {
                return ($item);
            } elseif ($item["id_tipo_regimen"] == $id_tipo_regimen) {
                return ($item);
            } else {
            }
        });
        $data = array_map(function ($item) use ($parciales) {
            if (empty($parciales["parcialI"])) {
                unset($item["i_parcial"]);
            }
            if (empty($parciales["parcialII"])) {
                unset($item["ii_parcial"]);
            }
            if (empty($parciales["parcialIII"])) {
                unset($item["iii_parcial"]);
            }
            if (empty($parciales["final_n"])) {
                unset($item["nota_final"]);
            }
            return ($item);
        }, $data);
        $this->returnView("/src/views/return.html", ["data" => json_encode($data)]);
    }

    //data functions
    public function result()
    {
        $this->get();
    }
    //route "/find"
    public function find($id)
    {
        $data_file = $this->getFileContent();
        $object = array_filter($data_file, function ($obj) use ($id) {
            return $obj['id'] == $id;
        });
        if (!empty($object)) {
            $object = array_values($object)[0];
            $json_response = json_encode($object);
        } else {
            $json_response = [
                "res" => "error: OBJECT NOT FOUND"
            ];
            $json_response = json_encode($json_response);
        }
        header('Content-Type: application/json');
        echo $json_response;
    }
}
