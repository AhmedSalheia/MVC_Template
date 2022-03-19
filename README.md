# First MVC Template
This MVC Template that I've created and will be updating soon.

## features:
- Auto Routing: 
  * Routing is being done by ```app/lib/FrontController.php```, so -till now- I'm
  auto routing in that, the forms: ```/{controller}/{action}```, ```/{dir}/{controller}/{action}```
  * for other special routes (like api or dashboard), you should define it on the switch on the frontController.
- Multi Language: 
  - by Using ```app/lib/Language.php``` class, I auto import php array language files from ```/app/languages/{lang}```, and inject it into the template as php variables.
- Template Structure:
  - By using ```app/lib/Template.php``` class, I inject Template Parts Defined on ```app/config/templateconfig.php``` to the main frontend.
- Database Connection: 
  - is being created by the ```app/lib/database/DatabaseHandler.php``` class and used in the Models.
- Models and Database Operations:
  - the class app/models/AbstractModel.php holds the main database operations, it must be inherited in every other model.
  - Models must have column names as attributes, this (tableName, primaryKey, uniqueKey, timeCol, tableSchema, tableProbs, and tableKeys) static attributes.
    - ```tableName (str)```: has the table name.
    - ```primaryKey (str)```: has the primary key.
    - ```uniqueKey (str)```: has the unique key if exists.
    - ```timeCol (str)```: has the time column if exists.
    - ```tableSchema (array)```: has the names of every column in the table as a key and the DATA_TYPE constant for its type (ex: ```DATA_TYPE_INT```), this property is used when inserting or updating for type validation.
    - ```tableProbs (array)```: has the names of every column as a key and an array of its SQL properties as a value, used when creating the table.
    - ```tableKeys (array)```: for storing the keys of the table (if there are more than one key as unique or primary or foreign), still under development.
- Template Files:
  - are stored in ```app/template/``` directory, holds the parts of the main page template.s
- Views:
  - stored in ```app/views``` directory, being called by the ```VIEWS_PATH``` constant in the config file.
