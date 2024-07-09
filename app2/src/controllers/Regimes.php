<?php

class Regimes extends Controller
{
    public function __construct()
    {
        $this->dir = __DIR__ . '/../..';
        $this->json_file = $this->dir . "/assets/regimes.json";
    }
    public function index()
    {
        $this->get();
    }

    public function cicles($id)
    {
        $data = $this->getOn();
        foreach ($data as $cicle) {
            if ($cicle['cicle'] == $id) {
                $json_response = $cicle;
            }
        }
        if ($json_response) {
            $json_response = json_encode($json_response);
            header('Content-Type: application/json');
            echo $json_response;
        } else {
            echo "DONT FIND THE REGIME";
        }
    }
}
