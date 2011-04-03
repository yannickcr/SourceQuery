Class: SourceQuery {#SourceQuery}
=========================================

SourceQuery is a simple PHP class to query a [Source engine](http://en.wikipedia.org/wiki/Source_%28game_engine%29) server.

SourceQuery Method: constructor {#SourceQuery:constructor}
-------------------------------------------------------------------

The class constructor

### Syntax:

	$server = new SourceQuery(ip, port);

### Arguments:

1. ip - (string) The IP address of the game server
2. port - (number: defaults to `27015`) The port the game server is running on

### Example:

#### PHP:

    $server = new SourceQuery('217.70.184.250', 27030);
   
SourceQuery Method: getInfos {#SourceQuery:getInfos}
-------------------------------------------------------------------

Request informations about the server ([A2S_INFO query](http://developer.valvesoftware.com/wiki/Server_queries#A2S_INFO)).

### Syntax:

	$server->getInfos();

### Returns:

* (array) An array containing the following fields:

    * bots - (number) Number of bot players currently on the server (Unsupported on GoldSource servers)
    * dedie - (string) 'l' for listen, 'd' for dedicated, 'p' for HLTV
    * id - (number) The [Steam Application ID](http://developer.valvesoftware.com/wiki/Steam_Application_IDs) of the game (Unsupported on GoldSource servers)
    * ip - (string) The IP address of the game server
    * map - (string) The current map being played
    * mod - (string) The name of the folder containing the game files
    * modname - (string) A friendly string name for the game type
    * name - (string) The Source server's name
    * os - (string) Host operating system. 'l' for Linux, 'w' for Windows
    * pass - (number) Set to 1 if the server has a password
    * places - (number) Maximum allowed players for the server
    * players - (number) The number of players currently on the server
    * port - (number) The port the game server is running on
    * protocol - (number) Server type (Source server: 73, GoldSource server: 109)

### Example:

#### PHP:

    $infos = $server->getInfos();

### Notes:

 * The server type (Source or GoldSource) is automatically detected

SourceQuery Method: getPlayers {#SourceQuery:getPlayers}
-------------------------------------------------------------------

Request informations about the players ([A2S_PLAYER query](http://developer.valvesoftware.com/wiki/Server_queries#A2S_PLAYER)).

### Syntax:

	$server->getPlayers();

### Returns:

* (array) An array containing one entry by player. Then for each player an array containing the following fields:

    * id - (number) The index into [0.. Num Players] for this entry 
    * name - (string) Player's name
    * score - (string) Player's score
    * time - (number) 	The time in seconds this player has been connected

### Example:

#### PHP:

    $playersInfos = $server->getPlayers();

### Notes:

 * For more informations, please read the [Server queries documentation](http://developer.valvesoftware.com/wiki/Server_queries)