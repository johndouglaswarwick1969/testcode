Feature: As a user I want to be able to view information about flights from
Amsterdam to London So that I can see arrivals information for the current day
And assess flight timekeeping for the day.

Scenario: Display the arrival times from Amsterdam to London for all flights
 arriving in London today. 

Given The easyjet web site is available

When I look for flights arriving to London from Amsterdam on todays date.

Then All of todays arrival times will be displayed

