<?php

declare(strict_types=1);

namespace Zyra;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$lang = new Languages();
$lang->setLanguagePack(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'pt-br.json');

echo '<p>Nome do projeto: ' . $lang->string('PROJECT_NAME') . '</p>';
echo '<p>Versão do projeto: ' . $lang->string('PROJECT_VERSION') . '</p>';
echo '<p>Texto exemplo: ' . $lang->string('TEST_TEXT') . '</p>';

echo $lang->format('PROJECT_NAME', 'h1', '', 'border:1px solid red;');
