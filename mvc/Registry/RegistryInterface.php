<?php
namespace mvc\Registry;

interface RegistryInterface {
    public function set($key, $value);
    public function get($key);
}
