<?php
require_once("./src/Drawer.php");
require("./src/ColoredDrawer.php");
require_once("./src/AssocTable.php");

class ColoredDrawerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ColoredDrawer::__construct
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
        $a     = new ColoredDrawer($assoc);

        $this->assertInstanceOf("Drawer", $a);

        return $a;
    }

    /**
     * @covers ColoredDrawer::drawSeparatorLine
     * @depends testConstructCanInstantiate
     */
    public function testDrawSeparatorLine($a)
    {
        $this->assertEquals($a->drawSeparatorLine(), "+----------+---------+-----------+-----------+\n");
    }

    /**
     * @covers ColoredDrawer::drawLine
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

        $this->assertEquals($a->drawLine($arrToDraw, array_keys($arrToDraw)), "|".chr(27)."[41m Trixie   ".chr(27)."[0m|".chr(27)."[42m Green   ".chr(27)."[0m|".chr(27)."[45m Earth     ".chr(27)."[0m|".chr(27)."[44m Flowers   ".chr(27)."[0m|\n");
    }
}