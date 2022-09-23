<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;
use App\FrameworkTools\Database\DatabaseConnection;


class Avaliacao1Controller extends AbstractControllers{
    //retorna todos os carros

    public function getCars(){
        $databaseConnection = DatabaseConnection::start()->getPDO();
        $fetchCars = $databaseConnection->query("SELECT * FROM car")->fetchAll();
        view($fetchCars);
    }
    
    // retorna o carro pela id.

    public function getCarsById(){
        $requestVariables = $this->processServerElements->getVariables();
        $valueVariables;
        $databaseConnection = DatabaseConnection::start()->getPDO();

        foreach($requestVariables as $value){
            $valueVariables = $value["value"];

            $fetchCars = $databaseConnection->query("SELECT * FROM car WHERE car.id_car = '{$valueVariables}';")->fetchAll();
            view($fetchCars);
        }
    }

    // retorna o carro pelo nome.

    public function getCarName(){  
        $requestVariables = $this->processServerElements->getVariables();
        $valueVariables;
        $databaseConnection = DatabaseConnection::start()->getPDO();

        foreach($requestVariables as $value){
            $valueVariables = $value["value"];

            $fetchCars = $databaseConnection->query("SELECT * FROM car WHERE car.name = '{$valueVariables}';")->fetchAll();
            view($fetchCars);
        }
    }

    // retorna todos os vendedores
    public function getSellers(){
        $databaseConnection = DatabaseConnection::start()->getPDO();
        $fetchCars = $databaseConnection->query("SELECT * FROM seller")->fetchAll();
        view($fetchCars);
    }

    // retorna todos os vendedores com determinado id (o valor do id é só um exemplo)
    public function getSellersById(){
        $requestVariables = $this->processServerElements->getVariables();
        $valueVariables;
        $databaseConnection = DatabaseConnection::start()->getPDO();

        foreach($requestVariables as $value){
            $valueVariables = $value["value"];

            $fetchCars = $databaseConnection->query("SELECT * FROM seller WHERE seller.id_seller = '{$valueVariables}';")->fetchAll();
            view($fetchCars);
        }
    }

    // retorna todos os vendedores com o nome nameSeller (o valor do nameSeller é só um exemplo)

    public function getSellerByNameSeller(){
        $requestsVariables = $this->processServerElements->getVariables();
        $variableValue;        

        foreach ($requestsVariables as $value) {
                $variableValue = $value["value"];
        }
        $databaseConnection = DatabaseConnection::start()->getPDO();
        $reqSeller = $databaseConnection
                ->query("SELECT * FROM seller WHERE seller.name = '{$variableValue}';")->fetchAll();        
        
        view($reqSeller);
    }

    // retorna todos os carros vendidos por nameSeller (João é só um exemplo)

    public function getCarsByNameSeller(){
        $requestsVariables = $this->processServerElements->getVariables();
        $variableValue;        

        foreach ($requestsVariables as $value) {
                $variableValue = $value["value"];
        }
        $databaseConnection = DatabaseConnection::start()->getPDO();
        $reqSeller = $databaseConnection
                ->query("SELECT * FROM seller WHERE seller.name = '{$variableValue}';")->fetchAll();        
        
        view($reqSeller);
    }


    // retorna todos os compradores
    public function getBuyers(){
        $databaseConnection = DatabaseConnection::start()->getPDO();
        $fetchCars = $databaseConnection->query("SELECT * FROM buyer")->fetchAll();
        view($fetchCars);
    }

    // retorna todos os compradores com determinado id (o valor do id é só um exemplo)
    public function getBuyersById(){
        $requestVariables = $this->processServerElements->getVariables();
        $valueVariables;
        $databaseConnection = DatabaseConnection::start()->getPDO();

        foreach($requestVariables as $value){
            $valueVariables = $value["value"];

            $fetchCars = $databaseConnection->query("SELECT * FROM buyer WHERE buyer.id_buyer = '{$valueVariables}';")->fetchAll();
            view($fetchCars);
        }
    }

    // retorna todos os compradores com o nome nameBuyer (o valor do nameBuyer é só um exemplo)
    public function getBuyersByNameBuyer(){

        $requestsVariables = $this->processServerElements->getVariables();
        $variableValue;        

        foreach ($requestsVariables as $value) {
            $variableValue = $value["value"];
        }

        $databaseConnection = DatabaseConnection::start()->getPDO();
        $reqBuyer = $databaseConnection
                ->query("SELECT name, last_name FROM buyer WHERE buyer.name = '{$variableValue}';")->fetchAll();        
        
        view($reqBuyer);
    }

    // retorna todos os carros comprados por nameBuyer (neste exemplo é João)
    public function getCarsByNameBuyer(){

        $requestsVariables = $this->processServerElements->getVariables();
        $variableValue;
        
        foreach ($requestsVariables as $value) {
                $variableValue = $value["value"];
        }

        $databaseConnection = DatabaseConnection::start()->getPDO();

        $reqCars = $databaseConnection
                ->query("SELECT * FROM car WHERE car.id_car IN (SELECT sells.id_car FROM sells WHERE sells.id_buyer = (SELECT buyer.id_buyer FROM buyer WHERE buyer.name = '{$variableValue}'));")
                ->fetchAll();

        view($reqCars);
    }
}