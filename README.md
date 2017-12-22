# Symfony4

Initial Symfony 4 Project

# COMPOSER BUNDLE

        - devDependencies :
        
           "symfony/dotenv": "^4.0"
           "symfony/profiler-pack": "^1.0"
           "symfony/web-server-bundle": "^4.0"
           
        - dependencies :
        
           "php": "^7.1.3"
           "ext-iconv": "*"
           "sensio/framework-extra-bundle": "^5.1"
           "sensiolabs/security-checker": "^4.1"
           "symfony/asset": "^4.0"
           "symfony/console": "^4.0"
           "symfony/flex": "^1.0"
           "symfony/framework-bundle": "^4.0"
           "symfony/lts": "^4@dev"
           "symfony/twig-bundle": "^4.0"
           "symfony/webpack-encore-pack": ">=1.0"
           "symfony/yaml": "^4.0"
        
# YARN (NODE_MODULES)

         - devDependencies : 
         
            "@symfony/webpack-encore": "^0.17.0"
            "node-sass": "^4.7.2"
            "sass-loader": "^6.0.6"
            "webpack-notifier": "^1.5.0"
          
          - dependencies : 
          
             "bootstrap": "4.0.0-beta.2"
             "font-awesome": "^4.7.0"
             "jquery": "^3.2.1"
             "popper.js": "1.12.3"

# WEBPACK ENCORE

 - See ./webpack.config.js for configuration
 - Get assets in ./assets and build them in ./public/build
 - Do SCSS compilation
 
 For compile and build assets run
 
 yarn run encore dev
 
 - Build dev assets (less minimize , faster compilation)
 
 or
 
 <yarn run encore production>
        
 - Build prod assets (full minimize)

# ASSETS

 - app.scss -> include Bootstrap.scss & Font-awesome
 - app.js -> include Bootstrap.js & define Popper.js
 
 # GET STARTED
 
 - Clone the project in your project folder.
 - Be sure php >= 7.0 is installed in your local environnment (path).
 - In your symfony project folder run :
 "php composer.phar update"
 - It will download all vendor.
 - Then be sure nodeJs is installed on your computer with yarn and run in the same folder :
 "yarn install"
 - Compile and build assets with one of the command defined in WEBPACK ENCORE SECTION.
 
 - Start local web server with :
 "YourSymfonyFolder/: php bin/console run:server "
