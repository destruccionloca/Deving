<?php
/**
 * STRESS WEB
 * @author S.T.R.E.S.S.
 * @copyright 2008 - 2012 STRESS WEB
 * @version 13
 * @web http://stressweb.ru
 */
if (!defined("STRESSWEB"))
    die();
/**
 **********************************
 * Защита админки IPtable
 * ----------------------
 * $l2cfg["iptable"] может принимать значения true (вкл) / false (выкл)
 * $iptable - диапазон разрешенных IP адресов, может принимать значения:
 * 1. 127.0.0.1 - один ip адрес 
 * 2. array("127.0.0.1", "127.0.0.2") - несколько ip адресов
 * 3. 127.0.0.* - диапазон ip адресов первого уровня
 * 4. 127.0.*.* - диапазон ip адресов второго уровня
 ***********************************
 */
$l2cfg["iptable"] = false;

$iptable = "127.0.0.*";
?>