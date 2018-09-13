<?php
namespace App\Mylibrary\Facades;
use App\Mylibrary\ToolFactory;
use Illuminate\Support\Facades\Facade;

class Tool extends  Facade{
    protected static function getFacadeAccessor()
    {
        return ToolFactory::class;
    }
}
?>