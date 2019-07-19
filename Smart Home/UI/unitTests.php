<?php
require_once('simpletest/autorun.php');
require_once('userClass.php');

class TestOfLogging extends UnitTestCase {
  function testCorrectPass() {
    $log = new logmein();
    $log->createUserDB();
    $this->assertEqual($log->checkPassword("Hello"), 0);
  }
  function testLowercasePass() {
    $log = new logmein();
    $log->createUserDB();
    $this->assertEqual($log->checkPassword("hello"), 1);
  }

  function testSpecialandUpperChar() {
    $log = new logmein();
    $log->createUserDB();
    $this->assertEqual($log->checkPassword("#Ello"), 2);
  }

  function testSpecialChar() {
    $log = new logmein();
    $log->createUserDB();
    $this->assertEqual($log->checkPassword("#ello"), 3);
  }
}
?>
