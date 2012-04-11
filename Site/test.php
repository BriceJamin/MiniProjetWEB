<?php
	$A = "A existe<br />";
	
	// Recup  de $A avec global
	// Changement de sa valeur
	function b()
	{
		global $A;		
		$A = "A existe et a été modifiée<br />";
	}
	
	// Recup de $A et test de sa valeur
	// => $A a bien été modifiée par b()
	function c()
	{
		global $A;
		if(isset($A))
			echo $A;
		else
			echo "A n'existe pas <br />";
	}
	
	// Idem que c() mais avec $GLOBALS[]
	function d()
	{
		if($GLOBALS['A'] == true)
			echo $GLOBALS['A'];
		else
			echo "A n'existe pas <br />";		
	}
	
	// Recup d'une variable qui n'existe pas
	// => Ca ne la crée pas.
	function e()
	{
		global $B;
		if(isset($B))
			echo "B existe";
		else
			echo "B n'existe pas"; 
	}
	
	// Devant être appelée par g et h
	// Pour voir si elles récuperent leurs variables
	function f()
	{
		global $C;
		
		if(isset($C))
			echo $C;
		else
			echo "C n'existe pas";
			
		
	}
	
	// Création d'une variable normale et appel de f()
	function g()
	{
		$C = "C existe";
		f();
	}
	
	// Création d'une variable et appel de f()
	function h()
	{
		global $C;
		$C = "C existe";
		f();
	}
	
	// Création d'une variable normale et appel de f()
	function i()
	{
		$C = "C existe";
		global $C;
		f();
	}
	
	
	echo "b :<br />"; b();
	echo "c :"; c();
	echo "d :"; d();
	echo "e :"; e();
	
	echo "g :"; g();
	echo "h :"; h();
	echo "i :"; i();
	
?>