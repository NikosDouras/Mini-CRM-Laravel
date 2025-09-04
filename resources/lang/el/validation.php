<?php

return [
        'required'   => 'Το πεδίο :attribute δεν μπορεί να είναι κενό.',
    'string'     => 'Το πεδίο :attribute πρέπει να είναι κείμενο.',
    'max' => [
        'string' => 'Το πεδίο :attribute δεν μπορεί να υπερβαίνει τους :max χαρακτήρες.',
        'file'   => 'Το αρχείο :attribute δεν μπορεί να είναι μεγαλύτερο από :max kilobytes.',
    ],
    'email'      => 'Το πεδίο :attribute πρέπει να είναι έγκυρη διεύθυνση email.',
    'lowercase'  => 'Το πεδίο :attribute πρέπει να είναι σε πεζά.',
    'unique'     => 'Το :attribute έχει ήδη ληφθεί.',
    'exists'     => 'Το επιλεγμένο :attribute δεν είναι έγκυρο.',
    'url'        => 'Το πεδίο :attribute πρέπει να είναι έγκυρο URL.',
    'image'      => 'Το πεδίο :attribute πρέπει να είναι εικόνα.',
    'mimes'      => 'Το πεδίο :attribute πρέπει να είναι αρχείο τύπου: :values.',
    'dimensions' => 'Το πεδίο :attribute έχει μη έγκυρες διαστάσεις εικόνας.',
    'attributes' => [
        'name'       => 'όνομα',
        'first_name' => 'όνομα',
        'last_name'  => 'επώνυμο',
        'company_id' => 'εταιρεία',
        'logo'       => 'λογότυπο',
    ],
    'custom' => [
        'logo' => [
            'dimensions' => 'Το λογότυπο πρέπει να είναι τουλάχιστον 100x100px.',
        ],
    ],
];
