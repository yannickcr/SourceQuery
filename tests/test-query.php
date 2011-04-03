<?php
error_reporting(E_ALL);

// Your test server
define('IP', '217.70.184.250');
define('PORT', 27015);

require_once dirname(__FILE__) . "/../lib/SourceQuery.php";
require_once 'PHPUnit/Autoload.php';

class QueryTests extends PHPUnit_Framework_TestCase {

    public static function main(){
        require_once 'PHPUnit/TextUI/TestRunner.php';

        $suite  = new PHPUnit_Framework_TestSuite('QueryTests');
        $result = PHPUnit_TextUI_TestRunner::run($suite);
    }

	public function testConnection(){
		$server = new SourceQuery(IP, PORT);
		
		$this->assertType('SourceQuery', $server);
	}

	public function testGetServerInfos(){
		$server = new SourceQuery(IP, PORT);
		
		$this->assertType(PHPUnit_Framework_Constraint_IsType::TYPE_ARRAY, $server->getInfos());
	}

	public function testGetServerInfos2(){
		$server = new SourceQuery(IP, PORT);
		$infos  = $server->getInfos();
		
		$this->assertNotNull($infos['id']);
		$this->assertType(PHPUnit_Framework_Constraint_IsType::TYPE_INT, $infos['id']);
		
		$this->assertNotNull($infos['ip']);
		$this->assertType(PHPUnit_Framework_Constraint_IsType::TYPE_STRING, $infos['ip']);
		
		$this->assertNotNull($infos['port']);
		$this->assertType(PHPUnit_Framework_Constraint_IsType::TYPE_INT, $infos['port']);
		
		$this->assertNotNull($infos['players']);
		$this->assertType(PHPUnit_Framework_Constraint_IsType::TYPE_INT, $infos['players']);
		
		$this->assertNotNull($infos['places']);
		$this->assertType(PHPUnit_Framework_Constraint_IsType::TYPE_INT, $infos['places']);
		
		$this->assertNotNull($infos['bots']);
		$this->assertType(PHPUnit_Framework_Constraint_IsType::TYPE_INT, $infos['bots']);
		
		$this->assertNotNull($infos['protocol']);
		$this->assertType(PHPUnit_Framework_Constraint_IsType::TYPE_INT, $infos['protocol']);
		
		$this->assertNotNull($infos['dedie']);
		$this->assertType(PHPUnit_Framework_Constraint_IsType::TYPE_STRING, $infos['dedie']);
		
		$this->assertNotNull($infos['os']);
		$this->assertType(PHPUnit_Framework_Constraint_IsType::TYPE_STRING, $infos['os']);
		
		$this->assertNotNull($infos['pass']);
		$this->assertType(PHPUnit_Framework_Constraint_IsType::TYPE_INT, $infos['pass']);
	}

	public function testGetPlayersInfos(){
		$server = new SourceQuery(IP, PORT);
		
		$this->assertType(PHPUnit_Framework_Constraint_IsType::TYPE_ARRAY, $server->getPlayers());
	}

	public function testGetPlayersInfos2(){
		$server = new SourceQuery(IP, PORT);
		$infos  = $server->getPlayers();
		
		if(count($infos) == 0) return true;
		
		$this->assertNotNull($infos[0]['id']);
		$this->assertType(PHPUnit_Framework_Constraint_IsType::TYPE_INT, $infos[0]['id']);
		
		$this->assertNotNull($infos[0]['name']);
		$this->assertType(PHPUnit_Framework_Constraint_IsType::TYPE_STRING, $infos[0]['name']);
		
		$this->assertNotNull($infos[0]['score']);
		$this->assertType(PHPUnit_Framework_Constraint_IsType::TYPE_INT, $infos[0]['score']);
		
		$this->assertNotNull($infos[0]['time']);
		$this->assertType(PHPUnit_Framework_Constraint_IsType::TYPE_FLOAT, $infos[0]['time']);
	}
}

QueryTests::main();