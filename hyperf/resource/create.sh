#!/bin/bash
a='/hyperf-skeleton/vendor'
if [ ! -d $a ];then
    composer install
fi