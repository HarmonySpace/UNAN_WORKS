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

    public function result()
    {
        $this->get();
    }

    public function records()
    {
        $res = $this->getOn();
        $anyo = isset($_POST["anyo"]) ? $_POST["anyo"] : null;
        $codfac = isset($_POST["facultaty"]) ? $_POST["facultaty"] : null;
        $codcarr = isset($_POST["career"]) ? $_POST["career"] : null;
        $modalidad = isset($_POST["modality"]) ? $_POST["modality"] : null;
        $id_tipo_regimen = isset($_POST["regime"]) ? $_POST["regime"] : null;
        $id_tipo_ciclo = isset($_POST["cicle"]) ? $_POST["cicle"] : null;
        $campo = isset($_POST["camp"]) ? $_POST["camp"] : null;
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
        $data = array_filter($data, function ($item) use ($id_tipo_ciclo) {
            if (empty($id_tipo_ciclo) || $id_tipo_ciclo == "todos") {
                return ($item);
            } elseif ($item["id_tipo_ciclo"] == $id_tipo_ciclo) {
                return ($item);
            } else {
            }
        });
        $data = array_filter($data, function ($item) use ($campo) {
            if (empty($campo) || $campo == "todos") {
                return ($item);
            } elseif ($item["campo"] == strtoupper($campo)) {
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
}
