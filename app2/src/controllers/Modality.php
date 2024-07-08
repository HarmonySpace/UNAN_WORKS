<?php

class Modalities extends Controller
{
    public function __construct()
    {
        $this->dir = __DIR__ . '/../..';
        $this->json_file = $this->dir . "/assets/modalities.json";
    }
    //data functions
    //route "/get"
    public function getModalities()
    {
        $this->get();
    }
}
