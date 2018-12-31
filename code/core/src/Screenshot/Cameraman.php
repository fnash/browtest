<?php

namespace Browtest\Core\Engine;

use Browtest\Core\Screenshot\Film;
use Symfony\Component\Panther\Client as PantherClient;

/**
 * Screenshot manager
 */
class Cameraman
{
    /**
     * @var string
     */
    private $screenshotsDirectory;

    /**
     * @var PantherClient
     */
    private $pantherClient;

    /**
     * @var Film
     */
    private $film;

    public function __construct(PantherClient $pantherClient, string $screenshotsDirectory = '../../screenshots/')
    {
        $this->pantherClient = $pantherClient;
        $this->screenshotsDirectory = $screenshotsDirectory;
    }

    public function prepareFilm()
    {
        $this->film = new Film();
    }

    public function takeScreenshot($name = '') {
        global $screenshotsCount;
        global $sessionId;

        $dir = sprintf('%s/%s', $this->screenshotsDirectory, $sessionId);
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        if ($name) {
            $name = '-'.$name;
        }

        $this->pantherClient->takeScreenshot(sprintf('%s/%d-%s.png', $dir, $screenshotsCount, $name));

        $screenshotsCount++;
    }

}
