#!/usr/bin/env bash

green=`tput setaf 2`

echo "${green}Building Assets"
npm run prod
