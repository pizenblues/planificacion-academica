<?php
include('../../src/dbconnect.php');
    $query = "SELECT * FROM usuario 
    JOIN estudiante ON usuario.usuario_id = estudiante.estudiante_usuario
    JOIN estudiante_seccion ON estudiante.estudiante_id = estudiante_seccion.es_estudiante
    JOIN seccion ON estudiante_seccion.es_seccion = seccion.seccion_id
    JOIN materia ON seccion.seccion_materia = materia.materia_id
    JOIN horario_seccion ON horario_seccion.hs_seccion = seccion.seccion_id
    JOIN horario ON horario.horario_id = horario_seccion.hs_horario
    JOIN dia ON horario.horario_dia = dia.dia_id
    JOIN salon ON horario.horario_salon = salon.salon_id
    JOIN bloque ON horario.horario_bloque = bloque.bloque_id
    WHERE login = '{$login}'
    ORDER BY bloque,dia";

    $sql = mysql_query($query, $connect);
    $materias = array();

    while ($fila = mysql_fetch_assoc($sql)) {
      $materias[] = $fila;
    }
    
    foreach($materias as $result) {
      $horario[] =  $result["dia_id"].$result["bloque"];
      $materia[] =  $result["materia_nombre"];
      $salon[] =  $result["salon"];
      $color[] =  $result["materia_color"];
      $hora[] =  $result["bloque_hora"];
    }