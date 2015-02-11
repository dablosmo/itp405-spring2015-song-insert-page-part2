<?php

namespace Itp\Music;
use \Itp\Base\Database; 

class ArtistQuery extends Database {

	public function getAll() {
		$sql = "
			SELECT *
			FROM artists
			ORDER BY artist_name
		";
		$statement = static::$pdo->prepare($sql);
		$statement->execute();
		
		return $statement->fetchAll(\PDO::FETCH_OBJ);
	}
}