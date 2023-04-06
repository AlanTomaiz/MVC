<?php

/**
 * Developer: Alanderson Tomaiz
 * Date: 06/04/2023
 */

define("ENVIRONMENT", "dev");
define("DISPLAY_ERRORS", true);
define("ROOT_DIR", $_SERVER["DOCUMENT_ROOT"]);


/** ### DATABASE ### */
define("CONF_DB_HOST", "localhost");
define("CONF_DB_NAME", "painel");
define("CONF_DB_USER", "root");
define("CONF_DB_PASS", "helloworld");


/** ### SEO ### */
define("BASEURL", "https://" . $_SERVER['HTTP_HOST']);
define("SEO_SITE_NAME", "");
define("SEO_SITE_SUBTITLE", "");
define("SEO_SITE_DESCRIPTION", "");
define("SEO_SITE_KEYWORDS", "");
define("SEO_FB_ID", "");
define("SEO_SITE_IMAGE", "");
define("SEO_SITE_FAVICON", "");
define("SEO_SITE_LOCALE", "pt_BR");


/** ### DATAS ### */
define("CONF_DATE_HOUR", "Y-m-d H:i:s");
define("CONF_DATE", "Y-m-d");

define("CONF_DATE_HOUR_BR", "d/m/Y H:i:s");
define("CONF_DATE_BR", "d/m/Y");
