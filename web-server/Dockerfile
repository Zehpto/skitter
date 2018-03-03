# AoT
#
# Version 1

FROM glassfish:latest

COPY index.html glassfish/domains/domain1/docroot/index.html
#COPY web.xml glassfish/domains/domain1/config/default-web.xml
#COPY Skitter_war.war glassfish/domains/domain1/autodeploy/Skitter_war.war

COPY start.sh /
COPY Skitter_war.war /

ENTRYPOINT ["/start.sh"]
