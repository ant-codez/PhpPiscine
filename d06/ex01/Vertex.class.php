<?php

	require_once "Color.class.php";	

	Class Vertex
	{
		private $_x, $_y, $_z, $_color, $_w = 1.0;
		static $verbose = false;

        public function __construct($input)
        {
              $this->_x = floatval($input['x']);
              $this->_y = floatval($input['y']);
              $this->_z = floatval($input['z']);
               if (isset($input['w']) && !empty($input['w']))
                  $this->_w = floatval($input['w']);
 
              if (isset($input['color']) && !empty($input['color']) && $input['color'] instanceof Color)
                  $this->_color = $input['color'];
              else
                  $this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
 
              if (self::$verbose == true)
                  printf("Vertex( x: %0.2f, y: %0.2f, z: %0.2f, w: %0.2f, Color( red: %3d, green: %3d, blue: %3d ) ) constructed\n",
                      $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
		}

		public function __destruct()
		{
			if (self::$verbose == true)
                  printf("Vertex( x: %0.2f, y: %0.2f, z: %0.2f, w: %0.2f, Color( red: %3d, green: %3d, blue: %3d ) ) destructed\n",
                      $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
		}

		function __toString()
		{
			if (self::$verbose == true)
				return (vsprintf("Vertex( x: %0.2f, y: %0.2f, z: %0.2f, w: %0.2f, Color( red: %3d, green: %3d, blue: %3d ) )", array($this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue)));
            return (vsprintf("Vertex( x: %0.2f, y: %0.2f, z: %0.2f, w: %0.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
		}


		public static function doc()
		{
			$read = fopen("Vertex.doc.txt", 'r');
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
