<?php
require("./src/Color.php");

class ColorTest extends  \PHPUnit_Framework_TestCase
{
    /**
     * @covers Color::open
     * @expectedException InvalidArgumentException
     */
    public function testExceptionIsRaisedForOutOfRangeOpenArgument()
    {
        Color::open(null);
    }

    /**
     * @covers Color::open
     */
    public function testValidColorReturned()
    {
        $this->assertEquals(chr(27) . "[41m", Color::open(0));
    }

    /**
     * @covers Color::close()
     */
    public function testCloseCorrect()
    {
        $this->assertEquals(Color::close(), chr(27) . "[0m");
    }
}