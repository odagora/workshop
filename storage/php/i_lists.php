<?php

//list of matrices names
$names= array(
	'1' => 'Alumbrado exterior',
	'2' => 'Emisiones audibles',
	'3' => 'Suspensión',
	'4' => 'Estabilidad y dirección',
	'5' => 'Compartimiento motor',
	'6' => 'Frenos',
	'7' => 'Accesorios y equipamento',
	'8' => 'Documentos del vehículo',
	'9' => 'Desgaste de las llantas (%)',
	'10' => 'Presión de llantas (psi)',
	'11' => 'Apariencia exterior' 
	);

//list of options
$loptions= array(
	'1' => 'B',
	'2' => 'R',
	'3' => 'M',
	'4' => 'N/A');

//list of options 1
$loptions1= array(
	'1' => '25',
	'2' => '50',
	'3' => '75',
	'4' => '100');

//list of options 2
$loptions2= array(
	'1' => '30',
	'2' => '32',
	'3' => '34',
	'4' => '36');

//list of comments
$lcomments= array(
	'1' => 'Inmediato',
	'2' => 'De ser posible',
	'3' => 'A prever',
	'4' => 'Observaciones',
	'5' => 'Otros latonería y pintura'
	);

//list of matrices info
$list = array(
	'1' => array(
				'1'	=>  'Luces bajas',
				'2' =>	'Luces medias',				
				'3' =>	'Luces altas',				
				'4' =>	'Direccionales',				
				'5' =>	'Repetidores',				
				'6' =>	'Luces de freno',				
				'7' =>	'Luces de reversa',				
				'8' =>	'Luz de guantera',				
				'9' =>	'Luces techo',				
				'10' =>	'Luces baúl',				
				'11' =>	'Exploradoras',				
				'12' =>	'Antinieblas'								
			),
	'2' => array(
				'1' => 'Ruido motor',				
				'2' => 'Ruido pito'				
			),
	'3' => array(
				'1' => 'Amortiguadores delanteros',				
				'2' => 'Amortiguadores traseros',				
				'3' => 'Soportes amortiguadores delanteros',				
				'4' => 'Soportes amortiguadores traseros'
			),
	'4' => array(
				'1' => 'Barra estabilizadora delantera',				
				'2' => 'Barra estabilizadora trasera',				
				'3' => 'Terminales de dirección',				
				'4' => 'Brazos axiales de dirección',				
				'5' => 'Tijera superior',				
				'6' => 'Tijera inferior',				
				'7' => 'Cuna y apoyos delanteros',								
				'8' => 'Biela y caja de dirección',				
				'9' => 'Ejes y guardapolvos',				
				'10' => 'Alineación de dirección'
			),
	'5' => array(
				'1'	=> 'Nivel de aceite y ajuste filtro',				
				'2'	=> 'Nivel líquido de frenos',				
				'3'	=> 'Nivel líquido refrigerante',				
				'4'	=> 'Nivel aceite de caja',				
				'5'	=> 'Nivel hidráulico de dirección',				
				'6'	=> 'Fugas de aceite en general'
			),
	'6' => array(
				'1' => 'Desgaste pastillas delanteras',				
				'2' => 'Desgaste pastillas traseras',				
				'3' => 'Ajuste recorrido freno de mano',				
				'4' => 'Efectividad del frenado',				
				'5' => 'Estabilidad del frenado'			
			),
	'7' => array(
				'1' => 'Elevavidrios',				
				'2' => 'Bloqueo central',				
				'3' => 'Espejos retrovisores',				
				'4' => 'Limpiabrisas delantero y trasero'
			),
	'8' => array(				
				'1' => 'SOAT',				
				'2' => 'Revisión tecnomecánica'
			),
	'9' => array(				
				'1' => 'Llanta delantera izquierda',				
				'2' => 'Llanta delantera derecha',
				'3' => 'Llanta trasera izquierda',
				'4' => 'Llanta trasera derecha',
				'5' => 'Llanta de repuesto'
			),
	'10' => array(				
				'1' => 'Llanta delantera izquierda',				
				'2' => 'Llanta delantera derecha',
				'3' => 'Llanta trasera izquierda',
				'4' => 'Llanta trasera derecha',
				'5' => 'Llanta de repuesto'
			),
	'11' => array(				
				'1' => 'Pintura',				
				'2' => 'Latonería',
				'3' => 'Rines'
			)
	);

//list of radio button matrices names
$elNames = array(
	'1' => 'matrix_1',
	'2' => 'matrix_2',
	'3' => 'matrix_3',
	'4' => 'matrix_4',
	'5' => 'matrix_5',
	'6' => 'matrix_6',
	'7' => 'matrix_7',
	'8' => 'matrix_8',
	'9' => 'matrix_9',
	'10' => 'matrix_10',
	'11' => 'matrix_11'

	);

//list of matrices errors names
$errorNames = array(
	'1' => @$matrix1Err,
	'2' => @$matrix2Err,
	'3' => @$matrix3Err,
	'4' => @$matrix4Err,
	'5' => @$matrix5Err,
	'6' => @$matrix6Err,
	'7' => @$matrix7Err,
	'8' => @$matrix8Err,
	'9' => @$matrix9Err,
	'10' => @$matrix10Err,
	'11' => @$matrix11Err
	);

//list of comments names
$comNames = array(
	'1' => 'comment1',
	'2' => 'comment2',
	'3' => 'comment3',
	'4' => 'comment4',
	'5' => 'comment5'
	);

//List of comments variables
$comVariables = array(
	'1' => @$comment1,
	'2' => @$comment2,
	'3' => @$comment3,
	'4' => @$comment4,
	'5' => @$comment5
	);

//list of comments errors names
$errorNames1 = array(
	'1' => @$comment1Err,
	'2' => @$comment2Err,
	'3' => @$comment3Err,
	'4' => @$comment4Err,
	'5' => @$comment5Err
	);

//list of matrix elements names
$matrixNames = array(
	'1' => array(
				'1' => 'm1_el1',
				'2' => 'm1_el2',
				'3' => 'm1_el3',
				'4' => 'm1_el4',
				'5' => 'm1_el5',
				'6' => 'm1_el6',
				'7' => 'm1_el7',
				'8' => 'm1_el8',
				'9' => 'm1_el9',
				'10' => 'm1_el10',
				'11' => 'm1_el11',
				'12' => 'm1_el12'
		),
	'2' => array(
				'1' => 'm2_el1',
				'2' => 'm2_el2'
		),
	'3' => array(
				'1' => 'm3_el1',
				'2' => 'm3_el2',
				'3' => 'm3_el3',
				'4' => 'm3_el4'
		),
	'4' => array(
				'1' => 'm4_el1',
				'2' => 'm4_el2',
				'3' => 'm4_el3',
				'4' => 'm4_el4',
				'5' => 'm4_el5',
				'6' => 'm4_el6',
				'7' => 'm4_el7',
				'8' => 'm4_el8',
				'9' => 'm4_el9',
				'10' => 'm4_el10'
		),
	'5' => array(
				'1' => 'm5_el1',
				'2' => 'm5_el2',
				'3' => 'm5_el3',
				'4' => 'm5_el4',
				'5' => 'm5_el5',
				'6' => 'm5_el6'
		),
	'6' => array(
				'1' => 'm6_el1',
				'2' => 'm6_el2',
				'3' => 'm6_el3',
				'4' => 'm6_el4',
				'5' => 'm6_el5'
		),
	'7' => array(
				'1' => 'm7_el1',
				'2' => 'm7_el2',
				'3' => 'm7_el3',
				'4' => 'm7_el4'
		),
	'8' => array(
				'1' => 'm8_el1',
				'2' => 'm8_el2'
		),
	'9' => array(
				'1' => 'm9_el1',
				'2' => 'm9_el2',
				'3' => 'm9_el3',
				'4' => 'm9_el4',
				'5' => 'm9_el5'
		),
	'10' => array(
				'1' => 'm10_el1',
				'2' => 'm10_el2',
				'3' => 'm10_el3',
				'4' => 'm10_el4',
				'5' => 'm10_el5'
		),
	'11' => array(
				'1' => 'm11_el1',
				'2' => 'm11_el2',
				'3' => 'm11_el3'
		)
	);

?>