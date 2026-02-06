#### Exercicio 1: Ver certificados no navegador

Explicación Neste exercicio vamos ver un certificado válido para unha páxina web e  tamén o certificado da clave certificadora. Estes poden consultarse  dende o navegador web que utilizamos.

1. Abre o navegador web Chrome. Accede a URL `https://www.iessanclemente.net/`

.

Ao lado da barra de direccións a esquerda hai un botón. Pincha nel.

Preme en `La conexión es segura`

. E despois en `El certificado es válido` e despois vaite a lapela de `Detalles`. Preme en `*.iessanclemente.net`

1.  para ver o certificado desta web. Contesta as seguintes preguntas:

- **Que significa o `\*` do nome? Podes buscar na rede.**

  Que inclúe todos os subdominios como por exemplo mestre.iessanclemente.net

- **Que algoritmo de cifrado se utiliza?**

  SHA-256

- **Quen emite o certificado?**

  Sectigo Public Server Authentication CA DV R36

- **Cando caduca o certificado?**

  17 de Outubro 2026

- **Cal é o valor clave pública do certificado?**

  55ed652afa8ca5c75c7375730c28d1412d9cd83c5857813871171f507bedf4a2

1. Agora preme no certificado da entidade certificadora. (É o primeiro que sae na árbore).

- **Cal é a clave pública do certificado da entidade certificadora?**

  0e8bb18bbeefb381be21bfc1a206d317298462ad104855f04a0542699708d3d4

- **Nas `huellas dixitais SHA-256`** **da firma, cal é a do certificado?**

  7bb647a62aeeac88bf257aa522d01ffea395e0ab45c73f93f65654ec38f25a06

Explicación Agora comprobaremos que a entidade certificadora que emite o  certificado do exercicio anterior é confiable. Para iso debe estar o  certificado dentro dos certificados confiables do navegador web.

1. Accede a `Configuración`

 de Chrome.

Preme en `Privacidad e seguridad`

. Despois en `Seguridad` e a continuación en `Gestionar certificados`. Por último en `Chrome Root Store`

1. .

2. Busca o certificado da autoridade certificadora que emite o certificado do exercicio anterior. **Realiza un captura deste e redondea a entidade certificadora cun editor de imaxes**. Utiliza os datos obtidos no exercicio 4.

   ![image-20260206002803730](/home/infe/.config/Typora/typora-user-images/image-20260206002803730.png)

   É a de abaixo

------

#### Exercicio 2: HTTPs con certificado autofirmado en Apache

Explicación Comezaremos por preparar o escenario. Neste caso para crear as máquinas virtuais vamos utilizar Vagrant. Ademais configuraremos os aspectos  básicos como SSH.

1. Descargaremos a imaxe de Vagrant de Debian 12. Para iso executa:

```bash
# Selecciona VirtualBox
$ vagrant box add debian/bookworm64
```

1. Descarga o seguinte [ficheiro de Vagrant](https://dapw-06-seguridade-e-alta-disponibilidade-no-despregue-8dc567.gitlab.io/97tarefas/t06_01/Vagrantfile). Modifica os seguintes parámetros no ficheiro:

- Nome da máquina en VirtualBox: `iniciais-apache-https`

.

Nome da máquina interno: `iniciais-apache-https`

.

IP rede `host-only`

: `192.168.56.111`

- .

1. **Entrega captura** do ficheiro de configuración de `Vagrant`

.

![image-20260206010811483](/home/infe/.config/Typora/typora-user-images/image-20260206010811483.png)

Executa o ficheiro `Vagrantfile`

1. para iniciar a máquina virtual con:

```bash
$ vagrant up
```

1. Abre VirtualBox, verás que está a máquina funcionando.
2. Configura o Visual Studio Code para acceder a máquina virtual mediante SSH utilizando o usuario `root`.
3. Accede a máquina virtual mediante SSH.

Explicación Para comezar preparamos Apache para posteriormente configurar HTTPs.

1. Instala Apache e Git.

2. Comproba que podes acceder a páxina por defecto de Apache dende o equipo anfitrión. **Entrega a captura** da páxina por defecto de Apache.

   ![image-20260206010850309](/home/infe/.config/Typora/typora-user-images/image-20260206010850309.png)

3. Activa o uso de HTTPs en Apache e o módulo `rewrite`

4. .

Explicación Para HTTPs necesitamos unha clave privada e un certificado. Nos  seguintes pasos crearemos unha clave privada e un certificado  autofirmado.

1. Instala o paquete de Debian `openssl`

Crea unha clave privada. **Entrega captura** da clave privada. Terás que abrir o ficheiro que se crea de nome `server.key`

![image-20260206011432159](/home/infe/.config/Typora/typora-user-images/image-20260206011432159.png)

1. .

```bash
$ openssl genrsa -out server.key 2048
```

1. Crea un certificado autofirmado utilizando a clave privada creada no paso anterior. Completa cos datos que desexes. **Entrega captura** do certificado. É dicir do contido do ficheiro creado `server.crt`

   ![image-20260206011610158](/home/infe/.config/Typora/typora-user-images/image-20260206011610158.png)

1. .

```bash
$ openssl req -new -x509 -key server.key -out server.crt -days 365
```

1. Move a clave privada ao directorio `/etc/ssl/private`

 e o certificado a `/etc/ssl/certs`

1. .

2. A clave privada debe pertencer ao usuario `root` sempre e os seus permisos deben de ser `600` para que só o usuario `root` a poida utilizar. Asigna estes permisos. **Entrega captura** dos comandos utilizados.

   ![image-20260206011823260](/home/infe/.config/Typora/typora-user-images/image-20260206011823260.png)

3. O certificado tamén debe de ser tamén de `root` pero os permisos deben de ser `644` para que todos os usuarios poidan ler o certificado. **Entrega captura** dos comandos utilizados.

   ![image-20260206011958809](/home/infe/.config/Typora/typora-user-images/image-20260206011958809.png)

Explicación Agora faremos o despregue dunha aplicación. Nun paso inicial  despregarémola en HTTP para ver que funciona correctamente. Isto  permítenos primeiro probar o despregue sen depender do proceso de  proporcionar seguridade.

A continuación engadiremos HTTPs utilizando a clave privada e certificado autofirmado obtidos en pasos anterirores.

Por último faremos a redirección de HTTP a HTTPs.

1. Abre co explorador de ficheiros en VSC da máquina virtual o directorio `/etc/apache2/`

.

Abre o ficheiro que está no directorio `sites-availabe`

`default-ssl`. Este é a definición dun `virtualhost`

 por defecto de HTTPs.

Desactiva os dous `virtualhost`

 por defecto.

Realiza o despregue no porto 80 do seguinte repositorio: https://github.com/GiantPro2/tiktok para o nome de dominio `tiktok.192-168-56-111.nip.io`

**Entrega captura** do despregue correcto da aplicación utilizando a dirección `http://tiktok.192-168-56-111.nip.io`

![image-20260206012844660](/home/infe/.config/Typora/typora-user-images/image-20260206012844660.png)

.

Modifica a definición de Virtualhost para utilizar HTTPs utilizando a clave privada e certificados xerados anteriormente.

**Entrega captura** do despregue correcto da aplicación utilizando a dirección `https://tiktok.192-168-56-111.nip.io`

![image-20260206013108140](/home/infe/.config/Typora/typora-user-images/image-20260206013108140.png)

![image-20260206013129965](/home/infe/.config/Typora/typora-user-images/image-20260206013129965.png)



1. . Poñerache que a web non é segura xa que a entidade certificadora non é  unha das que temos nas entidades certificadoras. Entra de tódolos  xeitos.

2. Engade a redirección de HTTP a HTTPs. Faino no mesmo ficheiro de definición de VirtualHost.

3. Comproba nunha ventá privada que funciona correctamente.

4. **Entrega captura** do ficheiro final de definición do VirtualHost.

   ![image-20260206013222546](/home/infe/.config/Typora/typora-user-images/image-20260206013222546.png)

Explicación Apagamos a máquina e eliminámola

1. Apaga a máquina utilizando Vagrant.

```bash
$ vagrant up
```

1. Elimina a máquina utilizando Vagrant.

```bash
$ vagrant destroy
```

------

