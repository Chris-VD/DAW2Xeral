import json
from time import sleep
"""
Función que lee un ficheiro har
"""
def ler_har(path):
    with open(path, 'r', encoding='utf-8') as ficheiro:
        datos = json.load(ficheiro)
        return datos

# datos{...

    #"entries": [
    #   {"response":{"content":{"mimeType":"application/json"}}},
    #   {}]}

def extraer_url(datos):
    lista_json =[]
    for dato in datos["log"]["entries"]:
        try:
            tipo = dato["response"]["content"]["mimeType"]
            if "application/json" in tipo:
                lista_json.append(dato["request"]["url"])
        except:
            continue
    return lista_json

urls = extraer_url(ler_har("/home/sanclemente.local/a24christianvd/Documentos/Despregamento/ud01/03/mail.google.com_Archive [25-09-19 14-17-02].har"))

with open("output.txt", "w") as output:
    for url in urls:
        output.write(url+"\n")
