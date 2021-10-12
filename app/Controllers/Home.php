<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Dashboard'
		];

		return view('Dashboards/Dashboard_General', $data);
	}

	public function user()
	{
		return view('Dashboards/Dashboard_User');
	}
}
