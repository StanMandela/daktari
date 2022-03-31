<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class : Email Authentication
 * @author : Cyrus Muchiri
 * @version : 1.0.0
 * @since : 6th November 2020
 */

$config = array(
	'protocol' => 'smtp',
	'smtp_host' => 'smtp.gmail.com',
	'smtp_port' => 587,
	'smtp_user' => 'cyrusmuchirichomba@gmail.com',
	'smtp_pass' => 'Cyrus@8429',
	'smtp_crypto' => 'tls',
	'mailtype' => 'text',
	'smtp_timeout' => '30',
	'charset' => 'iso-8859-1',
	'wordwrap' => TRUE
);
