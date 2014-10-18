<?php
require("./src/AssocTable.php");

class AssocTableTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers AssocTable::__construct
     * @expectedException InvalidArgumentException
     */
     public function testExceptionIsRaisedForEmptyArrayConstructArgument()
     {
         new AssocTable(array());
     }

    /**
     * @covers AssocTable::__construct
     * @expectedException InvalidArgumentException
     */
    public function testExceptionIsRaisedForEmptyMultidimensionalArrayConstructArgument()
    {
        new AssocTable(array(array()));
    }

    /**
     * @covers AssocTable::__construct
     */
     public function testObjectCanBeConstructed()
     {
         $array = array(
                    array(
                         'Name'    => 'Trixie',
                         'Color'   => 'Green',
                         'Element' => 'Earth',
                         'Likes'   => 'Flowers'
                     ),
                     array(
                         'Name'    => 'Tinkerbell',
                         'Element' => 'Air',
                         'Likes'   => 'Singning',
                         'Color'   => 'Blue'
                     )
                );

         $obj = new AssocTable($array);

         $this->assertInstanceOf("AssocTable", $obj);

         return $obj;
     }

    /**
     * @covers AssocTable::getColMaxSize
     * @depends testObjectCanBeConstructed
     */
     public function testGetColMaxSize(AssocTable $obj)
     {
        $this->assertEquals(10, $obj->getColMaxSize('Name'));
     }

    /**
     * @covers AssocTable::getColsNames
     * @depends testObjectCanBeConstructed
     */
     public function testGetColsNames($obj)
     {
         $this->assertSame(array('Name', 'Color', 'Element', 'Likes'), $obj->getColsNames());
     }
}