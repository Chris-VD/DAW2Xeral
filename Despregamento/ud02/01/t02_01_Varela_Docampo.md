#### Exercicio 1: Configuración da máquina virtual

Comezaremos importando e **configurando a nosa máquina virtual**. En tódalas máquinas en VirtualBox teremos un adaptador de rede `NAT`, que nos proporcionará acceso a rede, e outro adaptador de rede `Adaptador Solo Anfitrión` que nos permitirá conectarnos a esta a través de SSH dende o noso equipo.

1. En VirtualBox vaite a `Archivo > Herramientas > Administrador de Red`.
2. Preme en `Crear`.
3. Fai dobre *click* encima da rede que se creou. Preme en `Adaptador DHCP` e activa `Habilitar servidor` e modifica a seguinte configuración:

- `Limite inferior de direcciones`: 192.168.56.100
- `Limite superior de direcciones`: 192.168.56.200

1. Preme en `Aplicar`.

2. Importa a OVA en VirtualBox. Cámbialle o nome da máquina en VirtualBox por `dapw_iniciais_server_01`.

3. Engade un novo Adaptador de rede a máquina na configuración desta en VirtualBox (conserva o adaptador `NAT` para ter acceso a rede). Neste novo adaptador utilizaremos o `Adaptador Solo Anfitrión` e a rede creada nos pasos anteriores.

4. Arranca a máquina e inicia sesión co usuario `dadmin`. Executa o comando `ip a` para consultar a IP. **Realiza unha captura desta IP**. É importante que anotes esta IP porque a necesitaremos para acceder por SSH dende o equipo anfitrión.

   ![image](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/01/01/image.png)

5. Modifica o nome interno da máquina por `iniciaisserver01`, para iso executa os seguintes comandos que reiniciarán a máquina co novo nome:

Unha vez configurada a máquina, **procederemos a conectarnos por SSH**. Isto poderiámolo facer dende un terminal calquera ou nalgún *software* específico. No noso caso utilizaremos unha **extensión de Visual Studio Code** que facilita tanto o acceso a máquina como a edición de ficheiros.

1. Instala en Visual Studio Code a extensión `Remote - SSH`.

2. Preme `F1` e selecciona a opción `Remote - SSH > Add New SSH Host`. Esta opción permitiranos engadir a nosa máquina a lista de máquinas a que nos podemos conectar.

3. Na opción do comando SSH escribe o seguinte comando `ssh dadmin@IP_MAQUINA`. Na hora de elixir o arquivo de configuración de SSH, elixe o do teu usuario.

4. Agora vamos a conectarnos a máquina, preme `F1` e selecciona `Remote - SSH > Connect to Host`. Selecciona a IP da máquina virtual. Abrirase unha nova ventá de VSC. Preme en `Continuar` e pon o contrasinal do usuario `dadmin`.

5. Abre un novo terminal. Verás que o terminal (`Terminal > Nuevo Terminal`) se inicia na máquina virtual (fíxate no nome da máquina). **Realiza unha captura**.

   ![image copy](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/01/01/image copy.png)

Unha **snapshot en VirtualBox** é unha “foto” do estado completo dunha máquina virtual (disco, memoria e configuración) nun momento dado. Serve para **volver atrás doadamente**. se algo falla (por exemplo, tras instalar software, facer probas ou  actualizar o sistema). Deste xeito, poderemos volver a este estado  inicial sen software instalado pero coa máquina configurada para  realizar novas tarefas sen ter que realizar estes pasos previos.

1. Por último é **MOI IMPORTANTE**, desconéctate da máquina en Visual Studio Code e apaga a máquina virtual. **Crea unha snapshot en VirtualBox** de nome `admin_remota_configurada`.

------

#### Exercicio 2: Xestor de paquetes Composer

Xa temos preparada e configurada a nosa máquina para realizar a  conexión remota. Agora comezaremos a tarefa propiamente dita. Para  comezar, **instalaremos PHP e o xestor de paquetes `Composer`**.

1. Prende a máquina e volve a conectarte vía SSH.
2. Actualiza o equipo. É recomendable ter o sistema operativo actualizado por seguridade. Utiliza os seguintes comandos:

1. Instala PHP. **Realiza unha captura da versión instalada**.

2. Instala `Composer`. **Realiza unha captura da versión instalada**.

   ![versions](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/01/02/versions.png)

Agora crearemos unha conta en GitLab.com co correo electrónico do IES San Clemente. Se inicias mediante Google, terás que ir a opcións para  poñer un contrasinal para poder clonar os repositorios. Ademais **crearemos un repositorio novo** en GitLab.com e **clonarémolo na nosa máquina**. Se xa tes a conta creada xa non terás que creala e poderás saltarte os primeiros pasos.

1. Crea unha conta en GitLab.com.

2. Indica o contrasinal en preferencias se e que iniciaches mediante Google.

3. Crea un novo proxecto (en GitLab chámanlle proxectos ao repositorios) de nove `iniciaist0201_1` con ficheiro `Readme.md`. **Realiza unha captura** da interface web co proxecto en GitLab.![image copy](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/01/02/image copy.png)

   

4. Clona o repositorio na máquina virtual.

5. Preme na icona de ficheiros do menú da esquerda de Visual Studio Code. Preme en `Abrir Carpeta`. Selecciona o directorio onde clonaches o repositorio. Acepta tódalas mensaxes. **Realiza unha captura** da interface de VSC onde se vexan os ficheiros do repositorio e a terminal.

   ![image copy 2](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/01/02/image copy 2.png)

A continuación comezaremos a **traballar co xestor de paquetes `Composer`**. Veremos como se instalan paquetes utilizando esta ferramenta.

1. Executa o comando `composer init`. Ten en conta:

- Nas preguntas que se piden datos, tan só tes que poñer o teu nome na pregunta do autor.
- Nas de contestar `yes/no` selecciona todas `no` agás na de que estás seguro de crear o ficheiro `compose.json`.

1. Abre o ficheiro `composer.json` e **realiza unha captura** do contido deste.

   ![image copy 3](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/01/02/image copy 3.png)

2. Instala o paquete `fakerphp/faker` con `Composer`.

3. Abre o ficheiro `composer.json` e `composer.lock` e **realiza capturas** do contido destes ficheiros.

   ![image copy 4](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/01/02/image copy 4.png)

   ![image copy 5](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/01/02/image copy 5.png)

4. **Realiza unha captura** do contido do directorio `vendor`.

   ![image copy 6](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/01/02/image copy 6.png)

**Non é recomendable subir ao repositorio o contido do directorio `vendor`.** Estes directorio xeralmente ocupan moito espazo, e non nos interesa  almacenalo no repositorio. Se queremos clonar o repositorio noutra  localización, utilizando os ficheiros `composer.json` e `composer.lock` poderemos instalar de novo os paquetes necesarios para o correcto funcionamento do proxecto.

1. Crea o ficheiro `.gitignore` e engade o directorio `vendor` para que nos se inclúa no repositorio. **Realiza unha captura** do contido deste ficheiro.

   ![image copy 7](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/01/02/image copy 7.png)

2. Antes de realizar o seguinte paso, asegúrate na extensión de Git de VSC que non está incluíndo o directorio `vendor`.

3. Realiza un `add`, un `commit` e un `push` para subir o repositorio a GitLab.com.

4. **Realiza unha captura** do repositorio en GitLab.com que se vexa o contido deste.

   ![image copy 8](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/01/02/image copy 8.png)

Agora comprobaremos como funciona o paquete instalado e a súa utilidade. En concreto, **o paquete `fakerphp/faker` xera datos aleatorios**. Isto é de gran utilidade para realizar probas. Por exemplo, o *script* de PHP que se axunta a continuación crea no directorio `out` un ficheiro CSV con datos xerados de nome, apelidos e datas de nacemento.

A continuación utilizarémolo e veremos como tamén que **os resultados de execución de \*scripts\* tampouco é recomendable subilo aos repositorios**.

1. Crea o ficheiro `xerar_alumnos.php` co contido indicado anteriormente.

2. Inclúe o directorio `out` no `.gitignore.`. **Realiza capturas** do contido de `.gitignore.`.

   ![image copy 9](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/01/02/image copy 9.png)

3. Executa o *script* co seguinte comando `php xerar_alumnos.php`. **Realiza unha captura** do ficheiro creado por este *script*.

   ![image copy 10](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/01/02/image copy 10.png)

4. Sube o repositorio a GitLab.com.

5. **Realiza unha captura** do repositorio en GitLab.com que se vexa o contido deste.

   ![image copy 11](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/01/02/image copy 11.png)

Por último probaremos o **servidor web de desenvolvemento** que trae incluído o propio intérprete de PHP. Este serviranos para  facer probas rápidas de aplicación web realizadas nesta linguaxe de  programación.

1. Crea o arquivo `index.php` co seguinte contido:

1. Executa o seguinte comando: `php -S 0.0.0.0:8000`. Este inicia o servidor PHP no porto 8000. A IP que se indica, é a rede dende onde os equipos poden acceder a este servidor (`0.0.0.0` é para calquera rede, deste xeito tamén podemos acceder dende o anfitrión).

2. No teu equipo, abre un navegador e escribe a seguinte URL: `IP_MÁQUINA_VIRTUAL:8000`. **Realiza capturas** da web que se mostra.

   ![image copy 12](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/01/02/image copy 12.png)

3. Cerra o servidor pulsando `Ctrl + C`.

4. Sube o repositorio a GitLab.com.

5. **Realiza unha captura** do repositorio en GitLab.com que se vexa o contido deste.

   ![image copy 13](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/01/02/image copy 13.png)

------

#### Exercicio 3: Xestor de paquetes NPM

Neste exercicio utilizaremos a máquina virtual anterior. Nun caso real, o **recomendable é utilizar outro máquina virtual** para non mesturar instalacións de PHP e Node. De feito, o máis  recomendable é ter unha máquina diferente por proxecto. Comezaremos por  instalar `Node.js`.

1. Pecha o VSC que está conectado a máquina virtual. Vólvete conectar para comezar de novo.

2. Instala `Node.js` na máquina virtual.

3. **Realiza unha captura** coas versión de `Node.js` e `npm`.

   ![image](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/01/03/image.png)

O que si deberemos e crear é un novo repositorio para realizar este novo proxecto con `Node.js`.

1. Crea un novo proxecto (en GitLab chámanlle proxectos ao repositorios) de nove `iniciaist0201_2` con ficheiro `Readme.md`. **Realiza unha captura** da interface web co proxecto en GitLab.

   ### *olvideime de facer esta cando o repo de gitlab foi creado*

2. Clona o repositorio na máquina virtual.

3. Preme na icona de ficheiros do menú da esquerda de Visual Studio Code. Preme en `Abrir Carpeta`. Selecciona o directorio onde clonaches o repositorio. Acepta tódalas mensaxes. **Realiza unha captura** da interface de VSC onde se vexan os ficheiros do repositorio e a terminal.

   ![image copy](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/01/03/image copy.png)

Agora imos **crear o novo proxecto de `Node.js` utilizando `npm`**. Tamén instalaremos algún paquete e configuraremos correctamente o repositorio ao igual que fixemos no exercicio anterior.

1. Crea con `npm init` o ficheiro `package.json`. Non tes porque contestar a ningunha cuestión. Tan só o final tes que indicar que si que queres que se cree o ficheiro `package.json`.

2. **Realiza capturas** do contido do ficheiro `package.json`.

   ![image copy 2](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/01/03/image copy 2.png)

3. Instala o paquete `axios` con `npm`.

4. Abre o ficheiro `package.json` e `package-lock.json` e **realiza capturas** do contido destes ficheiros.

   ![image copy 3](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/01/03/image copy 3.png)

   ![image copy 4](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/01/03/image copy 4.png)

5. **Realiza unha captura** do contido do directorio `node_modules`.

   ![image copy 5](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/01/03/image copy 5.png)

6. Inclúe o directorio `node_modules` no `.gitignore`.

7. Realiza un `commit` e un `push` para subir o repositorio a GitLab.com.

8. **Realiza unha captura** do repositorio en GitLab.com que se vexa o contido deste.

   ![image copy 6](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/01/03/image copy 6.png)

**`Axios` é unha librería que nos permite realizar chamadas HTTP de xeito sinxelo**. Utilízase moito para consumir API-REST. No seguinte *script* de `Node.js` facemos unha proba do funcionamento desta librería. Neste caso utilizaremos a API-REST de [`OpenMeteo`](https://open-meteo.com/en/docs)  que nos permite obter datos meteorolóxicos. O seguinte *script* fai unha petición datos meterolóxicos para Santiago de Compostela.

1. Crea un ficheiro `index.js` co contido do ficheiro anterior.

2. Executa o *script* anterior co comando `node index.js`. **Realiza capturas** da saída da execución do *script*.

   ![image copy 7](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/01/03/image copy 7.png)

3. Realiza un `commit` e un `push` para subir o repositorio a GitLab.com.

4. **Realiza unha captura** do repositorio en GitLab.com que se vexa o contido deste.

   ![image copy 8](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/01/03/image copy 8.png)