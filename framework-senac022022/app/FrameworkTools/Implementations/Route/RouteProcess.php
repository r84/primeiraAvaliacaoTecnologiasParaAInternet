<?php

namespace App\FrameworkTools\Implementations\Route;

use App\FrameworkTools\ProcessServerElements;

use App\Controllers\HelloWorldController;
use App\Controllers\TrainQueryController;
use App\Controllers\InsertDataController;
use App\Controllers\Avaliacao1Controller;

class RouteProcess {

    public static function execute() {
        $processServerElements = ProcessServerElements::start();
        $routeArray = [];

        switch ($processServerElements->getVerb()) {
            case 'GET':

                switch ($processServerElements->getRoute()) {
                    
                    case '/hello-world':
                        return (new HelloWorldController)->execute();
                    break;
                    case '/train-query':
                        return (new TrainQueryController)->execute();
                    break;
                    case '/getCars' :
                        return (new Avaliacao1Controller)->getCars();
                        break;
                    case '/getCarsId' :
                        return (new Avaliacao1Controller)->getCarsById();
                        break;
                    case '/getCarName' :
                        return (new Avaliacao1Controller)->getCarName();
                        break;
                    case '/getCarsByNameSeller' :
                        return (new Avaliacao1Controller)->getCarsByNameSeller();
                        break;
                    case '/getSellers':
                        return (new Avaliacao1Controller)->getSellers();
                        break;
                    case '/getSellersById' :
                        return (new Avaliacao1Controller)->getSellersById();
                        break;
                    case '/getBuyers':
                        return(new Avaliacao1Controller)->getBuyers();
                        break;
                    case '/getBuyersById':
                        return(new Avaliacao1Controller)->getBuyersById();
                        break;
                    case '/getSellerByNameSeller':
                        return(new Avaliacao1Controller)->getSellerByNameSeller();
                        break;
                    case '/getBuyersByNameBuyer':
                        return(new Avaliacao1Controller)->getBuyersByNameBuyer();
                        break;
                    case '/getCarsByNameBuyer' :
                        return(new Avaliacao1Controller)->getCarsByNameBuyer();
                        break;
                }
            
            case 'POST':

                switch ($processServerElements->getRoute()) {
                    
                    case '/insert-data':
                        return (new InsertDataController)->execute();
                    break;

                }

        }

    }

}