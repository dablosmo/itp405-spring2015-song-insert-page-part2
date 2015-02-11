<?php

namespace Itp\Music;
use \Itp\Base\Database; 

class GenreQuery extends Database {
	
	public function getAll() {
		$sql = "
			SELECT *
			FROM genres
			ORDER BY genre
		";
		$statement = static::$pdo->prepare($sql);
		$statement->execute();
		
		return $statement->fetchAll(\PDO::FETCH_OBJ);
	}
}