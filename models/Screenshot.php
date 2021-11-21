<?php

class Screenshot
{
    private $id;
    private $date;
    private $uuid;
    // base64 decoded string
    private $src;

    public function __construct(int $id, String $date, String $uuid, String $src)
    {
        $this->id = $id;
        $this->date = $date;
        $this->uuid = $uuid;
        $this->src = $src;
    }
}