words = ["List", "Dictionary", "Array"]
definitions = ["Ordered array of objects", "Unordered array of key-value pairs", "Mathematic definition"]
cooldictionary = {}
for i in range(len(words)): cooldictionary[words[i]] = (definitions[i])
#print(cooldictionary)
print(f"The contents of the dictionary are:")
for key, val in cooldictionary.items(): print(f"\t{key}: {val}")