<?php

namespace App\Repositories; 

use App\User; 
use App\Task; 

class TaskRepository 
{
    
    public function forUser(User $user)
    {
        return Task::where('user_id', $user->id)
            ->orderBy('updated_at', 'desc')
            ->get(); 
    }
}