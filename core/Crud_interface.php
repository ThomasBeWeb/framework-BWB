<?php
namespace BWB\Framework\mvc;

interface Crud_interface {

    public function create($entity);

    /**
     * @param & Une reference vers l'objet à récupérer
     */
    public function retrieve($entity);

    public function update($entity,$tab);

    public function delete($entity);

}