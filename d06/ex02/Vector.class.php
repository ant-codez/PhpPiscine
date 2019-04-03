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
                printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
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
