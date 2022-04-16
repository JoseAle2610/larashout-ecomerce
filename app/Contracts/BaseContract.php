<?php

namespace App\Contracts;

interface BaseContract {

    /**
     * Create a model interface
     * @param array $attributes
     * @retun mixed
     * */
    public function create(array $attributes);

    /**
     * Update a model interface
     * @param array $attributes
     * @param int $id
     * return mixed
     * */
    public function update(array $attributes, int $id);


    /**
     * return all model rows
     * @param array $colums
     * @param string $orderBy
     * @param string $sortBy
     * return mixed
     * */
    public function all($colums = array('*'), string $orderBy = 'id', string $sortBy = 'desc');
    public function find(int $id);
    public function findBy(array $data);
    public function findOneBy(array $data);
    public function findOneByOrFail(array $data);
    public function delete();

}
