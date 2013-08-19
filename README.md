

What?
================================
PHP scripts to generate REST documentation from YAML definition files. 

Why?
=======
There are many tools to generate REST API documentation from source code. However those tools assume that 
you are willing to put your entire API document inside source code. That may not be a good assumption for
aesthetic and practical reasons. For example, while it is Okay to document parameter names and type in source 
code, it is not okay to document sample request and response and constraints on parameters.

We are assuming that you want your document effort to be separate from your source code. What you want is to
write your documentation in a Human friendly format that can be rendered into HTML or PDF. Professional tools 
can be an overkill of time and effort for simple tasks. That is where this effort fits in. The PHP scripts
read API definition from YAML files and generate HTML. 

How?
=======

Clone the repo and dump the pub folder inside your web server DOCUMENT ROOT. You can rename it to anything you 
want. We are assuming that you know how to run PHP scripts. Now access pub/index.php file from your browser. 
You will see the API landing page and 2 sample API. 

To add new API, open the index.yaml file and add new API summary there. The full API definition resides
in a YAML file inside yaml folder. You can see the samples to get started. We use Twitter Bootstrap library 
and the Look and Feel of API pages is modeled on twitter REST API.



