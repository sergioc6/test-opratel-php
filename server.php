<?php

require 'lib/nusoap.php';
require 'data.php';

$namespace = "http://localhost/test-opratel-php/server.php";

$server = new nusoap_server(); // Create a instance for nusoap server

$server->configureWSDL("SOAP TEST-OPRATEL", "urn:index"); // Configure WSDL file

/* Register your function */
$server->register("addUser", // Register Method
        array('username' => 'xsd:string',
    'password' => 'xsd:string',
    'email' => 'xsd:string'), // Method Parameter
        array('status_code' => 'xsd:string'), // Response
        $namespace, // Namespace
        false, // soapaction: (use default)
        "rpc", // style: rpc or document
        "encoded", // use: encoded or literal
        "addUser: parametros: username, password, email (metodo PUT, respuesta: status_code = 0)"               // description: documentation for the method
);

/* Register your function */
$server->register("activateUser", // Register Method
        array('username' => 'xsd:string'), // Method Parameter
        array('status_code' => 'xsd:string'), // Response
        $namespace, // Namespace
        false, // soapaction: (use default)
        "rpc", // style: rpc or document
        "encoded", // use: encoded or literal
        "activateUser: parametros: username (metodo POST, respuesta: status_code = 0)"               // description: documentation for the method
);

/* Register your function */
$server->register("desactivateUser", // Register Method
        array('username' => 'xsd:string'), // Method Parameter
        array('return' => 'xsd:string'), // Response
        $namespace, // Namespace
        false, // soapaction: (use default)
        "rpc", // style: rpc or document
        "encoded", // use: encoded or literal
        "deactivateUser: parametros: username (metodo POST, respuesta: status_code = 0)"               // description: documentation for the method
);

/* Register your function */
$server->register("getUser", // Register Method
        array('username' => 'xsd:string'), // Method Parameter
        array('username' => 'xsd:string',
                'password' => 'xsd:string',
                'email' => 'xsd:string'), // Response
        $namespace, // Namespace
        false, // soapaction: (use default)
        "rpc", // style: rpc or document
        "encoded", // use: encoded or literal
        "getUser: parametros: username (metodo GET, respuesta: username, password, email)"               // description: documentation for the method
);


// Get our posted data if the service is being consumed
// otherwise leave this data blank.
$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';
 
// pass our posted data (or nothing) to the soap service
$server->service($POST_DATA);
exit(); 