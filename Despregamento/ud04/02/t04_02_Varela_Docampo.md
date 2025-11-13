#### Exercicio 1: Comando scp

Explicación Neste primeiro exercicio vamos ver como podemos **transferir ficheiros dende un equipo a outro utilizando SSH** mediante o comando `scp`.

**`scp`** é unha utilidade de liña de  comandos para copiar ficheiros entre un equipo local e un equipo remoto  (ou entre dous remotos) usando o protocolo SSH. Usar as mesmas  credenciais e configuración que usas con `ssh`. A súa sintaxe básica é:

```
scp [opcións] origen destino
```

Exemplos:

```bash
# Copia o ficheiro "arquivo.txt" a "/ruta/remota/" do equipo host co usuario "usuario"
$ scp arquivo.txt usuario@host:/ruta/remota/
# Copia un ficheiro local a remoto
scp arquivo.txt usuario@host:/ruta/remota/
# Copia un directorio enteiro (recursivamente)
scp -r carpeta_local usuario@host:/ruta/remota/
```

1. Inicia a máquina virtual `dapw_iniciais_server_01`

 e conéctate por SSH dende o Visual Studio Code.

Descarga o seguinte ficheiro [zip](https://dapw-04-depregue-en-producion-con-servidores-web-55df0e.gitlab.io/97tarefas/t04_02/peliculas.zip) que contén o código da aplicación e descomprímeo.

Crea na máquina virtual o directorio `/var/www/peliculas/`

.

Abre un terminal local. Copia o directorio descomprimido co código no directorio do equipo remoto `/home/dadmin/`

 utilizando `scp`. Non o copiamos directamente en `/var/www/peliculas/`

 por problemas cos permisos. **Entrega captura** da saída deste comando.

![Screenshot_20251113_205857](/home/infe/Documents/DAW2Xeral/Despregamento/ud04/02/01/Screenshot_20251113_205857.png)

Move tódolos ficheiros subidos a `/var/www/peliculas/`

. Recorda que necesitaras permisos de superusuario (utiliza `sudo`).

Pon como propietario do directorio `/var/www/peliculas/`

 e todos os ficheiros que conteña ao usuario e grupo `www-data`

.

Executa o comando `ls -la`

 dentro do directorio `/var/www/peliculas/`

1. . **Entrega captura** da saída deste comando.

   ![Screenshot_20251113_210541](/home/infe/Documents/DAW2Xeral/Despregamento/ud04/02/01/Screenshot_20251113_210541.png)

------

#### Exercicio 2: Instalación de PHP para Apache

Explicación**Instalaremos o intérprete de PHP** así como aqueles paquetes necesarios para o seu funcionamento xunto a Apache. Ademais crearemos un `virtualhost`

 para poder servir a aplicación que subimos no anterior exercicio.

1. Instala PHP e os paquetes necesarios para que conecte con Apache.
2. Copia o ficheiro de configuración `estatico.conf`

 do `virtualhost` da tarefa anterior. Este serviranos de plantilla para crear o novo `virtualhost`. O novo ficheiro terá de nome `peliculas.conf`

.

Modifica o ficheiro `peliculas.conf`

 para que:

- Se mostre para o dominio `peliculas.192-168-56-100.nip.io`

.

Non utilice ningún alias.

O ficheiro *logs* de acceso sexa `/var/log/apache2/pelis-access.log`

 e o de erros `/var/log/apache2/pelis-error.log`

Busque a aplicación web no seguinte directorio `/var/www/peliculas/`

- .

**Entrega capturas** do ficheiro de definición de `virtualhost`

 anterior.

![Screenshot_20251113_211618](/home/infe/Documents/DAW2Xeral/Despregamento/ud04/02/02/Screenshot_20251113_211618.png)

Habilita o novo `virtualhost`

 e recarga a configuración de Apache.

Dende un navegador entra na dirección `http://peliculas.192-168-56-100.nip.io/ola.php`

1. . **Entrega capturas** da web mostrada. O navegador pode ser que che mostre unha mensaxe de  que o sitio non é confiable. Preme en ver o sitio de igual maneira.

   ![Screenshot_20251113_214023](/home/infe/Documents/DAW2Xeral/Despregamento/ud04/02/02/Screenshot_20251113_214023.png)

------

#### Exercicio 3: Configuración de base de datos en produción

NExplicación o exercicio anterior tan só probamos o funcionamento de Apache xunto PHP co ficheiro `ola.php`

. Pero a aplicación que despregaches permite almacenar películas. Pero  para o almacenamento é necesaria unha base de datos. Polo tanto **conectaremos a nosa aplicación cunha base de datos**.

O servizo de base de datos que imos utilizar só é de balde durante 1 semana. Entón **realiza este exercicio e o seguinte en menos dunha semana**.

Neste exercicio imos configurar unha base de datos, conectala coa  aplicación e dese xeito ter a nosa aplicación funcionando completamente.

1. Vaite a `https://www.freesqldatabase.com/`

. Esta web permítenos ter unha base de datos gratuíta na nube co SXBD MySQL.

Crea unha conta co correo electrónico do IES San Clemente.

Tras realizar todo o proceso de creación de conta, inicia sesión.

Crea unha nova base de datos.

Entra no PHPMyAdmin de `https://www.freesqldatabase.com/`

1. . Os datos de conexión envíanseche por email.

Explicación Unha vez que contamos cunha base de datos, **teremos que crear a estrutura desta**. Farémolo mediante un *script* de SQL.

1. En PHPMyAdmin, selecciona no menú da esquerda a base de datos e a continuación preme en `Importar`

.

Nos ficheiros que descargaches co código fonte da aplicación hai un *script* de SQL (`create_tables.sql`

1. ). Importa este ficheiro. **realiza capturas** onde se vexa a táboa creada.

   ![Screenshot_20251113_212611](/home/infe/Documents/DAW2Xeral/Despregamento/ud04/02/03/Screenshot_20251113_212611.png)

Explicación Agora debemos **configurar a aplicación para que se conecte a base de datos** que creamos. Para iso utilizaremos o **ficheiro `.env`** que trae incorporada a aplicación.

Un **ficheiro `.env`** (de *environment*) é un arquivo de texto plano no que se gardan variables de contorno.  Estas variables definen configuracións que a túa aplicación precisa. A  idea principal é **non poñer datos sensibles directamente no código**, senón cargalos desde este ficheiro cando se inicia a aplicación.

Nunha app web, especialmente cando traballas con bases de datos, sempre precisas información sensible como:

- O **host** da base de datos (p.ex. `localhost`

, `db.example.com`

- ).
- O **porto** (`5432` en PostgreSQL, `3306` en MySQL, etc.).
- O **nome da base de datos**.
- O **usuario** e **contrasinal** para conectarse.

1. Instala o driver de MySql para PHP con `apt` (paquete `php-mysql`

).

Abre o ficheiro `.env` co editor `nano` no servidor web. Ten coidado porque os ficheiros que comezan en Linux por `.` son ficheiros ocultos. Cando se realizan copias de varios ficheiros (utilizando o comodín `*`) xeralmente os arquivos ocultos non se copian, polo que pode ser que non teñas o `env` no servidor ou copiado no directorio correspondente.

Modifica as variables que aparecen no ficheiro coas que se che  proporcionaron no correo electrónico para que poida conectar coa base de datos que creamos en `www.freesqldatabase.com/`

. **Entrega capturas** do contido deste ficheiro.

![Screenshot_20251113_213327](/home/infe/Documents/DAW2Xeral/Despregamento/ud04/02/03/Screenshot_20251113_213327.png)

Accede agora a `http://peliculas.192-168-56-100.nip.io/`

. Accede ao menú para engadir unha nova película. Engade unha película calquera. **Entrega capturas** do contido da táboa `peliculas`

1.  dende PHPMyAdmin.

   ![Screenshot_20251113_214211](/home/infe/Documents/DAW2Xeral/Despregamento/ud04/02/03/Screenshot_20251113_214211.png)

------

#### Exercicio 4: Seguridade nas variables de contorno

Explicación Neste último exercicio veremos o **bloque `Files`**. Este é bastante importante por temas de **seguridade**.

1. Abre a URL `http://peliculas.192-168-56-100.nip.io/.env`

1. .

Explicación Podes ver que se mostran os datos de conexión a base de datos. Con  estes datos calquera podería realizar modificacións na nosa base de  datos. Polo que é un erro de seguridade moi grave.

Por defecto, **Apache non bloquea os ficheiros que comezan por punto (`.`)**, aínda que estes sexan ocultos.

Para solucionalo podemos engadir a directiva `Files` dentro da directiva `Directory`

 a definición do `virtualhost`

 que indique que ninguén ten permisos para ver este ficheiro.

```apache
<Directory /var/www/peliculas>
    Options -Indexes +FollowSymLinks
    Require all granted

    <Files ".env">
        Require all denied
    </Files>
</Directory>
```

1. Modifica a definición do `virtualhost`

 para que non se permite o acceso ao ficheiro `.env`.

Recarga a configuración de Apache.

Nunha ventá privada accede a URL `http://peliculas.192-168-56-100.nip.io/.env`

. **Entrega capturas** do que mostra o navegador.

![Screenshot_20251113_214451](/home/infe/Documents/DAW2Xeral/Despregamento/ud04/02/04/Screenshot_20251113_214451.png)