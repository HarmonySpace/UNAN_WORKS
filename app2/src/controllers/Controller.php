<?php

class Controller
{
    public $dir;
    public $json_file;
    //personal functions
    protected function getFileContent()
    {
        if (!file_exists($this->json_file)) {
            die("JSON file not found at path: $this->json_file");
        }
        $json_data = file_get_contents($this->json_file);
        $data_file = json_decode($json_data, true);
        return $data_file;
    }
    protected function generateId()
    {
        return hexdec(uniqid());
    }
    // views
    protected function returnView($path, $params = array()) {
        $view = $this->dir . $path;
        if(file_exists($view)){
            extract($params);
            require_once $view;
        } else {
            echo "File not found: $view";
        }
    }
    //data functions
    protected function get()
    {
        $data_response = $this->getFileContent();
        $json_response = json_encode($data_response);
        header('Content-Type: application/json');
        echo $json_response;
    }
    protected function getOn()
    {
        $data_response = $this->getFileContent();
        return $data_response;
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
