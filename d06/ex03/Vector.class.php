<?php
	
	require_once "Vertex.class.php";
	Class Vector
	{
		private $_x, $_y, $_z, $_w = 0;
		static $verbose = false;
		public function __construct($input)
		{
			if (isset($input['dest']) && $input['dest'] instanceof Vertex)
			{
				if (isset($input['orig']) && $input['orig'] instanceof Vertex)
					$orig = new Vertex(array('x' => $input['orig']->getX(), 'y' => $input['orig']->getY(), 'z' => $input['orig']->getZ()));
				else
					$orig = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0));
				$this->_x = $input['dest']->getX() - $orig->getX();
				$this->_y = $input['dest']->getY() - $orig->getY();
				$this->_z = $input['dest']->getZ() - $orig->getZ();
				$this->_w = 0;
			}
			if (Self::$verbose)
                printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
		}
		public function __destruct()
		{
			if (Self::$verbose)
                printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
                }
                public function magnitude()
                {
                    $mag = sqrt($this->_x ** 2 + $this->_y ** 2 + $this->_z ** 2);
                    return ((float)$mag);
                }
                public function normalize()
                {
                    $norm = $this->magnitude();
                    if ($norm > 0)
                        return new Vector(array('dest' => new Vertex(array('x' => $this->_x / $norm, 'y' => $this->_y / $norm, 'z' => $this->_z / $norm))));
                    else
                        return clone $this;
                }
                public function add(Vector $rhs)
                {
                    return new Vector(array('dest' => new Vertex(array('x' => $this->_x + $rhs->_x, 'y' => $this->_y + $rhs->_y, 'z' => $this->_z + $rhs->_z))));
                }
                public function sub(Vector $rhs)
                {
                    return new Vector(array('dest' => new Vertex(array('x' => $this->_x - $rhs->_x, 'y' => $this->_y - $rhs->_y, 'z' => $this->_z - $rhs->_z))));
                }
                public function opposite()
                {
                    return new Vector(array('dest' => new Vertex(array('x' => $this->_x * -1, 'y' => $this->_y * -1, 'z' => $this->_z * -1))));
                }
                public function scalarProduct($k)
                {
                    return new Vector(array('dest' => new Vertex(array('x' => $this->_x * $k, 'y' => $this->_y * $k, 'z' => $this->_z * $k))));
                }
                public function dotProduct(Vector $rhs)
                {
                    return (float)(($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + ($this->_z * $rhs->_z));
                }
                public function cos(Vector $rhs)
                {
                    return ((($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + ($this->_z * $rhs->_z)) / sqrt((($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z)) * (($rhs->_x * $rhs->_x) + ($rhs->_y * $rhs->_y) + ($rhs->_z * $rhs->_z))));
                }
                public function crossProduct(Vector $rhs)
                {
                    return new Vector(array('dest' => new Vertex(array(
                        'x' => $this->_y * $rhs->getZ() - $this->_z * $rhs->getY(),
                        'y' => $this->_z * $rhs->getX() - $this->_x * $rhs->getZ(),
                        'z' => $this->_x * $rhs->getY() - $this->_y * $rhs->getX()))));
                }
		public function __tostring()
		{
			return (vsprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
		}
		public static function doc()
                {
                $read = fopen("Vector.doc.txt", 'r');
                echo "\n";
                while ($read && !feof($read))
                    echo fgets($read);
                echo "\n";
                }
		public function getX()
		{
			return $this->_x;
		}
		public function getY()
		{
			return $this->_y;
		}
		public function getZ()
		{
			return $this->_z;
		}
		public function getW()
		{
			return $this->_w;
		}
	}
?>
