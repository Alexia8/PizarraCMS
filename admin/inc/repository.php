<?php

//Action and error Messages for views
//==================================================
define("IN_MSG", "creado correctamente");
define("DEL_MSG", "Eliminado correctamente");
define("UP_MSG", "actualizado correctamente");
define("REG_MSG", "Registrado correctamente");
define("REC_MSG", "Cambio de contraseña solicitado correctamente");
define("EMAIL_MSG", "Registrado correctamente pero no se ha podido mandar email");
define("REP_MSG", "ya existe! Actualiza");
define("ERROR_MSG", "Error! Contacta con admin (unimelinformatica@gmail.com)");
define("PASS_MSG", "Contraseñas no coinciden");
define("EMPTY_MSG", "rellena Campo(s) vacio(s)");
define("OB_MSG", "rellena Campos obligatorios*");
define("ERRORUSER_MSG", "Invalido");
define("REPUSER_MSG", "usuario ya existe");
define("ACTIVATEUSER_MSG", "activado correctamente");
define("DEACTIVATEUSER_MSG", "deactivado correctamente");
define("SEL_MSG", "Elige para modificar");
define("FILTER_MSG", "No se ha seleccionado ningún filtro");
define("FAIL_MSG", "Ha surgido un error");
define("FAILDEL_MSG", "Error! No se puede eliminar, tiene datos asociados");
define("ASSIGN_MSG", "Profesor asignado correctamente");
define("Activate_MSG", "activado correctamente");
define("EMPTYTEACH_MSG", "no hay profesores");
define("EMPTYPAY_MSG", "no hay pagos");
define("ERROR404", "No se encuentra la pagina que intentas acceder");

//Student related messages
//============================================================================
define("FAILNUMF_MSG", "Número fijo Incorrecto. Debe contener 9 digitos");
define("FAILNUM_MSG", "Número móvil Incorrecto. Debe contener 9 digitos");
define("FAILDNI_MSG", "DNI Incorrecto. Debe contener 8 digitios y 1 letra");
define("FAILCP_MSG", "Codigo Postal Incorrecto. Debe contener 5 números");
define("FAILIBAN_MSG", "IBAN Incorrecto. Debe empezar por las letras ES y contener 22 números");
define("FAILSTU_MSG", "Alumno no existe");
define("EMPTYSTU_MSG", "No hay alumnos");
define("EMPTYSTUG_MSG", "No hay alumnos activos en este grupo");
define("EMPTYSTUC_MSG", "Selecciona alumno(s)");
define("EMPTYCLASS_MSG", "No hay Aulas");
define("EMPTYT_MSG", "No hay profesores");
define("EMPTYCOURSE_MSG", "No hay ninguna Especialidad activa en");
define("EMPTYGROUP_MSG", "No hay ningún Grupo activo en");
define("EMPTYACADEMY_MSG", "No hay Sedes");
define("REFPAY_MSG", "Pago devuelto correctamente");

//Total count Text
//================================================================================
define("TOTALCLASS_MSG", "Total Aulas:");
define("TOTALSTU_MSG", "Total Alumnos:");
define("TOTALT_MSG", "Total Profesores:");
define("TOTALSTUG_MSG", "Total Alumnos activos en este grupo:");

//Text Titles
//===========================================================================
define("TITLE_PAID", "Pagos");
define("TITLE_UNPAID", "Impagos");
define("TITLE_UPACADEMY", "Actualizar Sede");
define("TITLE_NEWACADMY", "Nueva Sede");
define("TITLE_DELACADEMY", "Eliminar Sede");
define("TITLE_UPCOURSE", "Actualizar Especialidad");
define("TITLE_NEWCOURSE", "Nueva Especialidad");
define("TITLE_DELCOURSE", "Eliminar Especialidad");
define("TITLE_UPGROUP", "Actualizar Grupo");
define("TITLE_NEWGROUP", "Nuevo Grupo");
define("TITLE_DELGROUP", "Eliminar Grupo");
define("TITLE_ASSIGNTEACH", "Asignar profesor");
define("TITLE_AULAS", "Aulas");
define("TITLE_COURSES", "Especialidades Activas");
define("TITLE_GROUPS", "Grupos Activos");
define("TITLE_ENROLLED", "Inscritos");
define("TITLE_CANCELLED", "Bajas");
define("TITLE_FINISHED", "Ex Alumnos");
define("TITLE_SIGNED", "Alta Alumno");
define("TITLE_MODIFYSTU", "Actualizar Alumno");
define("TITLE_INGROUP", "Alumnos Grupo");
define("TITLE_TEACHERS", "Profesores");
define("TITLE_TEACHER", "Profesor:");
define("TITLE_GENERAL", "General");
define("TITLE_ACADEMY", "Sedes");
define("TITLE_SEARCHN", "Buscar Alumno por nombre");
define("TITLE_SEARCH", "Buscar Alumno");
define("TITLE_USER", "Usuarios");
define("TITLE_UPUSER", "Actualizar Usuarios");
define("TITLE_DELUSER", "Eliminar Usuarios");
define("TITLE_PAY", "Añadir Pagos");
define("TITLE_PERSONAL", "Datos Personales");
define("TITLE_ACADEMIC", "Datos Academicos");
define("TITLE_OTHER", "Información Adicional");
define("TITLE_STATS", "Estadisticas");
define("TITLE_TEACHUP", "Actualizar Profesor");
define("TITLE_TEACHIN", "Nuevo Profesor");
define("TITLE_TEACHDEL", "Eliminar Profesor");

//HEADER TITLE
//===============================================================
define("HEADER_TITLE", "Pizarra Admin Platform");
define("HEADER_TITLEH1", "La Pizarra Opositores");


//FOOTER TEXT
//==========================================
define("FOOTER_LINK", "www.lapizarraopositores.com");
define("FOOTER_COPYRIGHT", "© 2017 UNIMEL | LA PIZARRA OPOSITORES All rights reserved");


//ROUTES
//==========================================
define("ROOT_SERVER", "http://plataformapizarra.alexiacdura.com/admin/View");
define("ROOT_ACTIVATE", ROOT_SERVER . "/activate.php");
define("ROOT_HOME", ROOT_SERVER . "/index.php");
define("ROOT_PIZARRA", "http://lapizarraopositores.com");




