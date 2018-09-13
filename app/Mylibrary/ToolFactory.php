<?php
namespace  App\Mylibrary;
class ToolFactory{
  public  function getThumbnail($filename,$suffix ='_thumb'){
      if($filename){
          return preg_replace("/(.*)\.(.*)/i", "$1{$suffix}.$2", $filename);
      }
      return '';
  }
}
?>