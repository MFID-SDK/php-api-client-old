<?php

namespace MFID\service;

use MFID\Api;

class ApiService extends Api
{
    public $app;
    public $emission;
    public $merchant;
    public $address;
    public $card;
    public $customer;
    public $offer;
    public $market;
    public $transaction;

    public function __construct($config, $auth)
    {
        parent::__construct($config, $auth);

        $this->app         = new App($this);
        $this->emission    = new Emission($this);
        $this->merchant    = new Merchant($this);
        $this->address     = new Address($this);
        $this->card        = new Card($this);
        $this->customer    = new Customer($this);
        $this->offer       = new Offer($this);
        $this->market      = new Market($this);
        $this->transaction = new Transaction($this);
    }
}