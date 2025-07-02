<?php

use App\Rover;

it('se mueve sin obstaculos', function () {
    $rover = new Rover(0, 0, 'N');

    $result = $rover->move('F');

    expect($result['x'])->toBe(0);
    expect($result['y'])->toBe(1);
    expect($result['direction'])->toBe('N');
    expect($result['obstacle'])->toBeFalse();
});

it('se mueve a la derecha', function () {
    $rover = new Rover(0, 0, 'N');

    $rover->move('R');
    expect($rover->direction)->toBe('E');

    $rover->move('R');
    expect($rover->direction)->toBe('S');

    $rover->move('R');
    expect($rover->direction)->toBe('W');

    $rover->move('R');
    expect($rover->direction)->toBe('N');
});

it('se mueve a la izquierda', function () {
    $rover = new Rover(0, 0, 'N');

    $rover->move('L');
    expect($rover->direction)->toBe('W');

    $rover->move('L');
    expect($rover->direction)->toBe('S');

    $rover->move('L');
    expect($rover->direction)->toBe('E');

    $rover->move('L');
    expect($rover->direction)->toBe('N');
});

it('se detiene con un obstaculo', function () {
    $rover = new Rover(5, 9, 'N'); // obstáculo en (5,10)

    $result = $rover->move('F');

    expect($result['x'])->toBe(5);
    expect($result['y'])->toBe(9);
    expect($result['obstacle'])->toBeTrue();
    expect($result['message'])->toContain('Obstacle');
});
