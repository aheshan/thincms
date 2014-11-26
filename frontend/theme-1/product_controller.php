<?php
require '../vendor/autoload.php';

$twig = TwigLoader::getInstance()->getTwigObject();
 
$template = $twig->loadTemplate('product.html.twig');

echo $template->render(array('the' => 'variables', 'go' => 'here'));

?>