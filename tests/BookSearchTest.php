<?php
require __DIR__ . '/../classes/BookSearch.php';
class BookSearchTest extends PHPUnit_Framework_TestCase {
    protected $books;
    public function setUp() {
         $this->books = [
  [ 'title' => 'Introduction to HTML and CSS', 'pages' => 432 ],
  [ 'title' => 'Learning JavaScript Design Patterns', 'pages' => 32 ],
  [ 'title' => 'Object Oriented JavaScript', 'pages' => 42 ],
  [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ],
  [ 'title' => 'PHP Object Oriented Solutions', 'pages' => 80 ],
  [ 'title' => 'PHP Design Patterns', 'pages' => 300 ],
  [ 'title' => 'Head First Java', 'pages' => 200 ]
];
    }
    public function testMatch()
    {
       
        // Arrange
        $search = new BookSearch($this->books);

        // Act
        $results = $search->find('javascript');

        // Assert
        $this->assertEquals(2, count($results));
        foreach ($results as $result) {
            $title = $result['title'];
            $pages = $result['pages'];
            $found = false;
            foreach ($this->books as $book) {
                if ($book['title'] = $title && $book['pages'] == $pages)
                    $found = true;
            }
            $this->assertEquals($found, true);
        }
    }

    public function testExactMatch()
    {
       
        // Arrange
        $search = new BookSearch($this->books);

        // Act
        $results = $search->find('javascript web applications', true);

        // Assert
        $this->assertEquals(1, count($results));
        foreach ($results as $result) {
            $title = $result['title'];
            $pages = $result['pages'];
            $found = false;
            foreach ($this->books as $book) {
                if ($book['title'] = $title && $book['pages'] == $pages)
                    $found = true;
            }
            $this->assertEquals($found, true);
        }
    }

    public function testNotFound()
    {
       
        // Arrange
        $search = new BookSearch($this->books);

        // Act
        $results = $search->find('The Definitive Guide to Symfony', true);

        // Assert
        $this->assertEquals($results, false);
    }    
}