<?php

namespace App;

class Rover
{
    public $x;
    public $y;
    public $direction;
    public $map_size = 200;
    public $obstacles = [];

    public function __construct($x, $y, $direction)
    {
        $this->x = $x;
        $this->y = $y;
        $this->direction = $direction;
        $this->generate_obstacles();
    }

    // genermaos obstaculos random
    private function generate_obstacles()
    {
        $this->obstacles = [
            ["x" => 5, "y" => 10],
            ["x" => 15, "y" => 11],
            ["x" => 20, "y" => 30]
        ];
    }

    public function move($commands)
    {
        $commands = strtoupper($commands); // convertimos todas las letras en mayusculas
        $commands = str_split($commands); // separamos los comandos

        foreach ($commands as $command) {
            if ($command === 'F') {
                // a. obstaculo?
                if (!$this->can_move_forward()) {
                    return [
                        'x' => $this->x,
                        'y' => $this->y,
                        'direction' => $this->direction,
                        'obstacle' => true,
                        'message' => 'Obstacle detected, movement stopped 🚫'
                    ];
                }
                // b. mover
                $this->move_forward();
            } elseif ($command === 'R') {
                $this->turn_right();
            } elseif ($command === 'L') {
                $this->turn_left();
            }
        }

        return [
            'x' => $this->x,
            'y' => $this->y,
            'direction' => $this->direction,
            'obstacle' => false,
            'message' => 'Movement completed successfully ✅'
        ];
    }

    private function can_move_forward()
    {
        $next_x = $this->x;
        $next_y = $this->y;

        // simulamos movimiento
        switch ($this->direction) {
            case 'N': $next_y++; break;
            case 'S': $next_y--; break;
            case 'E': $next_x++; break;
            case 'W': $next_x--; break;
        }

        // comprobar si existe obstaculo
        foreach ($this->obstacles as $obstacle) {
            if ($obstacle['x'] === $next_x && $obstacle['y'] === $next_y) {
                return false;
            }
        }

        return true;
    }

    private function move_forward()
    {
        switch ($this->direction) {
            case 'N': $this->y++; break;
            case 'S': $this->y--; break;
            case 'E': $this->x++; break;
            case 'W': $this->x--; break;
        }
    }

    private function turn_right()
    {
       $directions = ['N' => 'E', 'E' => 'S', 'S' => 'W', 'W' => 'N'];
       $this->direction = $directions[$this->direction];
    }

    private function turn_left()
    {
        $directions = ['N' => 'W', 'W' => 'S', 'S' => 'E', 'E' => 'N'];
        $this->direction = $directions[$this->direction];
    }


}
