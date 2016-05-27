<?php

namespace MFID\exception;

class InvalidConfig extends Exception
{
    public function getName()
    {
        return 'InvalidConfig';
    }
}