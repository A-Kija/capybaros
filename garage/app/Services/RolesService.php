<?php

namespace App\Services;

use Illuminate\Contracts\Foundation\Application;

class RolesService {

    private $app;
    private $role;


    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->role = request()->user()?->role;
    }

    public function show(string $roles) : bool
    {
        return (in_array($this->role, explode('|', $roles)));
    }

}