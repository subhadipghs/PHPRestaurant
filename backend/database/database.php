<?php

	
	class Database
	{
		/**
		 * Host of the database => localhost
		 * @var string $host
		 */
		private $host = 'localhost';
		/**
		 * database is the specific database name of the database
		 * @var string $database
		 */
		private $database;

		/**
		 * username => admin of the database
		 * @var string $user
		 */
		private $user;


		/**
		 * password for the user/admin
		 * @var string $password
		 */
		private $password;


		/**
		 * Database connection
		 * @var PDO 
		 */
		private $connection;


		/**
		 * Initialize the database with the username and password
		 * @param string $host     localhost/host 
		 * @param string $database    relation/database name
		 * @param string $user     user/admin (root) for the database
		 * @param string $password password for the root/admin/user
		 */		
		public function __construct(string $host = 'localhost', string $database = '', string $user = '', string $password = '')
		{
			$this->host = $host;
			$this->database = $database;
			$this->user = $user;
			$this->password = $password;
		}

		/**
		 * Connect to the database
		 * @return connection 
		 */	
		public function connect()
		{
			$this->connection = null;

			try {
				$this->connection = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->user, $this->password);
				$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e) {
				echo 'Connection Error occured'.$e->getMessage();
			}
			return $this->connection;
		}

	}