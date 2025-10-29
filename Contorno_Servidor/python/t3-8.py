class Alien:
    number_of_aliens = 0
    def __init__(self, name):
        self.name = name
        Alien.number_of_aliens += 1

    def getNumberOfAliens():
        return Alien.number_of_aliens

Alien("Alan")
Alien("Erm")
print(Alien.getNumberOfAliens())
Alien("Uhh")
print(Alien.getNumberOfAliens())