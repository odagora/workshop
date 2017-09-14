<?php

//list of matrices names
$names= array(
	'1' => 'Instrumentos y equipamento',
	'2' => 'Alumbrado exterior',
	'3' => 'Presentación del vehículo',
	'4' => 'Control debajo del capot',
	'5' => 'Prueba de ruta',
	'6' => 'Desgaste de las llantas (%)',
	'7' => 'Presión de las llantas (psi)'
	);

//list of options
$loptions= array(
	'1' => 'B',
	'2' => 'M',
	'3' => 'N/A');

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
	'1' => 'Inmediato:',
	'2' => 'De ser posible:',
	'3' => 'A prever:',
	'4' => 'Observaciones:'
	);

//list of matrices info
$list = array(
	'1' => array(
				'1'	=>  'Indicadores y luces de bordo',
				'2' =>	'Reloj a la hora',
				'3' =>	'Cocuyos',
				'4' =>	'Encendido radio (código)',				
				'5' =>	'Ventilación, calefacción, A/A',			
				'6' =>	'Accionamiento y sonido pito',				
				'7' =>	'Limpiabrisas (eficacia)',				
				'8' =>	'Activación alarma',				
				'9' =>	'Espejos retrovisores',				
				'10' =>	'Elevavidrios (programación)',				
				'11' =>	'Bloqueo central (programación)',			
				'12' =>	'Sonido de parlantes',
				'13' => 'Activación sensor reverso',
				'14' => 'Presencia copa de seguridad',
				'15' => 'Presencia documentos vehículo',
				'16' => 'Carga y vencimiento extinguidor',
				'17' => 'Programación cambio de aceite'											
			),
	'2' => array(
				'1' => 'Luz baja, media y alta',				
				'2' => 'Direccionales, repetidores',
				'3' => 'Stops',
				'4' => 'Reversa',
				'5' => 'Guantera, luz techo, baúl',
				'6' => 'Exploradoras y antiniebla',				
			),
	'3' => array(
				'1' => 'Limpieza carteras, cinturones',				
				'2' => 'Limpieza millaré y guarnecidos',			
				'3' => 'Limpieza exterior (chapas, etc)'
			),
	'4' => array(
				'1' => 'Nivel aceite motor y ajuste filtro',		
				'2' => 'Nivel líquido de frenos',				
				'3' => 'Nivel líquido refrigerante',				
				'4' => 'Nivel aceite de caja',				
				'5' => 'Nivel hidráulico de dirección',				
				'6' => 'Agua limpiabrisas del. y tras',				
				'7' => 'Fijación y ajuste bornes batería',			
				'8' => 'Presencia de tapas, obturadores',			
				'9' => 'Presencia del protector motor'
			),
	'5' => array(
				'1'	=> 'Centrado del timón',		
				'2'	=> 'Cambio de marchas neutro y andando',		
				'3'	=> 'Rendimiento y aceleración',				
				'4'	=> 'Temperatura de motor',				
				'5'	=> 'Encendido en frío y caliente',				
				'6'	=> 'Efectividad y estabilidad frenado',
				'7'	=> 'Especificación ruidos suspensión y dirección'
			),
	'6' => array(
				'1' => 'Delantera izquierda',				
				'2' => 'Delantera derecha',				
				'3' => 'Trasera izquierda',			
				'4' => 'Trasera derecha'			
			),
	'7' => array(
				'1' => 'Delantera izquierda',				
				'2' => 'Delantera derecha',				
				'3' => 'Trasera izquierda',			
				'4' => 'Trasera derecha'
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
	'4' => 'comment4'
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

?>