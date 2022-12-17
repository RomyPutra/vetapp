<?php namespace Config;

class Validation
{
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	public $transaction = [
		'trx_file'         => 'uploaded[trx_file]|ext_in[trx_file,xls,xlsx]|max_size[trx_file,1000]',
	];

	public $transaction_errors = [
		'trx_file'=> [
			'ext_in' 	=> 'File Excel hanya boleh diisi dengan xls atau xlsx.',
			'max_size'	=> 'File Excel product maksimal 1mb',
			'uploaded'	=> 'File Excel product wajib diisi'
		]
	];

	public $authlogin = [
		'email'         => 'required|valid_email',
		'password' 		=> 'required'
	];

	public $authlogin_errors = [
		'email'=> [
			'required' 	=> 'Email wajib diisi.',
			'valid_email'	=> 'Email tidak valid'
		],
		'password'=> [
			'required' 	=> 'Password wajib diisi.'
		]
	];

	public $authregister = [
		'email'         	=> 'required|valid_email|is_unique[users.email]',
		'username' 			=> 'required|alpha_numeric|is_unique[users.username]|min_length[8]|max_length[35]',
		'name' 				=> 'required|alpha_numeric_space|min_length[3]|max_length[35]',
		'password' 			=> 'required|string|min_length[8]|max_length[35]',
		'confirm_password' 	=> 'required|string|matches[password]|min_length[8]|max_length[35]',
	];

	public $authregister_errors = [
		'email'=> [
			'required' 		=> 'Email wajib diisi',
			'valid_email'	=> 'Email tidak valid',
			'is_unique'		=> 'Email sudah terdaftar'
		],
		'username'=> [
			'required' 		=> 'Username wajib diisi',
			'alpha_numeric'	=> 'Username hanya boleh berisi huruf dan angka',
			'is_unique'		=> 'Username sudah terdaftar',
			'min_length'	=> 'Username minimal 8 karakter',
			'max_length'	=> 'Username maksimal 35 karakter'
		],
		'name'=> [
			'required' 				=> 'Name wajib diisi',
			'alpha_numeric_spaces'	=> 'Name hanya boleh berisi huruf, angka dan spasi',
			'min_length'			=> 'Name minimal 3 karakter',
			'max_length'			=> 'Name maksimal 35 karakter'
		],
		'password'=> [
			'required' 		=> 'Password wajib diisi',
			'string'		=> 'Password hanya boleh berisi huruf, angka, spasi dan karakter lain',
			'min_length'	=> 'Password minimal 8 karakter',
			'max_length'	=> 'Password maksimal 35 karakter'
		],
		'confirm_password'=> [
			'required' 		=> 'Konfirmasi password wajib diisi',
			'string'		=> 'Konfirmasi password hanya boleh berisi huruf, angka, spasi dan karakter lain',
			'matches'		=> 'Konfirmasi password tidak sama dengan password',
			'min_length'	=> 'Konfirmasi password minimal 8 karakter',
			'max_length'	=> 'Konfirmasi password maksimal 35 karakter'
		]
	];

	public $obat = [
        'obatid'     		=> 'required|is_unique[obat.obatid]',
        'obatname'     		=> 'required',
        'kandungan'     	=> 'required'
	];
	
	public $obat_errors = [
        'obatid' => [
            'required'    	=> 'Obat id wajib diisi.',
        ],
        'obatname' => [
            'required' 		=> 'Nama obat wajib diisi.'
        ],
        'kandungan' => [
            'required' 		=> 'Kandungan obat wajib diisi.'
        ]
	];
	
	public $pasien = [
        'pasienid'     		=> 'required|is_unique[pasien.pasienid]',
        'pasienname'     	=> 'required',
        'age'     			=> 'required'
	];
	
	public $pasien_errors = [
        'pasienid' => [
            'required'    	=> 'Pasien id wajib diisi.',
        ],
        'pasienname' => [
            'required' 		=> 'Nama pasien wajib diisi.'
        ],
        'age' => [
            'required' 		=> 'Umur pasien wajib diisi.'
        ]
	];
	
	public $riwayat = [
        'pasienname'     	=> 'required',
        'diagnosa'     		=> 'required',
        'tindakan'     		=> 'required'
	];
	
	public $riwayat_errors = [
        'pasienname' => [
            'required'    	=> 'Nama pasien wajib diisi.',
        ],
        'diagnosa' => [
            'required' 		=> 'Diagnosa wajib diisi.'
        ],
        'tindakan' => [
            'required' 		=> 'Tindakan wajib diisi.'
        ]
	];
	
}
