# customization

PACKAGE_NAME = "Icybee/Modules/News"

# do not edit the following lines

usage:
	@echo "test:  Runs the test suite.\ndoc:   Creates the documentation.\nclean: Removes the documentation, the dependencies and the Composer files."

composer.phar:
	@echo "Installing composer..."
	@curl -s https://getcomposer.org/installer | php

vendor: composer.phar
	@php composer.phar install --dev
	
test: vendor
	@phpunit

doc: vendor
	@mkdir -p "docs"

	@apigen \
	--source ./ \
	--destination docs/ --title $(PACKAGE_NAME) \
	--exclude "*/composer/*" \
	--exclude "*/tests/*" \
	--template-config /usr/share/php/data/ApiGen/templates/bootstrap/config.neon
	
clean:
	@rm -fR docs
	@rm -fR vendor
	@rm -f composer.lock
	@rm -f composer.phar
	
update: composer.phar
	php composer.phar update --dev