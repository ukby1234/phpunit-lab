<?php
	class BookSearch {
		protected $books;
		public function __construct($books) {
			$this->books = $books;
		}

		public function find($keyword, $exact = false) {
			$results = array();
			foreach ($this->books as $book) {
				if ($exact) {
					if (strcasecmp($book['title'], $keyword) == 0)
						$results[] = $book;
				}		
				else if (stripos($book['title'], $keyword) != false) {
					$results[] = $book;		
				}
			}
			//var_dump($results);
			if (count($results) > 0)
				return $results;	
			else
				return false;
		}
	}
?>