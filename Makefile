all:
	php generator.php > Targets
	service smokeping reload
	git add config.php Targets
	git commit -m 'Update Targets'
