<?php

namespace App\Services\Report\Contracts;

interface ApiInterface
{
	/**
     * GET 请求
     * @param string $path
     * @param array $params
     * @return mixed
     */
    public function GET(string $path,array $params=[]);
    public function POST(string $path,array $formData=[],array $params=[]);
    public function HEAD(string $path);
    public function PUT(string $path,array $formData=[],array $params=[]);
    public function DELETE(string $path);
    public function setHeader(array $params=[]);
}