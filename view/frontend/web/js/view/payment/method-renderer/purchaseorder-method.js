/*browser:true*/
/*global define*/
define([
    'ko',
    'Magento_Checkout/js/view/payment/default',
    'jquery', 'Magento_Ui/js/model/messageList',
    'mage/validation'
], function (ko, Component, $) {
    'use strict';

    const optionsList = ko.observableArray();

    $(document).on('change', "#funarbe_pagamento_na_entrega_metodo", function () {
        document.getElementById('troco').style.display = this.value === 'dinheiro' ? 'block' : 'none';
    });

    return Component.extend({
        defaults: {
            template: 'Funarbe_PagamentoNaEntrega/payment/purchaseorder-form'
        },
        validate: function () {
            var $form = $('#' + this.getCode() + '-form');
            return $form.validation() && $form.validation('isValid');
        },
        initialize: function () {
            this._super();
            return this;
        },
        optionsList: optionsList,
        getData: function () {
            return {
                'method': this.item.method, 'additional_data': {
                    'troco': $('#funarbe_pagamento_na_entrega_troco').val(),
                    'metodo': $('#funarbe_pagamento_na_entrega_metodo').val()
                }
            };
        },

        /**
         * Get value of instruction field.
         * @returns {String}
         */
        getInstructions: function () {
            return window.checkoutConfig.payment[this.item.method];
        }
    });
});
