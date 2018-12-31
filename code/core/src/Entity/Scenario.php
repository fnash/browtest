<?php

namespace Browtest\Core;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * A TestScenario is an ordered list of steps
 */
class Scenario
{
    /**
     * @var Step[]
     */
    private $steps;

    public function __construct()
    {
        $this->steps = new ArrayCollection();
    }

    /**
     * @return Step[]
     */
    public function getSteps()
    {
        return $this->steps;
    }

    /**
     * @param Step[] $steps
     *
     * @return Scenario
     */
    public function setSteps($steps)
    {
        $this->steps = $steps;

        return $this;
    }

    /**
     * @param Step $step
     *
     * @return self
     */
    public function addStep(Step $step)
    {
        $this->steps->add($step);

        return $this;
    }

    /**
     * @param Step $step
     *
     * @return self
     */
    public function removeStep(Step $step)
    {
        $this->steps->remove($step);

        return $this;
    }
}
