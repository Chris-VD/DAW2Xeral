#### Exercicio 1: Construción da imaxe de produción para Laravel

Explicación Agora que temos xa o arquetipo de Laravel, vamos coller xa un código  implantado para ver como podemos realizar a posta en produción dunha  aplicación realizada con este *framework*. Deberemos tamén lanzar unha migración de base de datos, debido a que a aplicación necesita un  esquema concreto para o seu funcionamento.

1. Crea un `fork` do proxecto `Arquetipo de Laravel`

 e clónao no teu equipo de nome `T05.02 Despregue Laravel`

.

Descarga o seguinte [código](https://dapw-05-contedores-e-cloud-no-despregue-8c4f14.gitlab.io/97tarefas/t05_02/codigo_laravel.zip) e inclúeo no directorio `src` (copia ben tódolos ficheiros oculos, senón podes obter probemas).

Comproba que podes levantar o proxecto sen problemas con `make up`

 visitando `localhost:8080`

.

Realiza a migración. Despois visita a URL para comprobar que non hai erros `http://localhost:8080/api/libros`

 e que a aplicación funciona correctamente. **Realiza capturas** do funcionamento da aplicación.

![Screenshot_20260127_213517](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud05/01/capturas/Screenshot_20260127_213517.png)

**Elimina o directorio `vendor`**

1.  **do directorio `src`.**

Explicación Agora procederemos a poñer desenvolver o procedemento de posta en  produción da aplicación. Esta posta en produción realizarémola en  Docker.

1. Crea o `Dockerfile`

 de produción de nome `Dockerfile.prod`

. Recorda instalar as librerías necesarias para conectar con PostresSQL.

Xera unha `APP_KEY`

 para o proxecto (esta inclúe a parte de `base64`

1. ) utilizando o terminal:

```bash
APP_KEY="base64:$(head -c 32 /dev/urandom | base64)"
echo $APP_KEY
```

1. Crea o o ficheiro `docker-compose.prod.yaml`

 e `entrypoint.prod.sh`

1.  para produción. Modifica tan só as variables de conexión a base de  datos polas que tiñamos en Aiven. Mapea o servizo da aplicación para que escoite polo **porto 9001**.

Explicación Podemos crear novos comandos `make` para poder probar a posta en produción da nosa aplicación. Neste caso  as probas podémolas facer no propio equipo e comprobar que todo funciona correctamente.

1. Crea un novo comando `deploy`

 para despregar en produción e outro `deploy-stop`

1.  para parar a produción:

```makefile
# E interesante o --build para que se reconstrúa a imaxe sempre
deploy:
	docker compose -f docker-compose.prod.yaml up -d --build

deploy-stop:
	docker compose -f docker-compose.prod.yaml down
```

1. Pon en marcha a aplicación en produción e comproba que funciona a URL: http://localhost:9001/api/libros. **Entrega capturas** dos ficheiros `Dockerfile.prod`

, `docker-compose.prod.yaml`, `entrypoint.prod.yaml` e `Makefile`

![Screenshot_20260127_231021](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud05/01/capturas/Screenshot_20260127_231021.png)

![Screenshot_20260127_231045](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud05/01/capturas/Screenshot_20260127_231045.png)

![Screenshot_20260127_231106](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud05/01/capturas/Screenshot_20260127_231106.png)

![Screenshot_20260127_231121](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud05/01/capturas/Screenshot_20260127_231121.png)

1. .
2. Para o despregue, e agora sube ao repositorio tódolos cambios.

Explicación Podemos engadir os ficheiros xerados para a posta en produción ao noso  arquetipo de Laravel. Deste xeito, cando creemos unha nova aplicación  con este *framework* tamén teremos realizado o procedemento de posta en produción.

1. Agora no repositorio `Arquetipo de Laravel`

 podes engadir o novo `Makefile` e os ficheiros de `Dockerfile.prod`, `docker-compose.prod.yaml` e `entrypoint.prod.yaml`

.

No repositorio `Arquetipo de Laravel`

 crea un ficheiro `Readme.md` explicando en que consiste o arquetipo na súa totalidade: que contén, como funciona, para que serve, etc. **Entrega capturas** da totalidade do ficheiro `Readme.md`

![Screenshot_20260127_231845](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud05/01/capturas/Screenshot_20260127_231845.png)

1. .

------

#### Exercicio 2: Despregue da aplicación de Laravel en produción

Explicación Vamos preparar a nosa máquina de produción (`dapw_iniciais_server_01`) para poder utilizar os ficheiros `Makefile`

. Tamén instalaremos Doccker, debido a que agora nesta máquina a produción realizarase mediante esta tecnoloxía.

1. Na máquina `dapw_iniciais_server_01`

 recupera a instantánea `admin_remota_configurada`

.

Instala o paquete `build-essential`

 para poder utilizar os ficheiros `Makefile`

.

Instala Docker: https://docs.docker.com/engine/install/debian/. E realiza a configuración post instalación (https://docs.docker.com/engine/install/linux-postinstall). E dicir, engade o usuario `dadmin`

 ao grupo `docker`. **Entrega captura** do `Hello world` de Docker. (Non é necesario `Docker rootless`

)

![2026-01-28_11-06](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud05/01/capturas/2026-01-28_11-06.png)

Apaga a máquina e crea unha nova instantánea `docker_instalado`

. Crea ademais unha `OVA` de nome `dapw-docker.ova`

1. . É importante esta última porque necesitarémola máis adiante.

Explicación A partir das seguintes tarefas utilizaremos varias máquina e vai ser  importante ter claro que IP ten cada unha delas. Polo tanto é  conveniente non utilizar o servidor DHCP para isto, e utilizar IPs fixas nos servidores. Senón dependeriamos ata da secuencia de inicio das  máquinas para que se repetisen as IPs.

Esta máquina a partir deste momento converterase no **servidor de produción con Docker**.

1. Deshabilita o servidor DHCP da rede `Anfitrión sólo anfitrión`

.

Inicia a máquina `dapw_iniciais_server_01`

 e modifica o ficheiro `/etc/network/interfaces` para asignar unha IP estática a máquina na rede de `Anfitrión sólo anfitrión`

1. :

```vim
auto enp0s8
iface enp0s8 inet static
address 192.168.56.101
netmask 255.255.255.0
```

1. Executa o comando `sudo sytemctl restart networking.service`

1.  e comproba con `ip a` que obtiveches a IP desexada.

Explicación Para finalizar a tarefa, tan só necesitamos o noso repositorio para  despregar en produción a nosa aplicación. Docker permítenos reproducir  de xeito exacto a posta en produción. Polo tanto se funcionou no noso  equipo, vai funcionar en calquera servidor.

1. Inicia a máquina `dapw_iniciais_server_01`

. Clona o repositorio `T05.02 Despregue Laravel`

 e executa o despregue.

Proba que todo funciona utilizando a seguinte URL: `http://192.168.56.101:9001/api/libros`

. **Entrega captura** onde se vexa a aplicación funcionando.

![2026-01-28_11-27](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud05/01/capturas/2026-01-28_11-27.png)