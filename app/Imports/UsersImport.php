<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) 
        {
            if ($key < 5) {
                continue;
            }
            User::create([
                'name' => $row[0],
            ]);
        }
    }
}