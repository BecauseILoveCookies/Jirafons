<?php

return [

    'initialize' => function ($authority) {

        $user = Auth::guest() ? new User : $authority->getCurrentUser();

        if ($user->hasRole('student')) {
            $authority->allow('read', Internship::class);
            $authority->allow('create', Proposal::class);
            $authority->allow('read', User::class);
            $authority->allow('edit', User::class);
        }

        if ($user->hasRole('teacher')) {
            $authority->allow('manage', Internship::class);
            $authority->allow('manage', User::class);
        }

        if ($user->hasRole('partner')) {
            $authority->allow('create', Internship::class);
            $authority->allow('read', User::class);
        }

        if ($user->hasRole('admin')) {
            $authority->allow('manage', 'all');
        }

    }

];
