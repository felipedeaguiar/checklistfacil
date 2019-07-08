<?php
namespace Checklist\Commons;

class ImportaArquivo
{
    protected $caminho;
    protected $file;

    public function __construct(String $caminho)
    {
        $this->caminho = $caminho;
    }

    public function setFile($file){
        $this->file = $file;
    }

    public function importar(){

        $uploadfile = $this->caminho. time(). basename($this->file['file']['name']);

        if(!move_uploaded_file($this->file['file']['tmp_name'], $uploadfile)){
            throw new Exception('Arquivo não pode ser salvo');
        }

        return $uploadfile;
    }

}