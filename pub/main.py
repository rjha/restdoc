import yaml
import pdfkit

import jinja2
from jinja2 import Template

import argparse

parser = argparse.ArgumentParser()
parser.add_argument("Yaml_File", help="Path of the Yaml File")
parser.add_argument("out_dir", help="Output Directory")
parser.add_argument("out_type", choices=["PDF", "HTML", "BOTH"], help="Output Type - PDF, HTML or BOTH")
args = parser.parse_args()

stream = open(args.Yaml_File, "r")
items = yaml.load(stream)

with open('templates/document.tmpl') as t:
    tmpl = Template(t.read())

if args.out_type == "PDF" or args.out_type == "BOTH" :
    filename=args.out_dir+items["name"]+".pdf"
    options = {
        'page-size': 'A4',
        'dpi': 250
    }
    pdfkit.from_string(tmpl.render(items=items), filename, options=options)

if args.out_type == "HTML" or args.out_type == "BOTH":
    filename=args.out_dir+items["name"]+".html"

    f = open(filename,"w")
    f.truncate()

    f.write(tmpl.render(items=items))
    f.close()

