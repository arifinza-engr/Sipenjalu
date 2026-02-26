<?php

session_set_cookie_params(0, '/', '', false, true);
session_start();

// Include required files
require_once "inc/koneksi.php";
require_once "inc/functions.php";

// Get user session data with early return
$userData = getUserSessionData();

// Make userData globally available for templates
global $userData;

// Fetch API keys
$api_key = getApiKey($koneksi, GOOGLE_MAPS_API);
$api_whatsapp = getApiKey($koneksi, WHATSAPP_FONTE_API);

// Include templates
include "templates/header.php";
include "templates/navigation.php";
include "templates/main.php";
include "templates/footer.php";
?>