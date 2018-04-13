import time
time_start = time.clock()

import argparse

import glob

import yaml

import pdfkit

import jinja2
from jinja2 import Template



def yaml_parse(dest, format, source) :

    stream = open(source, "r")

    items = yaml.load(stream)

    with open('templates/document.tmpl') as t:
        tmpl = Template(t.read())

    if format == "PDF" or format == "BOTH" :
        filename=dest+"/"+items["name"]+".pdf"
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

    if format == "HTML" or format == "BOTH":
        filename=dest+"/"+items["name"]+".html"

        f = open(filename,"w")
        f.truncate()

        f.write(tmpl.render(items=items))
        f.close()
    return

def main() :

    parser = argparse.ArgumentParser(description="Restdoc API Documentation Python Script")
    parser.add_argument("-s", "--source", dest="source", default="src", help="Source YAML Directory, default is src")
    parser.add_argument("-d", "--dest", dest="dest", default="dest", help="Destination Directory, default if dest")
    parser.add_argument("-f", "--format", default="BOTH", choices=["PDF", "HTML", "BOTH"], help="Format of Output File, default is BOTH")
    parser.add_argument("-t", "--test", action="store_true", default=False, help="Test with our sample YAML files")
    args = parser.parse_args()

    if args.test:
        sources = glob.glob("sample/*.yaml")
    else:
        sources = glob.glob(args.source+"/*.yaml")

    for source in sources :
        yaml_parse(args.dest, args.format, source)

    time_elapsed = (time.clock() - time_start)
    print "Total time taken - ", time_elapsed

if __name__ == "__main__" :
    main()