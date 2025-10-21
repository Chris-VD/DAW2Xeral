#### Exercicio 1: Automatización de probas end-to-end

Esta tarefa parte da tarefa `T0203 CI/CD en Gitlab`. Nela vas ter que crear un novo `job` para a `stage``probas`. Esta novo `job` executará unha proba`end-to-end` utilizando o paquete `pexpect`.

Para iso necesitarás o seguinte ficheiro (é o que executa este tipo de probas) `test_main_pexpect.py`:

Para realizar isto no `job` ten en conta que:

- Necesitarás instalar o paquete `pexpect`con `pip`.
- O comando para executar esta proba é `pytest test_main_pexpect.py`.

**Entrega capturas** de:

- O ficheiro de configuración de CI/CD.

  ![image](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/o2/image.png)

- A execución deste `job` onde se vexan os comandos que se lanzaron na interface web.

  ![image copy](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/o2/image copy.png)

- O `pipeline`executado perfectamente na interface web.

![image copy 2](/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud02/o2/image copy 2.png)