<?php

namespace MFID\exception;


class ServerError extends Exception
{
    public function getName()
    {
        return 'Server Error';
    }
}
