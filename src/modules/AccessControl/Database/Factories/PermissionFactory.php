<?php

namespace App\Modules\AccessControl\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Modules\AccessControl\Models\Permission;

class PermissionFactory extends Factory
{
    protected $model = Permission::class;

    public function definition(): array
    {
        return [
            'name' => fake()->unique()->word(),
        ];
    }


    public function predefined(string $name)
    {
        return $this->state(fn () => [
            'name' => $name,
        ]);
    }
}
