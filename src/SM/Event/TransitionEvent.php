<?php

/*
 * This file is part of the StateMachine package.
 *
 * (c) Alexandre Bacco
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SM\Event;

use SM\StateMachine\StateMachineInterface;
use Symfony\Contracts\EventDispatcher\Event;

class TransitionEvent extends Event
{
    /**
     * @var string
     */
    protected $transition;

    /**
     * @var string
     */
    protected $fromState;

    /**
     * @var array
     */
    protected $config = [];

    /**
     * @var StateMachineInterface
     */
    protected $stateMachine;

    /**
     * @var bool
     */
    protected $rejected = false;

    /**
     * @param string                $transition   Name of the transition being applied
     * @param string                $fromState    State from which the transition is applied
     * @param array                 $config       Configuration of the transition
     * @param StateMachineInterface $stateMachine State machine
     */
    public function __construct($transition, string $fromState, array $config, StateMachineInterface $stateMachine)
    {
        $this->transition   = $transition;
        $this->fromState    = $fromState;
        $this->config       = $config;
        $this->stateMachine = $stateMachine;
    }

    /**
     * @return string
     */
    public function getTransition()
    {
        return $this->transition;
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * @return StateMachineInterface
     */
    public function getStateMachine(): StateMachineInterface
    {
        return $this->stateMachine;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->fromState;
    }

    /**
     * @param bool $reject
     */
    public function setRejected(bool $reject = true): void
    {
        $this->rejected = $reject;
    }

    /**
     * @return bool
     */
    public function isRejected(): bool
    {
        return $this->rejected;
    }
}
