<?php

require_once('extension/rgisocodes/classes/bban.php');
 
//class eZBbanTest extends ezpTestCase
class eZBbanTest extends PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        parent::__construct();
        $this->setName( "BBAN unit test case" );
    }

    protected function setUp()
    {
        parent::setUp();
    }

 
    public function testValidBban()
    {
	$this->assertEquals( Bban::validate( '15459450000411700920U62' ), true );
	$this->assertEquals( Bban::validate( '10207000260402601177083' ), true );
    }
 
    public function testInvalidBban()
    {
	$this->assertEquals( Bban::validate( '15459 45000 0411700920U 62' ), false );
        $this->assertEquals( Bban::validate( '10207000260402601177084' ), false );
    }

    public function testEmptyBbanAsInvalid()
    {
        $this->assertEquals( Bban::validate( '' ), false );
        $this->assertEquals( Bban::validate( ' ' ), false );
    }
}
?>
