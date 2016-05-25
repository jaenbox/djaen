TIKETING
========

A Symfony 2.8 project.

Proyecto final CGFS DAW
=======================
Tutor colectivo: Pablo Vercer
Tutor individual: Carlos Sanchez
Curso: CFGS Desarrollo Apliaciones Web - 2014/2016
Centro Centro específico de educación a distancia de la Comunidad Valenciana

Sistema de ticketing, creación de incidencias. Utiliza el gestor de base de datos PostgreSQL

db.dump
Contiene la base de datos a importar en local. Una vez clonado el proyecto nos situamos en la consola linux y ejecutamos

DB=ticketing && createdb -E UTF8 -T template0 --locale=es_ES.UTF-8 $DB && pg_restore --no-acl -O -d $DB <  db.dump

Con esta base de datos dispondremos de varios usuarios predefinidos.

admin  / admin   / ROLE_SUPER_ADMIN
admin1 / admin1 / ROLE_SUPER_ADMIN

tecnico  / tecnico  / ROLE_TEC
tecnico1 / tecnico1 / ROLE_TEC

help  / help  / ROLE_HELP
help1 / help1 / ROLE_HELP

cliente  / cliente  / ROLE_USER
cliente1 / cliente1 / ROLE_USER