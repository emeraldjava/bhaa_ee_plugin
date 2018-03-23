<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class MainTest extends TestCase {

    protected $obj = NULL;

    protected function setUp() {
        $this->obj = new BHAA_EE\Main;
    }

    public function testCanBeCreatedFromValidEmailAddress(): void {
        $this->assertEquals($this->obj->get_plugin_name(),'bhaa_ee_plugin');
    }
}