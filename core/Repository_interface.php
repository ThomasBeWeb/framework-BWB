<?php
namespace BWB\CORE;

interface Repository_interface{

    public function getAll();

    public function getAllBy($filter);
}