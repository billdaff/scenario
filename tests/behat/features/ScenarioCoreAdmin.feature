@api
Feature: Scenario Core as Admin
  In order to verify that config permissions are correct
  As an administrator
  I should be able to open Scenario Core config form, fill in and submit data 

  Background: User is a system administrator.                           
    Given I am logged in as a user with the "system_administrator" role 
    
  Scenario: See config link in admin menu as system administrator
    Given I am on "/admin/config"
    Then I should see the link "Scenario Core Settings"
  Scenario: Load config form as system administrator
    Given I am on "/admin/config/scenario_core/settings"
    Then the response status code should be 200
  Scenario: Submit config form as admin
    Given I am on "/admin/config/scenario_core/settings"
    Given I check "enable_ecommerce"
    Given I enter "test123" for "elastic_path_api_key"
    Given I enter "test123" for "elastic_path_secret_key"
    Given I enter "test123" for "elastic_path_endpoint"
    Given I press "Save configuration"
    Then I should see "The configuration options have been saved."
  Scenario: If Configs exist/are active then prepopulate form
    Given I set the configuration item "scenario_core.settings" with key "enable_ecommerce" to "1"
    And I set the configuration item "scenario_core.settings" with key "elastic_path_api_key" to "test123"
    And I set the configuration item "scenario_core.settings" with key "elastic_path_secret_key" to "test1234"
    And I set the configuration item "scenario_core.settings" with key "elastic_path_endpoint" to "test12345"
    When I go to "/admin/config/scenario_core/settings"
    Then the "enable_ecommerce" checkbox should be checked
    And the "elastic_path_api_key" field should contain "test123"
    And the "elastic_path_secret_key" field should contain "test1234"
    And the "elastic_path_endpoint" field should contain "test12345"


