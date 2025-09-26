import requests
import json
import os

cookies = {
    'csrftoken': '4UmUPH_x_noDbEfHMYdrz3',
    'datr': 'd33WaMJbDFne1Kl4lmF4IpOp',
    'ig_did': '3FACEF04-F009-4659-AF79-9C7A6C260DD7',
    'mid': 'aNZ9dwAEAAH2u18Sq1btDq2GonxL',
    'wd': '1016x881',
    'ds_user_id': '"77376243656\\073 Domain=.instagram.com\\073 expires=Thu\\054 25-Dec-2025 11:50:20 GMT\\073 Max-Age=7776000\\073 Path=/\\073 Secure"',
    'sessionid': '77376243656%3AyYL76QEhwlREFs%3A28%3AAYjEVx7ia4s_cdhZZ_zHY41-5-TGN5GU0vtHBx4cCg',
}

headers = {
    'User-Agent': 'Mozilla/5.0 (X11; Linux x86_64; rv:139.0) Gecko/20100101 Firefox/139.0',
    'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
    'Accept-Language': 'en-GB,en;q=0.5',
    # 'Accept-Encoding': 'gzip, deflate, br, zstd',
    'Alt-Used': 'www.instagram.com',
    'Connection': 'keep-alive',
    'Referer': 'https://www.instagram.com/consent/?flow=user_cookie_choice_v2^&source=pft_user_cookie_choice',
    # 'Cookie': 'csrftoken=4UmUPH_x_noDbEfHMYdrz3; datr=d33WaMJbDFne1Kl4lmF4IpOp; ig_did=3FACEF04-F009-4659-AF79-9C7A6C260DD7; mid=aNZ9dwAEAAH2u18Sq1btDq2GonxL; wd=1016x881; ds_user_id="77376243656\\073 Domain=.instagram.com\\073 expires=Thu\\054 25-Dec-2025 11:50:20 GMT\\073 Max-Age=7776000\\073 Path=/\\073 Secure"; sessionid=77376243656%3AyYL76QEhwlREFs%3A28%3AAYjEVx7ia4s_cdhZZ_zHY41-5-TGN5GU0vtHBx4cCg',
    'Upgrade-Insecure-Requests': '1',
    'Sec-Fetch-Dest': 'document',
    'Sec-Fetch-Mode': 'navigate',
    'Sec-Fetch-Site': 'same-origin',
    'Sec-Fetch-User': '?1',
    'Priority': 'u=0, i',
    'Pragma': 'no-cache',
    'Cache-Control': 'no-cache',
    # Requests doesn't support trailers
    # 'TE': 'trailers',
}

"""
Función que lee un ficheiro har
"""
def ler_har(path):
    with open(path, 'r', encoding='utf-8') as ficheiro:
        datos = json.load(ficheiro)
        return datos
    
# Función que garda unha imaxe
def gardar_imaxe(directorio, nome_imaxe, contido):
    # Crear o directorio se non existe
    os.makedirs(directorio, exist_ok=True)

    # Unir o camiño completo da imaxe
    ruta_completa = os.path.join(directorio, nome_imaxe)

    # Gardar o contido no ficheiro
    with open(ruta_completa, "wb") as ficheiro:
        ficheiro.write(contido)

    print(f"Imaxe gardada en: {ruta_completa}")

# datos{...

    #"entries": [
    #   {"response":{"content":{"mimeType":"application/json"}}},
    #   {}]}

def extraer_url(datos):
    lista_json =[]
    for dato in datos["log"]["entries"]:
        try:
            tipo = dato["response"]["content"]["mimeType"]
            if "image" in tipo:
                lista_json.append(dato["request"]["url"])
        except:
            continue
    return lista_json

urls = extraer_url(ler_har("" \
"/home/sanclemente.local/a24christianvd/Documentos/Despregamento/o01_01_Varela_Docampo/www.instagram.com_Archive [25-09-26 13-52-01].har" \
""))

x = 0
for url in urls:
    #print(url)
    x += 1
    try:
        response = requests.get(url, cookies=cookies, headers=headers)
        gardar_imaxe("/home/sanclemente.local/a24christianvd/Documentos/Despregamento/o01_01_Varela_Docampo/output", str(x)+".png", response.content)
    except: continue
