#### Exercicio 1: Probas automatizadas mediante CI/CD

Explicación Comezaremos o exercicio creando un repositorio ne GitLab e engadindo o código da nosa aplicación.

1. Crea un novo proxecto (en GitLab chámanlle proxectos ao repositorios) de nove `iniciaist0203`

 con ficheiro `Readme.md`. **Realiza unha captura** da interface web co proxecto en GitLab.

![image](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/04/01/image.png)

Clona o repositorio.

Dentro do repositorio crea o seguinte ficheiro `dni_validator.py` con este contido:

```py
import re

def validar_dni(dni):
    return True
```

Crea tamén o ficheiro `test_dni_validator.py` co seguinte contido:

```python
import unittest
from dni_validator import validar_dni

class TestDniValidator(unittest.TestCase):

    def test_dni_correctos(self):
        self.assertTrue(validar_dni("12345678Z"))  # Exemplo válido
        self.assertTrue(validar_dni("00000000T"))
        self.assertTrue(validar_dni("98765432M"))
        self.assertTrue(validar_dni("99999999R"))

    def test_dni_incorrectos(self):
        self.assertFalse(validar_dni("12345678A"))  # Letra incorrecta
        self.assertFalse(validar_dni("1234567Z"))   # Faltan números
        self.assertFalse(validar_dni("123456789Z")) # Sobran números
        self.assertFalse(validar_dni("ABCDEFGHZ"))  # Letras no número
        self.assertFalse(validar_dni("12345678"))   # Sen letra
        self.assertFalse(validar_dni(""))           # Baleiro

if __name__ == '__main__':
    unittest.main()
```

1. Sube o código ao repositorio en GitLab.com.

Explicación O noso repositorio conta con dous ficheiros:

- `dni_validator.py`

: contén unha función que valida o DNI (de momento sen implantar)

```
test_dni_validator.py
```

- : conta cuns test unitario para comprobar o correcto funcionamento desa función.

De seguido utilizaremos **CI/CD de GitLab para realizar o test automaticamente** en canto se suba unha nova versión a GitLab.com

1. Crea o ficheiro `.gitlab-ci.yml`.Neste ficheiro define unha única `stage` de nome `probas`.Crea un novo `job` para a `stage` anterior de nome `unitarias`. Neste `job` debes de:

- Utiliza a imaxe: `python:3.9`

- Executar os seguintes comandos (O seguindo destes comandos e o que executa as probas):

  ```bash
  echo "Comezando os test..."
  python -m unittest test_dni_validator.py
  ```

Fai un `commit` e un `push`. **Entrega captura** do contido do ficheiro `.gitlab-ci.yml`

![image copy](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/04/01/image copy.png)

Explicación Unha vez subida a nova versión de repositorio, debería lanzarse automaticamente as probas en GitLab.com. **Vamos a ver os resultados destar probas na interface de GitLab**.

1. Abre o proxecto, e vai no menú a `Build > Pipelines`. **Realiza unha captura** dos `pipelines` lanzados.

![image copy 2](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/04/01/image copy 2.png)

Deberías ver que o estado é `Failed`. Preme no estado e **realiza unha captura** do contido que se mostra. Deberías ver un resumo do `pipeline` que se executou.

## (O commit é diferente porque tiven que facer outro despois de verificar o gitlab)

![image copy 4](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/04/01/image copy 4.png)

Agora selecciona a lapela `jobs`. Na táboa que se mostra, selecciona o enlace da columna `job` para ver a execución deste. **Realiza unha captura** da execución.

![image copy 5](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/04/01/image copy 5.png)

No última captura podemos observar que a nosa función non pasou os  test unitario. Lóxico xa que non está implantada. Agora poderíamos ir  implantando a nosa función e facendo `push` ata que a nosa función estea correctamente implantada. Vamos xa ver como sería o resultado correcto.

Modifica o ficheiro `dni_validator.py`con este contido:

```python
import re

def validar_dni(dni):
    """
    Valida se un DNI español é correcto en formato e letra.

    Args:
        dni (str): DNI a validar (ex: '12345678Z')

    Returns:
        bool: True se é válido, False se non.
    """
    dni = dni.upper()
    patron = r'^\d{8}[A-Z]$'

    if not re.match(patron, dni):
        return False

    letras = "TRWAGMYFPDXBNJZSQVHLCKE"
    numero = int(dni[:8])
    letra_correcta = letras[numero % 23]

    return dni[-1] == letra_correcta
```

Fai un `commit` e un `push`. Abre o proxecto, e vai no menú a `Build > Pipelines`. **Realiza unha captura** dos `pipelines` lanzados.

![image copy 6](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/04/01/image copy 6.png)

Deberías ver que o estado é `Passed`. Preme no estado e **realiza unha captura** do contido que se mostra. Deberías ver un resumo do `pipeline`que se executou.

![image copy 7](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/04/01/image copy 7.png)

1. Agora selecciona a lapela `jobs`. Na táboa que se mostra, selecciona o enlace da columna `job` para ver a execución deste. **Realiza unha captura** da execución.

   ![image copy 8](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/04/01/image copy 8.png)

------

#### Exercicio 2: Build automatizado mediante CI/CD

Explicación Neste momento sabemos que a nosa función funciona correctamente porque  pasa tódalas probas unitarias. Poderíamos utilizar esta función nun  programa principal, no que se recibira o dni por argumento e se indicara se é correcto ou non.

1. Crea no repositorio o ficheiro `main.py` co seguinte contido:

```py
import sys
from dni_validator import validar_dni

def main():
    if len(sys.argv) != 2:
        print("Uso: python main.py <DNI>")
        sys.exit(1)

    dni = sys.argv[1]
    if validar_dni(dni):
        print(f"O DNI '{dni}' é válido.")
    else:
        print(f"O DNI '{dni}' NON é válido.")

if __name__ == "__main__":
    main()
```

Executa o seguinte comando para ver se funciona correctamente o programa: `python3 main.py <o teu DNI>`. **Realiza unha captura** da execución do comando.

![image](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/04/02/image.png)

1. Sube o repositorio ao GitLab.

Explicación Agora imos **automatizar o empaquetado do noso programa**, pero só se realizará se pasa as probas correctamente. Para iso engadiremos unha nova `stage`.

1. Engade unha nova `stage` que se execute só se o resultado das probas é satisfactorio. O nome da `stage` será `build`.
2. Crea un novo `job` para a `stage` anterior de nome `empaquetado`. Neste `job` debes de:

- Utiliza a imaxe: `python:3.9`

- Executar os seguintes comandos (O seguindo destes comandos e o que executa as probas):

  ```bash
  pip install pyinstaller # Instala o paquete que nos permite empaquetar o paquete
  pyinstaller --onefile main.py # Realiza o empaquetado. O executable crease no directorio dist co nome main
  ```

- Engade o seguinte dentro do `job`. Esto permitiranos acceder ao executable dende a interface e poder descargalo.

  ```yaml
  artifacts:
      paths:
          - dist/main
      expire_in: 1 week
  ```

Sube o respostorio a GitLab. **Entrega captura** do contido do ficheiro `.gitlab-ci.yml`.

![image copy](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/04/02/image copy.png)

Abre o proxecto, e vai no menú a `Build > Pipelines`. **Realiza unha captura** dos `pipelines` lanzados. Deberías ver que o estado é `Passed`.

![image copy 2](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/04/02/image copy 2.png)

Na columna etapas, deberías ver que hai dous círculos en verde que identifican as dúas `stages` que temos. Preme no segundo e despois no `job` empaquetado. **Realiza captura** do contido da web que se mostra.

![image copy 3](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/04/02/image copy 3.png)

Na parte dereita podes ver un apartado que pon `Artefactos e jobs`. Dende aí podes premer en `Descargar`. Preme e baixarase o noso programa empaquetado. Descomprime o `zip`.

No terminal do equipo, vaite ao directorio onde descargaches o programa anterior. Executa o seguinte comando: `./main <o teu DNI>`. **Realiza captura** da execución deste comando.

![image copy 4](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/04/02/image copy 4.png)
