Inicia a máquina virtual `dapw_iniciais_server_01`

 e conéctate por SSH dende o Visual Studio Code.

Para que funcione Laravel, vamos necesitar algunhas extensións de PHP instalas cos seguintes comandos:

```bash
$ apt update
$ sudo apt install php php-cli php-mbstring php-xml php-curl php-bcmath php-ctype php-json php-pdo php-tokenizer php-fileinfo unzip php-sqlite3
```

Sitúate no directorio `home` e executa o seguinte comando para borrar todo o contido: `rm -R * -f`.

Explicación  Vamos comezar instalando **Laravel** que é un *framework* *full-Stack* de PHP. Podes atopar a documentación en https://laravel.com/docs/12.x . A opción `create-project`de `Composer`

 é un comando que se utiliza para crear un novo proxecto a partir dun paquete (se non existe, descárgao), xeralmente dun *framework* como neste caso.

1. Executa o seguinte comando para instalar **Laravel**: `composer create-project laravel/laravel iniciais_laravel`.

Verás que se creou un directorio `iniciais_laravel`\- Abre ese directorio en VSC e **realiza unha captura** do seu contido.

![image](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/o1/1/image.png)

Explicación  Laravel crea unha estrutura moi clara e organizada ao iniciar un proxecto. Como podes observar tamén crea o ficheiro `.gitignore`

 polo xa non teremos que facelo a man. Así que vamos crealo repositorio e subilo a un novo proxecto de GitLab.

1. Inicia un novo proxecto de Git dentro deste directorio.
2. Crea un novo proxecto en GitlLab de nome `0201laravel`.

1. Sube o repositorio creado a GitLab. Tes instrucións no propio  proxecto creado en GitLab para engadir un repositorio remoto ao teu  repositorio local.

2. **Realiza capturas** do contido do proxecto en GitLab.

   ![image copy](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/o1/1/image copy.png)

Explicación  O que si non realizou **Laravel** e a instalación dos paquetes necesarios para o seu funcionamento. Polo que é necesario facelo a man.

1. Executa `composer install`.

Dentro do proxecto de Laravel executa `php artisan migrate`. Isto creará as táboas no SXBD SQLite necesarias para que o proxecto de Laravel poida arrancar.

**Laravel** trae o seu propio servidor de probas, polo que non é necesario utilizar o de PHP. Vamos a probalo:

1. Dentro do proxecto de Laravel arranca o servidor de probas de Laravel con `php artisan serve --host=<IP_equipo> --port=8000`. Indicamos como `host` a IP da máquina virtual (a que conecta co equipo anfitrión) porque así poderemos acceder dende o equipo anfitrión. **Realiza capturas** da execución do código.

   ![image copy 3](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/o1/1/image copy 3.png)

1. **Realiza capturas** dende o navegador do anfitrión onde accedas a este servidor web de desenvolvemento.

   ![image copy 2](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/o1/1/image copy 2.png)

------

#### Exercicio 2: Creación de contorno de desenvolvemento para React

Explicación  Agora vamos ver un *framework* web pero do de contorno cliente como é **React** (https://es.react.dev/reference/react). Crearemos o proxecto utilizando unha ferramenta de compilación como `vite`.

1. Sitúate no directorio `home` e executa o seguinte comando para borrar todo o contido: `rm -R * -f`.

Executa o comando `npm create vite@latest O0201react -- --template react`

Entra con VSC no directorio `O0201react`. **Realiza capturas** do contido deste directorio.

![image](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/o1/2/image.png)

Executa `npm install`porque ao igual que con Laravel, debemos de instalar as dependencias.

Explicación A continuación vamos subir o noso proxecto a Git.

1. Inicia un novo proxecto de Git dentro deste directorio.
2. Crea un novo proxecto en GitlLab de nome `0201react`

1. Sube o repositorio creado a GitLab. Tes instrucións no propio  proxecto creado en GitLab de como subir un repositorio xa existente.

2. **Realiza capturas** do contido do proxecto en GitLab.

   ![image copy](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/o1/2/image copy.png)

Por último iniciaremos o servidor de desenvolvemento que nos proporciona React.

1. Executa o comando `npm run dev -- --host=<IP_Equipo>`. **Realiza capturas** da execución do comando.

   ![image copy 2](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/o1/2/image copy 2.png)

**Realiza capturas** dende o navegador do anfitrión onde accedas a este servidor web de desenvolvemento.

![image copy 3](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/o1/2/image copy 3.png)