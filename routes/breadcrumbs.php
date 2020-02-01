<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

// Home > Contact
Breadcrumbs::register('contact', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Contact', route('contact'));
});

// Home > Orders
Breadcrumbs::register('orders', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Orders', route('orders'));
});

// Home > Shop
Breadcrumbs::register('shop', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Shop', route('shop.index'));
}); 

// Home > Cart
Breadcrumbs::register('cart', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Cart', route('cart.index'));
}); 

// Home > Checkout
Breadcrumbs::register('checkout', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Checkout', route('checkout.index'));
}); 

// Home > Confirmation
Breadcrumbs::register('confirmation', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Confirmation', route('checkout.index'));
}); 

// Home > Shop > [Product]
Breadcrumbs::register('product', function($breadcrumbs, $product)
{
    $breadcrumbs->parent('shop');
    $breadcrumbs->push($product->name, route('shop.show', $product->slug));
});

// Home > ResetPassword
Breadcrumbs::register('forgotPassword', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Forgot Password', route('password.email'));
}); 

// Home > ResetPasswordAction
Breadcrumbs::register('resetPassword', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Reset Password', route('password.reset'));
}); 





/**
 * Auth routes
 */

// Home > Login
Breadcrumbs::register('login', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Login', route('login'));
});

// Home > Register
Breadcrumbs::register('register', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Register', route('register'));
});
