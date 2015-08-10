@block @block_list_users
 Feature: List users block used in a course
  In order to view participants in a course
  As a student
  I can view users through a List Users Block in the course

 Background:
  Given the following "users" exist:
   | username | firstname | lastname | email | idnumber |
   | teacher1 | Teacher | 1 | teacher1@teacher.com | T1 |
   | student1 | Student | 1 | student1@student.com | S1 |
   | student2 | Student | 2 | student2@student.com | S2 |
   | student3 | Student | 3 | student3@student.com | S3 |
   | student4 | Student | 4 | student4@student.com | S4 |
   | student5 | Student | 5 | student5@student.com | S5 |
  And the following "courses" exist:
   | fullname | shortname | category |
   | Course Test | C1 | 0 |
  And the following "course enrolments" exist:
   | user | course | role |
   | teacher1 | C1 | editingteacher |
   | student1 | C1 | student |
   | student2 | C1 | student |
   | student3 | C1 | student |
   | student4 | C1 | student |
   | student5 | C1 | student |
  And I log in as "admin"
  And I am on site homepage
  And I follow "Course Test"
  And I turn editing mode on
  And I add the "List Users" block
  And I log out

  Scenario: Student can view participants link
   When I log in as "student1"
   And I follow "Course Test"
   Then "List Users" "block" should exist
   And I should see "List Users" in the "List Users" "block"

  Scenario: Student can follow participants link and be directed to the correct page
   When I log in as "student1"
   And I follow "Course Test"
   And I click on "List Users" "link" in the "List Users" "block"
   Then I should see "All participants" in the "h3" "css_element"
   And the "My courses" select box should contain "C1"


