def factorial(x):
    try:
        x = int(x)
        if (x<0):
            raise Exception
        elif x == 0:
            return 0
    except:
        raise Exception("O valor non é un número ou é menor que 0")
    total = 1
    for y in range(x):
        total *= y+1
    return total
print(factorial(0))
print(factorial(1))
print(factorial(3))
print(factorial(5))