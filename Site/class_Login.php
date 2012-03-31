 <?php
	class Login
	{
		private $nom;
		private $mdp;
		
		private function Login($nom, $mdp)
		{
			$this->nom = $nom;
			$this->mdp = $mdp;			
		}
		
		public function __construct()
		{
			switch(func_num_args())
			{
				case 2:
					Login($nom, $mdp);
					break;
					
				default:
					exit("Login::__construct() : Nombre de paramètres incorrect");
			}
		}
	}
 ?>
 