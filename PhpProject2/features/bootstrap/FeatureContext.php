<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use WebDriverInit;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    protected $webDriverInit;
    protected $easyJetFlightArrivalsPage;

    public function __construct()
    {
    }

    /**
     * @Given The easyjet web site is available
     */
    public function theEasyjetWebSiteIsAvailable()
    {
        $this->webDriverInit = new WebDriverInit();
        $this->webDriverInit->setUp();
       
    }

    /**
     * @When I look for flights arriving to London from Amsterdam on todays date.
     */
    public function iLookForFlightsArrivingToLondonFromAmsterdamOnTodaysDate()
    {
        $this->easyJetFlightArrivalsPage = new EasyJetFlightArrivalsPage();
        $this->easyJetFlightArrivalsPage->driver($this->webDriverInit->getDriver());
        $this->easyJetFlightArrivalsPage->acceptCookiesifDisplayed();
        $this->easyJetFlightArrivalsPage->fillinOrigin("Amsterdam (AMS)");
        $this->easyJetFlightArrivalsPage->fillinDestination("London Gatwick (LGW)");
        $this->easyJetFlightArrivalsPage->clickonSearchButton();
    }

    /**
     * @Then All of todays arrival times will be displayed
     */
    public function allOfTodaysArrivalTimesWillBeDisplayed()
    {
        $textElements = $this->easyJetFlightArrivalsPage->getTodaysArrivals();

        // do something with the array here
        
    }
}
