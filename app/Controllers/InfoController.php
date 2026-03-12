<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class InfoController extends BaseController
{
    public function index(): string
    {
        $data = [
            'organization' => 'PT. BPR Bank Bantul (Perseroda)',
            'developer'    => 'Ana Jariyatun Khasanah dan Hidayah Ridho Safitri',
            'year'         => '2026',
        ];

        return view('user/info', $data);
    }
}