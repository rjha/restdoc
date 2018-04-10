from flask import Flask, render_template
import yaml

app = Flask(__name__)

stream = open("index.yaml", "r")
docs = yaml.load(stream)

@app.route("/")
def index():
    return render_template("api.html", docs=docs)

@app.route("/yaml/<name>")
def yaml(name):
    path = "yaml/{}".format(name)
    import yaml
    stream = open(path, "r")
    items = yaml.load(stream)
    return render_template("document.html", items=items )

if __name__ == "__main__":
    app.run()