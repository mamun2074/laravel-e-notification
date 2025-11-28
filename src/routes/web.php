<?php

use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => config('enotification-config.route-prefix'),
    'namespace' => 'Mamun2074\ENotification\Http\Controllers'
    // 'middleware' => ['web1', 'auth1']
], function () {
    Route::resource('credentials', 'NotificationCredentialController', ['names' => config('enotification-config.route-name-prefix') . '_credentials']);
});
