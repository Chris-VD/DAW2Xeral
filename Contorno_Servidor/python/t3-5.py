def triple(arr):
    try:
        x = arr[0]
    except:
        raise Exception("Not an array")
    t = 0
    x = 0
    for y in arr:
        if t >= 3:
            return True
        x += 1
        if x not in range(len(arr)):
            return False
        if y == arr[x]:
            t += 1
        else:
            t = 1
        


print("is ",triple([1, 1, 2, 2, 1 ]))
print("is ",triple([1, 1, 2, 1, 2, 3]))
print("is ",triple([1, 1, 1, 2, 2, 2, 1]))
print("is ",triple([1, 1, 2, 1, 2, 2, 2]))

ceu = {"Italy":"Rome", "Luxembourg":"Luxembourg", "Belgium": "Brussels",
       "Denmark":"Copenhagen", "Finland":"Helsinki", "France" : "Paris",
       "Slovakia":"Bratislava", "Slovenia":"Ljubljana", "Germany" : "Berlin",
       "Greece" : "Athens", "Ireland":"Dublin", "Netherlands":"Amsterdam",
       "Portugal":"Lisbon", "Spain":"Madrid", "Sweden":"Stockholm",
       "United Kingdom":"London", "Cyprus":"Nicosia", "Lithuania":"Vilnius",
       "Czech Republic":"Prague", "Estonia":"Tallin", "Hungary":"Budapest",
       "Latvia":"Riga", "Malta":"Valetta", "Austria" : "Vienna", "Poland":"Warsaw"}

def capitales(dict):
    try:
        dict = dict.items()
    except:
        raise Exception("Not a dictionary")
    for cou, cap in dict:
        print(f"The capital of {cou} is {cap}") 

capitales(ceu)
