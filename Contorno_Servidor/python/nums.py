# 1 2 6 7
# 3 5 8 13
# 4 9 12 14
# 10 11 15 16

def show(arr):
    for row in arr:
        print(row)

def col(col):
    table = []
    for row in range(col):
        table.append([])
        for num in range(col):
            table[row].append(0)
    main(table)
    
def main(table):
    print("------------------")
    x ,y ,xc ,yc, counter = -1, -1, 1, 1, 1
    while True:
        x+=1
        y+=1
        print(x, y, "\n", xc, yc)
        print("--\nx=",x,"\nxc=", xc)
        if (x == xc) & (table[0][y] == 0):
            xc += 1
            y += 1
            x = 0
            table[x][y-1] = counter
            counter += 1
            y = 0
            show(table)
            print("ERM\n\n")
            continue
        print("--\ny=",y,"\nyc=", yc)
        if (y == yc) & (table[x][0] == 0):
            yc += 1
            y = 0
            x += 1
            table[x-1][y] = counter
            counter += 1
            x = 0
            show(table)
            print("ERM\n\n")
            continue
        if table[x][0] == 0:
            table[x][y] = counter
            show(table)
        else: counter-=1
        counter += 1
        print("\n")
        if xc >= 4: break





col(4)