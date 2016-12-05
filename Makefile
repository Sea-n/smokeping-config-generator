all:
	php generator.php > Targets
	service smokeping reload
