class Calculator:
    num = 0
    
    def __init__(self, num1 = 0, num2 = 0):
        try:
            self.num1 = int(num1)
            self.num2 = int(num2)
        except:
            raise Exception("Must be numbers")
        Calculator.num += 1

    def __str__(self):
        return f"[{self.num1}, {self.num2}]"
    
    def set_nums(self, num1, num2):
        try:
            self.num1 = int(num1)
            self.num2 = int(num2)
        except:
            raise Exception("Must be numbers")

    def number_of_objects(self):
        return Calculator.num
    
    def get_nums(self):
        return [self.num1, self.num2]
    
    def suma(self):
        return self.num2 + self.num1
    
first_calculate = Calculator()
first_calculate.set_nums(2, 4)
print(first_calculate.get_nums())
second_calculate = Calculator(5, 7)
print(second_calculate)
print(f"{first_calculate.suma()}, {second_calculate.suma()}")