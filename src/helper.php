<?php

if (!function_exists('klinik_path')) {
   function klinik_path(?string $path = null) {
       return __DIR__ . (isset($path) ? DIRECTORY_SEPARATOR . $path : '');
   }
}