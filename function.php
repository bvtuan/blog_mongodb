<?php

/** Connects to MongoDB. */

function connectMongoDB()
{
	global $g_mongo;
	global $g_mongoDB;
	if (  !isset($g_mongo) )
	{
		$g_mongo = new Mongo();
		$g_mongoDB = $g_mongo->selectDB( 'jobdb_se' );
	}
	return $g_mongoDB;
}




