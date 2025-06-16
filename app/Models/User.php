<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // Laravel sudah punya banyak fitur bawaan seperti autentikasi, relasi, dll.

   protected $fillable = [
    'username',
    'email',
    'institusi',
    'kelas',
    'password',
];

public function progress()
{
    return $this->hasMany(UserProgress::class);
}

}
