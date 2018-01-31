<?php

class TestCase extends PHPUnit_Framework_TestCase
{

    public function testValidate()
    {
        $checkLogic = new \lingyin\ethereum\address\Address();
        $this->assertEquals(
            false,
            $checkLogic->validate('0x122214')
        );

        $this->assertEquals(
            true,
            $checkLogic->validate('0xbC2Ae4849E58ead2AE05308945bdD99550d73F8d')
        );

        $this->assertEquals(
            true,
            $checkLogic->validate('0xbC2Ae4849E58ead2AE05308945bdD99550e73F8d')
        );
    }
}
