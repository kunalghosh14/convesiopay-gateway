<?php
/**
 * Plugin Name: Convesio Gateway for GiveWP
 * Description: ConvesioPay GiveWP payment gateway.
 * Version: 0.1.0
 * Requires at least: 6.0
 * Requires PHP: 7.2
 * Author: ConvesioPay - Kunal Ghosh
 * Author URI: https://convesio.com/pay/
 * Text Domain: ConvesioPay
 */

// Register the gateways 
add_action('givewp_register_payment_gateway', static function ($paymentGatewayRegister) {
    include 'class-convesiopay-gateway-api.php';
    include 'class-offsite-convesiopay-gateway.php';
    include 'class-onsite-convesiopay-gateway.php';
    $paymentGatewayRegister->registerGateway(ExampleGatewayOffsiteClass::class);
    $paymentGatewayRegister->registerGateway(ExampleGatewayOnsiteClass::class);
});

// Register the gateways subscription module for onsite example test gateway
 add_filter("givewp_gateway_onsite-convesiopay-test-gateway_subscription_module", static function () {
        include 'class-onsite-convesiopay-gateway-subscription-module.php';

        return ExampleGatewayOnsiteSubscriptionModuleClass::class;
    }
);