import yaml
import pdfkit

import jinja2
from jinja2 import Template

import argparse

parser = argparse.ArgumentParser(description="Restdoc API Documentation Python Script")
parser.add_argument("-s", "--source", dest="source", default="index.yaml", help="Source Yaml File")
parser.add_argument("-d", "--dest", dest="dest", default="Documents/", help="Destination Directory")
parser.add_argument("-f", "--format", default="BOTH", choices=["PDF", "HTML", "BOTH"], help="Format of Output File")
parser.add_argument("-t", "--test", action="store_true", default=False, help="Test the python script with sample yaml file")
args = parser.parse_args()

if args.test:
    stream = open("yaml/sample1.yaml", "r")
else :
    stream = open(args.source, "r")

items = yaml.load(stream)

with open('templates/document.tmpl') as t:
    tmpl = Template(t.read())

if args.format == "PDF" or args.format == "BOTH" :
    filename=args.dest+items["name"]+".pdf"
    options = {
        'page-size': 'A4',
        'dpi': 300,
        'margin-top': '0.75in',
        'margin-right': '0.75in',
        'margin-bottom': '0.75in',
        'margin-left': '0.75in',
        'encoding': "UTF-8",
    }
    pdfkit.from_string(tmpl.render(items=items), filename, options=options)

if args.format == "HTML" or args.format == "BOTH":
    filename=args.dest+items["name"]+".html"

    f = open(filename,"w")
    f.truncate()

    f.write(tmpl.render(items=items))
    f.close()

