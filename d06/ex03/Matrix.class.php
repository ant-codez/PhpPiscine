<?php

	Class Matrix
	{
		const IDENTITY = 'IDENTITY';
		const SCALE = 'SCALE';
		const RX = 'Ox ROTATION';
		const RY = "Oy ROTATION";
		const RZ = "Oz ROTATION";
		const TRANSLATION = "TRANSLATION";
		const PROJECTION = "PROJECTION";

		private $_preset, $_scale, $_vtc, $_fov, $_ratio, $_near, $_far, $_angle;
		static $verbose = false;
		protected $matrix = array();

		public function __construct($array)
		{
			if (isset($array['preset']) && !empty($array['preset']))
				$this->_preset = $array['preset'];
			if (isset($array['scale']) && !empty($array['scale']))
				$this->_scale = $array['scale'];
			if (isset($array['angle']) && !empty($array['angle']))
				$this->_angle = $array['angle'];
			if (isset($array['vtc']) && !empty($array['vtc']))
				$this->_vtc = $array['vtc'];
			if (isset($array['fov']) && !empty($array['fov']))
				$this->_fov = $array['fov'];
			if (isset($array['ratio']) && !empty($array['ratio']))
				$this->_ratio = $array['ratio'];
			if (isset($array['near']) && !empty($aray['near']))
				$this->_near = $array['near'];
			if (isset($array['far']) && !empty($array['far']))
				$this->_far = $array['far'];
			$this->createMatrix();

			if (self::$verbose == true)
			{
				if ($this->_preset == self::IDENTITY)
					echo "Matrix ". $this->_preset . " instance constructed\n";
				else
					echo "Matrix " . $this->_preset . " preset instance constructed\n";
			}
			$this->init();
		}

		private function init()
		{
			switch ($this->_preset) 
			{
				case (self::IDENTITY):
					$this->identity(1);
					break;
				case (self::TRANSLATION):
					$this->translation();
					break;
				case (self::SCALE):
					$this->identity($this->_scale);
					break;
				case (self::RX):
					$this->rotX();
					break;
				case (self::RY):
					$this->rotY();
					break;
				case (self::RZ):
					$this->rotZ();
					break;
				case (self::PROJECTION):
					$this->project();
					break;
				default:
					echo "ERROR\n";
					break;
			}
		}

		private function project()
		{
			//echo $this->_ratio;
			$this->identity(1);
			$this->matrix[5] = $this->_fov;
			$this->matrix[0] = 
			$this->matrix[10] = (-$this->_near - $this->_far) / ($this->_near - $this->_far);
            $this->matrix[14] = -1;
            $this->matrix[11] = (2 * $this->_near * $this->_far) / ($this->_near - $this->_far);
			$this->matrix[15] = 0;
		}

		private function rotZ()
		{
			$this->identity(1);
			$this->matrix[0] = cos($this->_angle);
			$this->matrix[1] = -sin($this->_angle);
			$this->matrix[4] = sin($this->_angle);
			$this->matrix[5] = cos($this->_angle);
			$this->matrix[10] = 1;
		}

		private function rotY()
		{
			$this->identity(1);
			$this->martix[0] = cos($this->_angle);
			$this->martix[2] = sin($this->_angle);
			$this->martix[5] = 1;
			$this->matrix[8] = -sin($this->_angle);
			$this->matrix[10] = cos($this->_angle);
		}
		private function rotX()
		{
			$this->identity(1);
			$this->matrix[0] = 1;
			$this->matrix[5] = cos($this->_angle);
			$this->matrix[6] = -sin($this->_angle);
			$this->matrix[9] = sin($this->_angle);
			$this->matrix[10] = cos($this->_angle);
		}

		private function translation()
		{
			$this->identity(1);
			$this->matrix[3] = $this->_vtc->getX();
			$this->matrix[7] = $this->_vtc->getY();
			$this->martrix[11] = $this->_vtc->getZ();
		}

		private function identity($scale)
		{
			$this->matrix[0] = $scale;
			$this->matrix[5] = $scale;
			$this->matrix[10] = $scale;
			$this->matrix[15] = 1;
		}

		private function createMatrix()
		{
			for ($i = 0; $i < 16; $i++)
				$this->matrix[$i] = 0;
		}

		function __toString()
        {
            $tmp = "M | vtcX | vtcY | vtcZ | vtxO\n";
            $tmp .= "-----------------------------\n";
            $tmp .= "x | %0.2f | %0.2f | %0.2f | %0.2f\n";
            $tmp .= "y | %0.2f | %0.2f | %0.2f | %0.2f\n";
            $tmp .= "z | %0.2f | %0.2f | %0.2f | %0.2f\n";
            $tmp .= "w | %0.2f | %0.2f | %0.2f | %0.2f";
            return (vsprintf($tmp, array($this->matrix[0], $this->matrix[1], $this->matrix[2], $this->matrix[3], $this->matrix[4], $this->matrix[5], $this->matrix[6], $this->matrix[7], $this->matrix[8], $this->matrix[9], $this->matrix[10], $this->matrix[11], $this->matrix[12], $this->matrix[13], $this->matrix[14], $this->matrix[15])));
        }

		public static function doc()
        {
            $read = fopen("Matrix.doc.txt", 'r');
            echo "\n";
            while ($read && !feof($read))
                echo fgets($read);
            echo "\n";
        }
	}

?>
