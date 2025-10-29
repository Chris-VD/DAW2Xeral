def myfunc(name:str, age:int, surname:str = "Apelido"):
    if name == None:
        name = ""
    else: name += " "
    print(f"{name}{surname} is {age} years old.")

myfunc("Erm", 11)
myfunc("Erm", 11, "Errm")
myfunc(None, 2, "Erm")