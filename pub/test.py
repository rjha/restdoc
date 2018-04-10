import yaml

stream = open("index.yaml", "r")
docs = yaml.load(stream)
for doc in docs:
    print (docs[doc]["name"],"->",docs[doc]["description"])
    print (docs[doc]['file_name'])
    stream1 = open(docs[doc]["file_name"], "r")
    items = yaml.load(stream1)
    for doc1 in items:
        if doc1 != "parameters":
            print (doc1, "->", items[doc1]) 
        elif doc1 == "parameters":
            print ("Parameters ->")
            for parameters in items[doc1]:
                for parameter in parameters:
                    print (parameter, "->", parameters[parameter])