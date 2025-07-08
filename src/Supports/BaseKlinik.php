<?php

namespace Projects\Klinik\Supports;

use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Hanafalah\LaravelSupport\Supports\PackageManagement;

class BaseKlinik extends PackageManagement implements DataManagement
{
    protected $__config_name = 'klinik';
    protected $__klinik = [];

    /**
     * A description of the entire PHP function.
     *
     * @param Container $app The Container instance
     * @throws Exception description of exception
     * @return void
     */
    public function __construct()
    {
        $this->setConfig($this->__config_name, $this->__klinik);
    }
}
