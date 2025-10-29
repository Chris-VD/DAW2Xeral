def potencias(x, y):
    try:
        x = int(x)
        y = int(y)
    except:
        raise Exception("Not an integer")
    total = 1
    for j in range(y):
        total *= x
    return total

print(potencias(4,3))
print(potencias("e",3))