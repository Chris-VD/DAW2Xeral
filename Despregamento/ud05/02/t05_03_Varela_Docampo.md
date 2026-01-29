#### Exercicio 1: Proxy inverso como virtualhost de nome

Explicación Vamos crear unha nova máquina para que nos sirva de proxy inverso.

1. Importa unha nova máquina a partir da OVA creada na tarefa anterior . Cando a importes preme en `Configuración`

 e en `Política de dirección MAC` selecciona `Generar una nueva dirección MAC para todos los adaptadores de red` para que se xeren novas MACs. Chámalle a máquina `dapw_iniciais_server_03`

.

Inicia a máquina e internamente modifícalle o nome por `iniciaiserver03`

. Posteriormente reinicia.

Modifica o ficheiro `/etc/network/interfaces`

 para asignar unha IP estática a máquina na rede de `Anfitrión sólo anfitrión`

1. :

```vim
auto enp0s8
iface enp0s8 inet static
address 192.168.56.103
netmask 255.255.255.0
```

1. Executa o comando `sudo sytemctl restart networking.service`

1.  e comproba con `ip a` que obtiveches a IP desexada.

Explicación Neste caso, e para poder modificar ficheiros de xeito gráfico imos ver como activar o acceso como usuario `root` a unha máquina mediante SSH.

Esta é unha práctica desaconsellable. Utilizámola para ser máis  rápidos na modificación de ficheiros, pero nun contorno real non se  debería de utilizar.

Existe tamén a posibilidade de iniciar como `root` mediante claves públicas e privadas, e aínda que este é un método máis seguro sigue sen ser recomendable

1. Vaite ao ficheiro `/etc/ssh/sshd_config`

, descomenta a liña `PermitRootLogin prohibit-password` e modifica por  `PermitRootLogin yes`

. Faino con sudo.

Reinicia o servizo SSH con `sudo sytemctl restart ssh`

1. Conéctate mediante SSH dende VSC pero como usuario `root`.

Explicación Utilizaremos como *software* para crear o noso servidor inverso **Nginx**.

1. Instala `Nginx`. **Entrega captura** da versión de Nginx.

   ![Screenshot_20260129_211518](/home/infe/Documents/DAW2Xeral/Despregamento/ud05/02/capturas/Screenshot_20260129_211518.png)

Explicación Crearemos agora unha redirección para poder redirixir a URL `http://api.192-168-56-103.nip.io`

 a aplicación despregada con Laravel que se está executando no servidor de produción de Docker.

1. Abre en VSC o directorio `/etc/nginx`

 para poder modificar os ficheiros de configuración de Nginx graficamente.

Modifica o ficheiro `/etc/nginx/sites-available/default`

 e crea unha redirección para que cando reciba unha petición a `http://api.192-168-56-103.nip.io`

 redirixa a aplicación de Laravel que temos despregada.

Accede a URL `http://api.192-168-56-103.nip.io/api/libros`

1.  para ver que todo funciona correctamente. **Entrega capturas** desta pantalla.

   ![Screenshot_20260129_224124](/home/infe/Documents/DAW2Xeral/Despregamento/ud05/02/capturas/Screenshot_20260129_224124.png)

Explicación E agora faremos o mesmo pero para a aplicación realiza en Vue.js.

1. Modifica agora o ficheiro de configuración do `virtualhost`

 para que tamén redirixa as peticións a URL `http://frontend.192-168-56-103.nip.io`

 a aplicación despregada no servidor de produción con Vue.js.

Accede a URL `http://frontend.192-168-56-103.nip.io`

 para ver que todo funciona correctamente. **Entrega capturas** desta pantalla.

![Screenshot_20260129_224337](/home/infe/Documents/DAW2Xeral/Despregamento/ud05/02/capturas/Screenshot_20260129_224337.png)

**Entrega capturas** do ficheiro completo `/etc/nginx/sites-available/default`

.![Screenshot_20260129_224401](/home/infe/Documents/DAW2Xeral/Despregamento/ud05/02/capturas/Screenshot_20260129_224401.png)