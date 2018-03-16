#!/bin/bash
GRN='\033[0;32m'
RED='\033[0;31m'
NC='\033[0m'
echo -e "${GRN}Clearing Cache${NC}"
rm -rf /var/www/clientreachapi.com/current/app/cache/*
echo -e "${GRN}Cache Cleared${NC}"
echo -e "${GRN}Reloading php5.6-fpm${NC}"
service php5.6-fpm reload
echo -e "${GRN}php5.6-fpm Reloaded${NC}"
if [ ${1--foo}  = "-c" ]
then
	echo -e "${GRN}Composer dumpautoload Initiating${NC}"
	php5.6 /usr/bin/composer dumpautoload -o
	echo -e "${GRN}Composer autoload Dumped${NC}"
else
	echo -e "${RED}Use Argument 'c' To Dump Composer Autoload${NC}"
fi
