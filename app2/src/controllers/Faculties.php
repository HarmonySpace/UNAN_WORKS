<?php

class Faculties extends Controller
{
    public function __construct()
    {
        $this->dir = __DIR__ . '/../..';
        $this->json_file = $this->dir . "/assets/faculties.json";
    }

    public function index()
    {
        $this->get();
    }

    public function careers($id)
    {
        $data = $this->getOn();
        foreach ($data as $fac) {
            if ($fac['codfac'] == $id) {
                $json_response = $fac;
            }
        }
        if ($json_response) {
            $json_response = json_encode($json_response);
            header('Content-Type: application/json');
            echo $json_response;
        } else {
            echo "DONT FIND THE FACULTATY";
        }
    }
}
