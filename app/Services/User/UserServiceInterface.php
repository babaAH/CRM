<?php

namespace App\Services\User;

interface UserServiceInterface
{
    public function create($data);
    public function update($data, $id);
    public function show($id);
    public function index();
    public function delete($id);
}
