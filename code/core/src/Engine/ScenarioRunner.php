<?php

namespace Browtest\Core\Engine;

use Browtest\Core\Scenario;

class ScenarioRunner
{
    public function run(Scenario $scenario)
    {
        foreach ($scenario->getSteps() as $step) {

        }

    }
}
