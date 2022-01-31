@api
Feature: Scenario Core as Authenticated User
  In order to verify that config permissions are correct
  As an authenticated
  I should not be able to see or access Scenario Core config form

  Background: User is an authenticated user.                           
    Given I am logged in as a user with the "authenticated" role 
  Scenario: Should not see config link in admin menu as authenticated user
    Given  I am on "/admin/config"
    Then I should not see the link "Scenario Core Settings"
  Scenario: Load config form as authenticated user
    Given I am on "/admin/config/scenario_core/settings"
    Then the response status code should be 403