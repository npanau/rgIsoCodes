<?php

require_once('extension/rgisocodes/classes/siret.php');

//class eZSiretTest extends ezpTestCase
class eZSiretTest extends PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        parent::__construct();
        $this->setName( "SIRET unit test case" );
    }

    protected function setUp()
    {
        parent::setUp();
    }


    public function testValidSiret()
    {
        $this->assertEquals( Siren::validate( '44079707400026' ), true );
        $this->assertEquals( Siren::validate( '48853781200015' ), true );
        $this->assertEquals( Siren::validate( '43216756700028' ), true );
        $this->assertEquals( Siren::validate( '41762563900030' ), true );
        $this->assertEquals( Siren::validate( '33493272000017' ), true );
        $this->assertEquals( Siren::validate( '44028837100014' ), true );
        $this->assertEquals( Siren::validate( '51743954300011' ), true );
    }

    public function testInvalidSiret()
    {
        $this->assertEquals( Siren::validate( '4407970740002' ), false );
        $this->assertEquals( Siren::validate( '440797074000278' ), false );
        $this->assertEquals( Siren::validate( '44079707400027' ), false );
        $this->assertEquals( Siren::validate( '48853781200016' ), false );
        $this->assertEquals( Siren::validate( '43216756700029' ), false );
        $this->assertEquals( Siren::validate( '41762563900031' ), false );
        $this->assertEquals( Siren::validate( '33493272000018' ), false );
        $this->assertEquals( Siren::validate( '44028837100015' ), false );
        $this->assertEquals( Siren::validate( '51743954300012' ), false );
    }

    public function testEmptySiretAsInvalid()
    {
        $this->assertEquals( Siret::validate( '' ), false );
        $this->assertEquals( Siret::validate( ' ' ), false );
        $this->assertEquals( Siret::validate( 'azertyuiopqsdf' ), false );
    }
}
?>
