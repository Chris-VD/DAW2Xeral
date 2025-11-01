#### Exercicio 1: Instalación de Apache

Explicación Comezaremos por **restaurar a \*snapshot\*** na máquina virtual que utilizamos na unidade 2. Esta fixémola tras  configurar SSH. Polo tanto teremos unha máquina limpa, tan só coa  configuración de rede e de administración remota configurada.

1. Restaura na máquina `dapw_iniciais_server_01`

 a instantánea de nome `admin_remota_configurada`

.

Inicia a máquina virtual `dapw_iniciais_server_01`

1.  e conéctate por SSH dende o Visual Studio Code.

Explicación Agora procederemos **instalar Apache**. Comprobaremos ademais que a instalación se realizou de xeito correcto.

1. Actualiza o sistema. Ter o sistema actualizado é unha boa práctica. Utiliza os seguintes comandos:

```bash
$ sudo apt update
$ duo apt upgrade
```

1. Instala Apache. **Entrega captura** da versión de Apache instalada.

   ![Screenshot_20251101_144923](/home/infe/Documents/DAW2Xeral/Despregamento/ud04/01/01/Screenshot_20251101_144923.png)

2. Na máquina anfitrión, abre un navegador web e escribe na URL a dirección IP da máquina virtual. **Entrega captura** da páxina por defecto de Apache.

   ![Screenshot_20251101_145125](/home/infe/Documents/DAW2Xeral/Despregamento/ud04/01/01/Screenshot_20251101_145125.png)

------

#### Exercicio 2: Creación de virtualhost

Explicación Crearemos o noso primeiro `virtualhost`

 baseado en nome en Apache. Nos seguintes pasos seguramente teñas que usar `sudo` xa que co usuario `damin` non terás os suficentes permisos.

Para comezar **clonaremos a aplicación que imos despregar dende un repositorio**.

1. Clona o repositorio https://github.com/cloudacademy/static-website-example proxecto en `/var/www`

. Este directorio é onde se sitúan as aplicacións web que servirá Apache.

Modifica o nome do repositorio clonado por `estatico`

.

Modifica os permisos para que o usuario e grupo `www-data`

1.  sexan os propietarios do directorio clonado e de todos os seus  subdirectorios e ficheiros. Deste xeito Apache non terá problema de  permisos para utilizar estes ficheiros.

Explicación Agora vamos a **probar o servizo `nip.io`**

 para poder utilizalo nos nosos servidores virtuais.

1. Utiliza `dig` para comprobar a correcta resolución de `estatico.192-168-56-100.nip.io`

. (Se tes outra IP na máquina virtual, modifica a parte de `192.168.56.100` pola túa IP. Isto teralo que facer sempre e cando nos referimos as direccións de `nip-io`

1. ).

Explicación A continuación **crearemos o ficheiro de configuración do `virtualhost`**

 por nome coas opcións mínimas necesarias.

1. Crea un ficheiro de configuración dun `virtualhost`

 de nome `estatico.conf`

. Utiliza o editor de terminal `nano`.

Crea un `virtualhost`

 coas seguintes características:

- Porto: 80
- Nome: `estatico.192-168-56-100.nip.io`

.

Directorio co contido do sitio web: `/var/www/estatico/`

- . Este é o directorio onde clonamos a aplicación que imos a despregar.

Habilita o `virtualhost`

 creado. Tras isto deberás recargar a configuración de Apache. **Entrega captura** da configuración do `virtualhost`

![Screenshot_20251101_155532](/home/infe/Documents/DAW2Xeral/Despregamento/ud04/01/02/Screenshot_20251101_155532.png)

Comproba o correcto funcionamento abrindo un navegador web no equipo anfitrión e escribindo a URL `http://estatico.192-168-56-100.nip.io`

1. . **Entrega captura** do sitio web posto en produción.

   ![Screenshot_20251101_155612](/home/infe/Documents/DAW2Xeral/Despregamento/ud04/01/02/Screenshot_20251101_155612.png)

Explicación O servidor por defecto aínda está activo e podemos acceder a través da  IP do servidor web. Se deshabilitamos este sitio, Apache non atopa  coincidencia se indicamos tan só a IP. Entón escolle o primeiro `virtualHost`

 definido no ficheiro de configuración. Por iso os ficheiros se nomean  ao comezo por números, para indicar prioridade se non existe  coincidencia (o de por defecto nomease `000-default.conf`

).

1. Deshabilita o sitio web por defecto. Deberás recargar a configuración.
2. Na máquina anfitrión, abre unha ventá privada (senón pode acontecer  que quede en caché a páxina por defecto de Apache) do navegador web e  escribe na URL a dirección IP da máquina virtual. **Entrega captura** onde se vexa que ca URL se mostra a páxina do noso `virtualhost`

![Screenshot_20251101_155927](/home/infe/Documents/DAW2Xeral/Despregamento/ud04/01/02/Screenshot_20251101_155927.png)

------

#### Exercicio 3: Directivas máis utilizadas

Explicación Neste exercicio imos ver algunha **directiva bastante útil** na definicións de `virtualhost`

. Comezaremos polos **alias**. Con isto poderemos facer que varios nomes redirixan ao mesmo sitio web.

1. Engade como alias do `virtualhost`

 que creamos no paso anterior os nomes de dominio `dimension.192-168-56-100.nip.io` e `portfolio.192-168-56-100.nip.io`. **Entrega captura** do ficheiro de definición do `virtualhost`

![Screenshot_20251101_160557](/home/infe/Documents/DAW2Xeral/Despregamento/ud04/01/03/Screenshot_20251101_160557.png)

Recarga a configuración de Apache.

Comproba nun navegador do equipo anfitrión que se accede o sitio web dende `http://dimension.192-168-56-100.nip.io`

 e `http://portfolio.192-168-56-100.nip.io`

1. . **Entrega capturas** onde se vexa o correcto funcionamento destes dous nomes.

   ![Screenshot_20251101_160626](/home/infe/Documents/DAW2Xeral/Despregamento/ud04/01/03/Screenshot_20251101_160626.png)

   ![Screenshot_20251101_160639](/home/infe/Documents/DAW2Xeral/Despregamento/ud04/01/03/Screenshot_20251101_160639.png)

Explicación Tamén é moi importante poder **colocar de xeito correcto os \*logs\*** para poder encontrar erros ou realizar trazabilidade.

1. Modifica o `virtualhost`

 para que os *logs* de acceso se almacenen en `/var/log/apache2/estatico-access.log`. **Entrega captura** do ficheiro de definición do `virtualhost`.

![Screenshot_20251101_162237](/home/infe/Documents/DAW2Xeral/Despregamento/ud04/01/03/Screenshot_20251101_162237.png)

Modifica o `virtualhost` para que os *logs* de erros se almacenen en `/var/log/apache2/estatico-error.log`. **Entrega captura** do ficheiro de definición do `virtualhost`

![Screenshot_20251101_162448](/home/infe/Documents/DAW2Xeral/Despregamento/ud04/01/03/Screenshot_20251101_162448.png)

Recarga a configuración de Apache.

Accede dende un navegador web a `http://estatico.192-168-56-100.nip.io`

.

Abre o ficheiro cos *logs* de acceso `/var/log/apache2/estatico-access.log`

1. . **Entrega captura** onde se vexa que se realizou un acceso, o que fixemos no paso anterior.

   ![Screenshot_20251101_162335](/home/infe/Documents/DAW2Xeral/Despregamento/ud04/01/03/Screenshot_20251101_162335.png)

------

#### Exercicio 4: Bloque Directory

Explicación Neste último exercicio veremos o **bloque `Directory`**

. Este é bastante importante en canto a temas de seguridade.

1. Abre a URL `http://portfolio.192-168-56-100.nip.io/images/`

. Podemos observar que se listan os ficheiros do directorio. Isto pode comprometer a seguridade.

Na definición do `virtualhost`

 crea un bloque `Directory` para o directorio onde se encontra o sitio web `/var/www/estatico/`. Desactiva listar o cartafol e activa os enlaces simbólicos. Engade tamén acceso libre para tódolos usuarios. **Entrega captura** do ficheiro de definición do `virtualhost`

![Screenshot_20251101_163101](/home/infe/Documents/DAW2Xeral/Despregamento/ud04/01/04/Screenshot_20251101_163101.png)

Recarga a configuración de Apache.

Comproba agora que non se listan os ficheiros. **Entrega captura** da mensaxe que mostra o navegador.

![Screenshot_20251101_163122](/home/infe/Documents/DAW2Xeral/Despregamento/ud04/01/04/Screenshot_20251101_163122.png)

Copia o contido do ficheiro de definición do `virtualhost`

 na máquina anfitrión. Pode ser de utilidade para a definición de vindeiros `virtualhost` a modo de plantilla.