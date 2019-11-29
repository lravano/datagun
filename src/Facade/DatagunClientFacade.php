<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DatagunClientFacade
 *
 * @author lrava
 */
namespace Made\Datagun\Facade;


use Illuminate\Support\Facades\Facade;

class DatagunClientFacade extends Facade {
   
    protected static function getFacadeAccessor() { return 'datagun_client'; }
    
}
