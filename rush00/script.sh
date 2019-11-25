#!/bin/bash
mysql -uroot -p
create database f_minishop
mysql -uroot -p f_minishop < f_minishop.sql