<?php

define("ROOT", dirname(__DIR__));
const DEBUG = 1;
const ERROR_LOG_FILE = ROOT . '/tmp/error.log';
const WWW = ROOT . '/public';
const APP = ROOT . '/app';
const CONFIG = ROOT . '/config';
const CORE = ROOT . '/core';
const HELPERS = ROOT . '/helpers';
const VIEWS = APP . '/Views';
const LAYOUT = 'default';
const PATH = 'https://frm.loc';

const DB = [
    'host' => 'MariaDB-10.11',
    'dbname' => 'frm_loc',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8mb4',
    'options' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
];