#### Exercicio 1: Construción de Arquetipo para Next.js

Explicación Constrúe un arquetipo para `Next.js`

. Ten en conta:

- Ten só necesitamos un servizo para a aplicación.
- Define as seguintes variables de contorno:
  - `NODE_ENV`

. Indica o entorno de execución. En produción activa optimizacións e desactiva *logs* de desenvolvemento. Os seus posibles valores son `development` e `production`. Utiliza o valor `development`

- - .

Explicación Agora para cada novo proxecto que comecemos con Next.js tan só debemos realizar un `fork` deste proxecto.

**Entrega** os ficheiros `DockerFile`

, `docker-compose.yaml`, `entrypoint.sh`, `Makefile` e `.gitignore`

.

![image-20260205210836310](/home/infe/.config/Typora/typora-user-images/image-20260205210836310.png)

![image-20260205210854941](/home/infe/.config/Typora/typora-user-images/image-20260205210854941.png)

![image-20260205210930435](/home/infe/.config/Typora/typora-user-images/image-20260205210930435.png)

![image-20260205210946164](/home/infe/.config/Typora/typora-user-images/image-20260205210946164.png)

![image-20260205211005850](/home/infe/.config/Typora/typora-user-images/image-20260205211005850.png)

------

#### Exercicio 2: Creación da aplicación en Next.js

Explicación Agora imos realizar a nosa primeira aplicación en Next.js. Esta  aplicación mostra os resultados da última carreira de Formula 1  utilizando esta APi REST aberta: `https://openf1.org/`

.

1. Crea un *fork* do arquetipo de Next.js de nome `Aplicación de F1`

.

Clona o novo respositorio, descarga o seguinte [código](https://dapw-05-contedores-e-cloud-no-despregue-8c4f14.gitlab.io/97tarefas/t05_05/codigo_next.zip) e copia no directorio `src`.

Engade a variable de contorno `NEXT_PUBLIC_URL_API`

 co valor `https://api.openf1.org/v1/`

.

Arranca a aplicación con `docker compose`

 e comproba que todo funciona. **Entrega capturas** do funcionamento da aplicación web.

![Screenshot_20260205_192532](/home/infe/Documents/DAW2Xeral/Despregamento/ud05/04/02/Screenshot_20260205_192532.png)

Realiza un `commit`

1.  e un `push`.

------

#### Exercicio 3: Despregue de aplicación Next.js en Vercel

Explicación Vamos realizar agora o despregue en Vercel. Non vai ser necesario o ficheiro `vercel.json`

 debido a que detectará automaticamente a configuración.

1. Crea unha conta en Vercel, utilizando a conta de GitLab para así despois poderlle dar acceso aos nosos repos.
2. Importa o repositorio `Aplicación de F1`

 en Vercel. Cando o crees recorda seleccionar o `Root directory` que é o directorio `src` (onde está a nosa aplicación) e engadir a variable de contorno para  poder acceder a API de Formula 1 (Para que poida acceder a API-REST).  Preme por último en `Deploy`

.

**Entrega capturas** da aplicación despregada

![Screenshot_20260205_210338](/home/infe/Documents/DAW2Xeral/Despregamento/ud05/04/03/Screenshot_20260205_210338.png)