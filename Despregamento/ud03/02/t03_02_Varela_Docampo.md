#### Exercicio 1

Explicación Vamos a **crear un dominio real** para cada un de nos. Aínda que hai moitos de pago, vamos utilizar un gratuíto.

1. Vai a seguinte URL: `desec.io`

.

Crea unha conta utilizando o correo electrónico do IES San Clemente. Selecciona a opción `Register a new domain under dedyn.io (dynDNS).`

. Crea un dominio que inclúa as túas iniciais. Seguramente teñas que engadir máis caracteres.

Vaite a bandexa do teu correo electrónico, deberías ter un email para verificar a conta en `desec.io`

1. . Pode ser que este correo vaia a Spam. Verifica a conta.

2. Como non tes contrasinal, tras verificar a conta, poderás indicar que se che envie un correo electrónico para introducir o novo contrasinal.  Faino.

3. Inicia sesión co correo electrónico e contrasinal. Deberás acceder o panel de administración de rexistros do teu dominio. **Realiza capturas** deste *dashboard*.

   ![pasted file](/home/infe/Documents/DAW2Xeral/Despregamento/ud03/02/01/pasted file.png)

#### Exercicio 2

Explicación Neste apartado veremos co a pesar de engadir un novo dominio, aínda non podemos resolvelo co servidor DNS configurado no noso equipo.

1. Vaite a xestión de rexistros en `desec.io`

 do teu dominio.

Introduce un rexistro `TXT` de nome `proba` co valor `probando_propagacion`

1. Resolve este rexistro con `dig`. Verás que aínda non obtés a resolución do nome de dominio. **Realiza capturas** da saída do comando.

   ![Screenshot_20251026_221317](/home/infe/Documents/DAW2Xeral/Despregamento/ud03/02/02/Screenshot_20251026_221317.png)

2. Resolve este rexistro con `dig` pero utilizando o servidor DNS do rexistro `NS` do teu dominio como servidor DNS. **Realiza capturas** da saída do comando.

   ![Screenshot_20251026_221400](/home/infe/Documents/DAW2Xeral/Despregamento/ud03/02/02/Screenshot_20251026_221400.png)

------

#### Exercicio 3

Vai a URL: https://dnschecker.org/. Introduce o rexistro do exercicio anterior e preme en `search`

. **Realiza unha captura** do mapa para que se mostre en que servidores se da resolto o rexistro `TXT`.

Prácticamente namais poñelo xa se expandiu a todos lados

22:15

![Screenshot_20251026_221508](/home/infe/Documents/DAW2Xeral/Despregamento/ud03/02/03/Screenshot_20251026_221508.png)

Cada certo tempo vai engadindo (ao pasar uns minutos xa deberías ver que vai funcionando, pero poden pasar horas) máis **capturas** e indica o día e a hora de cada captura, así como o tempo transcorrido. Pon a última captura cando tódolos servidores DNS resolvan o rexistro.

22:20

![Screenshot_20251026_222037](/home/infe/Documents/DAW2Xeral/Despregamento/ud03/02/03/Screenshot_20251026_222037.png)

22:35

![Screenshot_20251026_223620](/home/infe/Documents/DAW2Xeral/Despregamento/ud03/02/03/Screenshot_20251026_223620.png)