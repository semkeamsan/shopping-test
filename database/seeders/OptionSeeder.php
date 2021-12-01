<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach ($this->data() as $data) {

            $model = Option::create([
                'type' => $data['type'],
                'is_global' => 1,
            ]);
            foreach ($data['translations'] as $key => $translation) {
                $model->translations()->create($translation);
            }
            foreach ($data['values'] as $key => $val) {
                $value =  $model->values()->create([
                    'price' => $val['price'],
                    'price_type' => $val['price_type'],
                ]);
                foreach ($val['translations'] as $key => $translation) {
                    $value->translations()->create($translation);
                }
            }
        }
    }
    public function data()
    {
        return [
            [
                'type' => 'dropdown',
                'values' => [
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '1 year'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '1 ឆ្នាំ'
                            ]
                        ]
                    ],
                    [
                        'price' => '40.0000',
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '2 year'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '2 ឆ្នាំ'
                            ]
                        ]
                    ],
                    [
                        'price' => '80.0000',
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '3 year'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '3 ឆ្នាំ'
                            ]
                        ]
                    ]
                ],
                'translations' => [
                    [
                        'locale' => 'en',
                        'name' => 'Warranty'
                    ],
                    [
                        'locale' => 'km',
                        'name' => 'ការធានា'
                    ]
                ]
            ],
            [
                'type' => 'dropdown',
                'values' => [
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '500GB'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '500GB'
                            ]
                        ]
                    ],
                    [
                        'price' => '300.0000',
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '1TB'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '1TB'
                            ]
                        ]
                    ],
                    [
                        'price' => '500.0000',
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '2TB'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '2TB'
                            ]
                        ]
                    ]
                ],
                'translations' => [
                    [
                        'locale' => 'en',
                        'name' => 'Storage'
                    ],
                    [
                        'locale' => 'km',
                        'name' => 'ការផ្ទុក'
                    ]
                ]
            ],
            [
                'type' => 'dropdown',
                'values' => [
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '8GB'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '8GB'
                            ]
                        ]
                    ],
                    [
                        'price' => '200.0000',
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '16GB'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '16GB'
                            ]
                        ]
                    ],
                    [
                        'price' => '400.0000',
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '32GB'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '32GB'
                            ]
                        ]
                    ]
                ],
                'translations' => [
                    [
                        'locale' => 'en',
                        'name' => 'Ram'
                    ],
                    [
                        'locale' => 'km',
                        'name' => 'រ៉ាម'
                    ]
                ]
            ],
            [
                'type' => 'checkbox',
                'values' => [
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => 'Silver'
                            ],
                            [
                                'locale' => 'km',
                                'label' => 'Silver'
                            ]
                        ]
                    ],
                    [
                        'price' => '199.0000',
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => 'Space Grey'
                            ],
                            [
                                'locale' => 'km',
                                'label' => 'ពណ៌ប្រផេះអវកាស'
                            ]
                        ]
                    ],
                    [
                        'price' => '299.0000',
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => 'Gold'
                            ],
                            [
                                'locale' => 'km',
                                'label' => 'ពណ៌មាស'
                            ]
                        ]
                    ]
                ],
                'translations' => [
                    [
                        'locale' => 'en',
                        'name' => 'Color'
                    ],
                    [
                        'locale' => 'km',
                        'name' => 'ពណ៌'
                    ]
                ]
            ],

            [
                'type' => 'dropdown',
                'values' => [
                    [
                        'price' => '25.0000',
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '4GB'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '4GB'
                            ]
                        ]
                    ],
                    [
                        'price' => '45.0000',
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '8GB'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '8GB'
                            ]
                        ]
                    ],
                    [
                        'price' => '60.0000',
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '16GB'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '16GB'
                            ]
                        ]
                    ],
                    [
                        'price' => '95.0000',
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '32GB'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '32GB'
                            ]
                        ]
                    ]
                ],
                'translations' => [
                    [
                        'locale' => 'en',
                        'name' => 'Laptop Ram'
                    ],
                    [
                        'locale' => 'km',
                        'name' => 'រ៉ាម កុំព្យូទ័រយួរដៃ'
                    ]
                ]
            ],
            [
                'type' => 'checkbox',
                'values' => [
                    [
                        'price' => '35.0000',
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '500GB'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '500GB'
                            ]
                        ]
                    ],
                    [
                        'price' => '55.0000',
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '1TB'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '1TB'
                            ]
                        ]
                    ],
                    [
                        'price' => '80.0000',
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '2TB'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '2TB'
                            ]
                        ]
                    ]
                ],
                'translations' => [
                    [
                        'locale' => 'en',
                        'name' => 'Laptop Storage'
                    ],
                    [
                        'locale' => 'km',
                        'name' => 'ផ្ទុកកុំព្យូទ័រយួរដៃ'
                    ]
                ]
            ],
            [
                'type' => 'radio',
                'values' => [
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '4GB'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '4GB'
                            ]
                        ]
                    ],
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '6GB'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '6GB'
                            ]
                        ]
                    ],
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '8GB'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '8GB'
                            ]
                        ]
                    ],
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '12GB'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '12GB'
                            ]
                        ]
                    ]
                ],
                'translations' => [
                    [
                        'locale' => 'en',
                        'name' => 'Mobile Ram'
                    ],
                    [
                        'locale' => 'km',
                        'name' => 'រ៉ាមទូរស័ព្ទ'
                    ]
                ]
            ],
            [
                'type' => 'checkbox',
                'values' => [
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => 'Space Grey'
                            ],
                            [
                                'locale' => 'km',
                                'label' => 'ពណ៌ប្រផេះអវកាស'
                            ]
                        ]
                    ],
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => 'Rose Gold'
                            ],
                            [
                                'locale' => 'km',
                                'label' => 'ពណ៌មាសផ្កាឈូក'
                            ]
                        ]
                    ],
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => 'Black'
                            ],
                            [
                                'locale' => 'km',
                                'label' => 'ពណ៌ខ្មៅ'
                            ]
                        ]
                    ],
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => 'Silver'
                            ],
                            [
                                'locale' => 'km',
                                'label' => 'ពណ៌ប្រាក់'
                            ]
                        ]
                    ],
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => 'White'
                            ],
                            [
                                'locale' => 'km',
                                'label' => 'ពណ៌ស'
                            ]
                        ]
                    ],
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => 'Red'
                            ],
                            [
                                'locale' => 'km',
                                'label' => 'ពណ៌ក្រហម'
                            ]
                        ]
                    ]
                ],
                'translations' => [
                    [
                        'locale' => 'en',
                        'name' => 'Mobile Color'
                    ],
                    [
                        'locale' => 'km',
                        'name' => 'ពណ៌ទូរស័ព្ទ'
                    ]
                ]
            ],
            [
                'type' => 'radio',
                'values' => [
                    [
                        'price' => '3.0000',
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => 'SM'
                            ],
                            [
                                'locale' => 'km',
                                'label' => 'SM'
                            ]
                        ]
                    ],
                    [
                        'price' => '5.0000',
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => 'M'
                            ],
                            [
                                'locale' => 'km',
                                'label' => 'M'
                            ]
                        ]
                    ],
                    [
                        'price' => '7.0000',
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => 'L'
                            ],
                            [
                                'locale' => 'km',
                                'label' => 'L'
                            ]
                        ]
                    ],
                    [
                        'price' => '12.0000',
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => 'XL'
                            ],
                            [
                                'locale' => 'km',
                                'label' => 'XL'
                            ]
                        ]
                    ],
                    [
                        'price' => '15.0000',
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => 'XXL'
                            ],
                            [
                                'locale' => 'km',
                                'label' => 'XXL'
                            ]
                        ]
                    ]
                ],
                'translations' => [
                    [
                        'locale' => 'en',
                        'name' => 'Pant/Shirt Size'
                    ],
                    [
                        'locale' => 'km',
                        'name' => 'ទំហំខោ/អាវ'
                    ]
                ]
            ],
            [
                'type' => 'checkbox',
                'values' => [
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '40'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '40'
                            ]
                        ]
                    ],
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '41'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '41'
                            ]
                        ]
                    ],
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '42'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '42'
                            ]
                        ]
                    ],
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '43'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '43'
                            ]
                        ]
                    ],
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '44'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '44'
                            ]
                        ]
                    ],
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '45'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '45'
                            ]
                        ]
                    ]
                ],
                'translations' => [
                    [
                        'locale' => 'en',
                        'name' => 'Shoe Sizes'
                    ],
                    [
                        'locale' => 'km',
                        'name' => 'ទំហំស្បែកជើង'
                    ]
                ]
            ],
            [
                'type' => 'checkbox',
                'values' => [
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '30'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '30'
                            ]
                        ]
                    ],
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '31'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '31'
                            ]
                        ]
                    ],
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '32'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '32'
                            ]
                        ]
                    ],
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '33'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '33'
                            ]
                        ]
                    ],
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '34'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '34'
                            ]
                        ]
                    ],
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '35'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '35'
                            ]
                        ]
                    ],
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '36'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '36'
                            ]
                        ]
                    ],
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '37'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '37'
                            ]
                        ]
                    ],
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '38'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '38'
                            ]
                        ]
                    ]
                ],
                'translations' => [
                    [
                        'locale' => 'en',
                        'name' => 'Waist'
                    ],
                    [
                        'locale' => 'km',
                        'name' => 'ចង្កេះ'
                    ]
                ]
            ],
            [
                'type' => 'radio',
                'values' => [
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => 'Nylon Strap'
                            ],
                            [
                                'locale' => 'km',
                                'label' => 'ខ្សែនីឡុង'
                            ]
                        ]
                    ],
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => 'Leather strap'
                            ],
                            [
                                'locale' => 'km',
                                'label' => 'ខ្សែស្បែក'
                            ]
                        ]
                    ],
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => 'Stainless Steel Strap'
                            ],
                            [
                                'locale' => 'km',
                                'label' => 'ខ្សែដែកអ៊ីណុក'
                            ]
                        ]
                    ]
                ],
                'translations' => [
                    [
                        'locale' => 'en',
                        'name' => 'Watch Straps'
                    ],
                    [
                        'locale' => 'km',
                        'name' => 'មើលខ្សែ'
                    ]
                ]
            ],
            [
                'type' => 'radio',
                'values' => [
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '1 year'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '1 year'
                            ]
                        ]
                    ],
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '2 year'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '2 year'
                            ]
                        ]
                    ],
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => '3 year'
                            ],
                            [
                                'locale' => 'km',
                                'label' => '3 year'
                            ]
                        ]
                    ]
                ],
                'translations' => [
                    [
                        'locale' => 'en',
                        'name' => 'Warranty'
                    ],
                    [
                        'locale' => 'km',
                        'name' => 'Warranty'
                    ]
                ]
            ],
            [
                'type' => 'radio',
                'values' => [
                    [
                        'price' => '4000.0000',
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => 'Black'
                            ],
                            [
                                'locale' => 'km',
                                'label' => 'Black'
                            ]
                        ]
                    ],
                    [
                        'price' => '5000.0000',
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => 'Blue'
                            ],
                            [
                                'locale' => 'km',
                                'label' => 'Blue'
                            ]
                        ]
                    ],
                    [
                        'price' => '10000.0000',
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => 'Olive'
                            ],
                            [
                                'locale' => 'km',
                                'label' => 'Olive'
                            ]
                        ]
                    ],
                    [
                        'price' => '15000.0000',
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => 'Brown'
                            ],
                            [
                                'locale' => 'km',
                                'label' => 'Brown'
                            ]
                        ]
                    ],
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => 'Grey'
                            ],
                            [
                                'locale' => 'km',
                                'label' => 'Grey'
                            ]
                        ]
                    ],
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => 'White'
                            ],
                            [
                                'locale' => 'km',
                                'label' => 'White'
                            ]
                        ]
                    ]
                ],
                'translations' => [
                    [
                        'locale' => 'en',
                        'name' => 'Dress Color'
                    ],
                    [
                        'locale' => 'km',
                        'name' => 'Dress Color'
                    ]
                ]
            ],
            [
                'type' => 'dropdown',
                'values' => [
                    [
                        'price' => null,
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => 'Standard'
                            ],
                            [
                                'locale' => 'km',
                                'label' => 'Standard'
                            ]
                        ]
                    ],
                    [
                        'price' => '10.0000',
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => 'UV 400'
                            ],
                            [
                                'locale' => 'km',
                                'label' => 'UV 400'
                            ]
                        ]
                    ],
                    [
                        'price' => '20.0000',
                        'price_type' => 'fixed',
                        'translations' => [
                            [
                                'locale' => 'en',
                                'label' => 'Polarized'
                            ],
                            [
                                'locale' => 'km',
                                'label' => 'Polarized'
                            ]
                        ]
                    ]
                ],
                'translations' => [
                    [
                        'locale' => 'en',
                        'name' => 'Lens Options'
                    ],
                    [
                        'locale' => 'km',
                        'name' => 'Lens Options'
                    ]
                ]
            ]
        ];
    }
}
