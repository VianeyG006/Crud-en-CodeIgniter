<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
      return view('welcome_toThejungle');
    }

    public function bienvenida()
    {
      $db = db_connect();
      $result['result'] = $db->query('SELECT * FROM tabla');      
      return view("resultados", $result);
    }
}
