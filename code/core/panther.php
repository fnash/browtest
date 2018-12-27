<?php

require __DIR__.'/vendor/autoload.php'; // Composer's autoloader

$client = \Symfony\Component\Panther\Client::createChromeClient();



$screenshotsCount = 1;
$sessionId = date('Y_m_d-H_i_s');
function takeScreenshot($name = '') {
    global $screenshotsCount;
    global $sessionId;
    global $client;

    $dir = sprintf('screenshots/%s', $sessionId);
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }

    if ($name) {
        $name = '-'.$name;
    }

    $client->takeScreenshot(sprintf('%s/%d-%s.png', $dir, $screenshotsCount, $name));

    $screenshotsCount++;
}


try {

    $crawler = $client->request('GET', 'http://editorial.backoffice.local.francemm.com/france24/fr'); // Yes, this website is 100% in JavaScript

    //$client->takeScreenshot('1-login.png');
    //$crawler->findElement(\Facebook\WebDriver\WebDriverBy::id('username'))->sendKeys('admin');
    //$crawler->findElement(\Facebook\WebDriver\WebDriverBy::id('password'))->sendKeys('no_password')->submit();
    //$client->takeScreenshot('2-dashboard.png');

    takeScreenshot();
    $form = $crawler->filter('form')->form();
    $form['_username']->setValue('admin');
    $form['_password']->setValue('no_password');
    $client->submit($form);


    $client->takeScreenshot('2-dashboard.png');


    $crawler = $client->request('GET', 'http://editorial.backoffice.local.francemm.com/france24/fr/links/new');
    $form = $crawler->filter('form')->form();
    $form['link[title]']->setValue('title');
    $form['link[externalUrl]']->setValue('http://example.com');
    //$form['link[introduction]']->setValue('intro');
    takeScreenshot();
    //$client->submit($form);


    //$crawler->submit();
    //
    //


} catch (\Exception $exception) {
    \Symfony\Component\VarDumper\VarDumper::dump($exception);
}

//$link = $crawler->selectLink('Support')->link();
//$crawler = $client->click($link);
//
//// Wait for an element to be rendered
//$client->waitFor('.support');
//
//echo $crawler->filter('.support')->text();