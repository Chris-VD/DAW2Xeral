# Variables. Define o nome do contedor da aplicación. Por iso é importante o valor container_name do docker-compose.yml.Úsase despois en varias tarefas co formato $(APP).
APP=next_app

#### Tarefas

# Levantar contedores. Executa "docker compose up" en modo segundo plano (`-d`). Levanta tódolos contedores definidos no docker-compose.yml.
up:
		docker compose up --build

# Parar contedores. Para e elimina os contedores levantados.
down:
		docker compose down

# Entra no contedor da aplicación. Abre unha sesión interactiva ("bash") dentro do contedor `laravel_app`. Útil para executar comandos directamente dentro do contedor sen sair do teu host.
bash: 
		docker exec -it $(APP) bash

# Instalar unha libraría específica. para executar: "make install-lib LIB_NAME=monolog/monolog"
install-lib:
		docker exec -it $(APP) npm install $(LIB)
