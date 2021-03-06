FROM php:7-fpm

MAINTAINER MBADI BAYEBEC Prosper Emmanuel

ENV LANG fr_FR.UTF-8 

RUN mkdir -p /usr/local/bin

RUN curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony

RUN chmod a+x /usr/local/bin/symfony


RUN mkdir -p /project
WORKDIR /project

#install vim
RUN apt-get update -y
RUN apt-get install vim -y
RUN apt-get install vim -y
RUN apt-get install vim -y
ADD colors /etc/vim/colors
ADD vimrc.local /etc/vim

#get project files
WORKDIR /project

EXPOSE 8000
