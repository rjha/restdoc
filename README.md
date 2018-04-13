

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

Clone the repo and dump the restdoc folder anywhere you like. 

Please make sure you have pdfkit (https://pypi.python.org/pypi/pdfkit), wkhtmltopdf(https://pypi.python.org/pypi/wkhtmltopdf/0.1), yaml (https://pyyaml.org/wiki/PyYAMLDocumentation) and jinja2 (http://jinja.pocoo.org) python modules installed in your system. 

We are assuming that you know how to run a Python script. Place all your YAML files in src directory. Simply run the python script main.py in pub folder. HTML and PDF file for all the YAML files will generated in the dest folder. To change the source or destination directory use the options given below.

Options -

1. -h or --help : Help and list of options.
2. -t or --test : Test with our sample YAML file. Parsed sample HTML and PDF file will be created in dest folder
3. -s or --source : Source directory of YAML files to be parsed. Default - src.
4. -d or --dest : Destination directory for parsed HTML and PDF files. Default - dest.
5. -f or --format : Format of the parsed file (PDF, HTML or BOTH). Default - BOTH.

Sample API definition resides in the YAML files inside sample folder. You can see the samples to get started. 
We use Twitter Bootstrap library and the Look and Feel of API pages is modeled on twitter REST API.

Contact
=======

Mitesh Banka
+91-8482096370
mbanka@yuktix.com
www.yuktix.com

