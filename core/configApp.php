<?php

    const SERVIDOR = "localhost";
    const BASE_DATOS = "cisvo";
    const USUARIO = "root";
    const CLAVE = "";

    const SGBD = "mysql:host=".SERVIDOR.";dbname=".BASE_DATOS;

    /**CONSTANTES DE CIFRADO */
    const METHOD = "AES-256-CBC";
    const SECRET_KEY = 'CV@2020';
    const SECRET_IV = '2020';