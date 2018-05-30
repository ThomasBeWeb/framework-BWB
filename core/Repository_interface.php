<?php
namespace BWB\Framework\mvc;

interface Repository_interface{

    public function getAll();

    public function getAllBy($filter);
}