<?php

namespace App\Policies;

use App\User;
use App\Message; // 新增

use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function destroy(User $user, Message $message)
    {
        return $user->id === $message->user_id;
    }
}
