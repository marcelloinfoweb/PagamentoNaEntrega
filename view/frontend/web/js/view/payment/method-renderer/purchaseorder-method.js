/*browser:true*/
/*global define*/
define([
        'ko',
        'Magento_Checkout/js/view/payment/default',
        'jquery'
    ],
    function (ko, Component, $) {
        'use strict';

        const optionsList = ko.observableArray();
        const codOption = function (name, id) {
            this.name = name;
            this.id = id;
        };

        $(document).on('change', "#funarbe_pagamento_na_entrega_metodo", function () {
            document.getElementById('troco').style.display = this.value === 'dinheiro' ? 'block' : 'none';
        });

        return Component.extend({
            defaults: {
                template: 'Funarbe_PagamentoNaEntrega/payment/purchaseorder-form'
            },
            initialize: function () {
                this._super();
                this.populateOptionsList();
                return this;
            },
            optionsList: optionsList,
            getData: function () {
                return {
                    'method': this.item.method,
                    'additional_data': {
                        'troco': $('#cashondelivery_troco').val(),
                        'metodo': $('#cashondelivery_metodo').val()
                    }
                };
            },
            /**
             * Get value of instruction field.
             * @returns {String}
             */
            getInstructions: function () {
                return window.checkoutConfig.payment[this.item.method];
            },
            populateOptionsList: function () {
                this.optionsList([
                    new codOption('Dinheiro', 'dinheiro'),
                    new codOption('Cartão Crédito/Débito', 'cartao')
                ]);

            },

        });
    }
);
