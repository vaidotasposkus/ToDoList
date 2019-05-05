<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'title' => 'ToDo List',
    'text' => [
        'edit' => 'Edit Task: ',
        'add' => 'Add New Task: '
    ],
    'form' => [
        'placeholder' => 'Add new task',
        'buttons' => [
            'add' => 'Add',
            'update' => 'Update',
            'title' => [
                'add' => 'Add New Task',
                'update' => 'Update Task'
            ]
        ]
    ],
    'todoTable' => [
        'title' => 'Tasks To Do',
        'placeholder' => 'Enter you E-mail address',
        'header' => [
            'id' => '#',
            'name' => 'ToDo',
            'action' => 'Action'
        ],
        'buttons' => [
            'edit' => 'Edit',
            'delete' => 'Delete'
        ],
        'deleteException' => 'Are you sure?'
    ],

];
