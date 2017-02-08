<?php


class WebDriverInit extends PHPUnit_Framework_TestCase {
  /**
     * @var \RemoteWebDriver
     */
    protected $driver;
    
    /**
     * @BeforeMethod
     */
    public function setUp()
    {
        $capabilities=array(\WebDriverCapabilityType::BROWSER_NAME=>WebDriverBrowserType::FIREFOX);
        $this->driver = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities, 5000);
        $this->driver->get("https://www.easyjet.com/en/flight-tracker?link_megadrop");
        
    }
    
    public function getDriver(){
        return $this->driver;
    }
}
