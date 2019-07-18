<?php
require_once('simpletest/autorun.php');
require_once('userClass.php');

class TestOfLogging extends UnitTestCase {
  function testCorrectPass() {
    $log = new logmein();
    $log->createUserDB();
    $this->assertTrue($log->checkPassword("Hello"));
  }
    function testLowercasePass() {
      $log = new logmein();
      $log->createUserDB();
      $this->assertFalse($log->checkPassword("hello"));
    }
      function testSpecialChar() {
        $log = new logmein();
        $log->createUserDB();
        $this->assertFalse($log->checkPassword("#ello"));
      }
}
?>
