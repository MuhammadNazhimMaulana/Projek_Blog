<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('Dashboards/Dashboard_General');
	}

	public function user()
	{
		return view('Dashboards/Dashboard_User');
	}
}
