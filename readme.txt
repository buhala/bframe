THIS IS A VERY, VERY EXPERIMENTAL RELEASE;
To create a controller, create a file in controllers called controllerName.php, make it contain a class called controllerName
which extends b_controller
To create a model, create a model.php in models, make it extend b_model, and woala. 
To load models, do $this->loadModel('modelname'), then to access it, do $this->modelname, same with a view. 
Loading a library is $this->loadLibrary('libraryName') which *SHOULD* be an object, accessing it is $libraries['libraryName']->method().
Calling is typed like this
/index.php/controller/command(defaults to index)/arg1/arg2/arg3
Autoloading libraries can be configured at /system/autoload.php