<?php

namespace Itp\Music; 
use \Itp\Base\Database;

class Song extends Database {

	private $_id;
	protected $_title;
	protected $_artistId;
	protected $_genreId;
	protected $_price;


	public function setTitle($title) 
	{
		$this->_title = $title;
	}

	public function setArtistId($artistId) 
	{
		$this->_artistId = $artistId;
	}

	public function setGenreId($genreId) 
	{
		$this->_genreId = $genreId;
	}

	public function setPrice($price) 
	{
		$this->_price = $price;
	}

	public function save() 
	{
		$sql = "
			INSERT INTO songs (title, artist_id, genre_id, price)
			VALUES (:title, :artist_id, :genre_id, :price)
		";
		$statement = static::$pdo->prepare($sql);
		$statement->bindParam(":title", $this->_title);
		$statement->bindParam(":artist_id", $this->_artistId);
		$statement->bindParam(":genre_id", $this->_genreId);
		$statement->bindParam(":price", $this->_price);
		$statement->execute();
		$this->_id = static::$pdo->lastInsertId();
	}

	public function getTitle() 
	{
		return $this->_title;
	}

	public function getId() 
	{
		return $this->_id;
	}
}