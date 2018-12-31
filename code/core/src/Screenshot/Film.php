<?php

namespace Browtest\Core\Screenshot;

/**
 * Screenshot Session
 */
class Film
{
    private $id;

    private $screenshotsCount;

    public function __construct(string $id = null)
    {
        $this->id = ($id === null) ? $this->id = date('Y_m_d-H_i_s') : $id;
        $this->screenshotsCount = 0;
    }
}
