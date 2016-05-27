<?php

namespace MFID\exception;


class InvalidAuth extends Exception
{
    public function getName()
    {
        return 'Invalid Auth';
    }
}