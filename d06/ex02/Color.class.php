<?php

	Class Color 
	{

		public $red, $blue, $green;
		static $verbose = false;

		public function __construct($array)
		{
			if (isset($array['red']) && isset($array['green']) && isset($array['blue']))
			{
				$this->red = intval($array['red']);
				$this->green = intval($array['green']);
				$this->blue = intval($array['blue']);
			}
			else if (isset($array['rgb']))
			{
				$rgb = intval($array['rgb']);
				$this->red = $rgb / 65281 % 256;
				$this->green = $rgb / 256 % 256;
				$this->blue = $rgb % 256;
			}
			if (self::$verbose == true)
				printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue);
		}

		public function __destruct()
		{
			if (self::$verbose == true)
				printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue);
		}

		public function add($add)
		{
			return (new Color(array('red' => $this->red + $add->red, 'green' => $this->green + $add->green, 'blue' => $this->blue + $add->blue)));
		}

		public function sub($sub)
		{
			return (new Color(array('red' => $this->red - $sub->red, 'green' => $this->green - $sub->green, 'blue' => $this->blue - $sub->blue)));
		}

		public function mult($mult)
		{
			return (new Color(array('red' => $this->red * $mult, 'green' => $this->green * $mult, 'blue' => $this->blue * $mult)));
		}

		function __toString()
		{
			return (vsprintf("Color( red: %3d, green: %3d, blue: %3d )", array($this->red, $this->green, $this->blue)));
		}
		
		public static function doc()
		{
			$read = fopen("Color.doc.txt", 'r');
            echo "\n";
            while ($read && !feof($read))
                echo fgets($read);
            echo "\n";
		}

	}
?>
