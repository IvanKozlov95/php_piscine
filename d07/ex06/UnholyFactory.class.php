<?php
	class UnholyFactory
	{
		private $types = array();

		public function absorb($type)
		{
			if ($type instanceof Fighter)
			{
				if (in_array($type, $this->types))
					print("(Factory already absorbed a fighter of type ");
				else
				{
					print("(Factory absorbed a fighter of type ");
					$this->types[] =  $type;
				}
				print($type->getType() . ")" . PHP_EOL);
			}
			else
				print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
		}

		private function ft_change($tmp)
		{
			if ($tmp === "foot soldier")
				return "Footsoldier";
			else if ($tmp === "llama")
				return "Llama";
			else if ($tmp === "archer")
				return "Archer";
			else if ($tmp === "assassin")
				return "Assassin";
		}

		public function fabricate($type)
		{
			$mapper = [
				"foot soldier" => "Footsoldier",
				"llama" => "Llama",
				"archer" => "Archer",
				"assassin" => "Assassin",
			];
			$class_type = $mapper[$type];

			foreach ($this->types as $value) {
				if (get_class($value) === $class_type)
				{
					$new = clone $value;
					print("(Factory fabricates a fighter of type " . $type . ")". PHP_EOL);
					return ($new);
				}
			}

			print("(Factory hasn't absorbed any fighter of type ". $type . ")". PHP_EOL);
		}
	}
?>