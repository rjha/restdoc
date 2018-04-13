

What?
================================
Python script to generate REST documentation from YAML definition files. 

Why?
=======
There are many tools to generate REST API documentation from source code. However those tools assume that 
you are willing to put your entire API document inside source code. That may not be a good assumption for
aesthetic and practical reasons. For example, while it is Okay to document parameter names and type in source 
code, it is not okay to document sample request and response and constraints on parameters.

We are assuming that you want your document effort to be separate from your source code. What you want is to
write your documentation in a Human friendly format that can be rendered into HTML or PDF. Professional tools 
can be an overkill of time and effort for simple tasks. That is where this effort fits in. The Python script
read API definition from YAML files and generates HTML and PDF. 

How?
=======

Clone the repo and dump the restdoc folder anywhere you like. Please make sure you have python (www.python.org) and pdfkit (https://pypi.python.org/pypi/pdfkit), wkhtmltopdf(https://pypi.python.org/pypi/wkhtmltopdf/0.1), yaml (https://pyyaml.org/wiki/PyYAMLDocumentation), jinja2 (http://jinja.pocoo.org) and argparse (https://pypi.python.org/pypi/argparse) modules installed in your system. We are assuming that you know how to run Python scripts. Simply run the python script "main.py" in /pub folder with the arguments "Yaml_File" - Source Yaml file, "out_dir" - Destination output directory and "out_type" - Type of the generated output file "PDF" for a PDF Document, "HTML" for a HTML Document and "BOTH" for both types.

Example - python main.py yaml/sample1.yaml ~/Desktop/ PDF

Sample API definition resides in the YAML files inside yaml folder. You can see the samples to get started. 
We use Twitter Bootstrap library and the Look and Feel of API pages is modeled on twitter REST API.



