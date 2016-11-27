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
WORKDIR /projecti
RUN git clone https://mbadib_p@bitbucket.org/sigl2017ursi/php.git

#COPY project/ /project

#VOLUME /project

EXPOSE 8000

