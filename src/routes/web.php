<?php

use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => config('enotification-config.route-prefix'),
    'namespace' => 'Mamun2074\ENotification\Http\Controllers'
], function () {
    Route::resource('credentials', 'NotificationCredentialController', ['names' => config('enotification-config.route-name-prefix').'_credentials']);
});
