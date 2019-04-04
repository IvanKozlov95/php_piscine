<?php

require_once 'Color.class.php';

class Vertex {
  public static $verbose = False;

	private $_x;
	private $_y;
	private $_z;
	private $_w;
  private $_color;

	public static function doc() {
		return file_get_contents("./Vertex.doc.txt");
  }

	function __construct( array $kwargs ) {
		$this->_x = $kwargs['x'];
		$this->_y = $kwargs['y'];
		$this->_z = $kwargs['z'];
    $this->_w = $kwargs['w'] ?? 1.0;
    $this->_color = $kwargs['color'] ?? new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
		
		if ( Vertex::$verbose === True ) {
			print( $this . " constructed" . PHP_EOL);
		}
	}
	function __destruct() {
		if ( Vertex::$verbose === True ) {
			print( $this . " destructed" . PHP_EOL);
		}
	}
	function __toString() {
		$str= sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f"
						   , $this->_x, $this->_y, $this->_z, $this->_w);
		if ( Vertex::$verbose == True ) {
			$str = $str . ", " . $this->_color;
		}
		return $str . " )";
  }

  public function getX()
  {
      return $this->_x;
  }
  public function setX($x)
  {
      $this->_x = $x;
  }
  public function getY()
  {
      return $this->_y;
  }
  public function setY($y)
  {
      $this->_y = $y;
  }
  public function getZ()
  {
      return $this->_z;
  }
  public function setZ($z)
  {
      $this->_z = $z;
  }
  public function getW()
  {
      return $this->_w;
  }
  public function setW($w)
  {
      $this->_w = $w;
  }
  public function getColor()
  {
      return $this->_color;
  }
  public function setColor($color)
  {
      $this->_color = $color;
  }
}
?>