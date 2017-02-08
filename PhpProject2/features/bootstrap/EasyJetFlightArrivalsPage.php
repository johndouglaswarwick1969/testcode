<?php

class EasyJetFlightArrivalsPage {
    //put your code here
    private $webDriver;
    
    
    public function driver(WebDriver $driver){
        $this->webDriver = $driver;   
    }
    
    public function gototheFlightArrivalsPage(){
        $this->webDriver->get("https://www.easyjet.com/en/flight-tracker?link_megadrop");
    }

    public function acceptCookiesifDisplayed(){
        //if ($this->webDriver->findElement(WebDriverBy::cssSelector("#close-drawer-link > img:nth-child(1)"))->isDisplayed()){
            $this->webDriver->findElement(WebDriverBy::cssSelector("#close-drawer-link > img:nth-child(1)"))->click();
        //}
    }
            
    
    public function fillinOrigin($origin){
        $element = $this->webDriver->findElement(WebDriverBy::name("origin"))->sendKeys($origin);
        $element->click();
    }
    
    public function fillinDestination($destination){
        $element = $this->webDriver->findElement(WebDriverBy::name("destination"))->sendKeys($destination);
        $element->click();
        $element->sendKeys(WebDriverKeys::TAB);
        $element->sendKeys(WebDriverKeys::TAB);
    }
   
    public function clickonSearchButton(){
        $element = $this->webDriver->findElement(WebDriverBy::id("flight-finder-button"));
        $element->sendKeys(WebDriverKeys::ENTER);
    }
    
    public function getTodaysArrivals(){
        return count($this->webDriver->findElements(WebDriverBy::linkText("Wed 8 Feb")));
    }
    
    }
