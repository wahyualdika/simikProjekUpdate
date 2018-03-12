<?php

namespace App\Providers;

use App\Data_Dosen;
use App\DataMahasiswa;
use App\DataStaff;
use App\Policies\AdminPolicy;
use App\Publikasi;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        DataMahasiswa::class => AdminPolicy::class,
        DataStaff::class => AdminPolicy::class,
        Data_Dosen::class => AdminPolicy::class,
        Publikasi::class => AdminPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
