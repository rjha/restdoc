from flask import Flask, render_template
import yaml
import pdfkit
import pdfcrowd

app = Flask(__name__)

with app.app_context():
    stream = open("index.yaml", "r")
    docs = yaml.load(stream)
    for doc in docs:
        filename=docs[doc]["name"]+".html"
        filename1=docs[doc]["name"]+".pdf"
        f= open(filename,"w")
        f.truncate()
        stream1 = open(docs[doc]["file_name"], "r")
        items = yaml.load(stream1)
        f.write(render_template("document.html", items=items))
        f.close()
        options = {
            'page-size': 'A4',
            'dpi': 250
        }
        pdfkit.from_url("http://localhost:8888/restdoc/pub/"+filename, filename1, options=options)
    exit()

if __name__ == "__main__":
    app.run()