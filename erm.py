from time import sleep
import os

list=["|","/","——", "\\"]
x=0
while True:
    sleep(0.1)
    os.system("clear")
    print(list[x])
    x=x+1
    if x>3:
        x=0
        