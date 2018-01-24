<?php
		$db_host="localhost";
		$db_nombre="malla_ICI";
		$db_usuario="root";
		$db_contraseña="";

		$conexion=mysqli_connect($db_host,$db_usuario,$db_contraseña,$db_nombre);
		
		$codigo="";
		$nombre="";
		$semestre="";

		$fp = fopen("mallaici.txt", "r");
		while(!feof($fp)) {
			$linea =fgets($fp);
			
			if(strlen($linea)<6){
				$semestre=$linea;
			}else{
				$palabras = preg_split('/\s/', $linea, 2, PREG_SPLIT_NO_EMPTY);
				$codigo=$palabras[0];
				$nombre=$palabras[1];
				$insert="INSERT INTO ASIGNATURA(idAsignatura,nombre,semestre,aprobado) values('$codigo','$nombre',$semestre,0)";
				
				if (mysqli_query($conexion, $insert)) {
   				 echo "New record created successfully";
					} else {
   					 echo "Error: " . $insert . "<br>" . mysqli_error($conexion);
						}
				echo $semestre." ".$codigo." ".$nombre;
				echo "<br>";
			}
			}
		fclose($fp);
		mysqli_close($conexion);
	?>