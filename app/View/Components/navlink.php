<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class navlink extends Component
{
    public $links;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->links = [
            [
                'label' => 'Home',
                'route' => 'home',
                'isActive' => request()->routeIs('home'),
                'isDropdown' => false
            ],
            [
                'label' => 'Dewan',
                'route' => null,
                'isActive' => request()->routeIs(['pimpinan-dprd', 'anggota-dprd']),
                'isDropdown' => true,
                'dropdown' => [
                    [
                        'label' => 'Pimpinan',
                        'route' => 'pimpinan-dprd',
                    ],
                    [
                        'label' => 'Anggota',
                        'route' => 'anggota-dprd',
                    ],
                ]
            ],
            [
                'label' => 'Komisi',
                'route' => null,
                'isActive' => request()->routeIs('komisi-a', 'komisi-b', 'komisi-c', 'komisi-d'),
                'isDropdown' => true,
                'dropdown' => [
                    [
                        'label' => 'Komisi A',
                        'route' => 'komisi-a',
                    ],
                    [
                        'label' => 'Komisi B',
                        'route' => 'komisi-b',
                    ],
                    [
                        'label' => 'Komisi C',
                        'route' => 'komisi-c',
                    ],
                    [
                        'label' => 'Komisi D',
                        'route' => 'komisi-d',
                    ],
                ]
            ],
            [
                'label' => 'Fraksi',
                'route' => null,
                'isActive' => request()->routeIs([
                    'fraksi-pkb', 'fraksi-golkar', 'fraksi-pdip', 'fraksi-gerindra', 'fraksi-demokrat',
                    'fraksi-nasdem', 'fraksi-pembangunan'
                ]),
                'isDropdown' => true,
                'dropdown' => [
                    [
                        'label' => 'Fraksi PKB',
                        'route' => 'fraksi-pkb',
                    ],
                    [
                        'label' => 'Fraksi GOLKAR',
                        'route' => 'fraksi-golkar',
                    ],
                    [
                        'label' => 'Fraksi PDIP MAPAN',
                        'route' => 'fraksi-pdip',
                    ],
                    [
                        'label' => 'Fraksi GERINDRA',
                        'route' => 'fraksi-gerindra',
                    ],
                    [
                        'label' => 'Fraksi NASDEM',
                        'route' => 'fraksi-nasdem',
                    ],
                    [
                        'label' => 'Fraksi DEMOKRAT',
                        'route' => 'fraksi-demokrat',
                    ],
                    [
                        'label' => 'Fraksi PEMBANGUNAN KEADILAN SEJAHTERA',
                        'route' => 'fraksi-pembangunan',
                    ],
                ]
            ],
            [
                'label' => 'Badan',
                'route' => null,
                'isActive' => request()->routeIs([
                    'badan-kehormatan', 'badan-anggaran', 'badan-musyawarah', 'badan-pembentukan'
                ]),
                'isDropdown' => true,
                'dropdown' => [
                    [
                        'label' => 'Badan Kehormatan',
                        'route' => 'badan-kehormatan',
                    ],
                    [
                        'label' => 'Badan Anggaran',
                        'route' => 'badan-anggaran',
                    ],
                    [
                        'label' => 'Badan Musyawarah',
                        'route' => 'badan-musyawarah',
                    ],
                    [
                        'label' => 'Badan Pembentukan Peraturan Daerah',
                        'route' => 'badan-pembentukan',
                    ],
                ]
            ],
            [
                'label' => 'Sekretariat DPRD',
                'route' => null,
                'isActive' => request()->routeIs(['organisasi', 'sakip']),
                'isDropdown' => true,
                'dropdown' => [
                    [
                        'label' => 'Organisasi',
                        'route' => 'organisasi',
                    ],
                    [
                        'label' => 'SAKIP',
                        'route' => 'sakip',
                    ],
                ]
            ],
            [
                'label' => 'Gallery',
                'route' => 'gallery',
                'isActive' => request()->routeIs('gallery'),
                'isDropdown' => false
            ],
            [
                'label' => 'Ruang Aspirasi',
                'route' => 'aspirasi',
                'isActive' => request()->routeIs('aspirasi'),
                'isDropdown' => false
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navlink');
    }
}
