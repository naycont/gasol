
# How to install Laravel on Ubuntu 16.04

1. Install composer.
	'php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"'

- make it Globally

	**$** mv composer.phar /usr/local/bin/composer


2. Install laravel
	**$** composer global require "laravel/installer"

3. add to PATH

	**$** echo 'export PATH="$HOME/.composer/vendor/bin:$PATH"' >> ~/.bashrc
	**$** source ~/.bashrc

4. Create a laravel project
	
	**$** laravel new *myproject*

5. Start Coding
