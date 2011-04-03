SourceQuery
===========

A simple PHP class to query a [Source engine](http://en.wikipedia.org/wiki/Source_%28game_engine%29) server.

How to use
----------

### Example

PHP:

	require_once 'lib/SourceQuery.php';
	
	$server = new SourceQuery('217.70.184.250', 27015);
	$infos  = $server->getInfos();
	echo 'There is ' . $infos['players'] . ' player(s) on the server "' .$infos['name'] . '".';