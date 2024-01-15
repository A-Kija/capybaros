<?php

namespace App\DB;

// use App\DB\DataBase;

class FileBase implements DataBase
{
    private $file, $data, $index, $save = true;

    public function __construct($name)
    {
        $this->file = ROOT . 'data/' . $name . '.json';
        $this->indexFile = ROOT . 'data/' . $name . '-index.json';
        if (!file_exists($this->file)) {
            file_put_contents($this->file, json_encode([]));
            file_put_contents($this->indexFile, json_encode(1));
        }
        $this->data = json_decode(file_get_contents($this->file));
        $this->index = json_decode(file_get_contents($this->indexFile));
    }

    public function __destruct()
    {
        if ($this->save) {
            file_put_contents($this->file, json_encode($this->data));
            file_put_contents($this->indexFile, json_encode($this->index));
        }
    }   


    public function create(object $data) : int
    {
        $id = $this->index;
        $this->index++;
        $data->id = $id;
        $this->data[] = $data;
        return $id;
    }

    public function update(int $id, object $data) : bool
    {
        foreach ($this->data as $key => $value) {
            if ($value->id == $id) {
                $data->id = $id;
                $this->data[$key] = $data;
                return true;
            }
        }
        return false;
    }

    public function delete(int $id) : bool
    {
        foreach ($this->data as $key => $value) {
            if ($value->id == $id) {
                unset($this->data[$key]);
                $this->data = array_values($this->data);
                return true;
            }
        }
        return false;
    }

    public function show(int $id) : object
    {
        $this->save = false;
        foreach ($this->data as $key => $value) {
            if ($value->id == $id) {
                return $value;
            }
        }
        return null;
    }
    
    public function showAll() : array
    {
        $this->save = false;
        return $this->data;
    }


}