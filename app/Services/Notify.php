<?php

namespace App\Services;

class Notify
{
    public static function createNotify()
    {
        return notify()->success('Create Data successfully');
    }

    public static function updateNotify()
    {
        return notify()->success('Update Data successfully');
    }

    public static function deleteNotify()
    {
        return notify()->success('Delete Data successfully');
    }
}
