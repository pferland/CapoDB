<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

global $WWWconfig;
#SQL Settings
$WWWconfig['SQL']['host']    =  "localhost";
$WWWconfig['SQL']['srvc']    =  "mysql";
$WWWconfig['SQL']['db_user'] =  "root";
$WWWconfig['SQL']['db_pwd']  =  "wires169";
$WWWconfig['SQL']['db']      =  "CapoDB";
$WWWconfig['SQL']['collate'] =  "utf8";
$WWWconfig['SQL']['engine']  =  "innodb";

#HTTP settings
$WWWconfig['http']['smarty_path']               =   '/wifidb/smarty/';
$WWWconfig['http']['default_index_page_size']   =   '50';
