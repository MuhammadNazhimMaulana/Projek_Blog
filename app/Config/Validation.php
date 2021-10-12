<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules

	public $register = [
		'nama' => [
			'rules' => 'required',
		],
		'username' => [
			'rules' => 'required|min_length[5]',
		],
		'email' => [
			'rules' => 'required',
		],
		'password' => [
			'rules' => 'required',
		],
		'password_confirm' => [
			'rules' => 'required|matches[password]',
		]
	];

	public $register_errors = [
		'nama' => [
			'required' => '{field} Harus diisi',
		],
		'username' => [
			'required' => '{field} Harus diisi',
			'min_length' => '{field} Minimal 5 karakter,'
		],
		'email' => [
			'required' => '{field} Harus diisi',
		],
		'password' => [
			'required' => '{field} Harus diisi',
		],
		'password_confirm' => [
			'required' => '{field} Harus diisi',
			'matches' => '{field} Tidak sama dengan Password',
		]
	];

	public $login = [
		'username' => [
			'rules' => 'required|min_length[3]',
		],
		'password' => [
			'rules' => 'required',
		],
	];

	public $login_errors = [
		'username' => [
			'required' => '{field} Harus diisi',
			'min_length' => '{field} Minimal 3 karakter,'
		],
		'password' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $kategory = [
		'nama_kategori' => [
			'rules' => 'required|is_unique[tbl_kategory.nama_kategori]',
		],
		'slug_kategori' => [
			'rules' => 'required',
		],
	];

	public $kategory_errors = [
		'nama_kategori' => [
			'required' => '{field} Harus diisi',
			'is_unique' => 'Kategori yang dimasukksan Sudah Ada'
		],
		'slug_kategori' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $kategory_update = [
		'nama_kategori' => [
			'rules' => 'required',
		],
		'slug_kategori' => [
			'rules' => 'required',
		],
	];

	public $kategory_update_errors = [
		'nama_kategori' => [
			'required' => '{field} Harus diisi',
		],
		'slug_kategori' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $komentar = [
		'id_post' => [
			'rules' => 'required',
		],
		'nama_komentator' => [
			'rules' => 'required',
		],
		'isi_komentar' => [
			'rules' => 'required',
		],
	];

	public $komentar_errors = [
		'id_post' => [
			'required' => '{field} Harus diisi',
		],
		'nama_komentator' => [
			'required' => '{field} Harus diisi',
		],
		'isi_komentar' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $komentar_update = [
		'id_post' => [
			'rules' => 'required',
		],
		'nama_komentator' => [
			'rules' => 'required',
		],
		'isi_komentar' => [
			'rules' => 'required',
		],
	];

	public $komentar_update_errors = [
		'id_post' => [
			'required' => '{field} Harus diisi',
		],
		'nama_komentator' => [
			'required' => '{field} Harus diisi',
		],
		'isi_komentar' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $post = [
		'id_kategory' => [
			'rules' => 'required',
		],
		'id_pengguna' => [
			'rules' => 'required',
		],
		'judul_post' => [
			'rules' => 'required',
		],
		'slug' => [
			'rules' => 'required',
		],
		'summary' => [
			'rules' => 'required',
		],
		'body' => [
			'rules' => 'required',
		],
		'foto_blog' => [
			'rules' => 'uploaded[foto_blog]',
		],
	];

	public $post_errors = [
		'id_kategory' => [
			'required' => '{field} Harus diisi',
		],
		'id_pengguna' => [
			'required' => '{field} Harus diisi',
		],
		'judul_post' => [
			'required' => '{field} Harus diisi',
		],
		'slug' => [
			'required' => '{field} Harus diisi',
		],
		'summary' => [
			'required' => '{field} Harus diisi',
		],
		'body' => [
			'required' => '{field} Harus diisi',
		],
		'foto_blog' => [
			'uploaded' => '{field} Harus diupload',
		],
	];

	public $post_update = [
		'id_kategory' => [
			'rules' => 'required',
		],
		'id_pengguna' => [
			'rules' => 'required',
		],
		'judul_post' => [
			'rules' => 'required',
		],
		'slug' => [
			'rules' => 'required',
		],
		'summary' => [
			'rules' => 'required',
		],
		'body' => [
			'rules' => 'required',
		],
	];

	public $post_update_errors = [
		'id_kategory' => [
			'required' => '{field} Harus diisi',
		],
		'id_pengguna' => [
			'required' => '{field} Harus diisi',
		],
		'judul_post' => [
			'required' => '{field} Harus diisi',
		],
		'slug' => [
			'required' => '{field} Harus diisi',
		],
		'summary' => [
			'required' => '{field} Harus diisi',
		],
		'body' => [
			'required' => '{field} Harus diisi',
		],
	];

	//--------------------------------------------------------------------
}
