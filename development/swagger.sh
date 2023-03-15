#!/bin/bash

mkdir ../public/doc

php ../vendor/bin/openapi --bootstrap ./swagger-constants.php --output ../public/doc/swegger.json ./swagger-v1.php ../app/Http/Controllers