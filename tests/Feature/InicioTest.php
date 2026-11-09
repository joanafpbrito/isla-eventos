<?php

test('the homepage renders its content and shared navigation', function () {
    $response = $this->get('/');

    $response
        ->assertSee('Próximos Eventos')
        ->assertSee('Início')
        ->assertSee('Eventos');
});
