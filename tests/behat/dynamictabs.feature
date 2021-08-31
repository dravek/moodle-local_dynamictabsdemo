@core @local_dynamictabsdemo
Feature: Use dynamic tabs
  In order to use dynamic tabs
  As an admin
  I need to navigate to our demo dynamic tabs plugin

  # Set some config values so the report contains known data.
  Background:
    Given I log in as "admin"
    And I set the following administration settings values:
      | Initial number of overall feedback fields | 5     |
      | Maximum folder download size              | 2048  |
      | Default city                              | Perth |

  @javascript
  Scenario: Use dynamic tabs
    When I navigate to "Development > Dynamic tabs" in site administration
    Then I should see "Dynamic tabs demo"
    And I should see "My report"
    And the following should exist in the "reportbuilder-table" table:
      | User       | Plugin | Setting             | New value | Original value |
      | Admin User | quiz   | initialnumfeedbacks | 5         | 2              |
      | Admin User | folder | maxsizetodownload   | 2048      | 0              |
      | Admin User | core   | defaultcity         | Perth     |                |
    Then I click on the "Tab #2" dynamic tab
    And I should see "My time"
    Then I click on the "Tab #1" dynamic tab
    And the following should exist in the "reportbuilder-table" table:
      | User       | Plugin | Setting             | New value | Original value |
      | Admin User | quiz   | initialnumfeedbacks | 5         | 2              |
      | Admin User | folder | maxsizetodownload   | 2048      | 0              |
      | Admin User | core   | defaultcity         | Perth     |                |
