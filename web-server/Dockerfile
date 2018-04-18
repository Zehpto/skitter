FROM nginx

RUN mkdir /usr/share/nginx/html/CSS/
RUN mkdir /usr/share/nginx/html/img/

COPY CSS /usr/share/nginx/html/CSS
COPY img /usr/share/nginx/html/img

RUN chmod -R 777 /usr/share/nginx/html/CSS
RUN chmod -R 777 /usr/share/nginx/html/img

COPY index.html /usr/share/nginx/html

EXPOSE 81
#FROM glassfish:latest

#COPY index.html glassfish/domains/domain1/docroot/index.html
#COPY default-web.xml glassfish/domains/domain1/config/default-web.xml

#COPY start.sh /
#COPY Skitter_war.war /

#ENTRYPOINT ["/start.sh"]
