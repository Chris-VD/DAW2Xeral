import json

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

def extraer_jsons(datos):
    lista_json =[]
    for dato in datos:
        if "\"mimeType\": \"application/json" in dato:
            lista_json.append(dato)
    return lista_json

def extraer_urls(datos):
    for dato in datos:

