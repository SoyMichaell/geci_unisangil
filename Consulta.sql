SELECT * FROM empresas_2020 WHERE Id = 6442;

SELECT * FROM muestra INNER JOIN empresas_2020 ON muestra.id_muestra = empresas_2020.Id 

SELECT municipio, count(*) as cuenta FROM empresas_2020 GROUP BY municipio

SELECT nombre_categoria, count(*) as cuenta FROM empresas_2020 INNER JOIN categoria ON empresas_2020.categoria = categoria.id_categoria GROUP BY nombre_categoria

SELECT municipio, count(*) as cuenta FROM muestra INNER JOIN empresas_2020 ON muestra.id_muestra=empresas_2020.Id GROUP BY municipio

SELECT * FROM muestra INNER JOIN empresas_2020 ON muestra.id_muestra = empresas_2020.Id

SELECT * FROM empresas_2020 ORDER BY municipio ASC

alter table persona AUTO_INCREMENT=1;

SELECT * FROM muestra WHERE (id_muestra = 1 AND estado_encuesta 0 = 'Sin responder')

SELECT * FROM muestra WHERE id_empresa = 12106

ALTER TABLE t_categoria AUTO_INCREMENT=1


SELECT id_aprendiz,COUNT(*) AS cuenta FROM muestra GROUP BY id_aprendiz

SELECT * FROM muestra WHERE id_aprendiz = '18'

SELECT nombre_tipo_ccc, COUNT(*) AS tipoOr FROM empresas_2020 
INNER JOIN tipo_empresa_cc ON empresas_2020.organizacion = tipo_empresa_cc.id_tipo_cc 
GROUP BY nombre_tipo_ccc

SELECT count(*) FROM empresas_2020
INNER JOIN muestra ON empresas_2020.Id = muestra.id_empresa 
WHERE SUBSTR(ciiu_actividad1,1 ,1) = 'U'

SELECT descripcion_economica,COUNT(*) FROM empresas_2020 
WHERE SUBSTR(id_actividad,8,8) = SUBSTR(ciiu_actividad1,1,1)  

SELECT count(*) FROM empresas_2020 WHERE SUBSTR(ciiu_actividad1,1 ,1) = 'U'

SELECT * FROM muestra INNER JOIN empresas_2020 ON muestra.id_empresa = empresas_2020.Id


SELECT nombreSPr, COUNT(*) AS cuenta  FROM programa INNER JOIN sedeprograma ON programa.fkidsedePr = sedeprograma.idsedePr WHERE fkidsedePr = 1 GROUP BY nombreSPr


SELECT * FROM saberpro 
            INNER JOIN persona ON saberpro.codigoEstudiante=persona.id
            INNER JOIN sede ON saberpro.codigoSede=sede.idSede
            INNER JOIN facultad ON saberpro.codigoFacultad=facultad.idFacultad
            INNER JOIN programas ON saberpro.codigoPrograma=programas.idPrograma
            
            SELECT id_municipio, municipio FROM t_municipio WHERE id_departamento_m = 20 ORDER BY municipio ASC
            
            
            ALTER TABLE CONVENIO AUTO_INCREMENT=1;
ALTER TABLE departamentos AUTO_INCREMENT=1;
ALTER TABLE docentes AUTO_INCREMENT=1;
alter TABLE egresados AUTO_INCREMENT=1;
alter table estado_programas AUTO_INCREMENT=1;
alter table estudiantes AUTO_INCREMENT=1;
alter table extension AUTO_INCREMENT=1;
alter table facultades AUTO_INCREMENT=1;
alter table investigacion AUTO_INCREMENT=1;
alter table metodologia AUTO_INCREMENT=1;
alter table movilidad AUTO_INCREMENT=1;
alter table municipios AUTO_INCREMENT=1;
alter table nivelformacion AUTO_INCREMENT=1;
ALTER TABLE periodo AUTO_INCREMENT=1;
alter table practicas AUTO_INCREMENT=1;
alter table programas AUTO_INCREMENT=1;
alter table programa_ciclos AUTO_INCREMENT=1;
alter table pruebas_saber AUTO_INCREMENT=1;
ALTER TABLE redes_academicas AUTO_INCREMENT=1;
alter table software AUTO_INCREMENT=1;
ALTER TABLE tipo_documento AUTO_INCREMENT=1;
ALTER TABLE tipo_usuario AUTO_INCREMENT=1;
alter table trabajo_grado AUTO_INCREMENT=1;
alter table users AUTO_INCREMENT=1;
alter table uso_laboratorio AUTO_INCREMENT=1;proyecto


SELECT * FROM programas INNER JOIN programas_plan_estudio ON programas.id=programas_plan_estudio.pp_id_programa 

SELECT * FROM persona WHERE persona.per_tipo_usuario = 2 OR persona.per_tipo_usuario = 5

SELECT * FROM persona INNER JOIN docente_asignatura ON persona.id = docente_asignatura.doa_id_docente WHERE 

SELECT * FROM persona 
INNER JOIN docente_contrato ON persona.id = docente_contrato.doco_persona_docente 
WHERE (((doco_persona_docente = 22) || (doco_persona_docente = 23)) && (doco_rol = 'jurado-tesis'))

SELECT * FROM persona 
INNER JOIN estudiante 
WHERE (persona.id = 27 || estudiante.id = 27)

SELECT * FROM prueba_saber_modulo
	WHERE prsamo_id_estudiante = 10
	
	
	
	
	SELECT * FROM prueba_saber_pro_modulo WHERE (prsaprmo_id_estudiante = 10 AND prsaprmo_id_modulo = 1)
	
	
	SELECT * FROM persona 
		INNER JOIN estudiante ON persona.id = estudiante.estu_id_estudiante
		INNER JOIN estudiante_administrativo ON persona.id = estudiante_administrativo.estuad_id_persona
		
		SELECT * FROM inv_investigador 
			INNER JOIN persona ON inv_investigador.inves_id_persona = persona.id
			INNER JOIN inv_grupo_investigacion ON inv_investigador.inves_id_persona = inv_grupo_investigacion.id