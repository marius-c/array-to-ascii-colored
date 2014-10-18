<?php
require_once("./src/Drawer.php");
require("./src/SimpleDrawer.php");
require_once("./src/AssocTable.php");

class SimpleDrawerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers SimpleDrawer::__construct
     * @uses AssocTable
     */
    public function testConstructCanInstantiate()
    {
        $array = array(
            array(
                'Name'    => 'Trixie',
                'Color'   => 'Green',
                'Element' => 'Earth',
                'Likes'   => 'Flowers'
            ),
        );
        $assoc = new AssocTable($array);
        $a     = new SimpleDrawer($assoc);

        $this->assertInstanceOf("Drawer", $a);

        return $a;
    }

    /**
     * @covers SimpleDrawer::drawSeparatorLine
     * @depends testConstructCanInstantiate
     */
    public function testDrawSeparatorLine($a)
    {
        $this->assertEquals($a->drawSeparatorLine(), "+----------+---------+-----------+-----------+\n");
    }

    /**
     * @covers SimpleDrawer::drawLine
     * @depends testConstructCanInstantiate
     */
    public function testDrawLine($a)
    {
        $arrToDraw = array(
            'Name'    => 'Trixie',
            'Color'   => 'Green',
            'Element' => 'Earth',
            'Likes'   => 'Flowers'
        );
        $this->assertEquals($a->drawLine($arrToDraw, array_keys($arrToDraw)), "| Trixie   | Green   | Earth     | Flowers   |\n");
    }

    /**
     * @covers SimpleDrawer::draw
     * @depends testConstructCanInstantiate
     */
    public function testDraw($a)
    {}
}