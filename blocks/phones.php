<?php
        $phones = [
            'poco' => [
                [
                    'id' => 1,
                    'Image' => 'products/phone1_poco.png',
                    'brand' => 'Poco',
                    'model' => 'F4',
                    'RAM' => '8',
                    'disc' => '256',

                    'screen' => [
                        'diagonal' => 6.67,
                        'technology' => 'AMOLED',
                        'rate' => 120,
                        'features' => null,
                    ],

                    'processor' => 'Snapdragon 870',

                    'camera' => [
                        'main' => 64,
                        'wide' => 8,
                        'telephoto' => null,
                        'macro' => 2
                    ],

                    'battery' => [
                        'capacity' => 4500,
                        'charging' => 67 
                    ],
                    
                    'price' => 400,
                    'discount' => 30,
                    'nfc' => true
                ]
            ],
        
            'xiaomi' => [
                [
                    'id' => 2,
                    'Image' => 'products/phone2_xiaomi.jpg',
                    'brand' => 'Xiaomi',
                    'model' => '13 Pro',
                    'RAM' => '12',
                    'disc' => '256',

                    'screen' => [
                        'diagonal' => 6.73,
                        'technology' => 'AMOLED',
                        'rate' => 120,
                        'features' => ['HDR10+'],
                    ],

                    'processor' => 'Snapdragon 8 Gen 2',

                    'camera' => [
                        'main' => 50,
                        'wide' => 50,
                        'telephoto' => 50,
                        'macro' => null
                    ],

                    'battery' => [
                        'capacity' => 4820,
                        'charging' => 120
                    ],

                    'price' => 400,
                    'nfc' => true
                ],
                [
                    'id' => 3,
                    'Image' => 'products/phone2_xiaomi.jpg',
                    'brand' => 'Xiaomi',
                    'model' => 'Mi 11',
                    'RAM' => '8',
                    'disc' => '256',
                    
                    'screen' => [
                        'diagonal' => 6.81,
                        'technology' => 'AMOLED',
                        'rate' => 120,
                        'features' => null
                    ],
                    
                    'processor' => 'Snapdragon 888',

                    'camera' => [
                        'main' => 108,
                        'wide' => 13,
                        'telephoto' => null,
                        'macro' => 5
                    ],
                    
                    'battery' => [
                        'capacity' => 4600,
                        'charging' => 55
                    ],
                    
                    'price' => 400,
                    'discount' => 30,
                    'nfc' => true
                ]
            ],
        
            'google' => [
                [
                    'id' => 4,
                    'Image' => 'products/phone3_google.png',
                    'brand' => 'Google',
                    'model' => 'Pixel 7 Pro',
                    'RAM' => '12',
                    'disc' => '512',
                    
                    'screen' => [
                        'diagonal' => 6.7,
                        'technology' => 'LTPO AMOLED',
                        'rate' => 120,
                        'features' => null
                    ],
                    
                    'processor' => 'Tensor G2',
                    
                    'camera' => [
                        'main' => 50,
                        'wide' => 12,
                        'telephoto' => 48,
                        'macro' => null
                    ],
                    
                    'battery' => [
                        'capacity' => 5000,
                        'charging' => 30
                    ],
                    
                    'price' => 100,
                    'nfc' => true
                ],
                [
                    'id' => 5,
                    'Image' => 'products/phone3_google.png',
                    'brand' => 'Google',
                    'model' => 'Pixel 6a',
                    'RAM' => '6',
                    'disc' => '128',
                    
                    'screen' => [
                        'diagonal' => 6.1,
                        'technology' => 'OLED',
                        'rate' => 60,
                        'features'=> null
                    ],
                    
                    'processor' => 'Tensor',
                    
                    'camera' => [
                        'main' => 12.2,
                        'wide' => 12,
                        'telephoto' => null,
                        'macro' => null
                    ],
                    
                    'battery' => [
                        'capacity' => 4410,
                        'charging' => 18
                    ],
                    
                    'price' => 450,
                    'nfc' => true
                ]
            ],
        
            'realme' => [
                [
                    'id' => 6,
                    'Image' => 'products/phone4_realme.png',
                    'brand' => 'Realme',
                    'model' => 'Realme GT 2 Pro',
                    'memory' => '8/128 GB, 12/256 GB',
                    'RAM' => '12',
                    'disc' => '256',
                    
                    'screen' => [
                        'diagonal' => 6.7,
                        'technology' => 'AMOLED',
                        'rate' => 120,
                        'features'=> null
                    ],
                    
                    'processor' => 'Snapdragon 8 Gen 1',
                    
                    'camera' => [
                        'main' => 50,
                        'wide' => 50,
                        'telephoto' => null,
                        'macro' => 3
                    ],
                    
                    'battery' => [
                        'capacity' => 5000,
                        'charging' =>  65
                    ],
                    
                    'price' => 450,
                    'discount' => 60,
                    'nfc' => true
                ]
            ],
        
            'vivo' => [
                [
                    'id' => 7,
                    'Image' => 'products/phone5_vivo.png',
                    'brand' => 'Vivo',
                    'model' => 'X90 Pro',
                    'RAM' => '12',
                    'disc' => '256',
                    
                    'screen' => [
                        'diagonal' => 6.78,
                        'technology' => 'AMOLED',
                        'rate' => 120,
                        'features'=> null
                    ],
                    
                    'processor' => 'Dimensity 9200',
                    // 'camera' => '50 MP (main), 50 MP (wide), 12 MP (portrait)',
                    
                    'camera' => [
                        'main' => 50,
                        'wide' => 50,
                        'telephoto' => null,
                        'macro' => null
                    ],
                    
                    'battery' => [
                        'capacity' => 4870,
                        'charging' =>  120
                    ],
                    
                    'price' => 850,
                    'nfc' => true
                ]
            ],
        
            'apple' => [
                [
                    'id' => 8,
                    'Image' => 'products/phone6_apple.jpg',
                    'brand' => 'Apple',
                    'model' => '15 Pro',
                    'RAM' => '512',
                    'disc' => '128',
                    
                    'screen' => [
                        'diagonal' => 6.1,
                        'technology' => 'Super Retina XDR',
                        'rate' => 120,
                        'features'=> null
                    ],
                    
                    'processor' => 'A17 Pro',
                    
                    'camera' => [
                        'main' => 48,
                        'wide' => 12,
                        'telephoto' => 12,
                        'macro' => null
                    ],
                    
                    'battery' => [
                        'capacity' => 3100,
                        'charging' => 20
                    ],
                    
                    'price' => 120,
                    'nfc' => true
                ],
                [
                    'id' => 9,
                    'Image' => 'products/phone6_apple.jpg',
                    'brand' => 'Apple',
                    'model' => '14',
                    'RAM' => '12',
                    'disc' => '128',
                    
                    'screen' => [
                        'diagonal' => 6.1,
                        'technology' => 'Super Retina XDR',
                        'rate' => 120,
                        'features'=> null
                    ],
                    
                    'processor' => 'A15 Bionic',
                    
                    'camera' => [
                        'main' => 12,
                        'wide' => 12,
                        'telephoto' => null,
                        'macro' => null
                    ],
                    
                    'battery' => [
                        'capacity' => 3279,
                        'charging' => 20
                    ],
                    
                    'price' => 900,
                    'discount' => 40,
                    'nfc' => true
                ]
            ],
        
            'hasselblad' => [
                [
                    'id' => 10,
                    'Image' => 'products/phone7_hassselblad.png',
                    'brand' => 'Hasselblad',
                    'model' => 'OnePlus 11 5G',
                    'RAM' => '16',
                    'disc' => '256',
                    
                    'screen' => [
                        'diagonal' => 6.7, 
                        'technology' => 'AMOLED',
                        'rate' => 120,
                        'features'=> null
                    ],
                    
                    'processor' => 'Snapdragon 8 Gen 2',
                    
                    'camera' => [
                        'main' => 50,
                        'wide' => 48,
                        'telephoto' => 32,
                        'macro' => null
                    ],
                    
                    'battery' => [
                        'capacity' => 5000,
                        'charging' => 100
                    ],
                    
                    'price' => 630,
                    'nfc' => true
                ]
            ],
        
            'samsung' => [
                [
                    'id' => 11,
                    'Image' => 'products/phone8_samsung.jpg',
                    'brand' => 'Samsung',
                    'model' => 'Galaxy S23 Ultra',
                    'RAM' => '12',
                    'disc' => '1024',
                    
                    'screen' => [
                        'diagonal' => 6.8,
                        'technology' => 'Dynamic AMOLED 2X',
                        'rate' => 120,
                        'features'=> null
                    ],
                    
                    'processor' => 'Snapdragon 8 Gen 2',

                    // 'camera' => '200 MP (main), 12 MP (wide), 10 MP (telephoto), 10 MP (periscope)',
                    
                    'camera' => [
                        'main' => 200,
                        'wide' => 12,
                        'telephoto' => 10,
                        'macro' => null
                    ],
                    
                    'battery' => [
                        'capacity' => 5000,
                        'charging' =>  45
                    ],
                    
                    'price' => 140,
                    'discount' => 50,
                    'nfc' => true
                ],
                [
                    'id' => 12,
                    'Image' => 'products/phone8_samsung.jpg',
                    'brand' => 'Samsung',
                    'model' => 'Galaxy A54 5G',
                    'RAM' => '6',
                    'disc' => '256',
                    
                    'screen' => [
                        'diagonal' => 6.4,
                        'technology' => 'Super AMOLED',
                        'rate' => 120,
                        'features'=> null
                    ],
                    
                    'processor' => 'Exynos 1380',
                    
                    'camera' => [
                        'main' => 50,
                        'wide' => 12,
                        'telephoto' => null,
                        'macro' => 5
                    ],
                    
                    'battery' => [
                        'capacity' => 5000,
                        'charging' => 25
                    ],
                    
                    'price' => 400,
                    'nfc' => true
                ]
            ],
        
            'nokia' => [
                [
                    'id' => 13,
                    'Image' => 'products/nokia.webp',
                    'brand' => 'Nokia',
                    'model' => 'G60 5G',
                    'RAM' => '6',
                    'disc' => '128',
                    
                    'screen' => [
                        'diagonal' => 6.58,
                        'technology' => 'IPS LCD',
                        'rate' => 120,
                        'features' => null
                    ],
                    
                    'processor' => 'Snapdragon 695',
                    // 'camera' => '50 MP (main), 5 MP (wide), 2 MP (depth)',
                    
                    'camera' => [
                        'main' => 50,
                        'wide' => 5,
                        'telephoto' => null,
                        'macro' => null
                    ],
                    
                    'battery' => [
                        'capacity' => 4500,
                        'charging' => 20
                    ],
                    
                    'price' => 230,
                    'nfc' => true
                ],
                [
                    'id' => 14,
                    'Image' => 'products/nokia.webp',
                    'brand' => 'Nokia',
                    'model' => 'X100',
                    'RAM' => '6',
                    'disc' => '128',
                    
                    'screen' => [
                        'diagonal' => 6.67,
                        'technology' => 'IPS LCD',
                        'rate' => 60,
                        'features'=> null
                    ],
                    
                    'processor' => 'Snapdragon 480 5G',
                    // 'camera' => '48 MP (main), 5 MP (wide), 2 MP (depth)',
                    
                    'camera' => [
                        'main' => 48,
                        'wide' => 5,
                        'telephoto' => null,
                        'macro' => null
                    ],
                    
                    'battery' => [
                        'capacity' => 4470,
                        'charging' => 18
                    ],
                    
                    'price' => 290,
                    'discount' => 20,
                    'nfc' => true
                ]
            ]
        ];
        ?>