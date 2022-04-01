/*browser:true*/
/*global define*/
define(['uiComponent', 'Magento_Checkout/js/model/payment/renderer-list'], function (Component, rendererList) {
    'use strict';
    rendererList.push({
        type: 'funarbe_pagamento_na_entrega',
        component: 'Funarbe_PagamentoNaEntrega/js/view/payment/method-renderer/purchaseorder-method'
    });
    return Component.extend({});
});
