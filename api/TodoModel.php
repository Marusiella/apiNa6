<?php

class TodoModel
{
    public int $id;
    public string $title;
    public int $timestamp;
    public bool $done;
    public function __construct(int $id, string $title, int $timestamp, bool $done)
    {
        $this->id = $id;
        $this->title = $title;
        $this->timestamp = $timestamp;
        $this->done = $done;
    }
    private function toJson(): string {
        return json_encode($this);
    }
    public function toString(): string
    {
        return $this->toJson();
    }


}