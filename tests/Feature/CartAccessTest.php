<?php

it('redirects guests to the application login page when they open the cart', function () {
    $response = $this->get(route('cart.index'));

    $response->assertRedirect(route('auth/login'));
});
