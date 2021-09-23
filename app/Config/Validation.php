<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	// validasi auth form login
	public $form_login = [
		'email'     => 'required|min_length[10]',
		'password'  => 'required|min_length[3]'
	];

	public $form_login_error = [
			'email'     => [ 
								'required'		=> 'Entrian Email wajib diisikan',
								'min_length'	=> 'Entrian minimal 10 karakter',
			],
			'password'     => [ 
								'required'		=> 'Entrian kata sandi wajib diisikan',
								'min_length'	=> 'Entrian minimal 3 karakter',
			],
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
