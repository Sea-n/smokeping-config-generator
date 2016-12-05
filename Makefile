all:
	php gen.php > Targets
	service smokeping reload
