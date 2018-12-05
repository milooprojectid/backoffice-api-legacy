#!/usr/bin/env bash

green=`tput setaf 2`

echo "${green}Installing Dependencies"
npm install

echo "${green}Building Assets"
npm run prod
