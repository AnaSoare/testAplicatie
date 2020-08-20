<?php

	define('projectName', 'web-project.ro');
	define('projectVersion', '1.0.0');


	/* ------------------------- Load yii engine. ------------------------------ */
	$yii = dirname(__FILE__) . '/framework/yii.php';

	require_once($yii);
	/* ------------------------------------------------------------------------- */

	
	/* Check if we are in live mode. */
	/* ----------------------------------------------------------------------------- */
	/*                                   Live Mode                                   */
	/* ----------------------------------------------------------------------------- */
	if (strpos($_SERVER['HTTP_HOST'], projectName) !== false)
	{
		/* --------------------------- Set php error level. ------------------------ */
		ini_set('log_errors', true);
		ini_set('html_errors', false);
		ini_set('error_log', 'error_log.txt');
		ini_set('display_errors', false);
		/* ------------------------------------------------------------------------- */
		
		
		/* --------------------- Config yii web application. ----------------------- */
		$common = require(dirname(__FILE__) . '/protected/common/config/common.php');
		$config = require(dirname(__FILE__) . '/protected/frontend/config/frontend.php');
		
		$my_config = CMap::mergeArray($common, $config);
		/* ------------------------------------------------------------------------- */
	}
	
	else

	/* ----------------------------------------------------------------------------- */
	/*                                   Dev Mode                                    */
	/* ----------------------------------------------------------------------------- */
	{
		/* --------------------------- Set php error level. ------------------------ */
		ini_set('log_errors', true);
		ini_set('html_errors', true);
		ini_set('error_log', 'error_log.txt');
		ini_set('display_errors', true);
		/* ------------------------------------------------------------------------- */

		error_reporting(E_ALL ^ E_NOTICE);

		defined('YII_DEBUG') or define('YII_DEBUG', true);
		defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);


		/* --------------------- Config yii web application. ----------------------- */
		$common = require(dirname(__FILE__) . '/protected/common/config/common.php');
		$config = require(dirname(__FILE__) . '/protected/frontend/config/frontend.php');
		$devel = require(dirname(__FILE__) . '/protected/common/config/devel.php');
		
		$my_config = CMap::mergeArray($common, $config);
		$my_config = CMap::mergeArray($my_config, $devel);
		/* ------------------------------------------------------------------------- */


		/* Get only the last adminEmail. */
		if (count($my_config['params']['adminEmail']) > 1) {
			array_shift($my_config['params']['adminEmail']);
		}

		/* Get only the last contactEmail. */
		if (count($my_config['params']['contactEmail']) > 1) {
			array_shift($my_config['params']['contactEmail']);
		}
	}


	/* ---------------- Create and run yii web application. -------------------- */
	Yii::createWebApplication($my_config)->run();
	/* ------------------------------------------------------------------------- */
?>