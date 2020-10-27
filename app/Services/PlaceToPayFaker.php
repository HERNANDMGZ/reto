<?php

namespace App\Services;

use App\Contracts\WebCheckoutContract;

class PlaceToPayFaker implements WebCheckoutContract
{
    public function request(array $payment): array
    {
        return [
            'status' => [
                'status' => 'OK',
                'reason' => 'PC',
                'message' => 'La petición se ha procesado correctamente',
                'date' => '2020-03-04T16:50:02-05:00',
            ],
            'requestId' => 181348,
            'processUrl' => route('shops.viewMock', $payment['payment']['reference']),
        ];
    }

    public function query(int $id): array
    {
        return [
            'requestId' => 181348,
            'status' => [
                'status' => 'APPROVED',
                'reason' => '00',
                'message' => 'La petición ha sido aprobada exitosamente',
                'date' => '2019-03-04T17:27:59-05:00'
            ],
            'request' => [
                'locale' => 'es_CO',
                'payer' => [
                    'document' => '98762729',
                    'documentType' => 'CE',
                    'name' => 'JD',
                    'surname' => 'JA',
                    'email' => 'juan.jimenez@placetopay.com',
                    'mobile' => '321000000'
                ],
                'payment' => [
                    'reference' => '3210',
                    'description' => 'Pago de prueba 04/03/2019',
                    'amount' => [
                        'currency' => 'COP',
                        'total' => '10000'
                    ],
                    'allowPartial' => false,
                    'subscribe' => false
                ],
                'fields' => [
                    [
                        'keyword' => '_processUrl_',
                        'value' => 'https://test.placetopay.com/redirection/session/181348/43d83d36aa46de5f993aafb9b3e0be48',
                        'displayOn' => 'none'
                    ]
                ],
                'returnUrl' => 'https://mysite.com/response/3210',
                'ipAddress' => '127.0.0.1',
                'userAgent' => 'PlacetoPay Sandbox',
                'expiration' => '2019-03-05T00:00:00-05:00'
            ],
            'payment' => [
                [
                    'status' => [
                        'status' => 'APPROVED',
                        'reason' => '00',
                        'message' => 'Aprobada',
                        'date' => '2019-03-04T17:05:00-05:00'
                    ],
                    'internalReference' => 1468647381,
                    'paymentMethod' => 'card',
                    'paymentMethodName' => 'Visa',
                    'issuerName' => 'BANCO DE PRUEBAS',
                    'amount' => [
                        'from' => [
                            'currency' => 'COP',
                            'total' => '10000.00'
                        ],
                        'to' => [
                            'currency' => 'COP',
                            'total' => '9800.00'
                        ],
                        'factor' => 1
                    ],
                    'authorization' => '000000',
                    'reference' => '3210',
                    'receipt' => '1551737100',
                    'franchise' => 'CR_VS',
                    'refunded' => false,
                    'discount' => [
                        'code' => 'DEMO_PROMOVISA',
                        'type' => 'MERCHANT',
                        'amount' => '200',
                        'base' => '10000',
                        'percent' => 2
                    ],
                    'processorFields' => [
                        [
                            'keyword' => 'merchantCode',
                            'value' => '011271442',
                            'displayOn' => 'none'
                        ],
                        [
                            'keyword' => 'terminalNumber',
                            'value' => '00057742',
                            'displayOn' => 'none'
                        ],
                        [
                            'keyword' => 'lastDigits',
                            'value' => '1111',
                            'displayOn' => 'none'
                        ],
                        [
                            'keyword' => 'id',
                            'value' => '42337fd0ed2b037667ccabce3427f042',
                            'displayOn' => 'none'
                        ],
                        [
                            'keyword' => 'installments',
                            'value' => '1',
                            'displayOn' => 'none'
                        ],
                        [
                            'keyword' => 'expiration',
                            'value' => '0320',
                            'displayOn' => 'none'
                        ],
                        [
                            'keyword' => 'cardType',
                            'value' => 'C',
                            'displayOn' => 'none'
                        ]
                    ]
                ]
            ],
            'subscription' => null
        ];
    }
}
