 <?php
	/*
		A l'instantiation de la Bdd, la connexion � la BDD est effectu�e.
		Cette connexion ne doit �re effectu�e qu'une seule fois.
		Il faut donc appliquer le pattern singleton.
	*/
	
	class Bdd
	{
		private $;
		private $;
		
		private function Bdd()
		{			
		}
		
		public function __construct()
		{
			switch(func_num_args())
			{
				case :
					Bdd();
					break;
					
				default:
					die("Bdd::__construct() : Nombre de param�tres incorrect");
			}
		}
	}
 ?>
 