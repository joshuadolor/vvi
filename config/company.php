<?php

/*
|--------------------------------------------------------------------------
| Company profile (single source of truth)
|--------------------------------------------------------------------------
| Used by the public layout, JSON-LD structured data, and llms.txt.
| Content is derived from docs/COMPANY_INFORMATION.md.
*/

return [
    'name' => 'Victor Vanguard International',
    'short_name' => 'VVI',
    'legal_name' => 'Victor Vanguard International',
    'parent_group' => 'Dolor Group',
    'tagline' => 'Leading Trusted Global Sourcing',

    'description' => 'Victor Vanguard International (VVI) is the international sourcing, '
        .'supplier verification, and quality assurance company of the Dolor Group. VVI '
        .'independently verifies manufacturers through factory visits, business '
        .'verification, product inspections, and quality assessments before introducing '
        .'them to buyers.',

    'mission' => 'To make international sourcing transparent, secure, and reliable through '
        .'independent supplier verification and quality assurance.',

    'vision' => 'To become the trusted verification standard for global sourcing and '
        .'international trade.',

    'founded' => '1984',

    'contact' => [
        'email' => 'contact@victorvanguard.com',
        'locations' => [],
    ],

    'services' => [
        'Factory Verification',
        'Supplier Due Diligence',
        'Product Verification',
        'Quality Assurance',
        'Global Sourcing Support',
    ],

    /*
    | Placeholder verified manufacturers (not corporate "affiliates").
    | Replace with real VVI Verified suppliers as they are onboarded.
    */
    'verified_partners' => [
        [
            'name' => 'Shenzhen Precision Structures Co.',
            'sector' => 'Prefabricated Structures',
            'region' => 'Guangdong, China',
            'status' => 'VVI Verified',
            'logo' => 'https://placehold.co/480x192/0e0e0e/e9c176?text=SPS&font=lato',
            'items_sold' => 1284,
        ],
        [
            'name' => 'Horizon Solar Components Ltd.',
            'sector' => 'Solar Infrastructure',
            'region' => 'Jiangsu, China',
            'status' => 'VVI Verified',
            'logo' => 'https://placehold.co/480x192/0e0e0e/e9c176?text=HSC&font=lato',
            'items_sold' => 962,
        ],
        [
            'name' => 'Pacific Heavy Machinery Group',
            'sector' => 'Industrial Equipment',
            'region' => 'Zhejiang, China',
            'status' => 'VVI Verified',
            'logo' => 'https://placehold.co/480x192/0e0e0e/e9c176?text=PHM&font=lato',
            'items_sold' => 437,
        ],
        [
            'name' => 'Eastgate Logistics & Fabrication',
            'sector' => 'Custom Fabrication',
            'region' => 'Hong Kong SAR',
            'status' => 'VVI Verified',
            'logo' => 'https://placehold.co/480x192/0e0e0e/e9c176?text=ELF&font=lato',
            'items_sold' => 751,
        ],
    ],

    'social' => [
        // Add real profile URLs when available.
    ],
];
