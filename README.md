# elasic-search-docker
Simple YML file that brings for you elastic search, kibana (a tool for managing elastic search) 
and another container with php to test possibilities of the elastic search.

##Requirements:
installed docker and docker-compose

##Installation:
from the directory run command: "docker-compose up"
After containers are up you can access kibana by your browser : 
[http://localhost:5601](http://localhost:5601)  

- for kibana use username="kibana" password="changeme"
- for elastic use username="elastic" password="changeme"


##Troubleshooting:
 if during docker-compose up , yiou have an error : 
>ERROR: [1] bootstrap checks failed
> completed-elasticsearch | [1]: max virtual memory areas vm.max_map_count [65530] is too low, increase to at least [262144]
 
 run the following command: 
 > sudo sysctl -w vm.max_map_count=262144
 

##Yii example 
In the yii example used library: [https://github.com/yiisoft/yii2-elasticsearch](https://github.com/yiisoft/yii2-elasticsearch)